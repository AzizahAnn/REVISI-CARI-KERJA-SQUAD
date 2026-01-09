<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Perusahaan;

class BerandaController extends Controller
{
    /**
     * Tampilkan halaman beranda dengan daftar lowongan aktif
     */
    public function index()
    {
        // Ambil lowongan yang aktif dan belum expired (LIMIT 6 untuk preview)
        $lowonganTerbaru = Lowongan::aktif()
            ->with('perusahaan')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Ambil total lowongan aktif untuk statistik
        $totalLowongan = Lowongan::aktif()->count();
        $totalPerusahaan = Perusahaan::where('status', 'aktif')->count();
        $totalMagang = Lowongan::aktif()->where('tipe', 'magang')->count();

        return view('beranda', compact(
            'lowonganTerbaru',
            'totalLowongan',
            'totalPerusahaan',
            'totalMagang'
        ));
    }

    /**
     * Tampilkan semua lowongan aktif (halaman list lengkap) dengan filter
     */
    public function semuaLowongan()
    {
        $query = Lowongan::aktif()->with('perusahaan');

        // Filter berdasarkan search (posisi)
        if (request('search')) {
            $query->where('posisi', 'like', '%' . request('search') . '%');
        }

        // Filter berdasarkan tipe
        if (request('tipe')) {
            $query->where('tipe', request('tipe'));
        }

        // Filter berdasarkan lokasi
        if (request('lokasi')) {
            $query->where('lokasi', 'like', '%' . request('lokasi') . '%');
        }

        $lowongan = $query->orderBy('created_at', 'desc')->paginate(12); // Pagination 12 item per halaman

        return view('lowongan-publik', compact('lowongan'));
    }

    /**
     * Tampilkan detail lowongan (tanpa perlu login)
     */
    public function detailLowongan($id)
    {
        $lowongan = Lowongan::aktif()
            ->where('id', $id)
            ->with('perusahaan')
            ->firstOrFail();

        return view('detail-lowongan-publik', compact('lowongan'));
    }
}