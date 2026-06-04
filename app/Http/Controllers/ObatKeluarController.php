<?php

namespace App\Http\Controllers;

use App\Models\ObatKeluar;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatKeluarController extends Controller
{
    public function index()
    {
        return view('obat_keluar.index', [
            'keluar' => ObatKeluar::with('obat')->orderByDesc('tanggal_keluar')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('obat_keluar.create', [
            'obat' => Obat::where('stok', '>', 0)->orderBy('nama_obat')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obat'        => 'required|exists:obat,id_obat',
            'jumlah'         => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $obat = Obat::findOrFail($request->id_obat);

        if ($obat->stok < $request->jumlah) {
            return back()->withErrors(['jumlah' => "Stok tidak cukup. Stok tersedia: {$obat->stok}"])->withInput();
        }

        DB::transaction(function () use ($request, $obat) {
            ObatKeluar::create($request->all());
            $obat->decrement('stok', $request->jumlah);
        });

        return redirect()->route('obat-keluar.index')->with('success', "Obat keluar berhasil dicatat. Stok berkurang {$request->jumlah}.");
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $keluar = ObatKeluar::findOrFail($id);
            Obat::findOrFail($keluar->id_obat)->increment('stok', $keluar->jumlah);
            $keluar->delete();
        });

        return redirect()->route('obat-keluar.index')->with('success', 'Transaksi dihapus, stok dikembalikan.');
    }
}