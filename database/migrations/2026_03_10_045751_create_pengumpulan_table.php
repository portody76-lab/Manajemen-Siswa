<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('pengumpulan', function (Blueprint $table) {
        $table->id();
        $table->foreignId('tugas_id')->constrained('tugas')->onDelete('cascade');
        $table->foreignId('siswa_id')->constrained('pengguna')->onDelete('cascade');
        $table->string('file_path');
        $table->enum('file_type', ['image', 'pdf']);
        $table->text('catatan')->nullable();
        $table->enum('status', ['tepat_waktu', 'terlambat'])->default('tepat_waktu');
        $table->timestamp('submitted_at')->useCurrent();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pengumpulan');
    }
};
