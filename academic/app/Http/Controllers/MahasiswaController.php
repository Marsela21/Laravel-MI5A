<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\prodiis;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model mahasiswa
        $result = Mahasiswa::all();

       //kirim data $result ke view fakultas/index.blade.php
       return view('mahasiswa.index')->with('mahasiswa', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodiis::all();
        return view('mahasiswa.create')->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input
        $input = $request->validate([
            "npm"            =>"required|unique:mahasiswas",
            "nama"           =>"required",
            "tanggal_lahir"  =>"required",
            "tempat_lahir"   =>"required",
            "email"          =>"required",
            "hp"             =>"required",
            "alamat"         =>"required",
            "prodi_id"       =>"required"

        ]);

        //simpan
        Mahasiswa::create($input);

        //redirect berserta pesan success
        return redirect()->route('mahasiswa.index')->with('success', $request->nama.' berhasil disimpan');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
       // dd($mahasiswa);
       return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        // $mahasiswa = Mahasiswa::find($id);
        // return view('mahasiswa.edit')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
