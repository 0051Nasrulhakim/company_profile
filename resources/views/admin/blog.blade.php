<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manajemen Portofolio</title>
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/style.css'])
  @else
  {{-- Fallback ke file CSS manual dari folder public --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @endif

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
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
    <h2>Manajemen Blog</h2>
    <p>Tambah, edit, atau hapus artikel blog di website.</p>

    <div class="blog-actions">
      <!-- Tombol trigger untuk modal tambah artikel -->
      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addBlogModal">Tambah Artikel Blog</button>

      <!-- Modal Tambah Artikel Blog -->
      <div class="modal fade" id="addBlogModal" tabindex="-1">
        <div class="modal-dialog">
          <form action="{{ route('blog.store') }}" method="POST">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="title" class="form-label">Judul Artikel</label>
                  <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="content" class="form-label">Konten</label>
                  <textarea name="content" id="content" class="form-control" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Artikel Blog -->
      <div class="blog-list">
        @foreach($blogs as $blog)
          <div class="blog-item">
            <h3>{{ $blog->title }}</h3>
            <p>{{ $blog->content }}</p>

            <!-- Tombol Edit (Trigger Modal) -->
            <button class="btn" data-bs-toggle="modal" data-bs-target="#editBlogModal{{ $blog->id }}">Edit</button>

            <!-- Form Hapus Artikel -->
            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn">Hapus</button>
            </form>
          </div>

          <!-- Modal Edit Artikel Blog -->
          <div class="modal fade" id="editBlogModal{{ $blog->id }}" tabindex="-1">
            <div class="modal-dialog">
              <form action="{{ route('blog.update', $blog->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Artikel Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="title{{ $blog->id }}" class="form-label">Judul Artikel</label>
                      <input type="text" name="title" id="title{{ $blog->id }}" class="form-control" value="{{ $blog->title }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="content{{ $blog->id }}" class="form-label">Konten</label>
                      <textarea name="content" id="content{{ $blog->id }}" class="form-control" required>{{ $blog->content }}</textarea>
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

  <!-- Tambahan Bootstrap untuk modal -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

</body>
</html>
