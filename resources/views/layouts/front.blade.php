<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title')</title>
    <meta name="author" content="Endrianta Rayhan, Diva Larisa Rejeki Suwaib, Muhammad Farid Zaqy, Fahmi Idruus" />
    <meta name="description" content="PT Intan Sejahtera Utama (PT ISMA) adalah perusahaan layanan maritim yang menyediakan perekrutan awak kapal, tenaga pandu expert, dan solusi crewing terintegrasi sesuai standar internasional.">
    <meta property="og:title" content="PT Intan Sejahtera Utama (PT ISMA) - Jasa Rekrutmen dan Penempatan Awak Kapal">
    <meta property="og:description" content="Perusahaan maritim profesional yang menyediakan layanan rekrutmen awak kapal dan tenaga pandu expert. Terpercaya, kompeten, dan sesuai standar internasional.">
    <meta property="og:type" content="website">
    <!-- <meta property="og:image" content="https://domain-anda.com/logo.png">
    <meta property="og:url" content="https://domain-anda.com"> -->

    <meta name="keywords" content="PT ISMA, PT Intan Sejahtera Utama, rekrutmen awak kapal, penempatan crew kapal, tenaga pandu expert, jasa crewing, maritime recruitment, ship crew placement">

    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/logo.png') }}" rel="icon" />
    <link href="{{ asset('front/assets/img/apple-touch-icon.png') }} rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Amatic+SC:wght@400;700&family=Inter:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- Main CSS -->
    <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet" />

    <!-- Page-level CSS overrides (pindahkan ke assets/css/main.css jika perlu) -->
    <style>
      /* Header */
      #header.header {
        transition: background-color 0.2s ease;
      }
      .nav-link.active {
        color: dodgerblue !important;
      }

      /* Carousel */
      .carousel-item img {
        max-height: 640px; /* Batas tinggi gambar */
        object-fit: cover; /* Proporsional dan crop rapi */
      }

      /* Section generic spacing */
      section { padding: 60px 0; }

      /* About */
      .about .section-header h2 { color: #000; }

      /* Why-Us (Visi Misi, Corporate Strategy, Key Enablers) */
      .why-box {
        border-radius: 15px;
        background: #2b6fdf; /* royalblue serupa */
        color: #fff;
      }
      .why-box h3 { color: #fff; }

      .icon-box {
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        text-align: center;
        height: 100%;
      }
      .icon-box i {
        font-size: 2rem;
        width: 64px;
        height: 64px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        margin-bottom: 12px;
        color: #1e90ff; /* dodgerblue */
        background: #b0e0e6; /* powderblue */
      }

      /* News */
      #news .section-header h2 { color: #000; }
      .news-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }
      .menu-item {
        background-color: white;
        border-radius: 15px;
        padding: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        display: inline-block;   
        width: auto;         
        max-width: 380px;
        margin-left: 120px;
      }

      .menu-img {
        width: auto;
        max-width: 350px;
        height: auto;
        max-height: 350px;
        object-fit: contain;
        display: block;
        border-radius: 10px;
        margin: 0 auto;
      }

      /* Structure (Organisasi) */
      .chef-container { display: flex; flex-direction: column; gap: 40px; }
      .chef-member { display: flex; align-items: flex-start; gap: 20px; }
      .member-img img { width: 180px; height: auto; border-radius: 50px; }
      .member-info { color: #fff; }
      .member-info h3 { margin: 0 0 5px; }
      .member-info h4 { margin: 0 0 12px; font-weight: 500; color: #fff; }

      .staff-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        justify-items: center;
        margin-top: 30px;
      }
      .staff-card { text-align: center; background: transparent; padding: 20px; max-width: 400px; color: #fff; }
      .staff-card img { width: 180px; height: auto; border-radius: 50px; }
      .staff-card h3, .staff-card h4, .staff-card p { color: #fff; }

      @media (max-width: 768px) {
        .chef-member { flex-direction: column; align-items: center; text-align: center; }
        .staff-container { grid-template-columns: 1fr; }
      }

      /* Contact */
      .info-item {
        border-radius: 50px;
        padding: 16px;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        gap: 12px;
      }
      .info-item .icon { font-size: 1.5rem; margin-right: 12px; }

      /* Footer */
      #footer .bi { line-height: 1; }
    </style>
    @yield('css')
  </head>

  <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="70" tabindex="0">
    <header id="header" class="header bg-white shadow-sm" 
        style="padding-top: 25px; padding-bottom: 80px; position: fixed; top: 0; left: 0; right: 0; z-index: 1030;">
  <div class="container d-flex align-items-center justify-content-between py-2">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="d-inline-flex align-items-center">
      <img src="{{ asset('front/assets/img/logoisma.png') }}" alt="Logo" class="img-fluid" style="height: 60px" />
    </a>
      @include('partials.frontnavbar')
    <!-- Navbar -->
    
  </div>
</header>


    <main id="main">
     @yield('header')
     @yield('konten')
      

      
    </main>

      @include('partials.frontfooter')
    

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
      @yield('js')
    <!-- Template Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
  </body>
</html>