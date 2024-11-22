<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255' 
        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Membuat user baru dengan data yang sudah tervalidasi
        User::create($validatedData);

        // Flash pesan sukses ke session
        // $request->session()->flash('success', 'Registration successful! Please Login');

        // Redirect ke halaman login
        return redirect('/login')->with('success', 'Registration successful! Please Login');
    }
}
