<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses Autentikasi Login Admin
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name'    => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect langsung ke Dashboard Admin setelah sukses login
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'name' => 'Nama atau password yang Anda masukkan salah.',
        ])->onlyInput('name');
    }

    // Memproses Logout Admin
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Pastikan mengarah ke route('dashboard') yaitu halaman utama '/'
        return redirect()->route('dashboard'); 
    }
}
