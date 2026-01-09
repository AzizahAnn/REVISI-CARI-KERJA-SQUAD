<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eqoulent\Builder;
use Carbon\Carbon;

class Lowongan extends Model
{
    protected $table = 'lowongan';

    protected $fillable = [
        'perusahaan_id',
        'posisi',
        'deskripsi',
        'persyaratan',
        'lokasi',
        'tipe',
        'batas_akhir',
        'status',
    ];

    protected $casts = [
        'batas_akhir' => 'date',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function getIsAktifAttribute()
    {
        // Membandingkan tanggal hari ini (now()) dengan batas_akhir yang di-cast Carbon.
        return $this->status === 'aktif' && now()->lessThanOrEqualTo($this->batas_akhir);
    }

    /**
     * Query Scope: Mengambil lowongan yang statusnya 'aktif' dan belum kedaluwarsa.
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif')
                     ->where('batas_akhir', '>=', Carbon::today());
    }

    /**
     * Fungsi Helper: Memeriksa apakah lowongan masih terbuka.
     * Menggunakan logika dari Accessor is_aktif.
     */
    public function masihTerbuka()
    {
        return $this->is_aktif;
    }
}