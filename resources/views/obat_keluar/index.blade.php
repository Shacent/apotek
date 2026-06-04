@extends('layouts.app')
@section('title', 'Obat Keluar')
@section('page_title', 'Transaksi Obat Keluar')

@section('breadcrumb')
    <li class="breadcrumb-item active">Obat Keluar</li>
@endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Riwayat Obat Keluar</h3>
        <a href="{{ route('obat-keluar.create') }}" class="btn btn-warning btn-sm">
            <i class="fas fa-plus mr-1"></i> Catat Obat Keluar
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Tujuan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($keluar as $k)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($k->tanggal_keluar)->format('d/m/Y') }}</td>
                    <td>{{ $k->obat->nama_obat ?? '-' }}</td>
                    <td><span class="badge badge-warning">-{{ $k->jumlah }}</span></td>
                    <td>{{ $k->tujuan ?? '-' }}</td>
                    <td>{{ $k->keterangan ?? '-' }}</td>
                    <td>
                        <form action="{{ route('obat-keluar.destroy', $k->id_keluar) }}" method="POST"
                              onsubmit="return confirm('Hapus transaksi ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada transaksi</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $keluar->links() }}</div>
</div>

@endsection