<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ProfileService extends BaseService
{
    public function updateProfile($user, array $data)
    {
        return DB::transaction(function () use ($user, $data) {
            // 1. Update data dasar di tabel Users
            $user->update([
                'name'  => $data['name'],
                'email' => $data['email'],
            ]);

            // 2. Update data spesifik berdasarkan peran (sama seperti field di DaftarController)
            if ($user->peran === 'pelamar') {
                $user->pelamar->update([
                    'nama_lengkap'    => $data['name'],
                    'no_identitas'    => $data['no_identitas'],
                    'bidang_keahlian' => $data['bidang_keahlian'],
                    'no_telp'         => $data['no_telp'],
                    'alamat'          => $data['alamat'],
                ]);
            } elseif ($user->peran === 'perusahaan') {
                $user->perusahaan->update([
                    'nama_perusahaan' => $data['name'],
                    'alamat'          => $data['alamat'],
                    'no_telp'         => $data['no_telp'],
                    'deskripsi'       => $data['deskripsi'],
                ]);
            }
            return $user;
        });
    }
}