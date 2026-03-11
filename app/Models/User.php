<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Tugas;
use App\Models\Pengumpulan;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna'; // ← sesuaikan nama tabel

    protected $fillable = [
        'name',
        'absen',
        'kelas',
        'email',
        'password',
        'role',   // ← tambah
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ← tambah relasi di bawah ini

    // Guru memiliki banyak tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'guru_id');
    }

    // Siswa memiliki banyak pengumpulan
    public function pengumpulans()
    {
        return $this->hasMany(Pengumpulan::class, 'siswa_id');
    }

    // Helper: cek role
    public function isGuru(): bool
    {
        return $this->role === 'guru';
    }

    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }
}