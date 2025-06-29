<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bumil extends Model
{
    use HasFactory;
    protected $table = 'data_bumil';
    protected $primaryKey = 'id_bumil';
    protected $fillable = [
        'nik_bumil',
        'nama_bumil',
        'tgl_lahir',
        'no_kk',
        'pendidikan',
        'pekerjaan',
        'nama_suami',
        'nik_suami',
        'telp_suami',
        'prov',
        'kab_kota',
        'kec',
        'desa_kel',
        'faskes1',
        'faskes_rujukan',
        'alamat',
        'puskesmas_pembina',
        'created_at',
        'updated_at'
    ];
    public function kesbumil()
    {
        return $this->hasMany(kesbumil::class, 'id_bumil', 'id_bumil');
    }
}
