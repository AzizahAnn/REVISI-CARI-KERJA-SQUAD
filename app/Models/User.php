<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'peran',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi
    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }

    public function pelamar()
    {
        return $this->hasOne(Pelamar::class);
    }

    // Helper method
    public function adalahAdmin()
    {
        return $this->peran === 'admin';
    }

    public function adalahPerusahaan()
    {
        return $this->peran === 'perusahaan';
    }

    public function adalahPelamar()
    {
        return $this->peran === 'pelamar';
    }
}