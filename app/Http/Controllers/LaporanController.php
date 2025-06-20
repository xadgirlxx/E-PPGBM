<?php

namespace App\Http\Controllers;

use App\Exports\BalitaBMIExport;
use App\Exports\BalitaExport;
use App\Exports\BalitaGiziExport;
use App\Helpers\GiziHelper;
use App\Models\Balita;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
         /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function balita()
    {
        $data = Balita::latest()->get();
        return view('content.laporan.balita', compact('data'));
    }

    public function exportPDF()
    {
        $data = Balita::all();
        $pdf = Pdf::loadView('laporan.balita_pdf', compact('data'))->setPaper('A4', 'landscape');
        return $pdf->download('laporan.laporan_data_balita.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BalitaExport, 'laporan_data_balita.xlsx');
    }
    public function gizi()
    {
        $data = Balita::with('pengukuranTerakhir')->get();
        return view('content.laporan.gizi', compact('data'));
    }

    public function exportGiziPdf()
    {
        $balitas = Balita::with('pengukuranTerakhir')->get();

        return Pdf::loadView('laporan.gizi_pdf', compact('balitas'))
                ->setPaper('a4', 'landscape')
                ->download('laporan-gizi-balita.pdf');
    }
    public function exportGiziExcel()
    {
        return Excel::download(new BalitaGiziExport, 'laporan-gizi-balita.xlsx');
    }
    public function bmi()
    {
        $balitas = Balita::with('pengukuranTerakhir')->get();
        return view('content.laporan.bmi', compact('balitas'));
    }

    public function exportBmiPdf()
    {
        $balitas = Balita::with('pengukuranTerakhir')->get();

        return Pdf::loadView('laporan.bmi_pdf', compact('balitas'))
                ->setPaper('a4', 'landscape')
                ->download('laporan-BMI-balita.pdf');
    }
    public function exportBmiExcel()
    {
        return Excel::download(new BalitaBMIExport, 'laporan-BMI-balita.xlsx');
    }
}