<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('nama');
            $table->string('nisnim')->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('jurusan')->nullable();
            $table->string('kontak_peserta')->nullable();
            $table->year('tahun_aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
