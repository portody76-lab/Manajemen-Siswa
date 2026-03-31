<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    // Form buat akun baru
    public function buatAkunIndex()
    {
        return view('guru.buat-akun');
    }

    public function buatAkunStore(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pengguna,email',
            'password' => 'required|min:8|confirmed',
            'role'     => 'required|in:guru,siswa',
            'absen'    => 'nullable|integer',
            'tingkat'  => 'nullable|string',
            'kelas'    => 'nullable|string',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'absen'    => $request->role === 'siswa' ? $request->absen : null,
            'kelas'    => $request->role === 'siswa' ? $request->kelas : null,
        ]);

        return redirect()->route('guru.buat-akun')
            ->with('success', 'Akun berhasil dibuat!');
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
        $query = Pengumpulan::with(['siswa', 'tugas']);

        if ($request->search) {
            $query->whereHas('siswa', fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
                ->orWhereHas('tugas', fn($q) => $q->where('judul', 'like', '%' . $request->search . '%'));
        }

        $pengumpulan    = $query->latest('submitted_at')->paginate(15);
        $totalTepat     = Pengumpulan::where('status', 'tepat_waktu')->count();
        $totalTerlambat = Pengumpulan::where('status', 'terlambat')->count();

        return view('guru.semua-pengumpulan.index', compact('pengumpulan', 'totalTepat', 'totalTerlambat'));
    }
}
