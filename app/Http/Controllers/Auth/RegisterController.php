<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Proses registrasi user.
     */
    public function register(RegisterRequest $request)
    {
        try {
            // Panggil service untuk mendaftarkan user & profil
            $user = $this->authService->register($request->validated());

            // Otomatis login setelah daftar
            Auth::login($user);

            // Redirect berdasarkan peran
            if ($user->peran === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->peran === 'perusahaan') {
                return redirect()->route('perusahaan.dashboard')
                    ->with('success', 'Registrasi berhasil! Silakan lengkapi profil perusahaan Anda.');
            }

            return redirect()->route('pelamar.dashboard')
                ->with('success', 'Selamat datang! Akun Anda berhasil dibuat.');

        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.');
        }
    }
}