<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Imunisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class ImunisasiController extends Controller
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
        $imunisasi = $balitas->imunisasis;
        // dd($imunisasi);
        return view("content.imunisasi.index", compact('imunisasi','balitas'));
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
    public function store(Request $request,$balitaId)
    {
        
        // Validasi inputan
        $validated = $request->validate([
            'tgl_imunisasi' => 'required|date',
            'hb' => 'nullable|string',
            'polio' => 'nullable|string',
            'campak' => 'nullable|string',
            'BCG' => 'nullable|string',
            'IPV' => 'nullable|string',
        ]);

        // Cari Balita berdasarkan ID
        $balita = Balita::findOrFail($balitaId);
// dd($balita->nik_balita);
        // Buat data imunisasi baru dan isi datanya
        $imunisasi = new Imunisasi();
        $imunisasi->nik_balita = $balita->nik_balita;
        $imunisasi->tgl_imun = $validated['tgl_imunisasi'];
        $imunisasi->hb = $validated['hb'] ?? null;
        $imunisasi->polio = $validated['polio'] ?? null;
        $imunisasi->campak = $validated['campak'] ?? null;

        // Untuk checkbox, jika dicentang maka akan ada nilai, jika tidak maka null
        $imunisasi->BCG = $request->has('BCG') ? $validated['BCG'] : null;
        $imunisasi->IPV = $request->has('IPV') ? $validated['IPV'] : null;

        $imunisasi->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data imunisasi berhasil disimpan.');
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
