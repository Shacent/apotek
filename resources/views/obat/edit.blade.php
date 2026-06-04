@extends('layouts.app')
@section('title', 'Edit Obat')
@section('page_title', 'Edit Obat')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('obat.index') }}">Data Obat</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

<div class="card card-warning">
    <div class="card-header"><h3 class="card-title">Form Edit Obat</h3></div>
    <form action="{{ route('obat.update', $obat->id_obat) }}" method="POST">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <input type="text" name="kode_obat" class="form-control" value="{{ old('kode_obat', $obat->kode_obat) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control" required>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id_kategori }}" {{ $obat->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" class="form-control" value="{{ old('satuan', $obat->satuan) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli', $obat->harga_beli) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual', $obat->harga_jual) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok', $obat->stok) }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kadaluarsa</label>
                        <input type="date" name="tanggal_kadaluarsa" class="form-control"
                            value="{{ old('tanggal_kadaluarsa', $obat->tanggal_kadaluarsa) }}" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Update</button>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection