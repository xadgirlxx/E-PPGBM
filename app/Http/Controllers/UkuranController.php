<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class UkuranController extends Controller
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
        $balitas = Balita::where('nik_balita', $nik)->firstOrFail();
        $pengukuran = $balitas->pengukuran;
        // dd($imunisasi);
        return view("content.pengukuran.index", compact('pengukuran','balitas'));
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
    public function store(Request $request, $balitaId)
    {
        
         // Validasi input
        $validated = $request->validate([
            'tgl_pengukuran' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'lingkar_kepala' => 'required',
            'kelas_ibu' => 'nullable',
            'cara_ukur' => 'nullable',
            'vitamin_a' => 'nullable',
        ]);

        try {
            
            $balita = Balita::findOrFail($balitaId);

            $pengukuran = new pengukuran(); // Pastikan huruf kapital sesuai nama model
            $pengukuran->nik_balita = $balita->nik_balita;
            $pengukuran->tgl_pengukuran = $validated['tgl_pengukuran'];
            $pengukuran->bb = $validated['bb'];
            $pengukuran->tb = $validated['tb'];
            $pengukuran->lingkar_kepala = $validated['lingkar_kepala'];
            $pengukuran->kelas_ibu = $validated['kelas_ibu'];
            $pengukuran->cara_ukur = $validated['cara_ukur'];
            $pengukuran->vitamin_a = $validated['vitamin_a'];
            $pengukuran->save();

            return redirect()->back()->with('success', 'Data pengukuran berhasil disimpan.');
        } catch (\Exception $e) {
            // dd($request->all());
            // Log error jika perlu:
            Log::error($e);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
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
