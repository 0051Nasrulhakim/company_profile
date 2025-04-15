<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesan Masuk</title>
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/style.css'])
  @else
  {{-- Fallback ke file CSS manual dari folder public --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @endif
</head>

<body>
  <nav>
    <div class="logo">Dashboard Admin</div>
    <ul>
      <li><a href="{{ route('portfolio.index') }}">Manajemen Portofolio</a></li>
      <li><a href="{{ route('service.index') }}">Manajemen Layanan</a></li>
      <li><a href="{{ route('blog.index') }}">Manajemen Blog</a></li> <!-- Belum ada route -->
      <li><a href="{{ url('/admin/pesan') }}">Pesan Masuk</a></li>
    </ul>
  </nav>

  <section class="section">
    <h2>Pesan Masuk</h2>
    <p>
      Kelola pesan masuk yang dikirim oleh pengunjung melalui formulir kontak.
    </p>

    <div class="messages-list">
      <div class="message-item">
        <p><strong>Nama Pengirim:</strong> John Doe</p>
        <p><strong>Email:</strong> johndoe@example.com</p>
        <p><strong>Pesan:</strong> Lorem ipsum dolor sit amet.</p>
        <button class="btn">Balas</button>
        <button class="btn">Hapus</button>
      </div>
    </div>
  </section>
</body>

</html>