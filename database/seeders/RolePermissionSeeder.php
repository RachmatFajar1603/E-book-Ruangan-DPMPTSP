<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view_home']);
        Permission::create(['name' => 'view_beranda']);
        Permission::create(['name' => 'view_datapegawai']);
        Permission::create(['name' => 'view_dataruangan']);
        Permission::create(['name' => 'view_datapengguna']);
        Permission::create(['name' => 'view_datapeminjaman']);
        Permission::create(['name' => 'view_pinjamruangan']);
        Permission::create(['name' => 'view_peminjamansaya']);
        Permission::create(['name' => 'view_laporan']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo([
            'view_home',
            'view_beranda',
            'view_datapegawai',
            'view_dataruangan',
            'view_datapengguna',
            'view_datapeminjaman',
            'view_pinjamruangan',
            'view_peminjamansaya',
            'view_laporan',
        ]);

        $roleUser = Role::findByName('user');
        $roleUser->givePermissionTo([
            'view_home',
            'view_datapeminjaman',
            'view_pinjamruangan',
            'view_peminjamansaya',
            'view_laporan',
        ]);
    }
}
