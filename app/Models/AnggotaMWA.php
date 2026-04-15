<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaMWA extends Model
{
    protected $table = 'anggotamwa';

    protected $fillable = [
        'nama',
        'jabatan',
        'unsur',
        'nomor_sk',
        'foto',
        'sk_pengangkatan',
    ];  
}
