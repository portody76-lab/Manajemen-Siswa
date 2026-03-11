<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register — Dwira Harapan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body {
      background: #ffffff; 
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-custom {
      background: #d6eaf8;
      border: none;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 430px;
    }

    .brand-title {
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: #1a6fc4;
      margin-bottom: 2px;
    }

    .page-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #0d2137;
    }

    .form-label {
      font-size: 0.8rem;
      font-weight: 600;
      color: #1a3a52;
      margin-bottom: 4px;
    }

    .form-control,
    .form-select {
      border-radius: 10px;
      border: 1.5px solid #a8cde8;
      background-color: #eaf4fc;
      font-size: 0.875rem;
      color: #0d2137;
      transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
      box-shadow: 0 0 0 3px rgba(26, 111, 196, 0.2);
      border-color: #1a6fc4;
      background-color: #fff;
    }

    .form-select:disabled {
      background-color: #dde9f3;
      color: #7a9ab5;
      cursor: not-allowed;
    }

    .btn-register {
      background-color: #1a6fc4;
      color: white;
      font-weight: 700;
      border-radius: 10px;
      border: none;
      font-size: 0.9rem;
      letter-spacing: 0.03em;
      transition: all 0.3s ease;
    }

    .btn-register:hover {
      background-color: #155da0;
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(26, 111, 196, 0.35);
    }

    .error-text {
      font-size: 0.78rem;
      color: #dc3545;
      margin-top: 4px;
    }

    .divider {
      height: 1px;
      background: linear-gradient(to right, transparent, #a8cde8, transparent);
      margin: 1.25rem 0;
    }

    .login-link {
      color: #1a6fc4;
      font-weight: 600;
      text-decoration: none;
      border-bottom: 1.5px solid #1a6fc4;
      transition: opacity 0.2s;
    }

    .login-link:hover {
      opacity: 0.75;
      color: #1a6fc4;
    }
  </style>
</head>

<body>

  <div class="container d-flex justify-content-center px-3">
    <div class="card card-custom p-4 p-md-5 my-4">

      <div class="mb-4">
        <p class="brand-title mb-1">Dwira Harapan</p>
        <h1 class="page-title">Buat Akun</h1>
      </div>

      @if (session('success'))
      <div class="alert alert-success py-2 px-3 mb-3 shadow-sm" style="font-size: 0.85rem; border-radius: 10px;">
        {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('register.store') }}" method="POST">
        @csrf

        {{-- Nama --}}
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            class="form-control @error('name') is-invalid @enderror"
            required>
          @error('name') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        {{-- Absen --}}
        <div class="mb-3">
          <label for="absen" class="form-label">Nomor Absen</label>
          <input
            type="number"
            id="absen"
            name="absen"
            value="{{ old('absen') }}"
            class="form-control @error('absen') is-invalid @enderror"
            required>
          @error('absen') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        {{-- Tingkat & Kelas --}}
        <div class="row g-2 mb-3">
          <div class="col-5">
            <label for="tingkat" class="form-label">Tingkat</label>
            <select
              id="tingkat"
              name="tingkat"
              class="form-select @error('tingkat') is-invalid @enderror"
              onchange="updateKelas()"
              required>
              <option value="">-- Pilih --</option>
              <option value="X" {{ old('tingkat') == 'X'   ? 'selected' : '' }}>X</option>
              <option value="XI" {{ old('tingkat') == 'XI'  ? 'selected' : '' }}>XI</option>
              <option value="XII" {{ old('tingkat') == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
            @error('tingkat') <div class="error-text">{{ $message }}</div> @enderror
          </div>
          <div class="col-7">
            <label for="kelas" class="form-label">Kelas</label>
            <select
              id="kelas"
              name="kelas"
              class="form-select @error('kelas') is-invalid @enderror"
              disabled
              required>
              <option value="">-- Pilih tingkat dulu --</option>
            </select>
            @error('kelas') <div class="error-text">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="divider"></div>

        {{-- Email --}}
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror"
            required>
          @error('email') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror"
            required>
          @error('password') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-register w-100 py-2">
          Daftar Sekarang
        </button>
      </form>

      <div class="text-center mt-4 small">
        <span class="text-secondary">Sudah punya akun?</span>
        <a href="{{ route('login') }}" class="login-link ms-1">Login</a>
      </div>

    </div>
  </div>

  <script>
    const kelasList = {
      'X': [
        'PH 1', 'PH 2', 'PH 3',
        'KULINER 1', 'KULINER 2', 'KULINER 3',
        'TKC 1', 'TKC 2',
        'PPLG 1', 'PPLG 2'
      ],
      'XI': [
        'PH 1',
        'KULINER 1', 'KULINER 2',
        'TKC 1',
        'PPLG 1', 'PPLG 2'
      ],
      'XII': [
        'PH 1', 'PH 2',
        'KULINER 1', 'KULINER 2', 'KULINER 3',
        'TKC 1', 'TKC 2',
        'PPLG 1'
      ]
    };

    function updateKelas() {
      const tingkat = document.getElementById('tingkat').value;
      const kelasEl = document.getElementById('kelas');
      const oldKelas = "{{ old('kelas') }}";

      kelasEl.innerHTML = '';

      if (!tingkat) {
        kelasEl.disabled = true;
        kelasEl.innerHTML = '<option value="">-- Pilih tingkat dulu --</option>';
        return;
      }

      kelasEl.disabled = false;
      kelasEl.innerHTML = '<option value="">-- Pilih kelas --</option>';

      kelasList[tingkat].forEach(function(k) {
        const val = tingkat + ' ' + k;
        const option = document.createElement('option');
        option.value = val;
        option.text = k;
        if (oldKelas === val) option.selected = true;
        kelasEl.appendChild(option);
      });
    }

    // Restore state setelah validasi gagal (old value)
    document.addEventListener('DOMContentLoaded', function() {
      const tingkat = document.getElementById('tingkat').value;
      if (tingkat) updateKelas();
    });
  </script>

</body>

</html>