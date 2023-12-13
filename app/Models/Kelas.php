<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tingkat_id',
        'strata_id',
        'deskripsi',
        'foto',
        'slug',
    ];

    public function strata() {
        return $this->belongsTo(Strata::class,'strata_id');
    }
    public function tingkat() {
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
}
