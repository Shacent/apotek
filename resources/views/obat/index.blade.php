@extends('layouts.app')
@section('title', 'Data Obat')
@section('page_title', 'Data Obat')

@section('breadcrumb')
    <li class="breadcrumb-item active">Data Obat</li>
@endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Daftar Obat</h3>
        <a href="{{ route('obat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Obat
        </a>
    </div>
    <div class="card-body">
        <!-- Filter -->
        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control form-control-sm"
                        placeholder="Cari nama/kode obat..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-control form-control-sm">
                        <option value="">-- Semua Kategori --</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}" {{ request('kategori') == $k->id_kategori ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-sm btn-secondary w-100">
                        <i class="fas fa-search mr-1"></i> Filter
                    </button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama Obat</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Kadaluarsa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obat as $o)
                <tr>
                    <td><code>{{ $o->kode_obat }}</code></td>
                    <td>{{ $o->nama_obat }}</td>
                    <td>{{ $o->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $o->satuan }}</td>
                    <td>Rp {{ number_format($o->harga_jual, 0, ',', '.') }}</td>
                    <td>
                        @if($o->stok < 10)
                            <span class="badge badge-danger">{{ $o->stok }}</span>
                        @elseif($o->stok < 30)
                            <span class="badge badge-warning">{{ $o->stok }}</span>
                        @else
                            <span class="badge badge-success">{{ $o->stok }}</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($o->tanggal_kadaluarsa)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $o->id_obat) }}" class="btn btn-xs btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('obat.destroy', $o->id_obat) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus obat ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center text-muted">Data kosong</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $obat->withQueryString()->links() }}
    </div>
</div>

@endsection