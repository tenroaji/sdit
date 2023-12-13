<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strata extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'slug',
    ];
}
