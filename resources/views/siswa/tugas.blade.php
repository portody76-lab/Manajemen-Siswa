@extends('layouts.app')

@section('content')

<style>
    .section-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 14px;
    }

    /* TUGAS CARD */
    .tugas-card {
        background: #fff;
        border-radius: 14px;
        padding: 16px 20px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        text-decoration: none;
        color: inherit;
        transition: transform 0.15s, box-shadow 0.15s;
        cursor: pointer;
    }

    .tugas-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    }

    .tugas-icon {
        font-size: 1.8rem;
        flex-shrink: 0;
    }

    .tugas-info {
        flex: 1;
    }

    .tugas-judul {
        font-weight: 700;
        font-size: 0.95rem;
        color: #1e3a5f;
        margin-bottom: 4px;
    }

    .tugas-meta {
        font-size: 0.8rem;
        color: #64748b;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .tugas-deadline {
        font-size: 0.85rem;
        color: #475569;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-sudah {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-belum {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-mapel {
        background: #dbeafe;
        color: #1e40af;
    }

    /* EMPTY STATE */
    .empty-state {
        background: #fff;
        border-radius: 14px;
        padding: 48px 20px;
        text-align: center;
        color: #94a3b8;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .empty-state .icon {
        font-size: 2.5rem;
        margin-bottom: 12px;
    }

    /* TOMBOL GURU */
    .btn-tambah {
        display: inline-block;
        background-color: #3b82f6;
        color: #fff;
        padding: 10px 22px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.88rem;
        margin-bottom: 18px;
        transition: background 0.2s;
    }

    .btn-tambah:hover {
        background-color: #2563eb;
    }
</style>

<p class="section-title">Pengumpulan Tugas XI PPLG</p>

{{-- Tombol tambah tugas (hanya untuk guru) --}}
@if(auth()->user()->role === 'guru')
    <a href="{{ route('tugas.create') }}" class="btn-tambah">+ Tambah Tugas</a>
@endif

{{-- List tugas --}}
@forelse($tugas as $tugas)
    <a href="{{ route('tugas.show', $tugas->id) }}" class="tugas-card">

        <div class="tugas-icon">
            @if($tugas->sudahDikumpulkan(auth()->id()))
                ✅
            @else
                📋
            @endif
        </div>

        <div class="tugas-info">
            <div class="tugas-judul">{{ $tugas->judul }}</div>
            <div class="tugas-meta">
                <span class="badge badge-mapel">{{ $tugas->mata_pelajaran }}</span>
                @if($tugas->sudahDikumpulkan(auth()->id()))
                    <span class="badge badge-sudah">Sudah Dikumpulkan</span>
                @else
                    <span class="badge badge-belum">Belum Dikumpulkan</span>
                @endif
            </div>
        </div>

        <div class="tugas-deadline">
            {{ $tugas->deadline ? $tugas->deadline->format('H:i') : '-' }}
        </div>

    </a>
@empty
    <div class="empty-state">
        <div class="icon">📭</div>
        <p>Belum ada tugas saat ini.</p>
    </div>
@endforelse

@endsection