<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\JadwalPulang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPulangSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'jadwalpulang_id','santri_id','user_id', 
    ];

    public function jadwalpulang()
    { 
        return $this->belongsTo(JadwalPulang::class,'jadwalpulang_id');
    }

    public function santri()
    { 
        return $this->belongsTo(Santri::class,'santri_id');
    }
 


    public function user()
    { 
        return $this->belongsTo(User::class,'user_id');
    }

}
