<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() { return view('login'); }

    public function login(Request $request)
    {
        $cred = $request->validate(['email' => 'required|email', 'password' => 'required']);

        if (Auth::attempt([...$cred, 'is_active' => true], $request->boolean('remember'))) {
            $request->session()->regenerate();
            ActivityLog::record('login', 'User login');
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['email' => 'Email/password salah atau akun nonaktif.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        ActivityLog::record('logout', 'User logout');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}