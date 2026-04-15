<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaKA extends Model
{
    protected $table = 'anggotaka';

    protected $fillable = [
        'nama',
        'jabatan',
        'sk_pengangkatan',
        'nomor_sk',
        'foto',
    ];

}
