<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Unit;
use App\Perusahaan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;  // Menambahkan import Validator


class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $units = Unit::with('perusahaan')->get();
        return view('register', compact('units'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'id_unit' => 'required|exists:units,id_unit',
            'email_user' => 'required|email|unique:tb_user,email_user',
            'perner' => 'required|unique:tb_user,perner',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'id_unit' => $request->id_unit,
            'email_user' => $request->email_user,
            'perner' => $request->perner,
            'password' => Hash::make($request->password),
            'role_user' => 'user',
            'aktif' => 1,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
