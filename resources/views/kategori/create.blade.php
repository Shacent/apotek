@extends('layouts.app')
@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori Obat</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')

<div class="card card-primary" style="max-width:500px;">
    <div class="card-header"><h3 class="card-title">Form Tambah Kategori</h3></div>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror"
                    value="{{ old('nama_kategori') }}" placeholder="Contoh: Antibiotik" required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection