<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index()
    {
        $gedungs = Gedung::all();
        return view('gedung.index', compact('gedungs'));
    }

    public function create()
    {
        return view('gedung.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gedung' => 'required',
            'kapasitas' => 'required|integer',
            'lokasi' => 'required',
            'harga_sewa' => 'required|numeric',
        ]);

        Gedung::create($request->all());
        return redirect()->route('gedung.index');
    }

    public function edit(Gedung $gedung)
    {
        return view('gedung.edit', compact('gedung'));
    }

    public function update(Request $request, Gedung $gedung)
    {
        $request->validate([
            'nama_gedung' => 'required',
            'kapasitas' => 'required|integer',
            'lokasi' => 'required',
            'harga_sewa' => 'required|numeric',
        ]);

        $gedung->update($request->all());
        return redirect()->route('gedung.index');
    }

    public function destroy(Gedung $gedung)
    {
        $gedung->delete();
        return redirect()->route('gedung.index');
    }
}
