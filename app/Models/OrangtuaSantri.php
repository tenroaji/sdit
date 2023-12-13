<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\User;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrangtuaSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'santri_id','ayah','kerja_ayah','telp_ayah','ibu','kerja_ibu','telp_ibu',
        'alamat','kota_id','anak_ke','penghasilan','kartukeluarga1','kartukeluarga2','catatan','user_id'
    ];

    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id');
    }
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'kota_id');
    }

}
