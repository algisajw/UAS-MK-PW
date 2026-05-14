<?php

namespace App\Models;

use CodeIgniter\Model;

class GedungModel extends Model
{
    protected $table = 'gedung';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_gedung',
        'kapasitas',
        'harga',
        'harga_per_jam',
        'durasi_sewa',
        'lokasi',
        'status'
    ];
}
