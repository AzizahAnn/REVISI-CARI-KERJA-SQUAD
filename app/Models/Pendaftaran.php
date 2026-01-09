<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $fillable = [
        'lowongan_id',
        'pelamar_id',
        'jalur_cv',
        'status',
        'tanggal_daftar',
    ];

    protected $casts = [
        'tanggal_daftar' => 'datetime',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}