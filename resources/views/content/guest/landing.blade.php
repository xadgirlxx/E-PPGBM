<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-PPGBM</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-2 text-green-600 font-bold text-lg">
        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <span>E-PPGBM</span>
      </div>
      <ul class="hidden md:flex space-x-6 font-medium">
        <li><a href="#" class="hover:text-green-600">Beranda</a></li>
        <li><a href="#tentang" class="hover:text-green-600">Tentang</a></li>
        <li><a href="#fitur" class="hover:text-green-600">Fitur</a></li>
        <li><a href="#kontak" class="hover:text-green-600">Kontak</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-blue-900 to-green-700 text-white h-screen flex items-center justify-center">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-green-700 opacity-80"></div>
    <div class="relative z-10 text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di E-PPGBM</h1>
      <p class="text-lg md:text-xl mb-6">Cek Data Gizi Keluargamu dengan Mudah!</p>
      <p class="mb-8 text-sm md:text-base">Elektronik Pencatatan dan Pelaporan Gizi Berbasis Masyarakat untuk kesehatan keluarga yang lebih baik</p>
    <div class="bg-white p-6 rounded-xl shadow-lg max-w-md mx-auto space-y-4">
  <h3 class="text-gray-700 font-semibold text-center">Cari Data Gizi Keluarga</h3>

  <select class="w-full border border-gray-300 px-3 py-2 rounded-md text-gray-700 focus:outline-none">
    <option value="balita">Balita</option>
    <option value="bumil">Ibu Hamil</option>
  </select>

  <input type="text" placeholder="Masukkan NIK..." class="w-full border border-gray-300 px-3 py-2 rounded-md text-gray-700 focus:outline-none" />

  <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md font-medium">Cari Data</button>
</div>
    </div>
  </section>

  <!-- Tentang Section -->
  <section id="tentang" class="py-20 bg-gray-100 text-center px-6">
    <h2 class="text-3xl font-semibold mb-4">Tentang E-PPGBM</h2>
    <p class="max-w-2xl mx-auto text-gray-600">
      E-PPGBM adalah sistem elektronik yang memudahkan pencatatan dan pelaporan data gizi masyarakat. Dirancang khusus untuk membantu keluarga Indonesia memantau kesehatan dan gizi dengan lebih mudah dan terorganisir.
    </p>
  </section>
<!-- Keunggulan -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-3 gap-8 text-center mb-16">
      <div class="p-6 border rounded-lg">
        <div class="text-blue-600 text-3xl mb-4">🔒</div>
        <h3 class="font-semibold text-lg mb-2">Aman & Terpercaya</h3>
        <p class="text-gray-600 text-sm">Data keluarga Anda tersimpan dengan aman dan hanya dapat diakses oleh yang berwenang</p>
      </div>
      <div class="p-6 border rounded-lg">
        <div class="text-green-600 text-3xl mb-4">✅</div>
        <h3 class="font-semibold text-lg mb-2">Mudah Digunakan</h3>
        <p class="text-gray-600 text-sm">Interface yang sederhana dan user-friendly untuk semua kalangan keluarga</p>
      </div>
      <div class="p-6 border rounded-lg">
        <div class="text-orange-500 text-3xl mb-4">📈</div>
        <h3 class="font-semibold text-lg mb-2">Pantau Perkembangan</h3>
        <p class="text-gray-600 text-sm">Lihat perkembangan gizi dan kesehatan keluarga dalam bentuk grafik yang mudah dipahami</p>
      </div>
    </div>

    <div class="text-center mb-10">
      <h2 class="text-3xl font-semibold">Fitur Unggulan</h2>
      <p class="text-gray-600 mt-2">Berbagai kemudahan untuk mendukung kesehatan keluarga Anda</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <!-- Fitur Cards -->
      <div class="p-5 border rounded-xl shadow-sm">
        <div class="text-red-600 text-3xl mb-3">📝</div>
        <h3 class="font-semibold text-lg">Pencatatan Gizi Anak</h3>
        <p class="text-sm text-gray-600">Catat dan pantau asupan gizi harian anak dengan mudah dan terstruktur</p>
      </div>
      <div class="p-5 border rounded-xl shadow-sm">
        <div class="text-green-600 text-3xl mb-3">📊</div>
        <h3 class="font-semibold text-lg">Grafik Perkembangan</h3>
        <p class="text-sm text-gray-600">Visualisasi pertumbuhan dan perkembangan kesehatan dalam bentuk grafik</p>
      </div>
      <div class="p-5 border rounded-xl shadow-sm">
        <div class="text-purple-600 text-3xl mb-3">🔍</div>
        <h3 class="font-semibold text-lg">Riwayat Pemeriksaan</h3>
        <p class="text-sm text-gray-600">Akses riwayat pemeriksaan kesehatan lengkap keluarga kapan saja</p>
      </div>
      <div class="p-5 border rounded-xl shadow-sm">
        <div class="text-pink-600 text-3xl mb-3">❤️</div>
        <h3 class="font-semibold text-lg">Monitoring Kesehatan</h3>
        <p class="text-sm text-gray-600">Pantau status kesehatan dan gizi secara berkala dan terorganisir</p>
      </div>
      <div class="p-5 border rounded-xl shadow-sm">
        <div class="text-indigo-600 text-3xl mb-3">👨‍👩‍👧‍👦</div>
        <h3 class="font-semibold text-lg">Data Keluarga</h3>
        <p class="text-sm text-gray-600">Kelola data seluruh anggota keluarga dalam satu platform terpadu</p>
      </div>
      <div class="p-5 border rounded-xl shadow-sm">
        <div class="text-orange-500 text-3xl mb-3">📄</div>
        <h3 class="font-semibold text-lg">Laporan Digital</h3>
        <p class="text-sm text-gray-600">Generate laporan kesehatan digital yang dapat diunduh dan dicetak</p>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-10">
  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
    <div>
      <h3 class="font-bold text-lg mb-2 text-green-400">💚 E-PPGBM</h3>
      <p class="text-sm">Sistem Elektronik Pencatatan dan Pelaporan Gizi Berbasis Masyarakat untuk kesehatan keluarga Indonesia.</p>
      <p class="text-xs text-gray-400 mt-4">© 2024 Dinas Kesehatan. Semua hak dilindungi undang-undang.</p>
    </div>
    <div>
      <h4 class="font-semibold mb-2">Kontak Dinas Kesehatan</h4>
      <ul class="text-sm space-y-1">
        <li>📞 (021) 1234-5678</li>
        <li>✉️ info@dinkes.go.id</li>
        <li>📍 Jl. Kesehatan No. 123, Jakarta</li>
      </ul>
    </div>
    <div>
      <h4 class="font-semibold mb-2">Tautan Penting</h4>
      <ul class="text-sm space-y-1">
        <li><a href="#" class="hover:underline">Kementerian Kesehatan RI</a></li>
        <li><a href="#" class="hover:underline">Posyandu Indonesia</a></li>
        <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
        <li><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
      </ul>
    </div>
  </div>
</footer>

</body>
</html>
