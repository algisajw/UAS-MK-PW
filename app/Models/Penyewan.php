<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
