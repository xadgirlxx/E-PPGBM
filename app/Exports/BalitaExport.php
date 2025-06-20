<?php

namespace App\Exports;

use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BalitaExport implements FromCollection, WithHeadings
{

 public function collection()
    {
        return Balita::select('nik_balita', 'nama_balita', 'tgl_lahir', 'jk', 'nama_ortu', 'alamat')->get();
    }

    public function headings(): array
    {
        return ['NIK', 'Nama Balita', 'Tanggal Lahir', 'Jenis Kelamin', 'Nama Orang Tua', 'Alamat'];
    }
}
