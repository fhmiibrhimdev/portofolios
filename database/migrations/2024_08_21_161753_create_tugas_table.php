<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->text('id_matkul');
            $table->text('tgl')->default(date('Y-m-d'));
            $table->text('tgl_deadline')->default(date('Y-m-d'));
            $table->text('judul_tugas')->default('-');
            $table->text('deskripsi')->default('-');
            $table->text('jawaban')->default('-');
            $table->enum('kategori', ['Tugas', 'Pembelajaran', 'Ujian', 'Quis', 'Project', 'Pekerjaan', 'Pertemuan'])->default('Tugas');
            $table->enum('tipe', ['Kuliah', 'Organisasi', 'Personal', 'Lomba'])->default('Kuliah');
            $table->enum('status', ['Selesai', 'Sedang Berlangsung', 'Belum'])->default('Belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
