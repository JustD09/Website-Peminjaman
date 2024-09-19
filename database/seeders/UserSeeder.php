<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'jabatan'=> 'Admin',
            'password' => Hash::make('admin')
        ]);

        $admin->assignRole('admin');

        $petugas = User::create([
            'name' => 'petugas',
            'email' => 'petugas@petugas.com',
            'jabatan'=> 'Petugas',
            'password' => Hash::make('petugas')
        ]);

        $petugas->assignRole('petugas');

        $pegawai = User::create([
            'name' => 'pegawai',
            'email' => 'pegawai@pegawai.com',
            'jabatan'=> 'Pegawai',
            'password' => Hash::make('pegawai')
        ]);

        $pegawai->assignRole('pegawai');
    }
}
