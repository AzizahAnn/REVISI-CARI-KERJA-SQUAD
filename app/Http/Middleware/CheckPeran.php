<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPeran
{
    public function handle(Request $request, Closure $next, ...$peran)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userPeran = auth()->user()->peran;

        if (!in_array($userPeran, $peran)) {
            abort(403, 'Anda tidak memiliki akses ke fitur ini');
        }

        return $next($request);
    }
}