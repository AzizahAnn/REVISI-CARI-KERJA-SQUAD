<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class VerifikasiLowonganController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::with('perusahaan')->orderBy('created_at', 'desc')->get();
        return view('admin.lowongan.index', compact('lowongan'));
    }
    
    public function detail($id)
    {
        $lowongan = Lowongan::with('perusahaan')->findOrFail($id);
        return view('admin.lowongan.detail', compact('lowongan'));
    }
    
    public function setujui($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update(['status' => 'aktif']);
        
        return back()->with('success', 'Lowongan berhasil disetujui dan diaktifkan!');
    }
    
    public function tolak($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->update(['status' => 'nonaktif']);
        
        return back()->with('success', 'Lowongan ditolak.');
    }
}