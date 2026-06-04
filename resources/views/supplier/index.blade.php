@extends('layouts.app')
@section('title', 'Supplier')
@section('page_title', 'Data Supplier')

@section('breadcrumb')
    <li class="breadcrumb-item active">Supplier</li>
@endsection

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Daftar Supplier</h3>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Supplier
        </a>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead class="thead-light">
                <tr>
                    <th width="60">No</th>
                    <th>Nama Supplier</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($supplier as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->nama_supplier }}</td>
                    <td>{{ $s->telepon }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', $s->id_supplier) }}" class="btn btn-xs btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('supplier.destroy', $s->id_supplier) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus supplier ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-3">Belum ada data supplier</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">{{ $supplier->links() }}</div>
</div>

@endsection