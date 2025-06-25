<?php

namespace App\Http\Controllers;

use App\Helpers\GiziHelper;
use App\Models\Balita;
use App\Models\bumil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $balita = Balita::all();
        $naik_bb = $balita->filter(fn($b) => GiziHelper::tidakNaikBB($b));
        $underweight = $balita->filter(fn($b) => GiziHelper::isUnderweight($b));
        $stunting = $balita->filter(fn($b) => GiziHelper::isStunting($b));
        $gizi_kurang = $balita->filter(fn($b) => GiziHelper::isGiziKurang($b));
        $menyimpang = $balita->filter(fn($b) => GiziHelper::isMenyimpang($b));

        dd($naik_bb);
        $bumil = bumil::all();
        $bumil_kek = $bumil->filter(fn($b) => GiziHelper::isBumilKEK($b));
        $bumil_anemia = $bumil->filter(fn($b) => GiziHelper::isBumilAnemia($b));

        return view('content.dashboard', compact(
            'naik_bb', 'underweight', 'stunting', 'gizi_kurang', 'menyimpang', 'bumil_kek', 'bumil_anemia'
        ));
    
    }
}
