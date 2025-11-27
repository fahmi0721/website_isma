@extends('layouts.front')
@section('title',' SERTIFIKAT | PT. INTAN SEJAHTERA UTAMA')
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
        <h1 class="fw-bold display-5">SERTIFIKAT</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')
<main id="main">
    <section class="container my-5">
      <div class="row g-4" id="news-container" style="margin-top: 50px;">
        <div class="container" data-aos="fade-up">
          <div class="row align-items-center g-4">
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-delay="100">
              <div class="container my-4 flex-grow-1">
                <div class="card-custom">
                <div class="row">
                  @if ($data->isEmpty())
                      <div class="col-12 text-center">
                        <p class="fw-bold mt-4">Belum ada data sertifikat.</p>
                      </div>
                  @else
                     @foreach ($data as $item)
                        <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm">
                                <a href="{{ asset('uploads/files/'.$item->file_sertifikat) }}" target="_blank">
                                    <div class="pdf-placeholder">
                                        <i class="bi bi-filetype-pdf" style="font-size: 80px; color: #dc3545;"></i>
                                    </div>
                                </a>
                            <div class="card-body text-center">
                            <h6 class="fw-bold">ssss</h6>
                            <p class="small">-||-</p>
                            </div>
                        </div>
                        </div>
                      @endforeach
                  @endif
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection