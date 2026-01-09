<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('admin.masuk')
                ->with('error', 'Silakan login terlebih dahulu.');
        }
        
        if (!auth()->user()->adalahAdmin()) {
            return redirect()->route('pilih.peran')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        return $next($request);
    }
}