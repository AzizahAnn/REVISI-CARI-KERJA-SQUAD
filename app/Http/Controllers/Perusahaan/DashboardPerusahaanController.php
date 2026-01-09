<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;

class DashboardPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = auth()->user()->perusahaan;
        
        $totalLowongan = $perusahaan->lowongan()->where('status', 'aktif')->count();
        $totalPelamar = $perusahaan->lowongan()->withCount('pendaftaran')->get()->sum('pendaftaran_count');
        $pelamarDiterima = $perusahaan->lowongan()->with('pendaftaran')->get()->pluck('pendaftaran')->flatten()->where('status', 'diterima')->count();
        $pelamarMenunggu = $perusahaan->lowongan()->with('pendaftaran')->get()->pluck('pendaftaran')->flatten()->where('status', 'menunggu')->count();
        
        return view('perusahaan.dashboard', compact(
            'totalLowongan',
            'totalPelamar',
            'pelamarDiterima',
            'pelamarMenunggu'
        ));
    }
}