<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    // ─── GURU ────────────────────────────────────────────

    // Dashboard guru — lihat semua tugas yang dibuat
    public function dashboardGuru()
    {
        $tugas = Tugas::where('guru_id', Auth::id())
                      ->orderBy('deadline', 'asc')
                      ->get();

        return view('guru.dashboard', compact('tugas'));
    }

    // Daftar tugas guru (resource index)
    public function index()
    {
        $tugas = Tugas::where('guru_id', Auth::id())
                      ->orderBy('created_at', 'desc')
                      ->get();

        return view('guru.tugas.index', compact('tugas'));
    }

    // Form buat tugas baru
    public function create()
    {
        return view('guru.tugas.create');
    }

    // Simpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'mata_pelajaran' => 'required|string|max:100',
            'kelas_target'   => 'required|string|max:50',
            'deadline'       => 'required|date|after:now',
        ], [
            'judul.required'          => 'Judul tugas wajib diisi.',
            'deskripsi.required'      => 'Deskripsi tugas wajib diisi.',
            'mata_pelajaran.required' => 'Mata pelajaran wajib diisi.',
            'kelas_target.required'   => 'Kelas target wajib diisi.',
            'deadline.required'       => 'Deadline wajib diisi.',
            'deadline.after'          => 'Deadline harus setelah waktu sekarang.',
        ]);

        Tugas::create([
            'guru_id'        => Auth::id(),
            'judul'          => $request->judul,
            'deskripsi'      => $request->deskripsi,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas_target'   => $request->kelas_target,
            'deadline'       => $request->deadline,
        ]);

        return redirect()->route('guru.tugas.index')
                         ->with('success', 'Tugas berhasil dibuat!');
    }

    // Form edit tugas
    public function edit(Tugas $tugas)
    {
        // Pastikan hanya guru pemilik tugas yang bisa edit
        if ($tugas->guru_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        return view('guru.tugas.edit', compact('tugas'));
    }

    // Simpan perubahan tugas
    public function update(Request $request, Tugas $tugas)
    {
        if ($tugas->guru_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'mata_pelajaran' => 'required|string|max:100',
            'kelas_target'   => 'required|string|max:50',
            'deadline'       => 'required|date',
        ]);

        $tugas->update([
            'judul'          => $request->judul,
            'deskripsi'      => $request->deskripsi,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas_target'   => $request->kelas_target,
            'deadline'       => $request->deadline,
        ]);

        return redirect()->route('guru.tugas.index')
                         ->with('success', 'Tugas berhasil diperbarui!');
    }

    // Hapus tugas
    public function destroy(Tugas $tugas)
    {
        if ($tugas->guru_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $tugas->delete();

        return redirect()->route('guru.tugas.index')
                         ->with('success', 'Tugas berhasil dihapus!');
    }

    // ─── SISWA ───────────────────────────────────────────

    // Dashboard siswa — lihat tugas sesuai kelasnya
    public function dashboardSiswa()
    {
        $tugas = Tugas::where('kelas_target', Auth::user()->kelas)
                      ->orderBy('deadline', 'asc')
                      ->get();

        return view('siswa.dashboard', compact('tugas'));
    }

    // Daftar tugas siswa
    public function indexSiswa()
    {
        $tugas = Tugas::where('kelas_target', Auth::user()->kelas)
                      ->orderBy('deadline', 'asc')
                      ->get();

        return view('siswa.tugas.index', compact('tugas'));
    }
}