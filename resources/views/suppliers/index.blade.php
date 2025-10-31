@extends('layouts.app')

@section('content')
<style>
    .supplier-header {
        background: linear-gradient(135deg, #000000ff 0%, #000000ff 100%);
        padding: 3rem 0;
        margin: -1.5rem -1.5rem 2rem -1.5rem;
        color: white;
        border-radius: 0 0 30px 30px;
        box-shadow: 0 10px 30px rgba(245, 87, 108, 0.3);
    }

    .supplier-header h2 {
        font-weight: 700;
        font-size: 2.5rem;
        margin: 0;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .btn-add-supplier {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        color: #f5576c;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(168, 237, 234, 0.4);
    }

    .btn-add-supplier:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(168, 237, 234, 0.6);
        color: #f5576c;
    }

    .supplier-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    /* Search Bar Styling */
    .search-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }

    .search-input-wrapper {
        position: relative;
        display: flex;
        gap: 10px;
    }

    .search-input {
        flex: 1;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 20px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #00bcd4;
        box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
    }

    .btn-search {
        background: #000;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-search:hover {
        background: #333;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .table-modern {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .table-modern thead {
        background: linear-gradient(135deg, #010101ff 0%, #000000ff 100%);
        color: white;
    }

    .table-modern thead th {
        border: none;
        padding: 1.2rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .table-modern tbody tr:hover {
        background: linear-gradient(90deg, #fff5f7 0%, #fff 100%);
        transform: scale(1.01);
    }

    .table-modern tbody td {
        padding: 1.2rem;
        vertical-align: middle;
        border: none;
    }

    .supplier-name {
        font-weight: 600;
        color: #2d3748;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .supplier-icon {
        background: linear-gradient(135deg, #000000ff 0%, #000000ff 100%);
        color: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        box-shadow: 0 3px 10px rgba(245, 87, 108, 0.3);
    }

    .supplier-number {
        background: linear-gradient(135deg, #00bcd4 0%, #0097a7 100%);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
    }

    .contact-info {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #4a5568;
    }

    .contact-info i {
        color: #f5576c;
        font-size: 1rem;
    }

    .address-text {
        color: #718096;
        font-size: 0.95rem;
        max-width: 250px;
        line-height: 1.4;
    }

    .btn-edit {
        background: linear-gradient(135deg, #c8a2ff 0%, #d4b5ff 100%);
        border: none;
        padding: 8px 24px;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(200, 162, 255, 0.4);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(200, 162, 255, 0.6);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        border: none;
        padding: 8px 24px;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 3px 10px rgba(255, 107, 107, 0.4);
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.6);
    }

    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
        color: #a0aec0;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .alert-success {
        background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
        border: none;
        border-radius: 15px;
        color: #155724;
        font-weight: 600;
        padding: 1rem 1.5rem;
        box-shadow: 0 4px 15px rgba(150, 230, 161, 0.3);
        animation: slideDown 0.5s ease;
        position: relative;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .btn-close {
        background: transparent;
        opacity: 0.8;
    }

    /* Custom Pagination Styling */
    .pagination-wrapper {
        background: white;
        padding: 25px 30px;
        border-top: 1px solid #f0f0f0;
        border-radius: 0 0 20px 20px;
    }

    .pagination-info {
        color: #718096;
        font-size: 0.95rem;
        margin: 0;
    }

    .custom-pagination {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .custom-pagination .page-item {
        display: inline-block;
    }

    .custom-pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        color: #4a5568;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        background: white;
    }

    .custom-pagination .page-link:hover {
        background: #f7fafc;
        border-color: #cbd5e0;
        transform: translateY(-2px);
    }

    .custom-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #0066ff 0%, #0052cc 100%);
        border-color: #0066ff;
        color: white;
        box-shadow: 0 4px 12px rgba(0, 102, 255, 0.3);
    }

    .custom-pagination .page-item.disabled .page-link {
        background: #f7fafc;
        border-color: #e2e8f0;
        color: #cbd5e0;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .custom-pagination .page-link i {
        font-size: 0.85rem;
    }

    @media (max-width: 768px) {
        .supplier-header h2 {
            font-size: 1.8rem;
        }
        
        .table-modern {
            font-size: 0.85rem;
        }

        .supplier-name {
            font-size: 0.95rem;
        }

        .address-text {
            font-size: 0.85rem;
            max-width: 150px;
        }

        .pagination-wrapper {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
    }
</style>

<div class="container-fluid px-4">
    <div class="supplier-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2>🚚 Daftar Distributor</h2>
                    <p class="mb-0 mt-2" style="opacity: 0.9;">Kelola informasi distributor dan supplier Anda</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-add-supplier">
                        <i class="fas fa-plus me-2"></i>Tambah Distributor
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- SEARCH BAR --}}
    <div class="search-container">
        <form action="{{ route('suppliers.index') }}" method="GET">
            <div class="search-input-wrapper">
                <input 
                    type="text" 
                    name="search" 
                    class="search-input" 
                    placeholder="Cari Distributor..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn-search">
                    Cari
                </button>
            </div>
        </form>
    </div>
    
    <div class="supplier-card">
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">NO</th>
                        <th style="width: 280px;">NAMA DISTRIBUTOR</th>
                        <th style="width: 200px;">EMAIL</th>
                        <th style="width: 180px;">NO. TELEPON</th>
                        <th>ALAMAT</th>
                        <th style="width: 200px;" class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $index => $supplier)
                        <tr>
                            <td class="text-center">
                                <span class="supplier-number">{{ ($suppliers->currentPage() - 1) * $suppliers->perPage() + $index + 1 }}</span>
                            </td>
                            <td>
                                <div class="supplier-name">
                                    <span class="supplier-icon">
                                        <i class="fas fa-truck"></i>
                                    </span>
                                    <span>{{ $supplier->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $supplier->email }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $supplier->phone }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span class="address-text">{{ $supplier->address }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-edit btn-sm me-2">
                                    Edit
                                </a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus distributor ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-state">
                                <i class="fas fa-truck-loading"></i>
                                <h5>Belum ada data distributor</h5>
                                <p>Tambahkan distributor pertama untuk mulai mengelola supplier Anda!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if ($suppliers->hasPages())
            <div class="pagination-wrapper d-flex justify-content-between align-items-center">
                <p class="pagination-info">
                    Showing {{ $suppliers->firstItem() }} to {{ $suppliers->lastItem() }} of {{ $suppliers->total() }} results
                </p>
                <nav>
                    <ul class="custom-pagination">
                        {{-- Previous Page Link --}}
                        @if ($suppliers->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $suppliers->previousPageUrl() }}" rel="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($suppliers->getUrlRange(1, $suppliers->lastPage()) as $page => $url)
                            @if ($page == $suppliers->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($suppliers->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $suppliers->nextPageUrl() }}" rel="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>
@endsection