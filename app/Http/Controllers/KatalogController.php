<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\KategoriObat;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::with('kategori');

        if ($request->filled('search')) {
            $query->where('nama_obat', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        $obat = $query->latest()->paginate(12);

        $kategori = KategoriObat::orderBy('nama_kategori')
            ->get();

        return view('public.katalog', compact(
            'obat',
            'kategori'
        ));
    }
}