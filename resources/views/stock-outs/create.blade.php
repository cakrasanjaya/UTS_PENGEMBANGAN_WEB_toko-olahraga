@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Transaksi Stok Keluar</h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('stock-outs.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>No. Invoice</label>
                <input type="text" name="invoice_number" class="form-control" value="{{ old('invoice_number') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Nama Pelanggan</label>
                <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Tanggal Keluar</label>
                <input type="date" name="stock_out_date" class="form-control" value="{{ old('stock_out_date', date('Y-m-d')) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>

        <h5 class="mt-4">Produk Keluar</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="product-list">
                <tr>
                    <td>
                        <select name="products[0][id]" class="form-control">
                            @foreach($products as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[0][quantity]" class="form-control" min="1" required></td>
                    <td><input type="number" name="products[0][price]" class="form-control" step="0.01" required></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="add-product" class="btn btn-secondary mb-3">+ Tambah Produk</button>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
            <a href="{{ route('stock-outs.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

{{-- Tambahkan script agar bisa tambah/hapus baris produk --}}
@push('scripts')
<script>
    let rowIndex = 1;
    document.getElementById('add-product').addEventListener('click', function () {
        const tbody = document.getElementById('product-list');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="products[${rowIndex}][id]" class="form-control">
                    @foreach($products as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="products[${rowIndex}][quantity]" class="form-control" min="1" required></td>
            <td><input type="number" name="products[${rowIndex}][price]" class="form-control" step="0.01" required></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button></td>
        `;
        tbody.appendChild(newRow);
        rowIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endpush
@endsection
