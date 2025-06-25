<?php

namespace App\Http\Controllers;

use App\Models\bumil;
use App\Models\kesbumil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KesBUmilController extends Controller
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
     * Display a listing of the resource.
     */
    public function index($encryptedNik)
    {
        $nik = Crypt::decryptString($encryptedNik); // Dekripsi dulu
        $bumil = bumil::where('nik_bumil', $nik)->firstOrFail();
        $kesbumil = $bumil->kesbumil;
        // dd($imunisasi);
        return view("content.kesbumil.index", compact('kesbumil','bumil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_bumil)
    {
        $validated = $request->validate([
            'kehamilan_ke_berapa'        => 'required|integer',
            'hari_pertama_haid_terakhir' => 'required|date',
            'bb_sblm_hamil'              => 'nullable|numeric',
            'tb'                         => 'nullable|numeric',
            'imt'                        => 'nullable|numeric',
            'jarak_kehamilan_sblmnya'    => 'nullable|string|max:100',
            'gol_darah'                  => 'nullable|string|max:5',
            'rhesus'                     => 'nullable',
            'riwayat_penyakit_bumil'     => 'nullable|string|max:255',
            'riwayat_alergi'             => 'nullable|string|max:255',
        ]);

        $validated['id_bumil'] = $id_bumil;

        KesBumil::create($validated);

        return redirect()->back()->with('success', 'Data kehamilan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
