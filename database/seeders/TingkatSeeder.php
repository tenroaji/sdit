<?php

namespace Database\Seeders;

use App\Models\Tingkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'I',
                'deskripsi' => 'Kelas 1 SD atau setara',
            ],
            [
                'nama' => 'II',
                'deskripsi' => 'Kelas 2 SD atau setara',
            ],
            [
                'nama' => 'III',
                'deskripsi' => 'Kelas 3 SD atau setara',
            ],
            [
                'nama' => 'IV',
                'deskripsi' => 'Kelas 4 SD atau setara',
            ],
            [
                'nama' => 'V',
                'deskripsi' => 'Kelas 5 SD atau setara',
            ],
            [
                'nama' => 'VI',
                'deskripsi' => 'Kelas 6 SD atau setara',
            ],
            [
                'nama' => 'VII',
                'deskripsi' => 'Kelas 7 atau kelas 1 SMP, Tsanawiyah atau setara',
            ],
            [
                'nama' => 'VIII',
                'deskripsi' => 'Kelas 8 atau kelas 2 SMP, Tsanawiyah atau setara',
            ],
            [
                'nama' => 'IX',
                'deskripsi' => 'Kelas 9 atau kelas 3 SMP, Tsanawiyah atau setara',
            ],
            [
                'nama' => 'X',
                'deskripsi' => 'Kelas 10 atau kelas 1 SMU, Aliyah atau setara',
            ],
            [
                'nama' => 'XI',
                'deskripsi' => 'Kelas 11 atau kelas 2 SMU, Aliyah atau setara',
            ],
            [
                'nama' => 'XII',
                'deskripsi' => 'Kelas 12 atau kelas 3 SMU, Aliyah atau setara',
            ],
            [
                'nama' => 'Perguruan Tinggi',
                'deskripsi' => 'Perguruan TInggi',
            ],
            [
                'nama' => 'O Kecil',
                'deskripsi' => 'Kelas 0 kecil Untuk TK Paud atau setara',
            ],
            [
                'nama' => 'O Besar',
                'deskripsi' => 'Kelas 0 Besar Untuk TK Paud atau setara',
            ],
        ];
        Tingkat::insert($data);
    }
}
