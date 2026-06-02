<?php

namespace App\Http\Controllers;

use App\Models\Penyewan;
use App\Models\Gedung;
use Illuminate\Http\Request;

class PenyewanController extends Controller
{
    public function index()
    {
        $penyewans = Penyewan::with('gedung')->get();
        return view('penyewan.index', compact('penyewans'));
    }

    public function create()
    {
        $gedungs = Gedung::all();
        return view('penyewan.create', compact('gedungs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gedung_id' => 'required|exists:gedungs,id',
            'nama_penyewa' => 'required',
            'tanggal_sewa' => 'required|date',
            'durasi_hari' => 'required|integer',
        ]);

        $gedung = Gedung::findOrFail($request->gedung_id);
        $total_harga = $gedung->harga_sewa * $request->durasi_hari;

        Penyewan::create([
            'gedung_id' => $request->gedung_id,
            'nama_penyewa' => $request->nama_penyewa,
            'tanggal_sewa' => $request->tanggal_sewa,
            'durasi_hari' => $request->durasi_hari,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('penyewan.index');
    }

    public function edit(Penyewan $penyewan)
    {
        $gedungs = Gedung::all();
        return view('penyewan.edit', compact('penyewan', 'gedungs'));
    }

    public function update(Request $request, Penyewan $penyewan)
    {
        $request->validate([
            'gedung_id' => 'required|exists:gedungs,id',
            'nama_penyewa' => 'required',
            'tanggal_sewa' => 'required|date',
            'durasi_hari' => 'required|integer',
        ]);

        $gedung = Gedung::findOrFail($request->gedung_id);
        $total_harga = $gedung->harga_sewa * $request->durasi_hari;

        $penyewan->update([
            'gedung_id' => $request->gedung_id,
            'nama_penyewa' => $request->nama_penyewa,
            'tanggal_sewa' => $request->tanggal_sewa,
            'durasi_hari' => $request->durasi_hari,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('penyewan.index');
    }

    public function destroy(Penyewan $penyewan)
    {
        $penyewan->delete();
        return redirect()->route('penyewan.index');
    }
}
