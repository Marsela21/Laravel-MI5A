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
        //dd($request);

        //validasi input
        $input = $request->validate([
            "nama"      =>"required|unique:fakultas",
            "kaprodi"    =>"required",
            "singkatan" =>"required",

        ]);

        //simpan
        prodiis::create($input);

        //redirect berserta pesan success
        return redirect()->route('fakultas.index')->with('success', $request->nama.' berhasil disimpan');
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
    public function edit(prodiis $prodiis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prodiis $prodiis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prodiis $prodiis)
    {
        //
    }
}
