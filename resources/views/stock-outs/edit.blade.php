@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Transaksi Stok Keluar</h3>

    <form action="{{ route('stock-outs.update', $stockOut->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>No. Invoice</label>
                <input type="text" class="form-control" value="{{ $stockOut->invoice_number }}" disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label>Nama Pelanggan</label>
                <input type="text" name="customer_name" class="form-control" value="{{ $stockOut->customer_name }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Tanggal Keluar</label>
                <input type="date" name="stock_out_date" class="form-control" value="{{ $stockOut->stock_out_date }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $stockOut->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $stockOut->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
        </div>

        <h5>Produk Keluar</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody id="product-list">
                @foreach($stockOut->details as $i => $detail)
                <tr>
                    <td>
                        <select name="products[{{ $i }}][id]" class="form-control">
                            @foreach($products as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $detail->product_id ? 'selected' : '' }}>{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[{{ $i }}][quantity]" class="form-control" min="1" value="{{ $detail->quantity }}" required></td>
                    <td><input type="number" name="products[{{ $i }}][price]" class="form-control" step="0.01" value="{{ $detail->price }}" required></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Update Transaksi</button>
        <a href="{{ route('stock-outs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
