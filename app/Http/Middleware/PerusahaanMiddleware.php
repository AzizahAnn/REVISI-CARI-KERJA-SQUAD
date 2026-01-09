<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerusahaanMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect()->route('perusahaan.masuk')
                ->with('error', 'Silakan login terlebih dahulu.');
        }
        
        // Cek apakah user adalah perusahaan
        if (!auth()->user()->adalahPerusahaan()) {
            return redirect()->route('pilih.peran')
                ->with('error', 'Halaman ini hanya untuk perusahaan.');
        }
        
        return $next($request);
    }
}