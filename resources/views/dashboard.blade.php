@extends('layouts.app')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')

<!-- Stat Cards -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalObat }}</h3>
                <p>Total Jenis Obat</p>
            </div>
            <div class="icon"><i class="fas fa-capsules"></i></div>
            <a href="{{ route('obat.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $masukBulanIni }}</h3>
                <p>Obat Masuk Bulan Ini</p>
            </div>
            <div class="icon"><i class="fas fa-arrow-circle-down"></i></div>
            <a href="{{ route('obat-masuk.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $keluarBulanIni }}</h3>
                <p>Obat Keluar Bulan Ini</p>
            </div>
            <div class="icon"><i class="fas fa-arrow-circle-up"></i></div>
            <a href="{{ route('obat-keluar.index') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $stokKritis }}</h3>
                <p>Stok Kritis (&lt; 10)</p>
            </div>
            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
            <a href="{{ route('obat.index') }}?filter=kritis" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- Tabel Stok Kritis -->
<div class="row">
    <div class="col-12">
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-exclamation-triangle mr-2"></i>Stok Kritis (Stok &lt; 10)</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Obat</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($obatKritis as $o)
                        <tr>
                            <td><code>{{ $o->kode_obat }}</code></td>
                            <td>{{ $o->nama_obat }}</td>
                            <td>{{ $o->kategori->nama_kategori ?? '-' }}</td>
                            <td><span class="badge badge-danger">{{ $o->stok }}</span></td>
                            <td>
                                <a href="{{ route('obat-masuk.create') }}?obat_id={{ $o->id_obat }}"
                                   class="btn btn-xs btn-success">
                                    <i class="fas fa-plus"></i> Tambah Stok
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                <i class="fas fa-check-circle text-success mr-2"></i>Semua stok aman
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection