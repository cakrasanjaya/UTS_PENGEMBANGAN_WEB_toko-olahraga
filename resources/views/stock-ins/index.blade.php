@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f5f5;
    }

    .header-section {
        background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
        padding: 3rem 2rem;
        color: white;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        margin-bottom: 2rem;
    }

    .header-section h2 {
        font-weight: 700;
        font-size: 2.5rem;
        margin: 0;
    }

    .btn-tambah {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: #ff6b8a;
        padding: 12px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        transition: all 0.3s ease;
        border: none;
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

    .badge-status {
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-success {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-warning {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    .btn-detail {
        background-color: #e0f7fa;
        color: #00acc1;
        padding: 8px 20px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-detail:hover {
        background-color: #b2ebf2;
        color: #00838f;
        transform: translateY(-1px);
    }

    .btn-edit {
        background: linear-gradient(135deg, #c8a2ff 0%, #d4b5ff 100%);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        background: linear-gradient(135deg, #b891ff 0%, #c3a4ff 100%);
        transform: translateY(-1px);
        color: white;
    }

    .btn-hapus {
        background-color: #ffeaea;
        color: #ff6b6b;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-hapus:hover {
        background-color: #ffd4d4;
        color: #ff5252;
        transform: translateY(-1px);
    }

    .alert {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .alert-success {
        background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
        color: #155724;
        font-weight: 600;
    }

    .alert-danger {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        color: white;
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

    .modal-content {
        border-radius: 15px;
        border: none;
    }

    @media (max-width: 768px) {
        .header-section h2 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="header-section">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2">📦 Daftar Pembelian Barang</h2>
                <p class="mb-0" style="opacity: 0.9;">Kelola informasi pembelian dan stok masuk Anda</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('stock-ins.create') }}" class="btn-tambah">
                    <i class="fas fa-plus me-2"></i>Tambah Pembelian
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i><strong>Error!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Search Bar -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('stock-ins.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Cari nomor invoice atau supplier..."
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
                        <th>NO. INVOICE</th>
                        <th>SUPPLIER</th>
                        <th>TANGGAL</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stockIns as $stock)
                    <tr>
                        <td class="text-center">
                            <span class="number-circle">{{ ($stockIns->currentPage() - 1) * $stockIns->perPage() + $loop->iteration }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-black me-3"></div>
                                <strong>{{ $stock->invoice_number }}</strong>
                            </div>
                        </td>
                        <td>{{ $stock->supplier->name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($stock->purchase_date)->format('d M Y') }}</td>
                        <td><strong>Rp {{ number_format($stock->total_amount, 0, ',', '.') }}</strong></td>
                        <td>
                            @if($stock->status == 'completed')
                                <span class="badge-status badge-success">Selesai</span>
                            @elseif($stock->status == 'pending')
                                <span class="badge-status badge-warning">Pending</span>
                            @else
                                <span class="badge-status badge-danger">Dibatalkan</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('stock-ins.show', $stock->id) }}" class="btn-detail">
                                    Lihat
                                </a>
                                <a href="{{ route('stock-ins.edit', $stock->id) }}" class="btn-edit">
                                    Edit
                                </a>
                                <button type="button" class="btn-hapus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $stock->id }}">
                                    Hapus
                                </button>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $stock->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center py-4">
                                            <i class="fas fa-exclamation-triangle text-warning mb-3" style="font-size: 3rem;"></i>
                                            <p class="mb-0">Apakah Anda yakin ingin menghapus pembelian<br><strong>{{ $stock->invoice_number }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('stock-ins.destroy', $stock->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-hapus">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <h5 class="mt-3 text-muted">Belum ada data pembelian barang</h5>
                            <p class="text-muted">Tambahkan pembelian pertama untuk mulai mengelola stok Anda!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($stockIns->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p class="pagination-info mb-0">
                        Showing {{ $stockIns->firstItem() }} to {{ $stockIns->lastItem() }} of {{ $stockIns->total() }} results
                    </p>
                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <!-- Previous Button -->
                            <li class="page-item {{ $stockIns->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $stockIns->appends(request()->query())->previousPageUrl() }}" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            @php
                                $start = max($stockIns->currentPage() - 2, 1);
                                $end = min($start + 4, $stockIns->lastPage());
                                $start = max($end - 4, 1);
                            @endphp

                            @if($start > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $stockIns->appends(request()->query())->url(1) }}">1</a>
                                </li>
                                @if($start > 2)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                            @endif

                            @for ($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $i == $stockIns->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $stockIns->appends(request()->query())->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($end < $stockIns->lastPage())
                                @if($end < $stockIns->lastPage() - 1)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="{{ $stockIns->appends(request()->query())->url($stockIns->lastPage()) }}">{{ $stockIns->lastPage() }}</a>
                                </li>
                            @endif

                            <!-- Next Button -->
                            <li class="page-item {{ !$stockIns->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $stockIns->appends(request()->query())->nextPageUrl() }}" aria-label="Next">
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