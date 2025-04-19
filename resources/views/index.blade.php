<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Humanoire Studio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@500&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <script
    src="https://kit.fontawesome.com/a076d05399.js"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      scroll-behavior: smooth;
    }

    body {
      background-color: #1a1a2e;
      color: #ffffff;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 50px;
      background-color: #16213e;
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 1000;
    }

    nav .logo {
      font-size: 24px;
      font-weight: 600;
      color: #f4c531;
    }

    nav ul {
      list-style: none;
      display: flex;
    }

    nav ul li {
      margin: 0 15px;
    }

    nav ul li a {
      text-decoration: none;
      color: #ffffff;
      font-weight: 500;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: #f4c531;
    }

    .hero {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url("hero.jpg") no-repeat center center/cover;
      text-align: center;
      position: relative;
      animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .hero::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background: rgba(26, 26, 46, 0.7);
      top: 0;
      left: 0;
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero h1 {
      font-size: 50px;
      font-family: "Playfair Display", serif;
      animation: slideIn 1.5s ease-in-out;
    }

    @keyframes slideIn {
      from {
        transform: translateY(-20px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .hero p {
      font-size: 18px;
      margin-top: 10px;
      opacity: 0.8;
      animation: fadeIn 2s ease-in-out;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 25px;
      background: #f4c531;
      color: #16213e;
      text-decoration: none;
      font-weight: 600;
      border-radius: 5px;
      transition: background 0.3s, transform 0.3s;
    }

    .btn:hover {
      background: #d4a217;
      transform: scale(1.05);
    }

    .section {
      padding: 100px 50px;
      text-align: center;
    }

    .section h2 {
      animation: fadeInUp 1.5s ease-in-out;
      text-align: center;
      color: #ffffff;
      margin-bottom: 20px;
      margin-top: 20px;
    }

    @keyframes fadeInUp {
      from {
        transform: translateY(30px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    /* tentang kami */

    .team {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      margin-top: 30px;
    }

    .team-member {
      text-align: center;
      margin: 20px;
    }

    .team-member img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #1a1a2e;
    }

    /* Portofolio */

    .portfolio-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .portfolio-card {
      background: #0f3460;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      text-align: center;
      transition: transform 0.3s;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    .portfolio-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    .portfolio-card h3 {
      margin-top: 15px;
      font-size: 20px;
    }

    .portfolio-card p {
      font-size: 14px;
      opacity: 0.8;
    }

    .portfolio-card:hover {
      transform: scale(1.05);
    }

    /* service */
    .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      text-align: left;
      max-width: 1000px;
      margin: auto;
    }

    .service-item {
      padding: 20px;
      background: linear-gradient(135deg, #0f3460, #16213e);
      border-left: 5px solid #f4c531;
      transition: transform 0.3s;
    }

    .service-item:hover {
      transform: translateX(10px);
    }

    .service-item h3 {
      color: #f4c531;
      font-size: 22px;
    }

    /* blog */
    .blog-list {
      max-width: 900px;
      margin: auto;
      text-align: left;
    }

    .blog-item {
      padding: 20px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .blog-item h3 {
      color: #f4c531;
      font-size: 20px;
    }

    .blog-item p {
      font-size: 14px;
      opacity: 0.8;
    }

    .blog-item:hover h3 {
      text-decoration: underline;
      cursor: pointer;
    }

    /* contact */
    .contact-container {
      max-width: 600px;
      margin: auto;
      background: #16213e;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
      text-align: left;
    }

    .contact-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #f4c531;
    }

    .contact-container label {
      display: block;
      margin-top: 10px;
      font-size: 16px;
    }

    .contact-container input,
    .contact-container textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      background: #0f3460;
      border: none;
      border-radius: 5px;
      color: white;
    }

    .contact-container textarea {
      height: 120px;
    }

    .contact-container button {
      width: 100%;
      padding: 10px;
      background: #f4c531;
      border: none;
      border-radius: 5px;
      color: #16213e;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 15px;
    }

    .contact-container button:hover {
      background: #d4a217;
    }

    /* footer */
    .footer {
      background: #16213e;
      color: white;
      padding: 30px 50px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
      text-align: center;
    }

    .footer .footer-section {
      flex: 1;
      margin: 10px;
    }

    .footer h3 {
      color: #f4c531;
      margin-bottom: 10px;
    }

    .footer ul {
      list-style: none;
      padding: 0;
    }

    .footer ul li {
      margin: 5px 0;
    }

    .footer ul li a {
      color: white;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer ul li a:hover {
      color: #f4c531;
    }

    .footer .social-icons a {
      color: white;
      margin: 0 10px;
      font-size: 24px;
      transition: color 0.3s;
    }

    .footer .social-icons a:hover {
      color: #f4c531;
    }

    .footer-bottom {
      text-align: center;
      padding-top: 10px;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <nav>
    <div class="logo">Humanoire Studio</div>
    <ul>
      <li><a href="#home">Beranda</a></li>
      <li><a href="#about">Tentang Kami</a></li>
      <li><a href="#portfolio">Portofolio</a></li>
      <li><a href="#services">Layanan</a></li>
      <li><a href="#blog">Blog</a></li>
      <li><a href="#contact">Kontak</a></li>
    </ul>
  </nav>

  <section id="home" class="hero">
    <div class="hero-content">
      <h1>Selamat Datang di Humanoire Studio</h1>
      <p>Kami membawa kreativitas ke dalam video Anda</p>
      <a href="#portfolio" class="btn">Lihat Portofolio</a>
    </div>
  </section>

  <section id="about" class="section">
    <h2>Tentang Kami</h2>
    <p class="about-content">
      Humanoire Studio adalah perusahaan yang bergerak di bidang video editing
      dan multimedia. Kami memiliki pengalaman bertahun-tahun dalam
      menciptakan video berkualitas tinggi untuk berbagai kebutuhan, mulai
      dari iklan, dokumentasi, hingga konten kreatif. Dengan tim profesional
      dan alat yang canggih, kami berkomitmen untuk memberikan hasil terbaik
      bagi klien kami.
    </p>

    <h2>Tim Kami</h2>
    <div class="team">
      <div class="team-member">
        <img src="{{ asset('images/orang1.png') }}" alt="Proyek 1" />
        <p><strong>John Doe</strong></p>
        <p>CEO & Founder</p>
      </div>
      <div class="team-member">
        <img src="{{ asset('images/orang2.png') }}" alt="Proyek 1" />
        <p><strong>Jane Smith</strong></p>
        <p>Lead Video Editor</p>
      </div>
      <div class="team-member">
        <img src="{{ asset('images/orang3.png') }}" alt="Proyek 1" />
        <p><strong>Michael Johnson</strong></p>
        <p>Creative Director</p>
      </div>
    </div>
  </section>

  <section id="portfolio" class="section">
    <h2>Portofolio</h2>
    <p>Hasil karya terbaik kami dalam berbagai proyek kreatif.</p>
    <div class="portfolio-container">
      @foreach($portfolios as $portfolio)
      <div class="portfolio-card">
        <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->title }}" />
        <h3>{{ $portfolio->title }}</h3>
        <p>{{ $portfolio->description }}</p>
      </div>
      @endforeach
    </div>
  </section>


  <section id="services" class="section">
    <h2>Layanan Kami</h2>
    <!-- <p>Jasa editing video profesional untuk kebutuhan Anda.</p> -->

    <div class="services-grid">
      @forelse ($services as $service)
      <div class="service-item">
        <h3><i class="fas {{ $service->icon }} me-2"></i> {{ $service->title }}</h3>
        <!-- <h3>{{ $service->icon }} {{ $service->title }}</h3> -->
        <p>{{ $service->description }}</p>
      </div>
      @empty
      <p>Tidak ada layanan tersedia.</p>
      @endforelse
    </div>
  </section>


  <section id="blog" class="section">
    <h2>Blog</h2>
    <p>Artikel terbaru tentang dunia video editing.</p>
    <div class="blog-list">
      @foreach($blogs as $blog)
      <div class="blog-item">
        <h3>📌 {{ $blog->title }}</h3>
        <p>{{ $blog->description }}</p>
      </div>
      @endforeach
    </div>
  </section>


  <section id="contact" class="section">
  <h2>Kontak Kami</h2>
  <p>Hubungi kami untuk proyek kreatif Anda.</p>
  <div class="contact-container">
    <h2>Formulir Kontak</h2>
    <form action="{{ route('message.store') }}" method="POST">
      @csrf
      <label for="name">Nama</label>
      <input
        type="text"
        id="name"
        name="name"
        placeholder="Masukkan Nama Anda"
        required />

      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="Masukkan Email Anda"
        required />

      <label for="message">Pesan</label>
      <textarea
        id="message"
        name="message"
        placeholder="Tulis pesan Anda di sini..."
        required></textarea>

      <button type="submit">Kirim Pesan</button>
    </form>

    @if(session('success'))
      <p style="color: green;">{{ session('success') }}</p>
    @endif
  </div>
</section>


  <footer class="footer">
    <div class="footer-section">
      <h3>Humanoire Studio</h3>
      <p>Solusi terbaik untuk video editing profesional.</p>
    </div>
    <div class="footer-section">
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang Kami</a></li>
        <li><a href="#portfolio">Portofolio</a></li>
        <li><a href="#services">Layanan</a></li>
        <li><a href="#blog">Blog</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Hubungi Kami</h3>
      <p>Email: info@humanoirestudio.com</p>
      <p>Telepon: +62 812 3456 7890</p>
    </div>
    <div class="footer-section social-icons">
      <h3>Ikuti Kami</h3>
      <a href="#"><i class="fa-brands fa-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-linkedin"></i></a>
      <a href="#"><i class="fa-brands fa-youtube"></i></a>
    </div>
  </footer>
  <div class="footer-bottom">
    &copy; 2025 Humanoire Studio. All Rights Reserved.
  </div>
</body>

</html>