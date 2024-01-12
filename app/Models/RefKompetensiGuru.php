<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKompetensiGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kompetensi',
        'jenis_kompetensi',
        'cara_menilai',
        'keterangan'
    ];
}
