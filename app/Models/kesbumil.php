<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kesbumil extends Model
{
    use HasFactory;
    protected $table = 'kes_bumil';
    protected $primaryKey = 'id_kesehatan';
    protected $fillable = [
        'id_kesehatan',
        'id_bumil',
        'kehamilan_ke_berapa',
        'hari_pertama_haid_terakhir',
        'bb_sblm_hamil',
        'tb',
        'lingkar_lengan',
        'imt',
        'jarak_kehamilan_sblmnya',
        'gol_darah',
        'rhesus',
        'riwayat_penyakit_bumil',
        'riwayat_alergi',
        'created_at',
        'updated_at'
        ];
        
    public function bumil()
    {
        return $this->belongsTo(bumil::class, 'id_bumil', 'id_bumil');
    }
}
