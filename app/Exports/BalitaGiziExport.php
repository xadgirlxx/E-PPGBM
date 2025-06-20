<?php
namespace App\Exports;

use App\Helpers\GiziHelper;
use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BalitaGiziExport implements FromCollection, WithHeadings, WithMapping
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
            'Status Gizi',
        ];
    }

    public function map($balita): array
    {

        $umurbulan = \Carbon\Carbon::parse($balita->tgl_lahir)->diffInMonths(now());
        $bb = $balita->pengukuranTerakhir->bb ?? null;
        $jk = $balita->jk;

        $statusGizi = $bb ? GiziHelper::hitungStatusGizi($bb, $umurbulan, $jk) : 'Belum Diukur';
                    
       $umur = \Carbon\Carbon::parse($balita->tgl_lahir)->diff(\Carbon\Carbon::now());
        $nik = (string) $balita->nik_balita;
        return [
            '', // No (kosong, bisa auto-number di Excel)
            $nik,
            $balita->nama_balita,
            $balita->tgl_lahir,
            $umur->y . ' th ' . $umur->m . ' bln',
            optional($balita->pengukuranTerakhir)->tgl_pengukuran,
            optional($balita->pengukuranTerakhir)->bb,
            optional($balita->pengukuranTerakhir)->tb,
            $statusGizi,
        ];
    }
}
