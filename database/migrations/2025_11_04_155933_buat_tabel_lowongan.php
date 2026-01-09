<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->onDelete('cascade');
            $table->string('posisi');
            $table->text('deskripsi');
            $table->text('persyaratan');
            $table->string('lokasi');
            $table->enum('tipe', ['magang', 'kerja']);
            $table->date('batas_akhir');
            $table->enum('status', ['menunggu', 'aktif', 'nonaktif'])->default('menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lowongan');
    }
};