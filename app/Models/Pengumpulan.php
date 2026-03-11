<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tugas;
use App\Models\User;

class Pengumpulan extends Model
{
    protected $fillable = ['tugas_id', 'siswa_id', 'file_path', 'file_type', 'catatan', 'status'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
