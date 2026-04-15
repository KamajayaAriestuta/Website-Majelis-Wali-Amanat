<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    protected $table = 'peraturan';

    protected $fillable = [
        'perihal',
        'nomor',
        'tanggal_ditetapkan',
        'dokumen',
    ];
}
