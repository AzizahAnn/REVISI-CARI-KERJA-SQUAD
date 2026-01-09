<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Proses daftar lowongan + upload CV
    public function daftar (Request $request, $lowongan_id)
    {
    $request->validate([
        'cv' => 'required|file|mimes:pdf|max:2048', // Max 2MB
    ]);
    
    $pelamar = auth()->user()->pelamar;
    
    // Upload CV
    $file = $request->file('cv');
    $namaFile = 'cv_' . $pelamar->no_identitas . '_' . time() . '.pdf';  // ✅ FIXED
    $jalurCV = $file->storeAs('cv', $namaFile, 'public');
    
    // Simpan pendaftaran
    Pendaftaran::create([
        'lowongan_id' => $lowongan_id,
        'pelamar_id' => $pelamar->id,  // ✅ FIXED
        'jalur_cv' => $jalurCV,
        'status' => 'menunggu',
    ]);
    
    return redirect()->route('pelamar.lamaran.index')
        ->with('success', 'Lamaran berhasil dikirim!');
    }
}