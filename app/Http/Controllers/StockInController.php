<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockInDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class StockInController extends Controller
{
    public function index(Request $request): View|Factory
{
    $search = $request->input('search');

    $stockIns = StockIn::with(['supplier', 'details.product'])
        ->when($search, function ($query, $search) {
            $query->where('invoice_number', 'like', "%{$search}%")
                  ->orWhereHas('supplier', fn($q) => $q->where('name', 'like', "%{$search}%"));
        })
        ->orderBy('purchase_date', 'desc')
        ->paginate(5)
        ->appends(['search' => $search]); // supaya pagination tetap bawa query search

    return view('stock-ins.index', compact('stockIns', 'search'));
}
    public function create(): View|Factory
    {
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('stock-ins.create', compact('suppliers', 'products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.purchase_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            // Generate nomor invoice unik otomatis
            $invoiceNumber = 'INV-' . date('YmdHis') . '-' . strtoupper(uniqid());

            // Hitung total semua produk
            $totalAmount = collect($validated['products'])->sum(fn($item) =>
                $item['quantity'] * $item['purchase_price']
            );

            // Simpan data utama pembelian
            $stockIn = StockIn::create([
                'supplier_id' => $validated['supplier_id'],
                'invoice_number' => $invoiceNumber,
                'purchase_date' => $validated['purchase_date'],
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            // Simpan detail pembelian
            foreach ($validated['products'] as $item) {
                StockInDetail::create([
                    'stock_in_id' => $stockIn->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'purchase_price' => $item['purchase_price'],
                    'subtotal' => $item['quantity'] * $item['purchase_price'],
                ]);
            }

            DB::commit();
            return redirect()
                ->route('stock-ins.index')
                ->with('success', 'Data pembelian berhasil disimpan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function show(StockIn $stockIn): View|Factory
    {
        $stockIn->load('supplier', 'details.product');
        return view('stock-ins.show', compact('stockIn'));
    }

    public function edit(StockIn $stockIn): View|Factory
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $stockIn->load('details.product');

        return view('stock-ins.edit', compact('stockIn', 'suppliers', 'products'));
    }

    public function update(Request $request, StockIn $stockIn): RedirectResponse
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.purchase_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $totalAmount = collect($validated['products'])->sum(fn($item) =>
                $item['quantity'] * $item['purchase_price']
            );

            $stockIn->update([
                'supplier_id' => $validated['supplier_id'],
                'purchase_date' => $validated['purchase_date'],
                'total_amount' => $totalAmount,
            ]);

            // Hapus detail lama dan ganti baru
            $stockIn->details()->delete();
            foreach ($validated['products'] as $item) {
                StockInDetail::create([
                    'stock_in_id' => $stockIn->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'purchase_price' => $item['purchase_price'],
                    'subtotal' => $item['quantity'] * $item['purchase_price'],
                ]);
            }

            DB::commit();
            return redirect()
                ->route('stock-ins.index')
                ->with('success', 'Data pembelian berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Tandai pembelian selesai dan update stok produk otomatis
     */
    public function complete(StockIn $stockIn): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if ($stockIn->status === 'completed') {
                return redirect()
                    ->route('stock-ins.index')
                    ->with('info', 'Transaksi ini sudah selesai sebelumnya.');
            }

            foreach ($stockIn->details as $detail) {
                $product = Product::find($detail->product_id);
                if ($product) {
                    $product->stock += $detail->quantity;
                    $product->save();
                }
            }

            $stockIn->update(['status' => 'completed']);

            DB::commit();
            return redirect()
                ->route('stock-ins.index')
                ->with('success', 'Transaksi pembelian selesai dan stok produk telah diperbarui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function cancel(StockIn $stockIn): RedirectResponse
    {
        $stockIn->update(['status' => 'cancelled']);
        return redirect()
            ->route('stock-ins.index')
            ->with('success', 'Transaksi pembelian dibatalkan.');
    }

    /**
     * 🔥 Diperbarui:
     * Hapus pembelian dan otomatis kembalikan stok jika status "completed"
     */
    public function destroy(StockIn $stockIn): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // Kembalikan stok hanya jika transaksi sudah completed
            if ($stockIn->status === 'completed') {
                foreach ($stockIn->details as $detail) {
                    $product = Product::find($detail->product_id);
                    if ($product) {
                        $product->stock -= $detail->quantity;
                        if ($product->stock < 0) $product->stock = 0; // cegah stok minus
                        $product->save();
                    }
                }
            }

            // Hapus detail dan data utama
            $stockIn->details()->delete();
            $stockIn->delete();

            DB::commit();
            return redirect()
                ->route('stock-ins.index')
                ->with('success', 'Data pembelian berhasil dihapus dan stok produk telah diperbarui.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
