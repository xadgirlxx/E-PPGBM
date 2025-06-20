<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BalitaController extends Controller
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
    public function index(Request $request)
    {
        $balitas = Balita::all();
        $query = Balita::query();
        if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nik_balita', 'like', "%{$search}%")
              ->orWhere('nama_balita', 'like', "%{$search}%")
              ->orWhere('nama_ortu', 'like', "%{$search}%");
        });
    }

    $balitas = $query->paginate(10)->withQueryString(); 
        return view('content.balita.index', compact('balitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.balita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'nik_balita'           => 'required|digits:16|unique:balita,nik_balita',
        'nama_balita'          => 'required|string|max:50',
        'tgl_lahir'            => 'required',
        'nama_ortu'            => 'required|string|max:50',
        'no_telp'              => 'required',
        'alamat'               => 'required|string',
        'puskesmas'            => 'required|string',
        'posyandu'             => 'required|string',
        'jk'                   => 'required',
        'prov'                 => 'required',
        'kab_kota'                  => 'required',
        'kec'                  => 'required',
        'desa_kel'                 => 'required',
        ]);
        // dd($validated);
        
        try {
            Balita::create($validated);
            return redirect()
                ->route('balita.index')
                ->with('success', 'Data balita berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Error saat simpan balita: ' . $e->getMessage());
            return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat menyimpan data.');
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
    public function edit($id)
    {
        $balita = Balita::findOrFail($id);
        return view('content.balita.edit', compact('balita'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik_balita' => 'required|string',
            'nama_balita' => 'required|string',
            'tgl_lahir' => 'required|date',
            'jk' => 'required|in:L,P',
            'nama_ortu' => 'required|string',
            'no_telp' => 'nullable|string',
            'alamat' => 'required|string',
            'prov' => 'required|string',
            'kab_kota' => 'required|string',
            'kec' => 'required|string',
            'desa_kel' => 'required|string',
            'puskesmas' => 'nullable|string',
            'posyandu' => 'nullable|string',
        ]);

        $balita = Balita::findOrFail($id);
        $balita->update([
            'nik_balita' => $request->nik_balita,
            'nama_balita' => $request->nama_balita,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'nama_ortu' => $request->nama_ortu,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'prov' => $request->prov,
            'kab_kota' => $request->kab_kota,
            'kec' => $request->kec,
            'desa_kel' => $request->desa_kel,
            'puskesmas' => $request->puskesmas,
            'posyandu' => $request->posyandu,
        ]);

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $balita = Balita::findOrFail($id);
        $balita->delete();

        return redirect()->route('balita.index')->with('success', 'Data balita berhasil dihapus.');
    }
}
