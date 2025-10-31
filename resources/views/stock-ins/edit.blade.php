@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Pembelian Barang</h3>

    <form action="{{ route('stock-ins.update', $stockIn->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $stockIn->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-control"
                value="{{ $stockIn->purchase_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan (Opsional)</label>
            <textarea name="notes" id="notes" rows="3" class="form-control">{{ $stockIn->notes }}</textarea>
        </div>

        <hr>
        <h5>Detail Produk</h5>

        <table class="table table-bordered" id="produk-table">
            <thead class="table-secondary">
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga Beli</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stockIn->details as $i => $detail)
                <tr>
                    <td>
                        <select name="products[{{ $i }}][product_id]" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $detail->product_id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="products[{{ $i }}][quantity]" class="form-control qty" min="1" value="{{ $detail->quantity }}" required></td>
                    <td><input type="number" name="products[{{ $i }}][purchase_price]" class="form-control price" min="0" step="0.01" value="{{ $detail->purchase_price }}" required></td>
                    <td class="subtotal">{{ number_format($detail->quantity * $detail->purchase_price, 0, ',', '.') }}</td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" id="add-row" class="btn btn-secondary btn-sm mb-3">+ Tambah Produk</button>

        <div class="mb-3 text-end">
            <strong>Total: Rp <span id="total">
                {{ number_format($stockIn->details->sum(fn($d) => $d->quantity * $d->purchase_price), 0, ',', '.') }}
            </span></strong>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('stock-ins.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
let rowIndex = {{ count($stockIn->details) }};

document.getElementById('add-row').addEventListener('click', function() {
    const tableBody = document.querySelector('#produk-table tbody');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>
            <select name="products[${rowIndex}][product_id]" class="form-select" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </td>
        <td><input type="number" name="products[${rowIndex}][quantity]" class="form-control qty" min="1" required></td>
        <td><input type="number" name="products[${rowIndex}][purchase_price]" class="form-control price" min="0" step="0.01" required></td>
        <td class="subtotal">0</td>
        <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
    `;
    tableBody.appendChild(row);
    rowIndex++;
});

document.addEventListener('input', function(e) {
    if (e.target.classList.contains('qty') || e.target.classList.contains('price')) {
        const row = e.target.closest('tr');
        const qty = row.querySelector('.qty').value || 0;
        const price = row.querySelector('.price').value || 0;
        const subtotal = row.querySelector('.subtotal');
        subtotal.textContent = (qty * price).toLocaleString();
        updateTotal();
    }
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-row')) {
        e.target.closest('tr').remove();
        updateTotal();
    }
});

function updateTotal() {
    let total = 0;
    document.querySelectorAll('.subtotal').forEach(td => {
        total += parseFloat(td.textContent.replace(/,/g, '')) || 0;
    });
    document.getElementById('total').textContent = total.toLocaleString();
}
</script>
@endsection
