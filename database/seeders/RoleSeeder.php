<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate( [
            'name' => 'admin',
            'guard_name' => 'web',
        ],
            
            ['name' => 'admin','guard_name' => 'web',]
        );

        Role::updateOrCreate( [
            'name' => 'petugas',
            'guard_name' => 'web',
        ],
            
            ['name' => 'petugas','guard_name' => 'web',]
        );

        Role::updateOrCreate( [
            'name' => 'pegawai',
            'guard_name' => 'web',
        ],
            
            ['name' => 'pegawai','guard_name' => 'web',]
        );
    }
}
