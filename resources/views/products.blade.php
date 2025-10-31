@extends('layouts.app')

@section('content')
<h2>Daftar Produk</h2>

<table class="table table-bordered mt-3">
    <thead class="table-primary">
        <tr>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>Sepatu Lari Nike Air Zoom</td><td>Sepatu</td><td>Rp 1.200.000</td></tr>
        <tr><td>Bola Basket Molten</td><td>Bola</td><td>Rp 450.000</td></tr>
        <tr><td>Raket Badminton Yonex</td><td>Raket</td><td>Rp 650.000</td></tr>
    </tbody>
</table>
@endsection
