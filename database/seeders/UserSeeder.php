<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'telepon' => '081234567890',
            'nip_reg' => '1234567890',
            'bidang_id' => 1,
            'keterangan' =>'INTERNAL',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole('superadmin');

        $adminBidang = User::create([
            'nama' => 'Admin Bidang',
            'email' => 'adminbidang@gmail.com',
            'telepon' => '081234567891',
            'nip_reg' => '1234567892',
            'bidang_id' => 1,
            'keterangan' =>'INTERNAL',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);

        $adminBidang->assignRole('adminbidang');

        $user = User::create([
            'nama' => 'User',
            'email' => 'user1@gmail.com',
            'telepon' => '081234567892',
            'nip_reg' => '1234567891',
            'bidang_id' => 1,
            'keterangan' =>'INTERNAL',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('user');
    }
}
