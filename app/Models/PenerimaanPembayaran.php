<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanPembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';

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
     /**
     * Scope untuk mengambil data dengan status_bayar = 0.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnpaid($query)
    {
        return $query->where('status_bayar', 1);
    }
}
