<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSurah extends Model
{
    use HasFactory;
    protected $fillable = ['nama','jumlah_ayat',];
}
