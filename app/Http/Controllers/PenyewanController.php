<?php

namespace App\Http/Controllers;

use App\Models\Penyewan;
use App\Models\Gedung;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'durasi_hari' => 'required|integer|min:1',
        ]);

        $inputMulai = $request->tanggal_sewa;
        $inputSelesai = Carbon::parse($inputMulai)
            ->addDays($request->durasi_hari - 1)
            ->toDateString();

        $bentrok = Penyewan::where('gedung_id', $request->gedung_id)
            ->where(function ($query) use ($inputMulai, $inputSelesai) {
                $query->whereBetween('tanggal_sewa', [$inputMulai, $inputSelesai])
                    ->orWhereRaw('DATE_ADD(tanggal_sewa, INTERVAL (durasi_hari - 1) DAY) BETWEEN ? AND ?', [$inputMulai, $inputSelesai])
                    ->orWhere(function ($q) use ($inputMulai, $inputSelesai) {
                        $q->where('tanggal_sewa', '<=', $inputMulai)
                            ->whereRaw('DATE_ADD(tanggal_sewa, INTERVAL (durasi_hari - 1) DAY) >= ?', [$inputSelesai]);
                    });
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withInput()
                ->withErrors(['tanggal_sewa' => 'Gedung sudah dipesan pada rentang tanggal tersebut.']);
        }

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
            'durasi_hari' => 'required|integer|min:1',
        ]);

        $inputMulai = $request->tanggal_sewa;
        $inputSelesai = Carbon::parse($inputMulai)
            ->addDays($request->durasi_hari - 1)
            ->toDateString();

        $bentrok = Penyewan::where('gedung_id', $request->gedung_id)
            ->where('id', '!=', $penyewan->id)
            ->where(function ($query) use ($inputMulai, $inputSelesai) {
                $query->whereBetween('tanggal_sewa', [$inputMulai, $inputSelesai])
                    ->orWhereRaw('DATE_ADD(tanggal_sewa, INTERVAL (durasi_hari - 1) DAY) BETWEEN ? AND ?', [$inputMulai, $inputSelesai])
                    ->orWhere(function ($q) use ($inputMulai, $inputSelesai) {
                        $q->where('tanggal_sewa', '<=', $inputMulai)
                            ->whereRaw('DATE_ADD(tanggal_sewa, INTERVAL (durasi_hari - 1) DAY) >= ?', [$inputSelesai]);
                    });
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withInput()
                ->withErrors(['tanggal_sewa' => 'Gedung sudah dipesan pada rentang tanggal tersebut.']);
        }

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
