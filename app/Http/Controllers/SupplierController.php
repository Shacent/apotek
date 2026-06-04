<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('supplier.index', [
            'supplier' => Supplier::orderBy('nama_supplier')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'telepon'       => 'required|string|max:20',
            'alamat'        => 'required|string',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('supplier.edit', [
            'supplier' => Supplier::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'telepon'       => 'required|string|max:20',
            'alamat'        => 'required|string',
        ]);

        Supplier::findOrFail($id)->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diupdate.');
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus.');
    }
}