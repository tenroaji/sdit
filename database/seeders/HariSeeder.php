<?php

namespace Database\Seeders;

use App\Models\HariSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Senin',
                'deskripsi' => 'Hari Senin',
            ],
            [
                'nama' => 'Selasa',
                'deskripsi' => 'Hari Selasa',
            ],
            [
                'nama' => 'Rabu',
                'deskripsi' => 'Rabu',
            ],
            [
                'nama' => 'Kamis',
                'deskripsi' => 'Kamis',
            ],
            [
                'nama' => 'Jumat',
                'deskripsi' => 'Jumat',
            ],
            [
                'nama' => 'Sabtu',
                'deskripsi' => 'Sabtu',
            ],
            [
                'nama' => 'Minggu',
                'deskripsi' => 'Minggu',
            ],
        ];
        HariSekolah::insert($data);
    }
}
