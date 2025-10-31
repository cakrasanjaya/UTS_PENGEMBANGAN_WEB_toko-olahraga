<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Menampilkan daftar supplier dengan fitur pencarian dan pagination
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query supplier dengan filter pencarian
        $suppliers = Supplier::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%')
                      ->orWhere('phone', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        // Pertahankan parameter search di pagination
        $suppliers->appends(['search' => $search]);

        return view('suppliers.index', compact('suppliers', 'search'));
    }

    /**
     * Menampilkan form tambah supplier
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Menyimpan supplier baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name',
            'email' => 'nullable|email|max:255|unique:suppliers,email',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50|unique:suppliers,phone',
        ]);

        Supplier::create($request->only(['name', 'email', 'address', 'phone']));

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Distributor berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit supplier
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Memperbarui data supplier
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:suppliers,name,' . $supplier->id,
            'email' => 'nullable|email|max:255|unique:suppliers,email,' . $supplier->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50|unique:suppliers,phone,' . $supplier->id,
        ]);

        $supplier->update($request->only(['name', 'email', 'address', 'phone']));

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Distributor berhasil diperbarui!');
    }

    /**
     * Menghapus supplier
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Distributor berhasil dihapus!');
    }
}
