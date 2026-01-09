<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    // Tampilkan riwayat lamaran pelamar
    public function index()
    {
        $pelamar = auth()->user()->pelamar;
        
        $lamaran = $pelamar->pendaftaran()
            ->with('lowongan.perusahaan')
            ->orderBy('tanggal_daftar', 'desc')
            ->get();
        
        return view('pelamar.lamaran.index', compact('lamaran'));
    }
    
    // Detail lamaran
    public function detail($id)
    {
        $pelamar = auth()->user()->pelamar;
        
        $lamaran = $pelamar->pendaftaran()
            ->with('lowongan.perusahaan')
            ->findOrFail($id);
        
        return view('pelamar.lamaran.detail', compact('lamaran'));
    }
}