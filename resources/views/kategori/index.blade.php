@extends('layouts.app')
@section('title', 'Kategori Obat')
@section('page_title', 'Kategori Obat')

@section('breadcrumb')
    <li class="breadcrumb-item active">Kategori Obat</li>
@endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Daftar Kategori</h3>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-light">
                <tr>
                    <th width="60">No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Obat</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td><span class="badge badge-info">{{ $k->obat->count() }} obat</span></td>
                    <td>
                        <a href="{{ route('kategori.edit', $k->id_kategori) }}" class="btn btn-xs btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('kategori.destroy', $k->id_kategori) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-3">Belum ada kategori</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $kategori->links() }}</div>
</div>

@endsection