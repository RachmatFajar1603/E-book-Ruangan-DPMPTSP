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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '081234567890',
            'nip_reg' => '1234567890',
            'bidang_id' => 1,
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user1@gmail.com',
            'phone' => '081234567891',
            'nip_reg' => '1234567891',
            'bidang_id' => 1,
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
