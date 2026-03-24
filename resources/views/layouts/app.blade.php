<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Sekolah</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #dbeafe;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background-color: #93c5fd;
            padding: 14px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .navbar-brand {
            font-size: 1.15rem;
            font-weight: 700;
            color: #1e3a5f;
            text-decoration: none;
        }
        .btn-logout {
            background: #fff;
            color: #1e3a5f;
            border: none;
            padding: 6px 18px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-logout:hover { background: #e0f0ff; }

        /* CONTAINER */
        .container {
            max-width: 900px;
            margin: 36px auto;
            padding: 0 20px;
        }

        /* HEADER CARD */
        .header-card {
            background: #fff;
            border-radius: 16px;
            padding: 28px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .header-card h1 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1e3a5f;
            margin-bottom: 4px;
        }
        .header-card p { color: #64748b; font-size: 0.9rem; }

        /* TAB NAV */
        .tab-nav {
            background: #fff;
            border-radius: 14px;
            padding: 10px;
            display: flex;
            gap: 10px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .tab-nav a {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            color: #64748b;
            transition: all 0.2s;
        }
        .tab-nav a:hover { background: #dbeafe; color: #1e3a5f; }
        .tab-nav a.active { background: #93c5fd; color: #1e3a5f; }

        /* ALERT */
        .alert {
            padding: 12px 18px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 0.9rem;
        }
        .alert-success { background: #d1fae5; color: #065f46; }
        .alert-danger  { background: #fee2e2; color: #991b1b; }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar">
    <a href="#" class="navbar-brand">📖 Portal Sekolah</a>
    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    @endauth
</nav>

<div class="container">

    <div class="header-card">
        <h1>KELAS XI PPLG</h1>
        <p>SMK Dwira Harapan, Tahun Ajaran 2025/2026</p>
    </div>

    @auth
    <div class="tab-nav">
        @if(Auth::user()->role === 'guru')
            <a href="{{ route('guru.dashboard') }}"
               class="{{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
               Halaman Utama
            </a>
            <a href="{{ route('guru.tugas.index') }}"
               class="{{ request()->routeIs('guru.tugas.*') ? 'active' : '' }}">
               Tugas
            </a>
            <a href="{{ route('guru.siswa.index') }}"
               class="{{ request()->routeIs('guru.siswa.*') ? 'active' : '' }}">
               Siswa
            </a>
            <a href="{{ route('guru.semua-pengumpulan.index') }}"
               class="{{ request()->routeIs('guru.semua-pengumpulan.*') ? 'active' : '' }}">
               Pengumpulan
            </a>
        @else
            <a href="{{ route('siswa.dashboard') }}"
               class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
               Halaman Utama
            </a>
            <a href="{{ route('siswa.tugas.index') }}"
               class="{{ request()->routeIs('siswa.tugas.*') ? 'active' : '' }}">
               Tugas
            </a>
        @endif
    </div>
    @endauth

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')

</div>

@stack('scripts')
</body>
</html>