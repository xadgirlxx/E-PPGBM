<?php

namespace App\Http\Controllers;

use App\Models\bumil;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v8;

class BumilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = bumil::with('kesbumil')->get();
        // dd($data);
        return view('content.bumil.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.bumil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nik_bumil'     => 'required|digits:16|unique:data_bumil,nik_bumil',
        'nama_bumil'    => 'required|string|max:100',
        'tgl_lahir'     => 'required|date',
        'no_kk'         => 'required|digits:16',
        'nama_suami'    => 'required|string|max:100',
        'telp_suami'    => 'nullable|string|max:15',
        'alamat'        => 'required|string',
        'faskes1'       => 'nullable|string|max:100',
        'faskes_rujukan'=> 'nullable|string|max:100',
        'pendidikan'    => 'nullable|in:SD,SMP,SMA/MA/Paket C,S1,S2,S3',
        'pekerjaan'     => 'nullable|string|max:100',
        'nik_suami'     => 'nullable|digits:16',
        'prov'          => 'required|string',
        'kab_kota'      => 'required|string',
        'kec'           => 'required|string',
        'desa_kel'      => 'required|string',
    ]);
    try{
        $bumil = Bumil::create($validated);
        return redirect()->route('bumil.index')->with('success', 'Data Ibu Hamil berhasil disimpan.');
    } catch(\Exception $e){
        return redirect()->route('bumil.index')->with('error', 'Data Ibu Hamil gagal disimpan.');
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
