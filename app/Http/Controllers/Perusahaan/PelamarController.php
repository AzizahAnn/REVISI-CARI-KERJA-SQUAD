<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    // Lihat daftar pelamar per lowongan
    public function daftarPelamar($lowongan_id)
    {
        $perusahaan = auth()->user()->perusahaan;
        
        $lowongan = Lowongan::with(['pendaftaran.pelamar.user'])
            ->where('id', $lowongan_id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();
        
        return view('perusahaan.pelamar.index', compact('lowongan'));
    }
    
    // Ubah status pelamar (terima/tolak)
    public function ubahStatus(Request $request, $pendaftaran_id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak',
        ]);
        
        $pendaftaran = Pendaftaran::with('lowongan.perusahaan')
            ->findOrFail($pendaftaran_id);
        
        // Cek kepemilikan
        if ($pendaftaran->lowongan->perusahaan->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses');
        }
        
        $pendaftaran->update([
            'status' => $request->status,
        ]);
        
        return back()->with('success', 'Status pelamar berhasil diubah!');
    }
    
    // Download CV pelamar
    public function unduhCV($pendaftaran_id)
    {
        $pendaftaran = Pendaftaran::with('lowongan.perusahaan', 'pelamar.user')
            ->findOrFail($pendaftaran_id);
        
        // Cek kepemilikan
        if ($pendaftaran->lowongan->perusahaan->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses');
        }
        
        // Cek apakah file ada
        if (!Storage::disk('public')->exists($pendaftaran->jalur_cv)) {
            return back()->with('error', 'File CV tidak ditemukan');
        }
        
        // Download dengan nama yang jelas
        $namaFile = $pendaftaran->pelamar->nama_lengkap . '_CV.pdf';
        
        return Storage::disk('public')->download($pendaftaran->jalur_cv, $namaFile);
    }
}