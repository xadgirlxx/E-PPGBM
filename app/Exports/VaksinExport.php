<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class VaksinExport implements FromView
{
    public function view(): View
    {
       $dataVaksin = DB::table('imunisasi')
        ->select('nik_balita', 'tgl_imun', 'polio', 'campak')
        ->get();

        return view('laporan.vaksin_excel', compact('dataVaksin'));
    }
}
