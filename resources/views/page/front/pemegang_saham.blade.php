@extends('layouts.front')
@section('title','SUSUNAN PEMEGANG SAHAM | PT. INTAN SEJAHTERA UTAMA')
@section('css')
  <style>
    .card-img-top {
      height: 220px;
      object-fit: cover;
    }
    .card {
      display: flex;
      flex-direction: column;
      height: 100%;
    }
    .card-body {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .card-body .btn {
      margin-top: auto;   /* paksa tombol ke bawah */
      width: 100%;
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

     .shareholder-structure {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      position: relative;
    }

    .level {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 20px 0;
      gap: 100px;
    }

    .node {
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
    }

    .logo-box {
      width: 200px;
      height: 80px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 10px;
    }
    .logo-box img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      display: block;
    }

    .title {
      background: #eee;
      padding: 6px 14px;
      border-radius: 6px;
      font-weight: 600;
      min-width: 200px;
    }
    .title.bg-primary {
      background: #0066ff;
      color: white;
    }

    /* Garis */
    .line.down {
      width: 2px;
      height: 40px;
      background: #333;
      margin: 0 auto;
    }
    .line.down.short {
      height: 25px;
    }
    .line.down.center {
      margin-left: auto;
      margin-right: auto;
    }
    .line.horizontal {
      width: 350px; /* konsisten untuk semua level */
      height: 2px;
      background: #333;
      margin: 0 auto;
    }
    .org-structure {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .level {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 120px;
      margin: 20px 0;
    }

    .branch {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sub-level {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 15px;
    }

    .box {
      background: #f8f9fa;
      border: 2px solid #0d6efd;
      border-radius: 8px;
      padding: 10px 16px;
      min-width: 160px;
      font-weight: 600;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    .box:hover {
      transform: scale(1.05);
    }

    .box.small {
      min-width: 140px;
      font-size: 14px;
    }

    .box.utama {
      background: #0d6efd;
      color: white;
    }

    .box.komisaris {
      background: #198754;
      color: white;
    }

    .box.direktur {
      background: #0dcaf0;
      color: white;
    }

    /* Garis vertical */
    .line.down {
      width: 2px;
      height: 30px;
      background: #333;
      margin: 0 auto;
    }

    /* Garis horizontal */
    .horizontal-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      max-width: 800px; /* panjang horizontal */
    }

    .line.horizontal.flex {
      flex: 1;
      height: 2px;
      background: #333;
      margin: 0 40px;
    }
    
    </style>

<!-- AOS Animation CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>

@endsection
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">Susunan Pemegang Saham dan Organisasi</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')

<!-- Struktur Pemegang Saham -->
<section class="container my-5">
  <h3 class="text-center fw-bold mb-4">Struktur Pemegang Saham</h3>

  <div class="shareholder-structure">
    <!-- Level 1 -->
    <div class="level">
      <div class="node main">
        <div class="logo-box">
          <img src="{{ asset('front/assets/img/logo pelindo.png') }}" alt="Pelindo Logo">
        </div>
        <div class="title bg-primary">
          PT PELABUHAN INDONESIA (PERSERO)
        </div>
      </div>
    </div>

    <!-- Garis vertikal dari Pelindo Persero -->
    <div class="line down short"></div>
    <!-- Garis horizontal -->
    <div class="line horizontal"></div>

    <!-- Level 2 -->
    <div class="level">
      <div class="node">
        <div class="line down"></div>
        <div class="logo-box">
          <img src="{{ asset('front/assets/img/logo maritim.png') }}" alt="Pelindo Jasa Maritim">
        </div>
        <div class="title">PT PELINDO JASA MARITIM</div>
        <!-- Garis vertikal di bawah -->
        <div class="line down short"></div>
      </div>

      <div class="node">
        <div class="line down"></div>
        <div class="logo-box">
          <img src="{{ asset('front/assets/img/bima.png') }}" alt="BIMA" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="title">PT BIMA PELINDO</div>
        <!-- Garis vertikal di bawah -->
        <div class="line down short"></div>
      </div>
    </div>

    <!-- Garis horizontal penghubung Level 2 (sama dengan Level 1) -->
    <div class="line horizontal"></div>

    <!-- Garis vertikal ke ISMA dari tengah -->
    <div class="line down short center"></div>

    <!-- Level 3 -->
    <div class="level">
      <div class="node">
        <div class="logo-box">
          <img src="{{ asset('front/assets/img/logoisma.png') }}" alt="Intan Sejahtera Utama">
        </div>
        <div class="title">PT INTAN SEJAHTERA UTAMA</div>
      </div>
    </div>
  </div>
</section>


<!-- Struktur Organisasi -->
<section class="container my-5">
  <h3 class="text-center fw-bold mb-4">Struktur Organisasi</h3>

  <div class="org-structure">

    <!-- Level 1 -->
    <div class="level">
      <div class="box komisaris">Komisaris</div>
    </div>

    <div class="line down"></div>

    <!-- Level 2 -->
    <div class="level">
      <div class="box utama">Direktur Utama</div>
    </div>

    <div class="line down"></div>

    <!-- Level 3 -->
    <div class="level">
      <div class="box direktur">Direktur</div>
    </div>

    <!-- Garis vertical di bawah Direktur -->
    <div class="line down"></div>

    <!-- Garis horizontal penghubung ke level 4 -->
    <div class="horizontal-wrapper">
      <div class="line horizontal flex"></div>
    </div>

    <!-- Level 4 (Cabang Manajer) -->
    <div class="level">
      <!-- Manager Region -->
      <div class="branch">
        <!-- Garis vertical di atas Manager Region -->
        <div class="line down"></div>
        <div class="box">Manajer Region</div>
        <div class="line down"></div>
        <div class="box">SPV Region</div>
        <div class="line down"></div>
        <div class="sub-level">
          <div class="box small">Marine Coordinator<br>Area I - VI</div>
          <div class="box small">Officer Administrasi Crewing</div>
          <div class="box small">Officer Marketing Crewing</div>
        </div>
      </div>

      <!-- Manager Penunjang -->
      <div class="branch">
        <!-- Garis vertical di atas Manager Penunjang -->
        <div class="line down"></div>
        <div class="box">Manajer Penunjang</div>
        <div class="line down"></div>
        <div class="box">SPV Penunjang</div>
        <div class="line down"></div>
        <div class="sub-level">
          <div class="box small">Officer SDM</div>
          <div class="box small">Officer Keuangan</div>
          <div class="box small">Officer Hukum</div>
          <div class="box small">Officer IT</div>
        </div>
      </div>
    </div>

  </div>
</section>


<section id="structure" class="structure section-bg" style="background-image: url('{{ asset('front/assets/img/bg.png') }}'); background-size: cover; background-position: center">
    <div class="container" data-aos="fade-up">
        <div class="section-header text-center">
            <h2 class="text-dark">Struktur</h2>
            <p><span class="text-white">Jabatan</span></p>
        </div>
    </div>

    <div class="container">
        <div class="row gy-4 justify-content-center" style="max-width:780px; margin:auto;">
          <div class="col-12 d-flex flex-column align-items-center">
        @foreach($members as $member)
            @if($member->urutan == 1 || $member->urutan == 2)
                <div class="d-flex justify-content-center mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="chef-container">
                        <div class="chef-member">
                            <div class="member-img">
                                @if(!empty($member->foto))
                                    <img src="{{ asset('front/assets/img/structure/'.$member->foto) }}" 
                                        alt="{{ $member->jabatan }}" 
                                        style="height:260px; width:190px; object-fit:cover; border-radius:8px;">
                                @else
                                    <img src="assets/img/structure/default.jpg" 
                                        alt="Kosong" 
                                        style="height:260px; width:190px; opacity:0.3; border-radius:8px;">
                                @endif
                            </div>
                            <div class="member-info text-center">
                                <h4><strong>{{ $member->nama }}</strong></h4>
                                <h5>{{ $member->jabatan }}</h5>
                                <p style="margin-top:7px;">{{ $member->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
      </div>
  </div>

    <!-- Staff / Manager -->
<div class="row gy-4 justify-content-center" style="max-width:1000px; margin:auto;">
    @foreach($members as $member)
        @if($member->urutan  > 2)
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="chef-container">
                  <div class="chef-member d-flex align-items-start">
                      <!-- Foto -->
                      <div class="member-img" style="margin-right:20px;">
                          @if(!empty($member->foto))
                              <img src="{{ asset('front/assets/img/structure/'.$member->foto) }}" 
                                  alt="{{ $member->jabatan }}" 
                                  style="height:260px; width:190px; object-fit:cover; border-radius:8px;">
                          @else
                              <img src="assets/img/structure/default.jpg" 
                                  alt="Kosong" 
                                  style="height:260px; width:190px; opacity:0.3; border-radius:8px;">
                          @endif
                      </div>
                      <div class="member-info text-center">
                          <h4><strong>{{ $member->nama }}</strong></h4>
                          <h5>{{ $member->jabatan }}</h5>
                          <p style="margin-top:7px;">{{ $member->deskripsi }}</p>
                      </div>
                  </div>
                </div>
              </div>
        @endif
        @endforeach
</div>
</section>

@endsection