<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $fillable = ['jenispelanggaran_id','tanggal','hukuman','santri_id','user_id'];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }

    
    public function jenispelanggaran(){
        return $this->belongsTo(JenisPelanggaran::class,'jenispelanggaran_id');
    }
}
