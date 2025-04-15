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
      <li><a href="{{ url('/admin/pesan') }}">Pesan Masuk</a></li>
    </ul>
  </nav>

  <section class="section">
    <h2>Manajemen Portofolio</h2>
    <p>Tambah, edit, atau hapus portofolio yang ada di website.</p>

    <div class="portfolio-actions">

      <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">Tambah Portofolio</button>

      @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="portfolio-list">
        <!-- <div class="portfolio-item">
          <h3>Proyek 1</h3>
          <p>Deskripsi portofolio.</p>
          <button class="btn">Edit</button>
          <button class="btn">Hapus</button>
        </div> -->

        @foreach($portfolios as $portfolio)
        <div class="col-md-4">
          <div class="card mb-4">
            @if($portfolio->image)
            <img src="{{ asset($portfolio->image) }}" class="card-img-top" alt="{{ $portfolio->title }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $portfolio->title }}</h5>
              <p class="card-text">{{ $portfolio->description }}</p>
              <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPortfolioModal{{ $portfolio->id }}">Edit</button>
              <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editPortfolioModal{{ $portfolio->id }}" tabindex="-1">
          <div class="modal-dialog">
            <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Portofolio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <input type="text" name="title" class="form-control mb-2" value="{{ $portfolio->title }}" required>
                  <textarea name="description" class="form-control mb-2" required>{{ $portfolio->description }}</textarea>
                  <input type="file" name="image" class="form-control mb-2">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endforeach
        <!-- Tambah lebih banyak item portofolio di sini -->
      </div>
    </div>
  </section>

  <!-- Modal Tambah -->
  <div class="modal fade" id="addPortfolioModal" tabindex="-1">
    <div class="modal-dialog">
      <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Portofolio</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="text" name="title" class="form-control mb-2" placeholder="Judul" required>
            <textarea name="description" class="form-control mb-2" placeholder="Deskripsi" required></textarea>
            <input type="file" name="image" class="form-control mb-2">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>