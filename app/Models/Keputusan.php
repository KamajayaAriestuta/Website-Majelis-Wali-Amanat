<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    protected $table = 'keputusan';
    protected $fillable = [
        'perihal',
        'nomor',
        'tanggal_ditetapkan',
        'dokumen',
    ];
}
