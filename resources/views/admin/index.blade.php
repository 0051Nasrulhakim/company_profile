<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin</title>
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
      <li><a href="portofolio.html">Manajemen Portofolio</a></li>
      <li><a href="service.html">Manajemen Layanan</a></li>
      <li><a href="blog.html">Manajemen Blog</a></li>
      <li><a href="message.html">Pesan Masuk</a></li>
    </ul>
  </nav>
</body>

</html>