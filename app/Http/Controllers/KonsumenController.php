<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index()
    {
        $konsumens = Konsumen::all();
        return view('konsumen.index', compact('konsumens'));
    }

    public function create()
    {
        return view('konsumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tanggal_lahir' => 'required|date',
            'status_perkawinan' => 'required',
            'data_pasangan' => 'nullable',
        ]);

        Konsumen::create($request->all());
        return redirect()->route('konsumen.index')->with('success', 'Konsumen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $konsumen = Konsumen::find($id);
        return view('konsumen.edit', compact('konsumen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tanggal_lahir' => 'required|date',
            'status_perkawinan' => 'required',
            'data_pasangan' => 'nullable',
        ]);

        $konsumen = Konsumen::find($id);
        $konsumen->nama = $request->nama;
        $konsumen->nik = $request->nik;
        $konsumen->tanggal_lahir = $request->tanggal_lahir;
        $konsumen->status_perkawinan = $request->status_perkawinan;
        $konsumen->data_pasangan = $request->data_pasangan;

        $konsumen->save();
        return redirect()->route('konsumen.index')->with('success', 'Konsumen berhasil diupdate.');
    }

    public function destroy(Konsumen $konsumen)
    {
        $konsumen->delete();
        return redirect()->route('konsumen.index')->with('success', 'Konsumen berhasil dihapus.');
    }
}
