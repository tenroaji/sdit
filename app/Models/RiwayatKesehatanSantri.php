<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatKesehatanSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'santri_id','penyakit','tahun','dokter','opname','dokkes1','dokkes2','catatan','user_id'
    ];
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
