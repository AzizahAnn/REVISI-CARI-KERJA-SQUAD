<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LowonganController extends Controller
{
    // Tampilkan daftar lowongan milik perusahaan
    public function index()
    {
        $perusahaan = auth()->user()->perusahaan;
        $lowongan = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('perusahaan.lowongan.index', compact('lowongan'));
    }
    
    // Tampilkan form buat lowongan
    public function buat()
    {
        return view('perusahaan.lowongan.buat');
    }
    
    // Simpan lowongan baru
    public function simpan(Request $request)
    {
        $request->validate([
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'tipe' => 'required|in:magang,kerja',
            'batas_akhir' => 'required|date|after:today',
        ], [
            'posisi.required' => 'Posisi wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'persyaratan.required' => 'Persyaratan wajib diisi',
            'lokasi.required' => 'Lokasi wajib diisi',
            'tipe.required' => 'Tipe lowongan wajib dipilih',
            'tipe.in' => 'Tipe lowongan tidak valid',
            'batas_akhir.required' => 'Batas akhir wajib diisi',
            'batas_akhir.after' => 'Batas akhir harus setelah hari ini',
        ]);
        
        $perusahaan = auth()->user()->perusahaan;
        
        Lowongan::create([
            'perusahaan_id' => $perusahaan->id,
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'lokasi' => $request->lokasi,
            'tipe' => $request->tipe,
            'batas_akhir' => $request->batas_akhir,
            'status' => 'menunggu', // menunggu approval admin
        ]);
        
        return redirect()->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil dibuat! Menunggu verifikasi admin.');
    }
    
    // Tampilkan detail lowongan
    public function detail($id)
    {
        $perusahaan = auth()->user()->perusahaan;
        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();
        
        return view('perusahaan.lowongan.detail', compact('lowongan'));
    }
    
    // Tampilkan form edit
    public function ubah($id)
    {
        $perusahaan = auth()->user()->perusahaan;
        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();
        
        return view('perusahaan.lowongan.ubah', compact('lowongan'));
    }
    
    // Update lowongan
    public function perbarui(Request $request, $id)
    {
        $request->validate([
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'tipe' => 'required|in:magang,kerja',
            'batas_akhir' => 'required|date|after:today',
        ]);
        
        $perusahaan = auth()->user()->perusahaan;
        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();
        
        $lowongan->update([
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'lokasi' => $request->lokasi,
            'tipe' => $request->tipe,
            'batas_akhir' => $request->batas_akhir,
        ]);
        
        return redirect()->route('perusahaan.lowongan.detail', $id)
            ->with('success', 'Lowongan berhasil diperbarui!');
    }
    
    // Hapus lowongan
    public function hapus($id)
    {
        $perusahaan = auth()->user()->perusahaan;
        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();
        
        $lowongan->delete();
        
        return redirect()->route('perusahaan.lowongan.index')
            ->with('success', 'Lowongan berhasil dihapus!');
    }
}