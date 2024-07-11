<?php

namespace App\Http\Controllers;

use App\Mail\VerifikasiEmail;
use App\Models\Produk;
use App\Models\TipeKriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function dashboard()
    {
        $tipe = TipeKriteria::count();
        $produk = Produk::count();
        $admin = User::where('role', 'Administrator')->count();
        $user = User::where('role', 'User')->count();
        return view('admin.dashboard', compact('produk', 'tipe', 'admin', 'user'));
    }

    public function userAll()
    {
        // Filter users based on their roles
        $adminUsers = User::where('role', 'Administrator')->get();
        $userUsers = User::where('role', 'User')->get();

        // Return the view with filtered users
        return view('admin.akun', compact('adminUsers', 'userUsers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $token = Str::random(32); // Generate email verification token

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10), // Generate remember token (optional)
            'email_verified_at' => null, // Initial email verification status
            'role' => $request->role,
            'email_verification_token' => $token, // Store email verification token
        ]);

        // Send verification email
        $verificationUrl = url('/verify-email?token=' . $token);
        Mail::to($user->email)->send(new VerifikasiEmail($user->name, $verificationUrl));

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
