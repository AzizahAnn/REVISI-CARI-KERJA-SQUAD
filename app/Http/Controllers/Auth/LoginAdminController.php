<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    // Tampilkan halaman login admin
    public function tampilkanFormMasuk()
    {
        // Jika sudah login, langsung ke dashboard
        if (auth()->check() && auth()->user()->adalahAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('auth.masuk.admin');
    }
    
    // Proses login
    public function masuk(Request $request)
    {
        // Validasi input
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);
        
        // Cek email, password, DAN peran sekaligus
        if (Auth::attempt(array_merge($kredensial, ['peran' => 'admin']), $request->filled('ingat_saya'))) {
            $request->session()->regenerate();
            
            return redirect()->route('admin.dashboard')
                ->with('success', 'Selamat datang, ' . auth()->user()->name);
        }
        
        return back()
            ->withInput($request->only('email'))
            ->with('error', 'Email atau password salah, atau Anda bukan admin.');
    }
    
    // Proses logout
    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('pilih.peran')
            ->with('success', 'Anda berhasil keluar.');
    }
}