@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price"
                   value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
