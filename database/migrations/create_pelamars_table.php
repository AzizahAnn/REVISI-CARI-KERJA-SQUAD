<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ini adalah tabel PROFIL pelamar
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            // Relasi 1-to-1 ke tabel 'users'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('jurusan');
            $table->string('cv')->nullable(); // Path ke file CV
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelamars');
    }
};