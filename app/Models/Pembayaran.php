<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'periodepembayaran_id',
        'bulan',
        'tahun',
        'tanggal_bayar',
        'nomor_pembayaran',
        'santri_id',
        'status_bayar',
        'metode_bayar',
        'nilai_bayar',
        'sisa_bayar',
        'bank',
        'user_id',
    ];

    public function santri() {
        return $this->belongsTo(Santri::class,'santri_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function periode() {
        return $this->belongsTo(PeriodePembayaran::class,'periodepembayaran_id');
    }
}
