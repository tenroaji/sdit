<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticInfo extends Model
{
    use HasFactory;
    protected $fillable = [
'visi', 'misi', 'sejarah','tentang','alamat','info1','info2','lat','long','user_id','foto1',
'foto2','aturan_daftar','aturan_pondok','struktur_organisasi','pimpinan1','pimpinan3','pimpinan2','pimpinan4',
'fotopimpinan1','fotopimpinan2','fotopimpinan3','fotopimpinan4','jab1','jab2','jab3','jab4','tawar1','tawar2',
'tawar3','banner1','banner2','banner3','banner4','user_id'

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getStaticInfo()
    {
        return $this->first();
    }
}
