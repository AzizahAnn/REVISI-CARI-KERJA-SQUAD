<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class VerifikasiPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.perusahaan.index', compact('perusahaan'));
    }
    
    public function setujui($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update(['status_verifikasi' => 'disetujui']);
        
        return back()->with('success', 'Perusahaan berhasil disetujui!');
    }
    
    public function tolak($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update(['status_verifikasi' => 'ditolak']);
        
        return back()->with('success', 'Perusahaan ditolak.');
    }
}