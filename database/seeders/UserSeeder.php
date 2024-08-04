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
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'nama' => 'user',
            'email' => 'user1@gmail.com',
            'telepon' => '081234567891',
            'nip_reg' => '1234567891',
            'bidang_id' => 1,
            'keterangan' =>'EKSTERNAL',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
