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
     /* === Perbaikan ukuran box mitra === */
      .mitra-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 12px;
        height: 200px; /* tinggi seragam */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
      .mitra-card img {
        max-width: 100%;
        max-height: 120px; /* biar logo fit */
        object-fit: contain;
        margin-bottom: 8px;
      }
      .mitra-card p {
        font-size: 14px;
        font-weight: 600;
        margin: 0;
      }
    </style>

@endsection
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">MITRA</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')
<section class="container my-5">
  <div class="card border-0 shadow-lg p-4" data-aos="fade-up">
    <div class="d-flex align-items-center mb-4">
      <div class="flex-grow-1"></div>
      <h3 class="text-center fw-bold text-primary mb-0" style="margin-left: 150px;">Mitra Kami</h3>
      <div class="flex-grow-1 text-end">
        <img src="{{ asset('front/assets/img/logoisma.png') }}" alt="Logo ISMA" class="img-fluid" style="height: 60px; object-fit: contain;">
      </div>
    </div>

      @if($p_groups)
        <h5 class="fw-semibold mb-3 text-secondary">Pelindo Group</h5>
        <div class="row text-center g-4 mb-4">
          @foreach($p_groups as $pg)
            <div class="col-6 col-md-2">
              <div class="mitra-card hover-zoom">
                <img src="{{ asset('front/'.$pg->gambar) }}" alt="{{ $pg->nama }}">
                <p>{{ $pg->nama }}</p>
              </div>
            </div>
          @endforeach
        </div>
    @endif

      
          <h5 class="fw-semibold mb-3 text-secondary">Non Pelindo</h5>
          <div class="row text-center g-4 mb-4">
            @foreach ($n_plds as $n_pld)
              <div class="col-6 col-md-2">
                <div class="mitra-card hover-zoom">
                  <img src="{{ asset('front/'.$n_pld->gambar) }}" alt="{{ $n_pld->nama }}">
                  <p>{{ $n_pld->nama }}</p>
                </div>
              </div>
            @endforeach
          </div>
    
      @if($orgs)
        <h5 class="fw-semibold mb-3 text-secondary">Organisasi</h5>
        <div class="row text-center g-4 mb-4">
          @foreach($orgs as $org)
            <div class="col-6 col-md-2">
              <div class="mitra-card hover-zoom">
                <img src="{{ asset('front/'.$org->gambar) }}" alt="{{ $org->nama }}">
                <p>{{ $org->nama }}</p>
              </div>
            </div>
          @endforeach
        </div>
    @endif
  </div>

@endsection