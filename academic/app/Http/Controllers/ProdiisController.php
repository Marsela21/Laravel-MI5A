<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\prodiis;
use Illuminate\Http\Request;

class ProdiisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Panggil model Prodi
        $result = prodiis::all();

        // Kirim data $result ke views prodi/index.blade.php
        return view('prodi.index')->with('prodi', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create')->with('fakultas', $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validasi input
        $input = $request->validate([
            "nama"          =>"required|unique:prodiis",
            "kaprodi"       =>"required",
            "singkatan"     =>"required",
            "fakultas_id"   =>"required"

        ]);

        //simpan
        prodiis::create($input);

        //redirect berserta pesan success
        return redirect()->route('prodiis.index')->with('success', $request->nama.' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(prodiis $prodiis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prodiis = prodiis::find($id);
        $fakultas = Fakultas::all();
        //dd($prodi); 
        return view('prodi.edit')->with('prodiis', $prodiis)->with('fakultas', $fakultas);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prodiis = prodiis::find($id);
        // dd($fakultas);

        //validasi input
        $input = $request->validate([
            "nama"          =>"required",
            "kaprodi"       =>"required",
            "singkatan"     =>"required",
            "fakultas_id"   =>"required"
        ]);
        
        // update data
        $prodiis->update($input);

        //redirect berserta pesan success
        return redirect()->route('prodiis.index')->with('success', $request->nama.' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prodiis $prodiis)
    {
        //
    }
}
