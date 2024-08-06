<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'nama' => 'Muhammad Ichsan',
            'nip' => '117301084219481',
        ]);
        Pegawai::create([
            'nama' => 'Muhammad Fauzan',
            'nip' => '117301084219482',
        ]);
        Pegawai::create([
            'nama' => 'Muhammad fajar',
            'nip' => '117301084219483',
        ]);
        Pegawai::create([
            'nama' => 'Muhammad ardi',
            'nip' => '117301084219484',
        ]);
        Pegawai::create([
            'nama' => 'Muhammad rizky',
            'nip' => '117301084219485',
        ]);
    }
}
