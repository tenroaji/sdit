<?php

namespace Database\Seeders;

use App\Models\Strata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Taman Kanak-Kanak',
                'deskripsi' => 'Taman Kanak-kanak, PAUD atau Setara',
            ],
            [
                'nama' => 'Ibtidaiyyah',
                'deskripsi' => 'Sekolah Dasar atau Setara',
            ],
            [
                'nama' => 'Tsanawiyah',
                'deskripsi' => 'Sekolah Menengah Pertama atau Setara',
            ],
            [
                'nama' => 'Aliyah',
                'deskripsi' => 'Sekolah Menengah Umum atau Setara',
            ],
            [
                'nama' => 'Perguruan Tinggi',
                'deskripsi' => 'Perguruan Tinggi atau Setara',
            ],
        ];
        Strata::insert($data);
    }
}
