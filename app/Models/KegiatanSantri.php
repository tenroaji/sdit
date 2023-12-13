<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\PenyusunanKegiatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KegiatanSantri extends Model
{
    use HasFactory;
    protected $fillable = ['kegiatan_id','santri_id','peranan','catatan','user_id'];

    public function kegiatan(){
        return $this->belongsTo(PenyusunanKegiatan::class,'kegiatan_id');
    }
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
