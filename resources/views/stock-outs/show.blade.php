@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Stok Keluar</h3>

    <div class="mb-3">
        <strong>No. Invoice:</strong> {{ $stockOut->invoice_number }} <br>
        <strong>Pelanggan:</strong> {{ $stockOut->customer_name }} <br>
        <strong>Tanggal:</strong> {{ $stockOut->stock_out_date->format('d M Y') }} <br>
        <strong>Status:</strong> {{ ucfirst($stockOut->status) }} <br>
        <strong>Total:</strong> Rp {{ number_format($stockOut->total_amount, 0, ',', '.') }}
    </div>

    <h5>Detail Produk:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stockOut->details as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('stock-outs.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
