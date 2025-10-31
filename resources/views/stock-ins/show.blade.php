@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pembelian</h2>

    <div class="mb-3">
        <strong>No Invoice:</strong> {{ $stockIn->invoice_number }} <br>
        <strong>Supplier:</strong> {{ $stockIn->supplier->name ?? '-' }} <br>
        <strong>Tanggal:</strong> {{ $stockIn->purchase_date }} <br>
        <strong>Status:</strong> 
        <span class="badge 
            {{ $stockIn->status == 'completed' ? 'bg-success' : ($stockIn->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
            {{ ucfirst($stockIn->status) }}
        </span>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stockIn->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Rp {{ number_format($detail->purchase_price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Total</th>
                <th>Rp {{ number_format($stockIn->total_amount, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    @if($stockIn->notes)
        <p><strong>Catatan:</strong> {{ $stockIn->notes }}</p>
    @endif

    <div class="mt-3">
        @if($stockIn->status === 'pending')
            <form action="{{ route('stock-ins.complete', $stockIn->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-success">✔ Complete</button>
            </form>

            <form action="{{ route('stock-ins.cancel', $stockIn->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger">✖ Cancel</button>
            </form>
        @endif

        <a href="{{ route('stock-ins.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
