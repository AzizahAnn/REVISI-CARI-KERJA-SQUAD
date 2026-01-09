<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lowongan', function (Blueprint $table) {
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('disetujui_tanggal')->nullable();
            $table->unsignedBigInteger('ditolak_oleh')->nullable();
            $table->timestamp('ditolak_tanggal')->nullable();
        });

        Schema::table('perusahaan', function (Blueprint $table) {
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('disetujui_tanggal')->nullable();
            $table->unsignedBigInteger('ditolak_oleh')->nullable();
            $table->timestamp('ditolak_tanggal')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('lowongan', function (Blueprint $table) {
            $table->dropColumn(['disetujui_oleh', 'disetujui_tanggal', 'ditolak_oleh', 'ditolak_tanggal']);
        });

        Schema::table('perusahaan', function (Blueprint $table) {
            $table->dropColumn(['disetujui_oleh', 'disetujui_tanggal', 'ditolak_oleh', 'ditolak_tanggal']);
        });
    }
};