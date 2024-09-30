<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan Anda sudah memiliki model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register'); // Tampilkan form registrasi
    }

    public function store(Request $request)
    {
        // 1. Validasi data dari form registrasi
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Buat user baru di database
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // 3. Loginkan user secara otomatis (opsional)
        Auth::login($user);

        // 4. Redirect ke halaman yang sesuai (misalnya, dashboard)
        return redirect('/'); 
    }
}