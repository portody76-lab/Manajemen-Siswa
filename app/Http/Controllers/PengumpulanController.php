<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumpulanController extends Controller
{
    // ─── SISWA ───────────────────────────────────────────

    // Siswa kirim tugas (upload file)
    public function kirim(Request $request, Tugas $tugas)
    {
        // Pastikan tugas memang untuk kelas siswa ini
        if ($tugas->kelas_target !== Auth::user()->kelas) {
            abort(403, 'Akses ditolak.');
        }

        // Pastikan siswa belum pernah mengumpulkan
        if ($tugas->sudahDikumpulkan(Auth::id())) {
            return redirect()->back()
                ->with('error', 'Kamu sudah mengumpulkan tugas ini.');
        }

        $request->validate([
            'file'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'catatan' => 'nullable|string|max:500',
        ], [
            'file.required' => 'File wajib diunggah.',
            'file.mimes'    => 'File harus berformat JPG, PNG, atau PDF.',
            'file.max'      => 'Ukuran file maksimal 5MB.',
        ]);

        // Simpan file ke storage/app/public/pengumpulan
        $file      = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileName  = Auth::id() . '_' . $tugas->id . '_' . time() . '.' . $extension;
        $filePath  = $file->storeAs('pengumpulan', $fileName, 'public');

        // Tentukan tipe file
        $fileType = in_array($extension, ['jpg', 'jpeg', 'png']) ? 'image' : 'pdf';

        // Cek apakah terlambat
        $status = now()->gt($tugas->deadline) ? 'terlambat' : 'tepat_waktu';

        Pengumpulan::create([
            'tugas_id'  => $tugas->id,
            'siswa_id'  => Auth::id(),
            'file_path' => $filePath,
            'file_type' => $fileType,
            'catatan'   => $request->catatan,
            'status'    => $status,
        ]);

        return redirect()->route('siswa.tugas.index')
            ->with('success', 'Tugas berhasil dikumpulkan!');
    }

    // ─── GURU ────────────────────────────────────────────

    // Guru lihat semua kiriman siswa untuk satu tugas
    public function lihatKiriman(Tugas $tugas)
    {
        // Pastikan hanya guru pemilik tugas yang bisa lihat
        if ($tugas->guru_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $kiriman = Pengumpulan::with('siswa')
            ->where('tugas_id', $tugas->id)
            ->orderBy('submitted_at', 'asc')
            ->get();

        return view('guru.tugas.kiriman', compact('tugas', 'kiriman'));
    }

    // Guru download file kiriman siswa
    public function download(Pengumpulan $pengumpulan)
    {
        // Pastikan hanya guru pemilik tugas yang bisa download
        if ($pengumpulan->tugas->guru_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $path = storage_path('app/public/' . $pengumpulan->file_path);

        return response()->download($path);
    }
}
