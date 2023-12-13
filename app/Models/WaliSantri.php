<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'santri_id','wali','kerja_wali','telp_wali',
        'alamat','kota_id','catatan','user_id' ];
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
