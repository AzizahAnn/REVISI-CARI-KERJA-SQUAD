<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lowongan_id')->constrained('lowongans')->onDelete('cascade');
            $table->foreignId('pelamar_id')->constrained('pelamars')->onDelete('cascade');
            $table->date('tanggal_daftar')->default(now());
            $table->enum('status_lamaran', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->timestamps();
            
            // Mencegah pelamar melamar 2x di lowongan yang sama
            $table->unique(['lowongan_id', 'pelamar_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};