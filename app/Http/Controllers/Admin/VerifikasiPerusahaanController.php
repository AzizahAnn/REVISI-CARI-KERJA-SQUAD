<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class VerifikasiPerusahaanController extends BaseController
{
    /**
     * Daftar perusahaan yang perlu diverifikasi
     */
    public function index()
    {
        try {
            $perusahaan = Perusahaan::with('user')
                ->orderBy('created_at', 'desc')
                ->get();
                
            return view('admin.perusahaan.index', compact('perusahaan'));
            
        } catch (\Exception $e) {
            \Log::error('Daftar perusahaan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat daftar perusahaan');
        }
    }

    /**
     * Lihat detail perusahaan
     */
    public function detail($id)
    {
        try {
            $perusahaan = Perusahaan::with('user')->findOrFail($id);
            return view('admin.perusahaan.detail', compact('perusahaan'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Perusahaan tidak ditemukan');
        } catch (\Exception $e) {
            \Log::error('Detail perusahaan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat detail perusahaan');
        }
    }
    
    /**
     * Setujui perusahaan
     */
    public function setujui($id)
    {
        try {
            $perusahaan = Perusahaan::findOrFail($id);
            
            // Validasi status sebelum approve
            if ($perusahaan->status_verifikasi === 'disetujui') {
                return back()->with('warning', 'Perusahaan sudah disetujui sebelumnya');
            }
            
            $perusahaan->update([
                'status_verifikasi' => 'disetujui',
                'disetujui_oleh' => auth()->id(),
                'disetujui_tanggal' => now(),
            ]);
            
            \Log::info('Perusahaan disetujui', [
                'perusahaan_id' => $id,
                'admin_id' => auth()->id(),
                'nama_perusahaan' => $perusahaan->nama_perusahaan,
            ]);
            
            return back()->with('success', 'Perusahaan berhasil disetujui!');
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Perusahaan tidak ditemukan');
        } catch (\Exception $e) {
            \Log::error('Approve perusahaan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyetujui perusahaan');
        }
    }
    
    /**
     * Tolak perusahaan
     */
    public function tolak($id)
    {
        try {
            $perusahaan = Perusahaan::findOrFail($id);
            
            // Validasi status sebelum reject
            if ($perusahaan->status_verifikasi === 'ditolak') {
                return back()->with('warning', 'Perusahaan sudah ditolak sebelumnya');
            }
            
            $perusahaan->update([
                'status_verifikasi' => 'ditolak',
                'ditolak_oleh' => auth()->id(),
                'ditolak_tanggal' => now(),
            ]);
            
            \Log::info('Perusahaan ditolak', [
                'perusahaan_id' => $id,
                'admin_id' => auth()->id(),
                'nama_perusahaan' => $perusahaan->nama_perusahaan,
            ]);
            
            return back()->with('success', 'Perusahaan berhasil ditolak!');
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Perusahaan tidak ditemukan');
        } catch (\Exception $e) {
            \Log::error('Reject perusahaan error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menolak perusahaan');
        }
    }
}