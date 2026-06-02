<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gedung extends Model
{
    protected $fillable = [
        'nama_gedung',
        'kapasitas',
        'lokasi',
        'harga_sewa',
    ];

    public function penyewans(): HasMany
    {
        return $this->hasMany(Penyewan::class);
    }
}
