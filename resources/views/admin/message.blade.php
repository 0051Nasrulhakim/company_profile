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
      <li><a href="{{ route('message.index') }}">Pesan Masuk</a></li>
    </ul>
  </nav>

  <section class="section">
  <h2>Pesan Masuk</h2>
  <p>
    Kelola pesan masuk yang dikirim oleh pengunjung melalui formulir kontak.
  </p>

  <div class="messages-list">
    @forelse($messages as $message)
      <div class="message-item">
        <p><strong>Nama Pengirim:</strong> {{ $message->name }}</p>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        <p><strong>Pesan:</strong> {{ $message->message }}</p>

        <!-- <form action="mailto:{{ $message->email }}" method="get" style="display: inline-block;">
          <button class="btn" type="submit">Balas</button>
        </form> -->

        <form action="{{ route('message.destroy', $message->id) }}" method="POST" style="display: inline-block;">
          @csrf
          @method('DELETE')
          <button class="btn" onclick="return confirm('Yakin ingin menghapus pesan ini?')">Hapus</button>
        </form>
      </div>
    @empty
      <p>Tidak ada pesan masuk.</p>
    @endforelse
  </div>
</section>

</body>

</html>