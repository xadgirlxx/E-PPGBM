<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KesehatanBumilExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('kes_bumil as k')
            ->join('data_bumil as b', 'k.id_bumil', '=', 'b.id_bumil')
            ->select(
                'b.nik_bumil',
                'b.nama_bumil',
                'k.kehamilan_ke_berapa',
                'k.hari_pertama_haid_terakhir',
                'k.bb_sblm_hamil',
                'k.tb',
                'k.imt',
                'k.jarak_kehamilan_sblmnya',
                'k.gol_darah',
                'k.rhesus',
                'k.riwayat_penyakit_bumil',
                'k.riwayat_alergi'
            )
            ->orderBy('b.nama_bumil')
            ->get();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Kehamilan Ke',
            'Hari Pertama Haid',
            'BB',
            'TB',
            'IMT',
            'Jarak Kehamilan',
            'Golongan Darah',
            'Rhesus',
            'Riwayat Penyakit',
            'Riwayat Alergi',
        ];
    }
}
