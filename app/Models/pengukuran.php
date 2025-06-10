<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengukuran extends Model
{
     use HasFactory;
  protected $table = 'pengukuran';

    protected $fillable = [
        'nik_balita',
        'tgl_pengukuran',
        'bb',
        'tb',
        'lingkar_kepala',
        'kelas_ibu',
        'cara_ukur',
        'vitamin_a',
        'created_at',
        'updated_at'
    ];

    // Relasi ke model Balita
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'nik_balita', 'nik_balita');
    }
}
