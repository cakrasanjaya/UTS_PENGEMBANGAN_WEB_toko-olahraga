@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f5f5;
    }

    .category-header {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        padding: 3rem 2rem;
        color: white;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }

    .category-header h2 {
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

    .alert-success {
        background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
        border: none;
        border-radius: 15px;
        color: #155724;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(150, 230, 161, 0.3);
    }

    .alert-success i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        .category-header h2 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="category-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2">🏷️ Daftar Kategori</h2>
                <p class="mb-0" style="opacity: 0.9;">Organisir produk dengan kategori yang terstruktur</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('categories.create') }}" class="btn btn-tambah">
                    <i class="fas fa-plus me-2"></i>Tambah Kategori
                </a>
            </div>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Search Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('categories.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Cari kategori..."
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
                        <th style="width: 100px;">NO</th>
                        <th>NAMA KATEGORI</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td class="text-center">
                            <span class="number-circle">
                                {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-black me-3"></div>
                                <strong>{{ $category->name }}</strong>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit btn-sm me-2">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <i class="fas fa-folder-open" style="font-size: 3rem; color: #ccc;"></i>
                            <h5 class="mt-3 text-muted">Belum ada kategori</h5>
                            <p class="text-muted">Buat kategori pertama untuk mengorganisir produk Anda!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($categories->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="pagination-info mb-0">
                        Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} results
                    </p>
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <!-- Previous Button -->
                            <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categories->appends(request()->query())->previousPageUrl() }}" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            @php
                                $start = max($categories->currentPage() - 2, 1);
                                $end = min($start + 4, $categories->lastPage());
                                $start = max($end - 4, 1);
                            @endphp

                            @if($start > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $categories->appends(request()->query())->url(1) }}">1</a>
                                </li>
                                @if($start > 2)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                            @endif

                            @for ($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $i == $categories->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $categories->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($end < $categories->lastPage())
                                @if($end < $categories->lastPage() - 1)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="{{ $categories->appends(request()->query())->url($categories->lastPage()) }}">{{ $categories->lastPage() }}</a>
                                </li>
                            @endif

                            <!-- Next Button -->
                            <li class="page-item {{ !$categories->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categories->appends(request()->query())->nextPageUrl() }}" aria-label="Next">
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