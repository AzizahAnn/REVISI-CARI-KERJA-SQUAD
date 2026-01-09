<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use App\Models\Pelamar;
use App\Models\Lowongan;
use App\Models\Pendaftaran;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalPerusahaan = Perusahaan::count();
        $totalPelamar = Pelamar::count();
        $totalLowongan = Lowongan::count();
        $totalPendaftaran = Pendaftaran::count();
        
        return view('admin.dashboard', compact(
            'totalPerusahaan',
            'totalPelamar',
            'totalLowongan',
            'totalPendaftaran'
        ));
    }
}