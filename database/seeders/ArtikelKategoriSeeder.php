<?php

namespace Database\Seeders;

use App\Models\ArtikelKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori'  => 'Languages'],
            ['nama_kategori'  => 'Databases'],
            ['nama_kategori'  => 'JavaScript Library'],
            ['nama_kategori'  => 'Framework'],
            ['nama_kategori'  => 'Microcontroller'],
            ['nama_kategori'  => 'Others'],
            ['nama_kategori'  => 'Server'],
        ];

        ArtikelKategori::insert($data);
    }
}
