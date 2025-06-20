<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;
    protected $table = 'imunisasi';
    protected $primaryKey = 'id_imun';

    protected $fillable = [
        'nik_balita',
        'tgl_imun',
        'hb',
        'polio',
        'campak',
        'BCG',
        'IPV',
    ];

    // Relasi ke model Balita
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'nik_balita', 'nik_balita');
    }
}
