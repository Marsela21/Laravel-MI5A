<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $mahasiswa = DB::select('SELECT prodiis.nama, COUNT(*) as jumlah
                                FROM mahasiswas
                                JOIN prodiis ON mahasiswas.prodi_id = prodi_id
                                GROUP BY prodiis.nama');
        return view('dashboard')->with('mahasiswa', $mahasiswa);
    }
}
