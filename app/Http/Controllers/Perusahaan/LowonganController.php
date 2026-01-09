<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Perusahaan\LowonganRequest;
use App\Services\LowonganService;

class LowonganController extends BaseController
{
    protected $lowonganService;

    public function __construct(LowonganService $lowonganService)
    {
        $this->lowonganService = $lowonganService;
    }

    public function index()
    {
        $lowongan = $this->lowonganService->getLowonganPerusahaan(auth()->user()->perusahaan->id);
        return view('perusahaan.lowongan.index', compact('lowongan'));
    }

    public function simpan(LowonganRequest $request)
    {
        try {
            $this->lowonganService->create($request->validated(), auth()->user()->perusahaan->id);
            return redirect()->route('perusahaan.lowongan.index')->with('success', 'Lowongan berhasil dibuat!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal membuat lowongan: ' . $e->getMessage());
        }
    }

    public function perbarui(LowonganRequest $request, $id)
    {
        try {
            $this->lowonganService->update($id, $request->validated(), auth()->user()->perusahaan->id);
            return redirect()->route('perusahaan.lowongan.detail', $id)->with('success', 'Berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal update lowongan');
        }
    }

    public function hapus($id)
    {
        try {
            $this->lowonganService->delete($id, auth()->user()->perusahaan->id);
            return redirect()->route('perusahaan.lowongan.index')->with('success', 'Berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus lowongan');
        }
    }
    
    // Method buat, detail, ubah tinggal return view saja tanpa logic berat
}