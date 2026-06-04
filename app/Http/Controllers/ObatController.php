<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\KategoriObat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::with('kategori');

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama_obat', 'like', "%{$request->search}%")
                  ->orWhere('kode_obat', 'like', "%{$request->search}%");
            });
        }
        if ($request->kategori) {
            $query->where('id_kategori', $request->kategori);
        }
        if ($request->filter === 'kritis') {
            $query->where('stok', '<', 10);
        }

        return view('obat.index', [
            'obat'     => $query->orderBy('nama_obat')->paginate(10),
            'kategori' => KategoriObat::orderBy('nama_kategori')->get(),
        ]);
    }

    public function create()
    {
        return view('obat.create', [
            'kategori' => KategoriObat::orderBy('nama_kategori')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat'          => 'required|unique:obat,kode_obat',
            'nama_obat'          => 'required',
            'id_kategori'        => 'required|exists:kategori_obat,id_kategori',
            'satuan'             => 'required',
            'harga_beli'         => 'required|numeric|min:0',
            'harga_jual'         => 'required|numeric|min:0',
            'stok'               => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('obat.edit', [
            'obat'     => Obat::findOrFail($id),
            'kategori' => KategoriObat::orderBy('nama_kategori')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_obat'          => "required|unique:obat,kode_obat,{$id},id_obat",
            'nama_obat'          => 'required',
            'id_kategori'        => 'required|exists:kategori_obat,id_kategori',
            'satuan'             => 'required',
            'harga_beli'         => 'required|numeric|min:0',
            'harga_jual'         => 'required|numeric|min:0',
            'stok'               => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        Obat::findOrFail($id)->update($request->all());

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diupdate.');
    }

    public function destroy($id)
    {
        Obat::findOrFail($id)->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}