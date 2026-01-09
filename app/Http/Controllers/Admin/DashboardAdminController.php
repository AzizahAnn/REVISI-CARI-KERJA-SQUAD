<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Pendaftaran;

class DashboardAdminController extends BaseController
{
    public function index()
    {
        try {
            $stats = [
                'totalPerusahaan' => Perusahaan::count(),
                'totalPelamar' => Pelamar::count(),
                'totalLowongan' => Lowongan::count(),
                'totalPendaftaran' => Pendaftaran::count(),
            ];
            
            return view('admin.dashboard', $stats);
            
        } catch (\Exception $e) {
            \Log::error('Dashboard error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat dashboard');
        }
    }
}