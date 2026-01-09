<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class VerifikasiLowonganController extends BaseController
{
    /**
     * Daftar lowongan yang perlu diverifikasi
     */
    public function index()
    {
        try {
            $lowongan = Lowongan::with('perusahaan')
                ->orderBy('created_at', 'desc')
                ->get();
                
            return view('admin.lowongan.index', compact('lowongan'));
            
        } catch (\Exception $e) {
            \Log::error('Daftar lowongan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat daftar lowongan');
        }
    }
    
    /**
     * Lihat detail lowongan
     */
    public function detail($id)
    {
        try {
            $lowongan = Lowongan::with('perusahaan')->findOrFail($id);
            return view('admin.lowongan.detail', compact('lowongan'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Lowongan tidak ditemukan');
        } catch (\Exception $e) {
            \Log::error('Detail lowongan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat detail lowongan');
        }
    }
    
    /**
     * Setujui lowongan
     */
    public function setujui($id)
    {
        try {
            $lowongan = Lowongan::findOrFail($id);
            
            // Validasi status sebelum approve
            if ($lowongan->status === 'aktif') {
                return back()->with('warning', 'Lowongan sudah disetujui sebelumnya');
            }
            
            $lowongan->update([
                'status' => 'aktif',
                'disetujui_oleh' => auth()->id(),
                'disetujui_tanggal' => now(),
            ]);
            
            \Log::info('Lowongan disetujui', [
                'lowongan_id' => $id,
                'admin_id' => auth()->id(),
                'posisi' => $lowongan->posisi,
            ]);
            
            return back()->with('success', 'Lowongan berhasil disetujui dan diaktifkan!');
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Lowongan tidak ditemukan');
        } catch (\Exception $e) {
            \Log::error('Approve lowongan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyetujui lowongan');
        }
    }
    
    /**
     * Tolak lowongan
     */
    public function tolak($id)
    {
        try {
            $lowongan = Lowongan::findOrFail($id);
            
            // Validasi status sebelum reject
            if ($lowongan->status === 'nonaktif') {
                return back()->with('warning', 'Lowongan sudah ditolak sebelumnya');
            }
            
            $lowongan->update([
                'status' => 'nonaktif',
                'ditolak_oleh' => auth()->id(),
                'ditolak_tanggal' => now(),
            ]);
            
            \Log::info('Lowongan ditolak', [
                'lowongan_id' => $id,
                'admin_id' => auth()->id(),
                'posisi' => $lowongan->posisi,
            ]);
            
            return back()->with('success', 'Lowongan berhasil ditolak!');
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Lowongan tidak ditemukan');
        } catch (\Exception $e) {
            \Log::error('Reject lowongan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menolak lowongan');
        }
    }
}