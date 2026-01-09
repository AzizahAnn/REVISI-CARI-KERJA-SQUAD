<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Pendaftaran;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use App\Models\Pelamar;

class LaporanController extends BaseController
{
    /**
     * Rekap data pendaftar dan lowongan
     */
    public function rekapPendaftar()
    {
        try {
            $stats = [
                'totalPerusahaan' => Perusahaan::count(),
                'totalPelamar' => Pelamar::count(),
                'totalLowongan' => Lowongan::count(),
                'totalPendaftaran' => Pendaftaran::count(),
            ];
            
            // Rekap per lowongan
            $lowonganDenganPelamar = Lowongan::with('perusahaan')
                ->withCount('pendaftaran')
                ->orderBy('pendaftaran_count', 'desc')
                ->get();
            
            // Rekap per status
            $rekapStatus = Pendaftaran::selectRaw('status, COUNT(*) as jumlah')
                ->groupBy('status')
                ->get();
            
            return view('admin.laporan.rekap', array_merge($stats, [
                'lowonganDenganPelamar' => $lowonganDenganPelamar,
                'rekapStatus' => $rekapStatus,
            ]));
            
        } catch (\Exception $e) {
            \Log::error('Laporan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat laporan');
        }
    }

    /**
     * Export laporan (Optional - untuk future)
     */
    public function exportPdf()
    {
        try {
            // TODO: Implement PDF export
            return back()->with('error', 'Fitur export PDF belum tersedia');
        } catch (\Exception $e) {
            \Log::error('Export laporan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat export laporan');
        }
    }
}