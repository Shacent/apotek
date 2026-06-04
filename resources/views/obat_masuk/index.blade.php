@extends('layouts.app')
@section('title', 'Obat Masuk')
@section('page_title', 'Transaksi Obat Masuk')

@section('breadcrumb')
    <li class="breadcrumb-item active">Obat Masuk</li>
@endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Riwayat Obat Masuk</h3>
        <a href="{{ route('obat-masuk.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus mr-1"></i> Catat Obat Masuk
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($masuk as $m)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($m->tanggal_masuk)->format('d/m/Y') }}</td>
                    <td><code>{{ $m->obat->kode_obat ?? '-' }}</code></td>
                    <td>{{ $m->obat->nama_obat ?? '-' }}</td>
                    <td>{{ $m->supplier->nama_supplier ?? '-' }}</td>
                    <td><span class="badge badge-success">+{{ $m->jumlah }}</span></td>
                    <td>{{ $m->keterangan ?? '-' }}</td>
                    <td>
                        <form action="{{ route('obat-masuk.destroy', $m->id_masuk) }}" method="POST"
                              onsubmit="return confirm('Hapus transaksi ini? Stok akan dikurangi kembali.')">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-3">Belum ada transaksi</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $masuk->links() }}</div>
</div>

@endsection