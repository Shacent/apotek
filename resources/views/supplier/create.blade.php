@extends('layouts.app')
@section('title', 'Tambah Supplier')
@section('page_title', 'Tambah Supplier')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')

<div class="card card-primary" style="max-width:600px;">
    <div class="card-header"><h3 class="card-title">Form Tambah Supplier</h3></div>
    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama Supplier</label>
                <input type="text" name="nama_supplier"
                    class="form-control @error('nama_supplier') is-invalid @enderror"
                    value="{{ old('nama_supplier') }}" placeholder="Contoh: PT Kimia Farma" required>
                @error('nama_supplier')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon"
                    class="form-control @error('telepon') is-invalid @enderror"
                    value="{{ old('telepon') }}" placeholder="Contoh: 08123456789" required>
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3"
                    class="form-control @error('alamat') is-invalid @enderror"
                    placeholder="Alamat lengkap supplier" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
            <a href="{{ route('supplier.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection