<?php

namespace App\Http\Controllers;

use App\Models\KategoriObat;
use Illuminate\Http\Request;

class KategoriObatController extends Controller
{
    public function index()
    {
        return view('kategori.index', [
            'kategori' => KategoriObat::orderBy('nama_kategori')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_obat,nama_kategori',
        ]);

        KategoriObat::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('kategori.edit', [
            'kategori' => KategoriObat::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => "required|unique:kategori_obat,nama_kategori,{$id},id_kategori",
        ]);

        KategoriObat::findOrFail($id)->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy($id)
    {
        KategoriObat::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}