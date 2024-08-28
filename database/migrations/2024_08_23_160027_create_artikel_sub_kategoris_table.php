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
        Schema::create('artikel_sub_kategori', function (Blueprint $table) {
            $table->id();
            $table->text('id_kategori');
            $table->text('nama_sub_kategori');
            $table->text('deskripsi')->default('-');
            $table->text('gambar')->default('-');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_sub_kategori');
    }
};
