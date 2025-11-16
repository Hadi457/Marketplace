<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Index()
    {
        return view('login');
    }
    public function Register()
    {
        return view('register');
    }
    public function Regist(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'kontak' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        // Simpan User Baru dengan role 'member'
        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'kontak' => $validated['kontak'],
            'role' => 'member',
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('login')->with('pesan', 'Registrasi berhasil! Silakan login.');
    }
    public function Authentication(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Login & redirect sesuai role (Admin, Operator, selain itu logout)
        if(Auth::attempt($validated)){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->route('dashboard');
            }
            elseif ($user->role === 'member') {
                return redirect()->route('beranda');
            }
            else {
                Auth::logout();
                return redirect()->route('login')->with('pesan', 'Access denied. Invalid role.');
            }
        } else {
        // Kalau username / password salah dikembalika ke halaman login
            return redirect()->route('login')->with('pesan', 'Username atau Password salah!');
        }
        
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
