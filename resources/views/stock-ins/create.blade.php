@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Pembelian Baru</h2>

    <form action="{{ route('stock-ins.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>No. Invoice</label>
            <input type="text" name="invoice_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Pembelian</label>
            <input type="date" name="purchase_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>

        <hr>
        <h5>Daftar Produk</h5>

        <table class="table" id="product-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="products[0][product_id]" class="form-control" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach($products as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[0][quantity]" class="form-control" min="1" required></td>
                    <td><input type="number" name="products[0][purchase_price]" class="form-control" min="0" step="0.01" required></td>
                    <td><input type="text" class="form-control subtotal" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">x</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="add-row" class="btn btn-secondary mb-3">+ Tambah Produk</button>

        <div class="mb-3">
            <strong>Total:</strong> Rp <span id="totalAmount">0</span>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pembelian</button>
        <a href="{{ route('stock-ins.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

{{-- Script perhitungan dan tambah baris --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let rowIndex = 1;

$('#add-row').on('click', function() {
    let newRow = `
    <tr>
        <td>
            <select name="products[${rowIndex}][product_id]" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </td>
        <td><input type="number" name="products[${rowIndex}][quantity]" class="form-control" min="1" required></td>
        <td><input type="number" name="products[${rowIndex}][purchase_price]" class="form-control" min="0" step="0.01" required></td>
        <td><input type="text" class="form-control subtotal" readonly></td>
        <td><button type="button" class="btn btn-danger btn-sm remove-row">x</button></td>
    </tr>`;
    $('#product-table tbody').append(newRow);
    rowIndex++;
});

$(document).on('click', '.remove-row', function() {
    $(this).closest('tr').remove();
    updateTotal();
});

$(document).on('input', 'input[name*="quantity"], input[name*="purchase_price"]', function() {
    const row = $(this).closest('tr');
    const qty = parseFloat(row.find('[name*="quantity"]').val()) || 0;
    const price = parseFloat(row.find('[name*="purchase_price"]').val()) || 0;
    const subtotal = qty * price;
    row.find('.subtotal').val(subtotal.toFixed(2));
    updateTotal();
});

function updateTotal() {
    let total = 0;
    $('.subtotal').each(function() {
        total += parseFloat($(this).val()) || 0;
    });
    $('#totalAmount').text(total.toLocaleString('id-ID'));
}
</script>
@endsection
