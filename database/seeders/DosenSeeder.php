<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nidn'                => '',
                'nama_dosen'          => '',
                'jk'                  => '',
                'foto_profile'        => '',
            ],

            [
                'nidn'                => '',
                'nama_dosen'          => '',
                'jk'                  => '',
                'foto_profile'        => '',
            ],

            [
                'nidn'                => '',
                'nama_dosen'          => '',
                'jk'                  => '',
                'foto_profile'        => '',
            ],

            [
                'nidn'                => '',
                'nama_dosen'          => '',
                'jk'                  => '',
                'foto_profile'        => '',
            ],
        ];

        Dosen::insert($data);
    }
}
