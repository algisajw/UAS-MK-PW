<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Penyewan extends Model
{
    protected $table = 'penyewans';

    protected $fillable = [
        'gedung_id',
        'nama_penyewa',
        'tanggal_sewa',
        'durasi_hari',
        'total_harga',
    ];

    public function gedung(): BelongsTo
    {
        return $this->belongsTo(Gedung::class);
    }

    public function getTanggalSelesaiAttribute(): string
    {
        return Carbon::parse($this->tanggal_sewa)
            ->addDays($this->durasi_hari - 1)
            ->toDateString();
    }

    public function getStatusAttribute(): string
    {
        $hariIni = Carbon::today()->toDateString();
        $tglMulai = $this->tanggal_sewa;
        $tglSelesai = $this->tanggal_selesai;

        if ($hariIni < $tglMulai) {
            return 'Mendatang';
        }

        if ($hariIni >= $tglMulai && $hariIni <= $tglSelesai) {
            return 'Sedang Dipinjam';
        }

        return 'Selesai';
    }
}
