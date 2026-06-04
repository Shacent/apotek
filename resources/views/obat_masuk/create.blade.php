@extends('layouts.app')
@section('title', 'Catat Obat Masuk')
@section('page_title', 'Catat Obat Masuk')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('obat-masuk.index') }}">Obat Masuk</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')

<div class="card card-success">
    <div class="card-header"><h3 class="card-title">Form Obat Masuk</h3></div>
    <form action="{{ route('obat-masuk.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Obat</label>
                <select name="id_obat" class="form-control" required>
                    <option value="">-- Pilih Obat --</option>
                    @foreach($obat as $o)
                        <option value="{{ $o->id_obat }}" {{ request('obat_id') == $o->id_obat ? 'selected' : '' }}>
                            {{ $o->kode_obat }} - {{ $o->nama_obat }} (Stok: {{ $o->stok }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <select name="id_supplier" class="form-control" required>
                    <option value="">-- Pilih Supplier --</option>
                    @foreach($supplier as $s)
                        <option value="{{ $s->id_supplier }}">{{ $s->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="2" placeholder="Opsional..."></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i> Simpan</button>
            <a href="{{ route('obat-masuk.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection