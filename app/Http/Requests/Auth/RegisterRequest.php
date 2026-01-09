<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'peran' => 'required|in:pelamar,perusahaan',
            'no_identitas' => 'nullable|string|max:20', // Opsional untuk pelamar
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'peran.in' => 'Peran harus pelamar atau perusahaan.',
        ];
    }
}