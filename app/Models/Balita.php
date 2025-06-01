<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
     protected $table = 'balita';

    protected $fillable = [
        'nik_balita',
        'no_telp',
        'jk',
        'tgl_lahir',
        'nama_balita',
        'nama_ortu',
        'prov',
        'kab_kota',
        'alamat',
        'puskesmas',
        'posyandu',
        'kec',
        'desa_kel',
    ];
}
