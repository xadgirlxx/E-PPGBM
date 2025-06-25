<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KehamilanTerakhirExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $latestKehamilan = DB::table('kes_bumil as k1')
            ->select('k1.*')
            ->join(DB::raw('(
                SELECT id_bumil, MAX(kehamilan_ke_berapa) as max_kehamilan
                FROM kes_bumil GROUP BY id_bumil
            ) as k2'), function ($join) {
                $join->on('k1.id_bumil', '=', 'k2.id_bumil')
                     ->on('k1.kehamilan_ke_berapa', '=', 'k2.max_kehamilan');
            });

        return DB::table('data_bumil as b')
            ->joinSub($latestKehamilan, 'k', fn($join) =>
                $join->on('b.id_bumil', '=', 'k.id_bumil')
            )
            ->select(
                'b.nik_bumil',
                'b.nama_bumil',
                'k.kehamilan_ke_berapa',
                'k.hari_pertama_haid_terakhir',
                'k.bb_sblm_hamil',
                'k.tb',
                'k.imt',
                'k.jarak_kehamilan_sblmnya'
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama Ibu',
            'Kehamilan Ke',
            'Hari Pertama Haid',
            'BB Sebelum Hamil',
            'Tinggi Badan',
            'IMT',
            'Jarak Kehamilan',
        ];
    }
}

