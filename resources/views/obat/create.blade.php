@extends('layouts.app')
@section('title', 'Tambah Obat')
@section('page_title', 'Tambah Obat')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('obat.index') }}">Data Obat</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')

<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">Form Tambah Obat</h3></div>
    <form action="{{ route('obat.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control @error('kode_obat') is-invalid @enderror"
                            value="{{ old('kode_obat') }}" placeholder="Contoh: OBT-001" required>
                        @error('kode_obat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror"
                            value="{{ old('nama_obat') }}" required>
                        @error('nama_obat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id_kategori }}" {{ old('id_kategori') == $k->id_kategori ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="{{ old('satuan') }}"
                            placeholder="Contoh: Strip, Botol, Tablet" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}" min="0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual') }}" min="0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Stok Awal</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kadaluarsa</label>
                        <input type="date" name="tanggal_kadaluarsa" class="form-control"
                            value="{{ old('tanggal_kadaluarsa') }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection