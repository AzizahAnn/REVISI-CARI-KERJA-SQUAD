<?php

namespace App\Services;

use App\Models\User;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthService extends BaseService
{
    /**
     * Menangani registrasi user baru beserta profilnya.
     */
    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {
            // 1. Buat User baru
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'peran' => $data['peran'],
            ]);

            // 2. Buat Profil berdasarkan peran
            if ($data['peran'] === 'pelamar') {
                Pelamar::create([
                    'user_id' => $user->id,
                    'nama_lengkap' => $data['name'],
                    // no_identitas bisa dikosongkan dulu atau diisi default
                    'no_identitas' => $data['no_identitas'] ?? 'BELUM_DIISI', 
                ]);
            } elseif ($data['peran'] === 'perusahaan') {
                Perusahaan::create([
                    'user_id' => $user->id,
                    'nama_perusahaan' => $data['name'],
                    'status_verifikasi' => 'menunggu',
                ]);
            }

            return $user;
        });
    }
}