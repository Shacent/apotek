@extends('layouts.public')

@section('title', 'Katalog Obat')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1>Katalog Obat</h1>
        <p class="text-muted">
            Daftar obat yang tersedia di apotek
        </p>
    </div>

    <form method="GET" action="{{ route('katalog') }}" class="row mb-4">
        <div class="col-md-8">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari obat..."
                value="{{ request('search') }}"
            >
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-primary w-100">
                Cari
            </button>
        </div>
    </form>

    <div class="row">
        @forelse($obat as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $item->nama_obat }}
                        </h5>

                        <p class="text-muted mb-2">
                            Kode: {{ $item->kode_obat }}
                        </p>

                        <p class="mb-2">
                            Kategori:
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </p>

                        <p class="mb-2">
                            Stok:
                            <strong>{{ $item->stok }}</strong>
                        </p>

                        <h5 class="text-primary">
                            Rp {{ number_format($item->harga_jual, 0, ',', '.') }}
                        </h5>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">
                    Tidak ada data obat.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $obat->links() }}
    </div>

</div>

@endsection