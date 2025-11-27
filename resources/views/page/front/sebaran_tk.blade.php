@extends('layouts.front')
@section('title',' BISNIS PROSES LAYANAN | PT. INTAN SEJAHTERA UTAMA')
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

     /* Aspek Hukum Styles */
      .hover-zoom {
        transition: transform 0.3s ease;
      }
      .hover-zoom:hover {
        transform: scale(1.05);
      }
      .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .hover-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
      }
      .maritime-img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        border: 2px solid #e0e0e0;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
        transition: transform 0.6s ease, box-shadow 0.6s ease, opacity 0.6s ease;
        opacity: 0.9;
      }
      .maritime-img:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        opacity: 1;
      }
      .fade-in {
        animation: fadeInUp 1.2s ease-in-out forwards;
      }
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      .glass-box {
    background: rgba(0, 0, 0, 0.45);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 1rem;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    box-shadow: 0 6px 25px rgba(0,0,0,0.35);
    max-width: 1000px;
  }

  .city-card {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 1rem;
    padding: 35px 20px;
    color: #fff;
    transition: all 0.4s ease;
    cursor: pointer;
    text-align: center;
    box-shadow: 0 6px 15px rgba(0,0,0,0.25);
    height: 100%; /* agar semua sejajar */
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .city-card i {
    font-size: 2.5rem;
    margin-bottom: 15px;
    display: block;
    opacity: 0.9;
  }

  .city-card h5 {
    font-size: 1.2rem;
    margin-bottom: 8px;
    font-weight: 600;
  }

  .city-desc {
    font-size: 0.9rem;
    color: #ddd;
    line-height: 1.4;
    margin: 0;
  }

  .city-card:hover {
    transform: translateY(-8px) scale(1.05);
    box-shadow: 0 10px 25px rgba(255,255,255,0.3);
    background: rgba(255,255,255,0.1);
  }
    </style>

@endsection
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">Sebaran Tenaga Kerja</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')
 <!-- Sertifikasi & Standar -->
<section class="my-5 text-white position-relative" 
         data-aos="fade-up"
         style="background-image: url('assets/img/bg4.jpg'); 
                background-size: cover; 
                background-position: center; 
                background-repeat: no-repeat;
                width: 100%;
                padding: 80px 0;">

  <div class="container text-center">

    <h3 class="fw-bold mb-5 text-dark" data-aos="fade-down">Sebaran Tenaga Kerja</h3>    
    
    <div class="row justify-content-center g-4">

      <!-- Kotak 1 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="glass-box p-4 mx-auto">
          <h2 class="fw-bold text-white">1200+</h2>
          <p class="mb-0 text-white">Ship Crews</p>
        </div>
      </div>

      <!-- Kotak 2 -->
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="glass-box p-4 mx-auto">
          <h2 class="fw-bold text-white">5+</h2>
          <p class="mb-0 text-white">Years Experience</p>
        </div>
      </div>

    </div>

    <!-- Sebaran Tenaga Kerja -->
    <div class="glass-box p-5 mx-auto text-center mt-5" data-aos="fade-up">
     <h4 class="fw-bold mb-5 text-dark" data-aos="fade-down">Sebaran Tenaga Kerja</h4>
      <div class="row g-4 justify-content-center align-items-stretch">
        
        <!-- Kota 1 -->
        <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
          <div class="city-card flex-fill">
            <i class="fas fa-ship"></i>
            <h5>Belawan</h5>
            <p class="city-desc">Pelabuhan utama Sumatera Utara, pusat keberangkatan awak kapal.</p>
          </div>
        </div>

        <!-- Kota 2 -->
        <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
          <div class="city-card flex-fill">
            <i class="fas fa-city"></i>
            <h5>Jakarta</h5>
            <p class="city-desc">Pusat industri maritim nasional dan perekrutan tenaga kerja terbesar.</p>
          </div>
        </div>

        <!-- Kota 3 -->
        <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
          <div class="city-card flex-fill">
            <i class="fas fa-anchor"></i>
            <h5>Makassar</h5>
            <p class="city-desc">Gerbang maritim Indonesia Timur, dengan pelaut berpengalaman.</p>
          </div>
        </div>

        <!-- Kota 4 -->
        <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
          <div class="city-card flex-fill">
            <i class="fas fa-water"></i>
            <h5>Surabaya</h5>
            <p class="city-desc">Kota pelabuhan terbesar Jawa Timur, pusat distribusi tenaga kerja.</p>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<section class="container">
    <div class="card border-0 shadow-lg" data-aos="fade-up">
      <div class="row text-center">
        <div data-aos="zoom-in" data-aos-delay="100">
          <div class="p-3 bg-white rounded shadow-sm hover-zoom">
            <img src="{{ asset('front/assets/img/sebaran1.png') }}" alt="Sebaran Regional 1" class="img-fluid" />
          </div>
      </div>
    </div>
  </section>

  <section class="container">
    <div class="card border-0 shadow-lg" data-aos="fade-up">
      <div class="row text-center">
        <div data-aos="zoom-in" data-aos-delay="100">
          <div class="p-3 bg-white rounded shadow-sm hover-zoom">
            <img src="{{ asset('front/assets/img/sebaran2.png') }}" alt="Sebaran Regional 2" class="img-fluid" />
          </div>
      </div>
    </div>
  </section>

  <section class="container">
    <div class="card border-0 shadow-lg" data-aos="fade-up">
      <div class="row text-center">
        <div data-aos="zoom-in" data-aos-delay="100">
          <div class="p-3 bg-white rounded shadow-sm hover-zoom">
            <img src="{{ asset('front/assets/img/sebaran3.png') }}" alt="Sebaran Regional 3" class="img-fluid" />
          </div>
      </div>
    </div>
  </section>

  <section class="container">
    <div class="card border-0 shadow-lg" data-aos="fade-up">
      <div class="row text-center">
        <div data-aos="zoom-in" data-aos-delay="100">
          <div class="p-3 bg-white rounded shadow-sm hover-zoom">
            <img src="{{ asset('front/assets/img/sebaran4.png') }}" alt="Sebaran Regional 4" class="img-fluid" />
          </div>
      </div>
    </div>
  </section>

@endsection