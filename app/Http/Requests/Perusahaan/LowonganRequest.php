<?php

namespace App\Http\Requests\Perusahaan;

use Illuminate\Foundation\Http\FormRequest;

class LowonganRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'tipe' => 'required|in:magang,kerja',
            'batas_akhir' => 'required|date|after:today',
        ];
    }
}