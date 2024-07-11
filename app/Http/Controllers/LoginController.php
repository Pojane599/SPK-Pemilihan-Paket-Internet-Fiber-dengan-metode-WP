<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Tambahkan kondisi untuk memeriksa apakah email_verified_at sudah terisi
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Periksa apakah user telah diverifikasi emailnya
            if ($user->email_verified_at !== null) {
                if ($user->role === 'Administrator') {
                    return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
                } else {
                    return redirect()->route('user.home')->with('success', 'Login berhasil!');
                }
            } else {
                Auth::logout(); // Logout user jika email belum diverifikasi
                return redirect()->route('login')->with('failed', 'Email belum diverifikasi. Silakan periksa email Anda.');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
    public function logout()
    {
        Auth::logout(); // Lakukan proses logout

        return redirect()->route('login'); // Redirect kembali ke halaman login
    }
}
