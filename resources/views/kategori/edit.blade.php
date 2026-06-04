@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('page_title', 'Edit Kategori')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori Obat</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

<div class="card card-warning" style="max-width:500px;">
    <div class="card-header"><h3 class="card-title">Form Edit Kategori</h3></div>
    <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection