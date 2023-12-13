<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\Strata;
use App\Models\PenentuanKelulusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelulusanSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelulusan_id','tahun','santri_id','predikat','user_id', 'strata_lama', 'strata_baru'
    ];
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function stratalama(){
        return $this->belongsTo(Strata::class,'strata_lama');
    }
    public function stratabaru(){
        return $this->belongsTo(Strata::class,'strata_baru');
    }
    public function penentuankelulusan(){
        return $this->belongsTo(PenentuanKelulusan::class,'kelulusan_id');
    }


}
