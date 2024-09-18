<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class prodiis extends Model
{
    use HasFactory, HasUuids;
//untuk menanggil query dari tabel yg lain menggunakan belongsTo
    public function fakultas():BelongsTo
    {
         return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }
}
