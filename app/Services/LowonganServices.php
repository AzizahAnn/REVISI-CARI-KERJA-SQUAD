<?php

namespace App\Services;

use App\Models\Lowongan;

class LowonganService extends BaseService
{
    public function getLowonganPerusahaan($perusahaanId)
    {
        return Lowongan::where('perusahaan_id', $perusahaanId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function create(array $data, $perusahaanId)
    {
        $data['perusahaan_id'] = $perusahaanId;
        $data['status'] = 'menunggu';
        return Lowongan::create($data);
    }

    public function findOwned($id, $perusahaanId)
    {
        return Lowongan::where('id', $id)
            ->where('perusahaan_id', $perusahaanId)
            ->firstOrFail();
    }

    public function update($id, array $data, $perusahaanId)
    {
        $lowongan = $this->findOwned($id, $perusahaanId);
        $lowongan->update($data);
        return $lowongan;
    }

    public function delete($id, $perusahaanId)
    {
        $lowongan = $this->findOwned($id, $perusahaanId);
        return $lowongan->delete();
    }
}