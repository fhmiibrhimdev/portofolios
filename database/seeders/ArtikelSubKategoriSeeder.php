<?php

namespace Database\Seeders;

use App\Models\ArtikelSubKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSubKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'HTML5',
                'deskripsi'       => '',
                'gambar'             => 'HTML5.png',
            ],
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'CSS3',
                'deskripsi'       => '',
                'gambar'             => 'CSS3.png',
            ],
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'JavaScript',
                'deskripsi'       => '',
                'gambar'             => 'JavaScript.png',
            ],
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'PHP',
                'deskripsi'       => '',
                'gambar'             => 'php.svg',
            ],
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'Python',
                'deskripsi'       => '',
                'gambar'             => 'Python.png',
            ],
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'Dart',
                'deskripsi'       => '',
                'gambar'             => 'Dart.png',
            ],
            [
                'id_kategori'     => '1',
                'nama_sub_kategori'  => 'C++',
                'deskripsi'       => '',
                'gambar'             => 'Cplusplus.png',
            ],
            [
                'id_kategori'     => '2',
                'nama_sub_kategori'  => 'MySQL',
                'deskripsi'       => '',
                'gambar'             => 'MySQL.png',
            ],
            [
                'id_kategori'     => '2',
                'nama_sub_kategori'  => 'MariaDB',
                'deskripsi'       => '',
                'gambar'             => 'MariaDB.png',
            ],
            [
                'id_kategori'     => '3',
                'nama_sub_kategori'  => 'NodeJS',
                'deskripsi'       => '',
                'gambar'             => 'NodeJS.svg',
            ],
            [
                'id_kategori'     => '4',
                'nama_sub_kategori'  => 'Laravel',
                'deskripsi'       => '',
                'gambar'             => 'Laravel.png',
            ],
            [
                'id_kategori'     => '4',
                'nama_sub_kategori'  => 'Tailwind',
                'deskripsi'       => '',
                'gambar'             => 'tailwindcss.png',
            ],
            [
                'id_kategori'     => '4',
                'nama_sub_kategori'  => 'Bootstrap',
                'deskripsi'       => '',
                'gambar'             => 'bootstrap.png',
            ],
            [
                'id_kategori'     => '5',
                'nama_sub_kategori'  => 'Arduino',
                'deskripsi'       => '',
                'gambar'             => 'Arduino.png',
            ],
            [
                'id_kategori'     => '5',
                'nama_sub_kategori'  => 'ESP8266',
                'deskripsi'       => '',
                'gambar'             => 'ESP8266.png',
            ],
            [
                'id_kategori'     => '5',
                'nama_sub_kategori'  => 'ESP32',
                'deskripsi'       => '',
                'gambar'             => 'ESP32.png',
            ],
            [
                'id_kategori'     => '6',
                'nama_sub_kategori'  => 'jQuery',
                'deskripsi'       => '',
                'gambar'             => 'jQuery.png',
            ],
            [
                'id_kategori'     => '6',
                'nama_sub_kategori'  => 'Github',
                'deskripsi'       => '',
                'gambar'             => 'Github.png',
            ],
            [
                'id_kategori'     => '6',
                'nama_sub_kategori'  => 'Postman',
                'deskripsi'       => '',
                'gambar'             => 'Postman.svg',
            ],
            [
                'id_kategori'     => '6',
                'nama_sub_kategori'  => 'EasyEDA',
                'deskripsi'       => '',
                'gambar'             => 'EasyEDA.jpg',
            ],
            [
                'id_kategori'     => '6',
                'nama_sub_kategori'  => 'NGINX',
                'deskripsi'       => '',
                'gambar'             => 'Nginx.png',
            ],
            [
                'id_kategori'     => '6',
                'nama_sub_kategori'  => 'MQTT',
                'deskripsi'       => '',
                'gambar'             => 'MQTT.png',
            ],
            [
                'id_kategori'     => '7',
                'nama_sub_kategori'  => 'Ubuntu',
                'deskripsi'       => '',
                'gambar'             => 'Ubuntu.png',
            ],
            [
                'id_kategori'     => '7',
                'nama_sub_kategori'  => 'Filezilla',
                'deskripsi'       => '',
                'gambar'             => 'Filezilla.png',
            ],
            [
                'id_kategori'     => '7',
                'nama_sub_kategori'  => 'CLI',
                'deskripsi'       => '',
                'gambar'             => 'CLI.jpg',
            ],
        ];

        ArtikelSubKategori::insert($data);
    }
}
