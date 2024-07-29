<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bidang;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bidangs = [
            'KADIS',
            'SEKRETARIAT',
            'P2IPM',
            'PROMOSI',
            'DALAK',
            'DATIN',
            'PERIZINAN_A',
            'PERIZINAN_B',
            'PERIZINAN_C',
            'PERIZINAN_D',
            'UPTD_KEK',
        ];

        foreach ($bidangs as $nama) {
            Bidang::create(['nama' => $nama]);
        }
    }
}
