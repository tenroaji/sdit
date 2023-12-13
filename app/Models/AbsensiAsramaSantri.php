<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\AbsensiAsrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiAsramaSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'absensiasrama_id', 'santri_id', 'status_hadir', 'user_id'
    ];

    public function absensiasrama(){
        return $this->belongsTo(AbsensiAsrama::class,'absensiasrama_id');
    }
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
