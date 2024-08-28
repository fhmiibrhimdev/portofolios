<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_dosen'            => '',
                'kode_matkul'         => '',
                'nama_matkul'         => '',
                'sks'                 => '0',
            ],

            [
                'id_dosen'            => '',
                'kode_matkul'         => '',
                'nama_matkul'         => '',
                'sks'                 => '0',
            ],

            [
                'id_dosen'            => '',
                'kode_matkul'         => '',
                'nama_matkul'         => '',
                'sks'                 => '0',
            ],

            [
                'id_dosen'            => '',
                'kode_matkul'         => '',
                'nama_matkul'         => '',
                'sks'                 => '0',
            ],
        ];

        MataKuliah::insert($data);
    }
}
