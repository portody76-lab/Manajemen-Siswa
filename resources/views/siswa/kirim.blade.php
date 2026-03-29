<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kumpulkan Tugas — Dwira Harapan</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', Arial, sans-serif; }
    body { background: #f4f8ff; min-height: 100vh; }

    .header { background: #a8d4f5; display: flex; align-items: center; justify-content: space-between; padding: 0.85rem 2rem; width: 100%; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
    .logo { font-size: 1rem; font-weight: 700; color: #0d2137; }
    .user-info { font-size: 0.82rem; font-weight: 600; color: #0d2137; }
    .logout-btn { background: none; border: 1.5px solid #0d2137; border-radius: 8px; padding: 0.3rem 0.9rem; font-size: 0.78rem; font-weight: 600; color: #0d2137; cursor: pointer; transition: all 0.2s; }
    .logout-btn:hover { background: #dc3545; border-color: #dc3545; color: white; }

    .main-container { max-width: 680px; margin: 0 auto; padding: 1.75rem 1.5rem; }

    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; }
    .page-header h1 { font-size: 1.4rem; font-weight: 700; color: #0d2137; }
    .btn-kembali { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 10px; padding: 0.4rem 1rem; font-size: 0.82rem; font-weight: 600; color: #4a6380; text-decoration: none; transition: all 0.2s; }
    .btn-kembali:hover { background: #dce8f5; color: #1a3a52; }

    /* Info tugas */
    .tugas-info-card { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 16px; padding: 1.25rem 1.5rem; margin-bottom: 1.25rem; box-shadow: 0 2px 8px rgba(168,212,245,0.15); }
    .tugas-info-card h2 { font-size: 1.05rem; font-weight: 700; color: #0d2137; margin-bottom: 8px; }
    .tugas-info-meta { display: flex; gap: 1.5rem; flex-wrap: wrap; margin-bottom: 10px; }
    .tugas-info-meta span { font-size: 0.8rem; color: #4a6380; }
    .tugas-info-meta span strong { color: #0d2137; }
    .tugas-deskripsi { font-size: 0.85rem; color: #4a6380; line-height: 1.6; background: #f0f6ff; border-radius: 10px; padding: 0.75rem 1rem; }

    /* Deadline warning */
    .deadline-box { border-radius: 10px; padding: 0.65rem 1rem; font-size: 0.82rem; font-weight: 600; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 8px; }
    .deadline-box.aman    { background: #d1fae5; color: #065f46; }
    .deadline-box.warning { background: #fef3c7; color: #92400e; }
    .deadline-box.danger  { background: #fee2e2; color: #b91c1c; }

    /* Form card */
    .form-card { background: #ffffff; border: 1.5px solid #cce0f5; border-radius: 16px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(168,212,245,0.15); }
    .form-label { font-size: 0.82rem; font-weight: 600; color: #1a3a52; margin-bottom: 6px; display: block; }
    .form-group { margin-bottom: 1.1rem; }

    /* Upload area */
    .upload-area { border: 2px dashed #a8cde8; border-radius: 12px; background: #f0f6ff; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.2s; position: relative; }
    .upload-area:hover { border-color: #1a6fc4; background: #e8f2fc; }
    .upload-area.dragover { border-color: #1a6fc4; background: #dbeafe; }
    .upload-area input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; width: 100%; height: 100%; }
    .upload-icon { font-size: 2rem; margin-bottom: 8px; }
    .upload-text { font-size: 0.85rem; color: #4a6380; }
    .upload-text strong { color: #1a6fc4; }
    .upload-hint { font-size: 0.75rem; color: #94a3b8; margin-top: 4px; }
    .file-preview { display: none; align-items: center; gap: 10px; background: #f0f6ff; border-radius: 10px; padding: 0.75rem 1rem; margin-top: 10px; }
    .file-preview.show { display: flex; }
    .file-preview-name { font-size: 0.85rem; font-weight: 600; color: #0d2137; flex: 1; }
    .file-preview-size { font-size: 0.75rem; color: #6b8fa8; }
    .file-remove { background: none; border: none; color: #dc2626; cursor: pointer; font-size: 1rem; padding: 0; }

    textarea.form-control { width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #a8cde8; border-radius: 10px; background: #f0f6ff; font-size: 0.875rem; color: #0d2137; outline: none; resize: vertical; min-height: 90px; transition: border-color 0.2s, background 0.2s; font-family: inherit; }
    textarea.form-control:focus { border-color: #1a6fc4; background: #fff; }

    .error-text { font-size: 0.78rem; color: #dc3545; margin-top: 4px; }

    .btn-submit { width: 100%; background: #1a6fc4; color: white; border: none; border-radius: 12px; padding: 0.75rem; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: all 0.2s; margin-top: 0.5rem; }
    .btn-submit:hover { background: #155da0; transform: translateY(-1px); }
    .btn-submit:disabled { background: #a8cde8; cursor: not-allowed; transform: none; }

    .alert { border-radius: 10px; padding: 0.75rem 1rem; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem; }
    .alert-success { background: #d1fae5; color: #065f46; }
    .alert-error   { background: #fee2e2; color: #b91c1c; }
  </style>
</head>
<body>

<header class="header">
  <div class="logo">📖 Portal Sekolah</div>
  <div style="display:flex; align-items:center; gap:12px;">
    <span class="user-info">{{ Auth::user()->name }} · Absen {{ Auth::user()->absen }}</span>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
      @csrf
      <button type="submit" class="logout-btn">Log Out</button>
    </form>
  </div>
</header>

<div class="main-container">

  <div class="page-header">
    <h1>📤 Kumpulkan Tugas</h1>
    <a href="{{ route('siswa.tugas.index') }}" class="btn-kembali">← Kembali</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">✅ {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-error">❌ {{ session('error') }}</div>
  @endif

  {{-- Info Tugas --}}
  <div class="tugas-info-card">
    <h2>{{ $tugas->judul }}</h2>
    <div class="tugas-info-meta">
      <span>📚 <strong>{{ $tugas->mata_pelajaran }}</strong></span>
      <span>🏫 <strong>{{ $tugas->kelas_target }}</strong></span>
      <span>⏰ <strong>{{ $tugas->deadline->format('d M Y, H:i') }}</strong></span>
    </div>
    <div class="tugas-deskripsi">{{ $tugas->deskripsi }}</div>
  </div>

  {{-- Deadline warning --}}
  @php
    $sisaHari = now()->diffInDays($tugas->deadline, false);
    $berakhir = now()->gt($tugas->deadline);
  @endphp

  @if($berakhir)
    <div class="deadline-box danger">🔒 Deadline sudah berakhir. Kamu tidak bisa mengumpulkan tugas ini.</div>
  @elseif($sisaHari <= 1)
    <div class="deadline-box danger">⚠️ Deadline hari ini! Segera kumpulkan tugasmu.</div>
  @elseif($sisaHari <= 3)
    <div class="deadline-box warning">⏳ Sisa {{ $sisaHari }} hari lagi. Jangan sampai terlambat!</div>
  @else
    <div class="deadline-box aman">✅ Sisa {{ $sisaHari }} hari. Masih ada waktu!</div>
  @endif

  {{-- Form upload --}}
  @if(!$berakhir)
  <div class="form-card">

    @if($errors->any())
      <div class="alert alert-error" style="margin-bottom:1rem;">
        @foreach($errors->all() as $error)
          <div>❌ {{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form action="{{ route('siswa.tugas.kirim.store', $tugas->id) }}" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- Upload file --}}
      <div class="form-group">
        <label class="form-label">File Tugas <span style="color:#dc3545;">*</span></label>
        <div class="upload-area" id="uploadArea">
          <input type="file" name="file" id="fileInput" accept=".jpg,.jpeg,.png,.pdf"
            onchange="previewFile(this)">
          <div class="upload-icon">📁</div>
          <div class="upload-text">
            <strong>Klik untuk pilih file</strong> atau drag & drop di sini
          </div>
          <div class="upload-hint">Format: JPG, PNG, PDF · Maks. 5MB</div>
        </div>
        <div class="file-preview" id="filePreview">
          <span id="previewIcon">📄</span>
          <span class="file-preview-name" id="previewName"></span>
          <span class="file-preview-size" id="previewSize"></span>
          <button type="button" class="file-remove" onclick="removeFile()">✕</button>
        </div>
        @error('file') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      {{-- Catatan --}}
      <div class="form-group">
        <label class="form-label">Catatan <span style="color:#94a3b8; font-weight:400;">(opsional)</span></label>
        <textarea name="catatan" class="form-control"
          placeholder="Tambahkan catatan untuk guru (opsional)...">{{ old('catatan') }}</textarea>
        @error('catatan') <div class="error-text">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn-submit" id="submitBtn">
        📤 Kumpulkan Tugas
      </button>

    </form>
  </div>
  @endif

</div>

<script>
  function previewFile(input) {
    const file = input.files[0];
    if (!file) return;

    const preview  = document.getElementById('filePreview');
    const name     = document.getElementById('previewName');
    const size     = document.getElementById('previewSize');
    const icon     = document.getElementById('previewIcon');

    name.textContent = file.name;
    size.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
    icon.textContent = file.type === 'application/pdf' ? '📄' : '🖼️';

    preview.classList.add('show');
  }

  function removeFile() {
    document.getElementById('fileInput').value = '';
    document.getElementById('filePreview').classList.remove('show');
  }

  // Drag & drop
  const uploadArea = document.getElementById('uploadArea');
  uploadArea.addEventListener('dragover', e => { e.preventDefault(); uploadArea.classList.add('dragover'); });
  uploadArea.addEventListener('dragleave', () => uploadArea.classList.remove('dragover'));
  uploadArea.addEventListener('drop', e => {
    e.preventDefault();
    uploadArea.classList.remove('dragover');
    const file = e.dataTransfer.files[0];
    if (file) {
      document.getElementById('fileInput').files = e.dataTransfer.files;
      previewFile(document.getElementById('fileInput'));
    }
  });

  // Loading state on submit
  document.querySelector('form').addEventListener('submit', function() {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.textContent = '⏳ Mengupload...';
  });
</script>
</body>
</html>