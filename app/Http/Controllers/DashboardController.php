<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockInDetail;
use App\Models\StockOutDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total produk dan supplier
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();

        // Hitung total stok masuk dan keluar dari tabel detail
        $totalStockIn = StockInDetail::sum('quantity');
        $totalStockOut = StockOutDetail::sum('quantity');

        // Hitung stok tersedia
        $stokTersedia = $totalStockIn - $totalStockOut;

        // Kirim ke view
        return view('dashboard.index', compact(
            'totalProducts',
            'totalSuppliers',
            'totalStockIn',
            'totalStockOut',
            'stokTersedia'
        ));
    }
}
