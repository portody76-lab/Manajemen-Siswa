<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Manajemen Siswa</title>
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

    .form-control {
      border-radius: 10px;
      border: 1.5px solid #a8cde8;
      background-color: #eaf4fc;
      font-size: 0.875rem;
      color: #0d2137;
      transition: all 0.2s ease;
    }

    .form-control:focus {
      box-shadow: 0 0 0 3px rgba(26, 111, 196, 0.2);
      border-color: #1a6fc4;
      background-color: #fff;
    }

    .btn-login {
      background-color: #1a6fc4;
      color: white;
      font-weight: 700;
      border-radius: 10px;
      border: none;
      font-size: 0.9rem;
      letter-spacing: 0.03em;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
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

    .register-link {
      color: #1a6fc4;
      font-weight: 600;
      text-decoration: none;
      border-bottom: 1.5px solid #1a6fc4;
      transition: opacity 0.2s;
    }

    .register-link:hover {
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
      <h1 class="page-title">Masuk</h1>
    </div>

    @if (session('success'))
      <div class="alert alert-success py-2 px-3 mb-3 shadow-sm" style="font-size: 0.85rem; border-radius: 10px;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input
          type="text"
          id="name"
          name="name"
          value="{{ old('name') }}"
          class="form-control @error('name') is-invalid @enderror"
          autocomplete="name">
        @error('name') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          class="form-control @error('password') is-invalid @enderror"
          autocomplete="current-password">
        @error('password') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn btn-login w-100 py-2">
        Login
      </button>
    </form>

    <div class="text-center mt-4 small">
      <span class="text-secondary">Belum memiliki akun?</span>
      <a href="{{ route('register') }}" class="register-link ms-1">Register</a>
    </div>

  </div>
</div>

</body>
</html>