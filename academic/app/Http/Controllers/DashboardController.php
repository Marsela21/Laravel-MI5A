<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $mahasiswa = DB::select('SELECT prodiis.nama, COUNT(*) as jumlah 
        FROM mahasiswas JOIN prodiis ON mahasiswas.prodi_id = prodiis.id
        GROUP BY prodiis.nama');

        $mahasiswa_tempatlahir = DB::select('SELECT mahasiswas.tempat_lahir, COUNT(*) as jumlah 
        FROM mahasiswas JOIN prodiis ON mahasiswas.prodi_id = prodiis.id
        GROUP BY mahasiswas.tempat_lahir');
        return view('dashboard')
        ->with('mahasiswa', $mahasiswa)
        ->with('mahasiswa_tempatlahir', $mahasiswa_tempatlahir);        
    }
}
