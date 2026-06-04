@extends('layouts.app')
@section('title', 'Catat Obat Keluar')
@section('page_title', 'Catat Obat Keluar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('obat-keluar.index') }}">Obat Keluar</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')

<div class="card card-warning">
    <div class="card-header"><h3 class="card-title">Form Obat Keluar</h3></div>
    <form action="{{ route('obat-keluar.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Obat</label>
                <select name="id_obat" class="form-control" required>
                    <option value="">-- Pilih Obat --</option>
                    @foreach($obat as $o)
                        <option value="{{ $o->id_obat }}">
                            {{ $o->nama_obat }} (Stok tersedia: {{ $o->stok }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label>Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" placeholder="Contoh: Resep dr. Budi">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="2"></textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Simpan</button>
            <a href="{{ route('obat-keluar.index') }}" class="btn btn-secondary ml-2">Batal</a>
        </div>
    </form>
</div>

@endsection