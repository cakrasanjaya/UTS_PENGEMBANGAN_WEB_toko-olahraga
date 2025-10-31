@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient text-white fw-bold" style="background: linear-gradient(135deg, #667eea, #764ba2);">
            <i class="bi bi-person-plus-fill me-2"></i> Tambah Suplier
        </div>

        <div class="card-body p-4">
            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Suplier</label>
                    <input type="text" name="name" id="name" class="form-control rounded-3" placeholder="Masukkan nama suplier" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" id="email" class="form-control rounded-3" placeholder="contoh@email.com" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">No. Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control rounded-3" placeholder="08123456789">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold">Alamat</label>
                    <textarea name="address" id="address" class="form-control rounded-3" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
