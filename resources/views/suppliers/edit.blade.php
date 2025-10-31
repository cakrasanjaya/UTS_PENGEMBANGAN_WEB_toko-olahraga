@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient text-white fw-bold" style="background: linear-gradient(135deg, #764ba2, #667eea);">
            <i class="bi bi-pencil-square me-2"></i> Edit Suplier
        </div>

        <div class="card-body p-4">
            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Suplier</label>
                    <input type="text" name="name" id="name" class="form-control rounded-3"
                        value="{{ old('name', $supplier->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control rounded-3"
                        value="{{ old('email', $supplier->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">No. Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control rounded-3"
                        value="{{ old('phone', $supplier->phone) }}">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold">Alamat</label>
                    <textarea name="address" id="address" class="form-control rounded-3" rows="3">{{ old('address', $supplier->address) }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        <i class="bi bi-check2-circle me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
