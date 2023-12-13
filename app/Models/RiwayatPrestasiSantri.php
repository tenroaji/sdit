<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPrestasiSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'santri_id','prestasi','tahun','tingkat','dokpres1','dokpres2','dokpres3','catatan','user_id'
    ];
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
