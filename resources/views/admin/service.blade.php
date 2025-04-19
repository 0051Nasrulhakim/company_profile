<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Layanan</title>
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/style.css'])
  @else
  {{-- Fallback ke file CSS manual dari folder public --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  {{-- Tambahan Bootstrap untuk modal --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

  {{-- Font Awesome untuk ikon --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
    <h2>Manajemen Layanan</h2>
    <p>Tambah, edit, atau hapus layanan yang ditawarkan oleh studio.</p>

    <div class="services-actions">
      <!-- Tombol trigger -->
      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addServiceModal">Tambah Layanan</button>

      <!-- Modal -->
      <!-- Modal Tambah Layanan -->
      <div class="modal fade" id="addServiceModal" tabindex="-1">
        <div class="modal-dialog">
          <form action="{{ route('service.store') }}" method="POST">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="title" class="form-label">Judul</label>
                  <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi</label>
                  <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="icon" class="form-label">Ikon (contoh: fa-music, fa-video)</label>
                  <input type="text" name="icon" id="icon" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Layanan -->
      <!-- ... head tetap sama seperti sebelumnya ... -->

      <div class="services-list">
        @foreach($services as $service)
        <div class="service-item">
          <h3><i class="fas {{ $service->icon }} me-2"></i>{{ $service->title }}</h3>
          <p>{{ $service->description }}</p>

          <!-- Tombol Edit (Trigger Modal) -->
          <button class="btn" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}">Edit</button>

          <!-- Form Hapus -->
          <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Hapus</button>
          </form>
        </div>

        <!-- Modal Edit Layanan -->
        <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1">
          <div class="modal-dialog">
            <form action="{{ route('service.update', $service->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Layanan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="title{{ $service->id }}" class="form-label">Judul</label>
                    <input type="text" name="title" id="title{{ $service->id }}" value="{{ $service->title }}" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="description{{ $service->id }}" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description{{ $service->id }}" class="form-control" required>{{ $service->description }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="icon{{ $service->id }}" class="form-label">Ikon</label>
                    <input type="text" name="icon" id="icon{{ $service->id }}" value="{{ $service->icon }}" class="form-control">
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section>
</body>

</html>