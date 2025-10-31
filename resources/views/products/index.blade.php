@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f5f5;
    }

    .product-header {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        padding: 3rem 2rem;
        color: white;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }

    .product-header h2 {
        font-weight: 700;
        font-size: 2.5rem;
        margin: 0;
    }

    .btn-tambah {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: #ff6b8a;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(168, 237, 234, 0.4);
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(168, 237, 234, 0.6);
        color: #ff6b8a;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .table thead {
        background-color: #fafafa;
    }

    .table thead th {
        padding: 20px 15px;
        font-weight: 700;
        font-size: 11px;
        letter-spacing: 1px;
        color: #666;
        text-transform: uppercase;
        border: none;
    }

    .table tbody td {
        padding: 20px 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f0f0f0;
        color: #333;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: #fafafa;
    }

    .number-circle {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%);
        color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
    }

    .avatar-black {
        width: 45px;
        height: 45px;
        background-color: #000;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .product-price {
        color: #28a745;
        font-weight: 700;
        font-size: 1.05rem;
    }

    .category-badge {
        padding: 8px 20px;
        border-radius: 20px;
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .stock-badge {
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 12px;
        display: inline-block;
    }

    .bg-stock-high {
        background-color: #d4edda;
        color: #155724;
    }

    .bg-stock-low {
        background-color: #fff3cd;
        color: #856404;
    }

    .bg-stock-empty {
        background-color: #f8d7da;
        color: #721c24;
    }

    .btn-edit {
        background: linear-gradient(135deg, #c8a2ff 0%, #d4b5ff 100%);
        color: white;
        padding: 8px 24px;
        border-radius: 25px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(200, 162, 255, 0.4);
        color: white;
    }

    .btn-hapus {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        color: white;
        padding: 8px 24px;
        border-radius: 25px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-hapus:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 20px;
    }

    .form-control:focus {
        border-color: #00bcd4;
        box-shadow: 0 0 0 0.2rem rgba(0, 188, 212, 0.15);
    }

    .btn-dark {
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: 600;
    }

    .pagination {
        gap: 8px;
    }

    .page-link {
        border: 2px solid #e2e8f0;
        color: #4a5568;
        font-weight: 600;
        border-radius: 10px !important;
        padding: 8px 16px;
        transition: all 0.3s ease;
        margin: 0;
    }

    .page-link:hover {
        background-color: #f7fafc;
        border-color: #cbd5e0;
        color: #4a5568;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #0066ff 0%, #0052cc 100%);
        border-color: #0066ff;
        color: white;
        box-shadow: 0 4px 12px rgba(0, 102, 255, 0.3);
        z-index: 1;
    }

    .page-item.disabled .page-link {
        background-color: #f7fafc;
        border-color: #e2e8f0;
        color: #cbd5e0;
    }

    .page-item:first-child .page-link,
    .page-item:last-child .page-link {
        border-radius: 10px !important;
    }

    .pagination-info {
        color: #718096;
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        .product-header h2 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="product-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2">📦 Daftar Produk</h2>
                <p class="mb-0" style="opacity: 0.9;">Kelola produk dan stok barang dengan mudah</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('products.create') }}" class="btn btn-tambah">
                    <i class="fas fa-plus me-2"></i>Tambah Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('products.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Cari nama produk atau kategori..."
                        value="{{ $search ?? '' }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">NO</th>
                        <th>NAMA PRODUK</th>
                        <th>HARGA</th>
                        <th>STOK</th>
                        <th>KATEGORI</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="text-center">
                            <span class="number-circle">
                                {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-black me-3"></div>
                                <strong>{{ $product->name }}</strong>
                            </div>
                        </td>
                        <td>
                            <span class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            @php
                                $stock = $product->stock ?? 0;
                                $badge = $stock > 10 ? 'bg-stock-high' : ($stock > 0 ? 'bg-stock-low' : 'bg-stock-empty');
                            @endphp
                            <span class="stock-badge {{ $badge }}">{{ $stock }} pcs</span>
                        </td>
                        <td>
                            <span class="category-badge">{{ $product->category->name ?? '-' }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit btn-sm me-2">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="fas fa-box-open" style="font-size: 3rem; color: #ccc;"></i>
                            <h5 class="mt-3 text-muted">Belum ada data produk</h5>
                            <p class="text-muted">Tambahkan produk pertama untuk mulai mengelola stok Anda!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($products->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="pagination-info mb-0">
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
                    </p>
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <!-- Previous Button -->
                            <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->appends(request()->query())->previousPageUrl() }}" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            @php
                                $start = max($products->currentPage() - 2, 1);
                                $end = min($start + 4, $products->lastPage());
                                $start = max($end - 4, 1);
                            @endphp

                            @if($start > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->appends(request()->query())->url(1) }}">1</a>
                                </li>
                                @if($start > 2)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                            @endif

                            @for ($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($end < $products->lastPage())
                                @if($end < $products->lastPage() - 1)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="{{ $products->appends(request()->query())->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
                                </li>
                            @endif

                            <!-- Next Button -->
                            <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->appends(request()->query())->nextPageUrl() }}" aria-label="Next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    </div>
@endsection