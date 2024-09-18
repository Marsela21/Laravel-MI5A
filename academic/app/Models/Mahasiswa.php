<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    //untuk menanggil query dari tabel yg lain menggunakan belongsTo
    public function prodi()
    {
         return $this->belongsTo(prodiis::class, 'prodi_id', 'id');
    }
}