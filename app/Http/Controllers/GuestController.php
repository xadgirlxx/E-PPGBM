<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    public function landing() {
        return view('content.guest.landing');
    }

    public function cek(Request $request)
    {
        $kategori = $request->input('kategori');
        $nik = $request->input('nik');
        $data = null;

        if ($kategori === 'balita') {
            $data = Balita::with('imunisasiTerakhir')->where('nik_balita', $nik)->first();
        } elseif ($kategori === 'bumil') {
            $data = DB::table('data_bumil')->where('nik_bumil', $nik)->first();
        }
        // dd($data->imunisasiTerakhir);

        return view('content.guest.landing', compact('kategori', 'data', 'nik'));
    }
}
