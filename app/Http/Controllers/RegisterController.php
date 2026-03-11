<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // RULES (array pertama)
            'name'     => 'required|string|max:255',
            'absen'    => 'required|integer',
            'tingkat'  => 'required|in:X,XI,XII',
            'kelas'    => 'required|string|max:50',
            'email'    => 'required|string|email|max:255|unique:pengguna|regex:/@gmail\.com$/', // ← pindah ke sini
            'password' => 'required|string|min:8',
        ], [
            // MESSAGES (array kedua)
            'name.required'     => 'Nama lengkap wajib diisi.',
            'absen.required'    => 'Nomor absen wajib diisi.',
            'absen.integer'     => 'Nomor absen harus berupa angka.',
            'tingkat.required'  => 'Tingkat kelas wajib dipilih.',
            'tingkat.in'        => 'Tingkat kelas tidak valid.',
            'kelas.required'    => 'Kelas wajib dipilih.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'email.regex'       => 'Email harus menggunakan Gmail (@gmail.com).', // ← pindah ke sini
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 8 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name'     => $request->name,
            'absen'    => $request->absen,
            'kelas'    => $request->kelas, // sudah berisi nilai lengkap, contoh: "X PH 1"
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'siswa',
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}