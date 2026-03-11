<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // ─── Dashboard ───────────────────────────────────────

    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('role')
            ->paginate(10)
            ->withQueryString();

        $totalSiswa       = User::where('role', 'siswa')->count();
        $totalTugas       = Tugas::count();
        $totalPengumpulan = Pengumpulan::count();

        return view('guru.dashboard', compact(
            'users',
            'totalSiswa',
            'totalTugas',
            'totalPengumpulan'
        ));
    }

    // ─── Kelola Siswa ────────────────────────────────────

    // Daftar semua siswa
    public function siswaIndex(Request $request)
    {
        $search = $request->input('search');

        $siswa = User::where('role', 'siswa')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('kelas', 'like', "%{$search}%");
            })
            ->orderBy('kelas')
            ->orderBy('absen')
            ->paginate(15)
            ->withQueryString();

        return view('guru.siswa.index', compact('siswa'));
    }

    // Form edit siswa
    public function siswaEdit(User $siswa)
    {
        return view('guru.siswa.edit', compact('siswa'));
    }

    // Simpan perubahan data siswa
    public function siswaUpdate(Request $request, User $siswa)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email,' . $siswa->id,
            'absen' => 'required|integer',
            'kelas' => 'required|string|max:50',
        ], [
            'name.required'  => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique'   => 'Email sudah digunakan.',
            'absen.required' => 'Nomor absen wajib diisi.',
            'absen.integer'  => 'Nomor absen harus berupa angka.',
            'kelas.required' => 'Kelas wajib diisi.',
        ]);

        $siswa->update($request->only('name', 'email', 'absen', 'kelas'));

        return redirect()->route('guru.siswa.index')
                         ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Hapus siswa
    public function siswaDestroy(User $siswa)
    {
        $siswa->delete();

        return redirect()->route('guru.siswa.index')
                         ->with('success', 'Siswa berhasil dihapus.');
    }

    // ─── Semua Tugas ─────────────────────────────────────

    public function tugasIndex(Request $request)
    {
        $search = $request->input('search');

        $tugas = Tugas::with('guru')
            ->when($search, function ($query, $search) {
                $query->where('judul', 'like', "%{$search}%")
                      ->orWhere('mata_pelajaran', 'like', "%{$search}%")
                      ->orWhere('kelas_target', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('guru.semua-tugas.index', compact('tugas'));
    }

    // ─── Semua Pengumpulan ───────────────────────────────

    public function pengumpulanIndex(Request $request)
    {
        $search = $request->input('search');

        $pengumpulan = Pengumpulan::with(['siswa', 'tugas'])
            ->when($search, function ($query, $search) {
                $query->whereHas('siswa', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('tugas', function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%");
                });
            })
            ->orderBy('submitted_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('guru.semua-pengumpulan.index', compact('pengumpulan'));
    }
}