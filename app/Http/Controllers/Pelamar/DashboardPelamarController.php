<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;

class DashboardPelamarController extends Controller
{
    public function index()
    {
        $pelamar = auth()->user()->pelamar;
        
        $totalLowongan = Lowongan::aktif()->count();
        $totalLamaran = $pelamar->pendaftaran()->count();
        $lamaranMenunggu = $pelamar->pendaftaran()->where('status', 'menunggu')->count();
        $lamaranDiterima = $pelamar->pendaftaran()->where('status', 'diterima')->count();
        
        return view('pelamar.dashboard', compact(
            'totalLowongan',
            'totalLamaran',
            'lamaranMenunggu',
            'lamaranDiterima'
        ));
    }
}