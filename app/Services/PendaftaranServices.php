<?php

namespace App\Services;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;

class PendaftaranService extends BaseService
{
    public function submitLamaran($request, $lowonganId, $pelamar)
    {
        // Logika Upload CV
        $file = $request->file('cv');
        $namaFile = 'cv_' . $pelamar->no_identitas . '_' . time() . '.pdf';
        $jalurCV = $file->storeAs('cv', $namaFile, 'public');

        return Pendaftaran::create([
            'lowongan_id' => $lowonganId,
            'pelamar_id' => $pelamar->id,
            'jalur_cv' => $jalurCV,
            'status' => 'menunggu',
        ]);
    }
}