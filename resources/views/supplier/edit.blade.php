@extends('layouts.app')
@section('title', 'Edit Supplier')
@section('page_title', 'Edit Supplier')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

<div class="card card-warning" style="max-width:600px;">
    <div class="card-header"><h3 class="card-title">Form Edit Supplier</h3></div>
    <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Nama Supplier</label>
                <input type="text" name="nama_supplier"
                    class="form-control @error('nama_supplier') is-invalid @enderror"
                    value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                @error('nama_supplier')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon"
                    class="form-control @error('telepon') is-invalid @enderror"
                    value="{{ old('telepon', $supplier->telepon) }}" required>
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3"
                    class="form-control @error('alamat') is-invalid @enderror"
                    required>{{ old('alamat', $supplier->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Update</button>
            <a href="{{ route('supplier.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection