<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\JenisNilai;
use App\Models\MasterNilai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiSantri extends Model
{
    use HasFactory;
    protected $fillable = ['masternilai_id','capaian_nilai', 'santri_id' ,'jenisnilai_id', 'nilai', 'user_id'];

    public function masternilai(){
        return $this->belongsTo(MasterNilai::class,'masternilai_id');
    }
    
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    
    public function jenisnilai(){
        return $this->belongsTo(JenisNilai::class,'jenisnilai_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
