<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model fakultas
        $result = Fakultas::all();
       // dd($result);

       //kirim data $result ke view fakultas/index.blade.php
       return view('fakultas.index')->with('fakultas', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
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
            "dekan"     =>"required",
            "singkatan" =>"required"
        ]);

        //simpan
        Fakultas::create($input);

        //redirect berserta pesan success
        return redirect()->route('fakultas.index')->with('success', $request->nama.' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        //dd($fakultas); 
        return view('fakultas.edit')->with('fakultas', $fakultas);       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fakultas = Fakultas::find($id);
        // dd($fakultas);

        //validasi input
        $input = $request->validate([
            "nama"      =>"required",
            "dekan"     =>"required",
            "singkatan" =>"required"
        ]);
        
        // update data
        $fakultas->update($input);

        //redirect berserta pesan success
        return redirect()->route('fakultas.index')->with('success', $request->nama.' berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        //utk cek artibut
        //dd($fakultas);
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Data Fakultas Berhasil Dihapus');
    }
// yg ditambahkan utk API
    public function getFakultas() {
        $response['data'] = Fakultas::all();
        $response['message'] = 'List Data Fakultas';
        $response['success'] = true;

        return response()->json($response, 200);
    }
    public function storeFakultas(Request $request){
        //validasi input
        $input = $request->validate([
            "nama"      =>"required|unique:fakultas",
            "dekan"     =>"required",
            "singkatan" =>"required"
        ]);

        //simpan
        $hasil = Fakultas::create($input);
        if($hasil){//jika data berhail disimpan
            $response['success'] = true;
            $response['messagge'] = $request->nama."Berhasil Disimpan";
            return response()->json($response, 201); //utk data berhasil disimpan 201 create
        }else {
            $response['success'] = false;
            $response['messagge'] = $request->nama."Gagal Disimpan";
            return response()->json($response, 400);//400 utk bad request          
        }
    }
   public function destroyFakultas($id)
    {
        //cri data di tabel fakultas berdasarkan id fakultas
        $fakultas = Fakultas::find($id);
        //dd($fakultas);
        $hasil = $fakultas->delete();
        if($hasil){//jika data berhail disimpan
            $response['success'] = true;
            $response['messagge'] = "Fakultas Berhasil Dihapus";
            return response()->json($response, 200); //utk data berhasil disimpan 201 create
        }else {
            $response['success'] = false;
            $response['messagge'] = "Fakultas Gagal Dihapus";
            return response()->json($response, 400);//400 utk bad request          
        }  
    }
    
        public function updateFakultas(Request $request, $id)
    {
        $fakultas = Fakultas::find($id);
        // dd($fakultas);

        //validasi input
        $input = $request->validate([
            "nama"      =>"required",
            "dekan"     =>"required",
            "singkatan" =>"required"
        ]);
        
        // update data
        $hasil =  $fakultas->update($input);


        if($hasil){//jika data berhail disimpan
            $response['success'] = true;
            $response['messagge'] = "Fakultas Berhasil Diubah";
            return response()->json($response, 200); //utk data berhasil disimpan 201 create
        }else {
            $response['success'] = false;
            $response['messagge'] = "Fakultas Gagal Diubah";
            return response()->json($response, 400);//400 utk bad request          
        }  
    }
}
