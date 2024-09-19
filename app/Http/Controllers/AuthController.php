<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'Jabatan' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed'
    ]);

    // Buat user baru
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'Jabatan' => $validatedData['Jabatan'],
        'role' => $validatedData['role'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Redirect ke halaman login dengan pesan sukses
    return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan login.');
}

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
             ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.admin_dashboard');
        } elseif ($user->hasRole('petugas')) {
            return redirect()->route('petugas.petugas_dashboard');
        } elseif ($user->hasRole('pegawai')) {
            return redirect()->route('pegawai.pegawai_dashboard');
        } else {
            return redirect('/welcome');
        }
    }
    
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
}
