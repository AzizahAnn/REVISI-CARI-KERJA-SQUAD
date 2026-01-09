<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lowongan_id')->constrained('lowongan')->onDelete('cascade');
            $table->foreignId('pelamar_id')->constrained('pelamar')->onDelete('cascade');
            $table->string('jalur_cv');
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->timestamp('tanggal_daftar')->useCurrent();
            $table->timestamps();
            
            $table->unique(['lowongan_id', 'pelamar_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran');
    }
};