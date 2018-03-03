<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            if (Auth::user()->status == '1') {
                $hakAkses = Auth::user()->hak_akses->slug;
                if ($hakAkses == 'staff') {
                    return redirect()->route('getStaffHomePage');
                } elseif ($hakAkses == 'asmen') {
                    dd('Hak Akses : Asmen');
                } elseif ($hakAkses == 'instruktur') {
                    return redirect()->route('getInstrukturHomePage');
                } elseif ($hakAkses == 'peserta') {
                    return redirect()->route('getPesertaHomePage');
                } elseif ($hakAkses == 'pimpinan') {
                    return redirect()->route('getPimpinanHomePage');
                } else {
                    return redirect()->route('getLogout');
                }
            } else {
                return redirect()->route('getLogout');
            }
        }

        return $next($request);
    }
}
