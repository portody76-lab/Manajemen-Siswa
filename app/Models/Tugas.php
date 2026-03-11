<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pengumpulan;

class Tugas extends Model
{
    protected $fillable = ['guru_id', 'judul', 'deskripsi', 'mata_pelajaran', 'kelas_target', 'deadline'];

    protected $casts = ['deadline' => 'datetime'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function pengumpulans()
    {
        return $this->hasMany(Pengumpulan::class);
    }

    // cek apakah siswa sudah mengumpulkan
    public function sudahDikumpulkan($siswaId): bool
    {
        return $this->pengumpulans()->where('siswa_id', $siswaId)->exists();
    }
}
