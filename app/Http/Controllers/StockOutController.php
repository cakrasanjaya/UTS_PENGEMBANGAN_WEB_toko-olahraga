<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockOut;
use App\Models\StockOutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockOutController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $stockOuts = StockOut::with('details.product')
            ->when($search, function ($query, $search) {
                $query->where('invoice_number', 'like', "%{$search}%")
                      ->orWhere('customer_name', 'like', "%{$search}%");
            })
            ->orderBy('stock_out_date', 'desc')
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('stock-outs.index', compact('stockOuts', 'search'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock-outs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|string|max:50|unique:stock_outs,invoice_number',
            'customer_name' => 'required|string|max:100',
            'stock_out_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $stockOut = StockOut::create([
                'invoice_number' => $validated['invoice_number'],
                'customer_name' => $validated['customer_name'],
                'stock_out_date' => $validated['stock_out_date'],
                'total_amount' => collect($validated['products'])
                    ->sum(fn ($p) => $p['price'] * $p['quantity']),
                'status' => $validated['status'],
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($validated['products'] as $item) {
                $subtotal = $item['price'] * $item['quantity'];

                StockOutDetail::create([
                    'stock_out_id' => $stockOut->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $subtotal,
                ]);

                $product = Product::find($item['id']);
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Stok produk {$product->name} tidak mencukupi.");
                }

                $product->decrement('stock', $item['quantity']);
            }

            DB::commit();
            return redirect()->route('stock-outs.index')
                ->with('success', 'Transaksi stok keluar berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $stockOut = StockOut::with('details.product')->findOrFail($id);
        return view('stock-outs.show', compact('stockOut'));
    }

    /** ✅ Fitur edit */
    public function edit($id)
    {
        $stockOut = StockOut::with('details.product')->findOrFail($id);
        $products = Product::all();

        return view('stock-outs.edit', compact('stockOut', 'products'));
    }

    /** ✅ Fitur update */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'stock_out_date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $stockOut = StockOut::with('details.product')->findOrFail($id);

            // Kembalikan stok produk dari detail lama
            foreach ($stockOut->details as $detail) {
                $detail->product->increment('stock', $detail->quantity);
            }

            // Hapus detail lama
            $stockOut->details()->delete();

            // Update data utama
            $stockOut->update([
                'customer_name' => $validated['customer_name'],
                'stock_out_date' => $validated['stock_out_date'],
                'total_amount' => collect($validated['products'])
                    ->sum(fn ($p) => $p['price'] * $p['quantity']),
                'status' => $validated['status'],
                'notes' => $validated['notes'] ?? null,
            ]);

            // Tambahkan detail baru & update stok
            foreach ($validated['products'] as $item) {
                $subtotal = $item['price'] * $item['quantity'];

                StockOutDetail::create([
                    'stock_out_id' => $stockOut->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $subtotal,
                ]);

                $product = Product::find($item['id']);
                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Stok produk {$product->name} tidak mencukupi.");
                }

                $product->decrement('stock', $item['quantity']);
            }

            DB::commit();
            return redirect()->route('stock-outs.index')
                ->with('success', 'Transaksi stok keluar berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $stockOut = StockOut::with('details.product')->findOrFail($id);

        DB::beginTransaction();
        try {
            foreach ($stockOut->details as $detail) {
                $detail->product->increment('stock', $detail->quantity);
            }

            $stockOut->details()->delete();
            $stockOut->delete();

            DB::commit();
            return redirect()->route('stock-outs.index')
                ->with('success', 'Transaksi stok keluar berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}