<?php

namespace App\Http\Controllers;

use App\Exports\BalitaBMIExport;
use App\Exports\BalitaExport;
use App\Exports\BalitaGiziExport;
use App\Exports\KehamilanTerakhirExport;
use App\Exports\KesehatanBumilExport;
use App\Exports\VaksinExport;
use App\Helpers\GiziHelper;
use App\Models\Balita;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function kehamilanTerakhir()
    {
        $latestKehamilan = DB::table('kes_bumil as k1')
            ->select('k1.*')
            ->join(DB::raw('(
                SELECT id_bumil, MAX(kehamilan_ke_berapa) as max_kehamilan
                FROM kes_bumil
                GROUP BY id_bumil
            ) as k2'), function($join) {
                $join->on('k1.id_bumil', '=', 'k2.id_bumil')
                    ->on('k1.kehamilan_ke_berapa', '=', 'k2.max_kehamilan');
            });

        $data = DB::table('data_bumil as b')
            ->joinSub($latestKehamilan, 'k', function($join) {
                $join->on('b.id_bumil', '=', 'k.id_bumil');
            })
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

        return view('content.laporan.kehamilan_terakhir', compact('data'));
    }
    public function exportKehamilanExcel()
    {
        return Excel::download(new KehamilanTerakhirExport, 'laporan_kehamilan_terakhir.xlsx');
    }
    public function exportKehamilanPDF()
    {
        $data = $this->getLaporanKehamilan(); // agar reusable
        $pdf = Pdf::loadView('laporan.kehamilan_terakhir_pdf', ['data' => $data]);
        return $pdf->download('laporan_kehamilan_terakhir.pdf');
    }
    public function exportKesehatanExcel()
    {
        return Excel::download(new KesehatanBumilExport, 'laporan_kesehatan_bumil.xlsx');
    }

    public function exportKesehatanPDF()
    {
        $data = DB::table('kes_bumil as k')
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

        $pdf = Pdf::loadView('laporan.kesehatan_bumil_pdf', ['data' => $data]);
        return $pdf->download('laporan_kesehatan_bumil.pdf');
    }
    public function kesehatanBumil()
    {
        $data = DB::table('kes_bumil as k')
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
            ->orderBy('k.kehamilan_ke_berapa', 'desc')
            ->get();

        return view('content.laporan.kesehatan_bumil', compact('data'));
    }
    public function ajaxLaporan($jenis)
    {
        switch ($jenis) {
            case 'tidak_naik_bb':
                $data = DB::table('balita')->where('naik_bb', false)->get();
                return view('laporan.partials.tidak_naik_bb', compact('data'));
            // Tambah case lain sesuai jenis
            default:
                return response('<div class="alert alert-warning">Data tidak ditemukan</div>', 404);
        }
    }
    public function vaksin()
    {
        $dataVaksin = DB::table('imunisasi')
        ->select('nik_balita', 'tgl_imun', 'polio', 'campak')
        ->get();

        return view('content.laporan.vaksin', compact('dataVaksin'));
    }

    public function exportVaksinExcel()
    {
        return Excel::download(new VaksinExport, 'laporan_vaksin.xlsx');
    }

    public function exportVaksinPDF()
    {
         $dataVaksin = DB::table('imunisasi')
        ->select('nik_balita', 'tgl_imun', 'polio', 'campak')
        ->get();

        $pdf = PDF::loadView('laporan.vaksin_pdf', compact('dataVaksin'));
        return $pdf->stream('laporan_vaksin.pdf');
    }

}