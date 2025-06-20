<?php

namespace App\Exports;

use App\Helpers\GiziHelper;
use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Nette\Utils\Strings;

class BalitaBMIExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Balita::with('pengukuranTerakhir')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama Balita',
            'Tanggal Lahir',
            'Usia',
            'Tgl Pengukuran',
            'BB (kg)',
            'TB (cm)',
            'BMI',
            'Kategori BMI',
        ];
    }

    public function map($balita): array
    {
        $umurBulan = \Carbon\Carbon::parse($balita->tgl_lahir)->diffInMonths(now());
        $umur = \Carbon\Carbon::parse($balita->tgl_lahir)->diff(\Carbon\Carbon::now());

        $bb = optional($balita->pengukuranTerakhir)->bb;
        $tb = optional($balita->pengukuranTerakhir)->tb;
        $jk = $balita->jk;

        $bmi = ($bb && $tb) ? GiziHelper::hitungBMI($bb, $tb) : null;
        $kategoriBmi = $bmi ? GiziHelper::klasifikasiBMIAnak($bmi, $umurBulan, $jk) : 'Belum Diukur';
        $nik = (string) $balita->nik_balita;
        // dd($nik);
        return [
            '', // No: kosong agar Excel bisa auto number
            $nik,
            $balita->nama_balita,
            $balita->tgl_lahir,
            "{$umur->y} th {$umur->m} bln",
            optional($balita->pengukuranTerakhir)->tgl_pengukuran
                ? optional($balita->pengukuranTerakhir)->tgl_pengukuran
                : '-',
            $bb ?? '-',
            $tb ?? '-',
            $bmi ?? '-',
            $kategoriBmi,
        ];
    }
}
