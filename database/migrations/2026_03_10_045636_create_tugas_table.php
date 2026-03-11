<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('tugas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('guru_id')->constrained('pengguna')->onDelete('cascade');
        $table->string('judul');
        $table->text('deskripsi');
        $table->string('mata_pelajaran');
        $table->string('kelas_target'); // tugas untuk kelas berapa
        $table->datetime('deadline');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
