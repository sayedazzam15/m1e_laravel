<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function createAdmin(): View
    {
        return view('auth.login-admin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        
        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function storeAdmin(LoginRequest $request): RedirectResponse
    {
        $guards = ['admin','supervisor'];
        $is_logged_in = false;
        for ($i=0; $i < $guards; $i++) { 
            if(Auth::guard($guards[$i])->attempt($request->only('email','password'))){
                $is_logged_in = true;
            }
            if($is_logged_in) break;
        }
        
        if(!$is_logged_in) throw ValidationException::withMessages(['email'=> 'invalid email']);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
