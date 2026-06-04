<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ObatMasuk;
use App\Models\ObatKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalObat'      => Obat::count(),
            'masukBulanIni'  => ObatMasuk::whereMonth('tanggal_masuk', now()->month)->sum('jumlah'),
            'keluarBulanIni' => ObatKeluar::whereMonth('tanggal_keluar', now()->month)->sum('jumlah'),
            'stokKritis'     => Obat::where('stok', '<', 10)->count(),
            'obatKritis'     => Obat::with('kategori')->where('stok', '<', 10)->orderBy('stok')->get(),
        ]);
    }
}