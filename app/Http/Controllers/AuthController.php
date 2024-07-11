<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // public function handleGoogleCallback()
    // {
    //     $oauthUser = Socialite::driver('google')->user();
    //     $email = $oauthUser->email ?? null;

    //     if ($email) {
    //         $user = User::where('email', $email)->first();

    //         if ($user) {
    //             Auth::login($user);
    //             // Redirect sesuai peran pengguna setelah login
    //             if ($user->role === 'admin') {
    //                 return redirect()->route('admin.dashboard');
    //             } else {
    //                 return redirect()->route('user.home');
    //             }
    //         } else {
    //             // Email belum terdaftar, lakukan redirect atau tampilkan pesan kesalahan
    //             return redirect()->route('login')->withErrors(['email' => 'Email not registered']);
    //         }
    //     } else {
    //         // Tangani kasus ketika email tidak ditemukan dalam respon OAuth
    //         return redirect()->route('login')->withErrors(['email' => 'Unable to retrieve email from Google.']);
    //     }
    // }

    public function handleGoogleCallback()
    {
        $oauthUser = Socialite::driver('google')->user();
        $email = $oauthUser->email ?? null;
        $name = $oauthUser->name ?? null;

        // Pastikan email dan nama tersedia
        if ($email && $name) {
            // Cari pengguna berdasarkan email
            $user = User::where('email', $email)->first();

            // Jika pengguna sudah terdaftar, login dan redirect sesuai peran
            if ($user) {
                Auth::login($user);
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.home');
                }
            } else {
                // Jika pengguna belum terdaftar, buat akun baru
                $newUser = new User();
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->email_verified_at = now();
                $newUser->password = bcrypt(Str::random(10));
                $newUser->email_verification_token = Str::random(60);
                $newUser->remember_token = Str::random(60);
                $newUser->save();

                // Login dan redirect sesuai peran
                Auth::login($newUser);
                return redirect()->route('user.home');
            }
        } else {
            // Tangani kasus ketika email atau nama tidak ditemukan dalam respon OAuth
            return redirect()->route('login')->withErrors(['email' => 'Unable to retrieve email or name from Google.']);
        }
    }



    public function handleFacebookCallback()
    {
        try {
            $oauthUser = Socialite::driver('facebook')->user();
            $email = $oauthUser->getEmail(); // Pastikan email diambil dari objek OAuth

            if ($email) {
                // Cari pengguna berdasarkan email
                $user = User::where('email', $email)->first();

                if ($user) {
                    // Jika pengguna sudah terdaftar, login dan redirect sesuai peran
                    Auth::login($user);
                    if ($user->role === 'admin') {
                        return redirect()->route('admin.dashboard');
                    } else {
                        return redirect()->route('user.home');
                    }
                } else {
                    // Jika pengguna belum terdaftar, buat akun baru
                    $newUser = new User();
                    $newUser->name = $oauthUser->getName();
                    $newUser->email = $email;
                    $newUser->email_verified_at = now();
                    $newUser->password = bcrypt(Str::random(10));
                    $newUser->email_verification_token = Str::random(60);
                    $newUser->remember_token = Str::random(60);
                    $newUser->save();

                    // Login dan redirect sesuai peran
                    Auth::login($newUser);
                    return redirect()->route('user.home');
                }
            } else {
                // Tangani kasus ketika email tidak ditemukan dalam respon OAuth
                return redirect()->route('login')->withErrors(['email' => 'Unable to retrieve email from Facebook.']);
            }
        } catch (Exception $e) {
            // Tangani kesalahan apapun yang terjadi selama proses OAuth
            return redirect()->route('login')->withErrors(['email' => 'Internal Server Error. Please try again later.']);
        }
    }
}
