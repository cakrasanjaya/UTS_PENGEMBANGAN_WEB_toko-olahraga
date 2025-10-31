<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\ReportController;

// ====================
// DASHBOARD
// ====================
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// ====================
// MASTER DATA (CRUD)
// ====================
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);

// ====================
// TRANSAKSI STOK MASUK
// ====================
Route::resource('stock-ins', StockInController::class);
Route::post('stock-ins/{stockIn}/complete', [StockInController::class, 'complete'])
    ->name('stock-ins.complete');
Route::post('stock-ins/{stockIn}/cancel', [StockInController::class, 'cancel'])
    ->name('stock-ins.cancel');

// ====================
// TRANSAKSI STOK KELUAR
// ====================
Route::resource('stock-outs', StockOutController::class);
Route::post('stock-outs/{stockOut}/complete', [StockOutController::class, 'complete'])
    ->name('stock-outs.complete');
Route::post('stock-outs/{stockOut}/cancel', [StockOutController::class, 'cancel'])
    ->name('stock-outs.cancel');

// ====================
// HALAMAN TAMBAHAN
// ====================
Route::get('/about', function () {
    return view('about');
})->name('about');

// ====================
// LAPORAN
// ====================
// Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
