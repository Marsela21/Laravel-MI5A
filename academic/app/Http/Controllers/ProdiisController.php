<?php

namespace App\Http\Controllers;

use App\Models\prodiis;
use Illuminate\Http\Request;

class ProdiisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil model prodiis
        $result = prodiis::all();
       // dd($result);

       //kirim data $result ke view prodiis/index.blade.php
       return view('Prodiis.index')->with('Prodiis', $result);
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
    public function store(Request $request)
    {
        //
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
