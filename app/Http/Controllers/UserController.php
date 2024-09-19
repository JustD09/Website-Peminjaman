<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        $roles = Role::all(); // Ambil semua role yang tersedia
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'jabatan' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);
        
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->jabatan = $validated['jabatan'];
        $user->password = Hash::make($validated['password']);
        $user->role = $validated['role'];

        // $user->assignRole($request->role);
        
        $user->save();

        return redirect()->route('user')->with('success', 'Akses Berhasil Dibuat');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('danger', 'DATA BERHASIL DIHAPUS !');
    }
}

