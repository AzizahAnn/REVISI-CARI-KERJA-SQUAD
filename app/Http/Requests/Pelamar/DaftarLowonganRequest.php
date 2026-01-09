<?php

namespace App\Http\Requests\Pelamar;

use Illuminate\Foundation\Http\FormRequest;

class DaftarLowonganRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'cv' => 'required|file|mimes:pdf|max:2048',
        ];
    }
}