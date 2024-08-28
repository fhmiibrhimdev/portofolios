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
        Schema::create('catatan', function (Blueprint $table) {
            $table->id();
            $table->text('id_matkul');
            $table->text('judul');
            $table->text('slug');
            $table->text('isi_catatan');
            $table->text('tgl_dibuat')->default(date('Y-m-d'));
            $table->enum('status', ['Belum Dimulai', 'Proses Review', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan');
    }
};
