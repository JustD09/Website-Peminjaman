<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembuatan Role dan Akses untuk Admin dan User
        $admin = Role::updateOrCreate( [
            'name' => 'admin',
            'guard_name' => 'web',
        ],
            
            ['name' => 'admin','guard_name' => 'web',]
        );

        $petugas = Role::updateOrCreate( [
            'name' => 'petugas',
            'guard_name' => 'web',
        ],
            
            ['name' => 'petugas','guard_name' => 'web',]
        );

        $pegawai = Role::updateOrCreate([
            'name' => 'pegawai',
            'guard_name' => 'web',
        ],
            ['name' => 'pegawai', 'guard_name' => 'web']
    );

        // Hak Akses Admin dan User 
        // $adminRole->givePermissionTo($adminPengaduanPermission);
        // $adminRole->givePermissionTo($adminPermission);
        // $userRole->givePermissionTo($userPermission);
        // $userRole->givePermissionTo($pengaduanPermission);

        // Pemberian Role pada Admin dan User
        $admin = User::find(1);
        $admin->assignRole('admin');
        $petugas = User::find(2);
        $petugas->assignRole('petugas');
        $pegawai = User::find(3);
        $pegawai->assignRole('pegawai');
    }   
    
}
