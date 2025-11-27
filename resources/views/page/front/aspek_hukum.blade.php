@extends('layouts.front')
@section('title','ASPEK HUKUM | PT. INTAN SEJAHTERA UTAMA')
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
      .law-items {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 35px 50px;
        position: relative;
      }
      .law-items li {
        background: #f9f9f9;
        border-left: 6px solid #007bff;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
        font-size: 0.95rem;
        transition: all 0.4s ease;
      }
      .law-items li:hover {
        transform: scale(1.05);
        background: linear-gradient(135deg, #eef6ff, #ffffff);
      }
    </style>

@endsection
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">Aspek Hukum</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')

<section class="container my-5">
  <div class="card border-0 shadow-lg p-4" data-aos="fade-up">
  <h3 class="text-center fw-bold mb-4 text-primary">Sertifikasi & Standar</h3>
  <div class="row text-center g-4">
      @foreach($sertifikats as $sertifikat)
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="p-3 bg-white rounded shadow-sm h-100 hover-zoom">
          <img src="{{ asset('front/assets/img/') }}/{{ $sertifikat->gambar }}" 
     alt="{{ $sertifikat->judul }}" 
     class="img-fluid mb-2" style="max-height:120px;">


          <p class="mt-2 fw-semibold">{{ $sertifikat->judul }}</p>
        </div>
      </div>
      @endforeach
  </div>
</div>

</section>


      <section class="container my-5">
  <div class="text-center mb-5">
    <h3 class="fw-bold text-primary">Mandatory Maritime Law</h3>
    <p class="text-muted">Empat pilar utama keselamatan, lingkungan, pelatihan, dan perlindungan tenaga kerja dalam industri maritim.</p>
  </div>

  <div class="row align-items-center g-4">
    <div class="col-lg-7">
      <div class="row g-4">
          @foreach($mandatoris as $mandatori)        
          <div class="col-md-6" data-aos="zoom-in">
            <div class="card border-0 shadow-lg h-100 text-center p-4 rounded-4 hover-card">
              <div class="mb-3">
                <i class="fas fa-check-circle fa-2x text-primary"></i>
              </div>
              <h6 class="fw-bold">{{ $mandatori->judul }}</h6>
              <p class="text-muted small">{{ $mandatori->deskripsi }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="col-lg-5 text-center">
      <img src="{{ asset('front/assets/img/mandatory_maritime.png') }}" alt="Mandatory Maritime Law" class="img-fluid maritime-img fade-in"/>
    </div>
  </div>
</section>


     <section class="container my-5">
  <div class="text-center mb-5">
    <h3 class="fw-bold text-primary">Landasan Hukum Nasional</h3>
    <p class="text-muted">Regulasi dan peraturan pemerintah yang menjadi dasar hukum PT. Intan Sejahtera Utama dalam menjalankan kegiatan operasional.</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <ul class="law-items">
        @php $delay = 100; @endphp
        @foreach($landasans as $landasan)
          <li data-aos="fade-up" data-aos-delay="{{ $delay }}">
            <strong>{{ $landasan->judul }}</strong><br />
            {{ $landasan->deskripsi }}
          </li>
        @php $delay++ @endphp
       @endforeach
      </ul>
    </div>
  </div>
</section>
@endsection