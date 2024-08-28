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
        Schema::create('artikel_postingan', function (Blueprint $table) {
            $table->id();
            $table->text('id_user');
            $table->text('id_sub_kategori');
            $table->text('tanggal')->default(date('Y-m-d'));
            $table->text('judul');
            $table->text('slug');
            $table->text('deskripsi');
            $table->text('isi_konten');
            $table->enum('status_publish', ['Published', 'Privated', 'Draft']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_postingan');
    }
};
