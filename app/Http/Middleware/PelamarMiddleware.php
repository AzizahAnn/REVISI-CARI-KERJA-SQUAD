<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PelamarMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('pelamar.masuk')
                ->with('error', 'Silakan login terlebih dahulu.');
        }
        
        if (!auth()->user()->adalahPelamar()) {
            return redirect()->route('pilih.peran')
                ->with('error', 'Halaman ini hanya untuk pelamar.');
        }
        
        return $next($request);
    }
}