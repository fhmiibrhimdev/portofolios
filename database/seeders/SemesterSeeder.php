<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_semester'       => 'SMT1',
                'nama_semester'       => 'Semester 1',
                'status'              => '1',
            ],

            [
                'kode_semester'       => 'SMT2',
                'nama_semester'       => 'Semester 2',
                'status'              => '0',
            ],

            [
                'kode_semester'       => 'SMT3',
                'nama_semester'       => 'Semester 3',
                'status'              => '0',
            ],
            [
                'kode_semester'       => 'SMT4',
                'nama_semester'       => 'Semester 4',
                'status'              => '0',
            ],
            [
                'kode_semester'       => 'SMT5',
                'nama_semester'       => 'Semester 5',
                'status'              => '0',
            ],
            [
                'kode_semester'       => 'SMT6',
                'nama_semester'       => 'Semester 6',
                'status'              => '0',
            ],
        ];

        Semester::insert($data);
    }
}
