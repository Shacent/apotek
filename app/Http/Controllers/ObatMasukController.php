<?php

namespace App\Http\Controllers;

use App\Models\ObatMasuk;
use App\Models\Obat;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatMasukController extends Controller
{
    public function index()
    {
        return view('obat_masuk.index', [
            'masuk' => ObatMasuk::with(['obat', 'supplier'])
                        ->orderByDesc('tanggal_masuk')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('obat_masuk.create', [
            'obat'     => Obat::orderBy('nama_obat')->get(),
            'supplier' => Supplier::orderBy('nama_supplier')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obat'      => 'required|exists:obat,id_obat',
            'id_supplier'  => 'required|exists:supplier,id_supplier',
            'jumlah'       => 'required|integer|min:1',
            'tanggal_masuk'=> 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            ObatMasuk::create($request->all());
            Obat::findOrFail($request->id_obat)->increment('stok', $request->jumlah);
        });

        return redirect()->route('obat-masuk.index')->with('success', "Obat masuk berhasil dicatat. Stok bertambah {$request->jumlah}.");
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $masuk = ObatMasuk::findOrFail($id);
            Obat::findOrFail($masuk->id_obat)->decrement('stok', $masuk->jumlah);
            $masuk->delete();
        });

        return redirect()->route('obat-masuk.index')->with('success', 'Transaksi dihapus, stok dikurangi kembali.');
    }
}