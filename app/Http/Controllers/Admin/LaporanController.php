<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function rekapPendaftar()
    {
        $totalPerusahaan = Perusahaan::count();
        $totalPelamar = Pelamar::count();
        $totalLowongan = Lowongan::count();
        $totalPendaftaran = Pendaftaran::count();
        
        // Rekap per lowongan
        $lowonganDenganPelamar = Lowongan::with('perusahaan')
            ->withCount('pendaftaran')
            ->orderBy('pendaftaran_count', 'desc')
            ->get();
        
        // Rekap per status
        $rekapStatus = Pendaftaran::selectRaw('status, COUNT(*) as jumlah')
            ->groupBy('status')
            ->get();
        
        return view('admin.laporan.rekap', compact(
            'totalPerusahaan',
            'totalPelamar',
            'totalLowongan',
            'totalPendaftaran',
            'lowonganDenganPelamar',
            'rekapStatus'
        ));
    }
}