<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Pelamar\DaftarLowonganRequest;
use App\Services\PendaftaranService;

class PendaftaranController extends BaseController
{
    protected $pendaftaranService;

    public function __construct(PendaftaranService $pendaftaranService)
    {
        $this->pendaftaranService = $pendaftaranService;
    }

    public function daftar(DaftarLowonganRequest $request, $lowongan_id)
    {
        try {
            $this->pendaftaranService->submitLamaran($request, $lowongan_id, auth()->user()->pelamar);
            return redirect()->route('pelamar.lamaran.index')->with('success', 'Lamaran terkirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal melamar: ' . $e->getMessage());
        }
    }
}