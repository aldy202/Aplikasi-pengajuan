<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk_kendaraan' => 'required',
            'model_kendaraan' => 'required',
            'tipe_kendaraan' => 'required',
            'warna_kendaraan' => 'required',
            'harga_kendaraan' => 'required',
        ]);

        Kendaraan::create($request->all());
        return redirect()->route('kendaraan.index')->with('success', 'Konsumen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kendaraans = Kendaraan::find($id);
        return view('kendaraan.edit', compact('kendaraans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk_kendaraan' => 'required',
            'model_kendaraan' => 'required',
            'tipe_kendaraan' => 'required',
            'warna_kendaraan' => 'required',
            'harga_kendaraan' => 'required',
        ]);

        $kendaraan = Kendaraan::find($id);
        $kendaraan->nama = $request->merk_kendaraan;
        $kendaraan->model = $request->model_kendaraan;
        $kendaraan->tipe = $request->tipa_kendaraan;
        $kendaraan->warna = $request->warna_kendaraan;
        $kendaraan->harga = $request->harga_kendaraan;

        $kendaraan->save();
        return redirect()->route('kendaraan.index')->with('success', 'Konsumen berhasil diupdate.');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success', 'Konsumen berhasil dihapus.');
    }
}
