@extends('layouts.front')
@section('title','BERITA | PT. INTAN SEJAHTERA UTAMA')
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
  </style>

@endsection
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">Berita</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')


  <main id="main">
    <section class="container my-5">
      <div class="row g-4" id="news-container" style="margin-top: 30px;">

        @foreach($data as $berita)
          <div class="col-md-6 col-lg-3 news-item" data-aos="fade-up">
            <div class="card shadow-sm border-0 h-100">
              <img src="{{ asset('uploads/images/news/') }}/{{ $berita->image }}" class="card-img-top" alt="{{ $berita->title }}" />
              <div class="card-body">
                <h5 class="card-title">{{ $berita->title }}</h5>
                <p class="card-text">
                  {{ substr(strip_tags($berita->content), 0, 80) }}...
                </p>
                <small class="text-muted d-block mb-2">{{ \Carbon\Carbon::parse($berita->date)->locale('id')->translatedFormat('d F Y'); }}| {{ $berita->author }}</small>
                <a href="{{ route('berita_detail') }}?id={{ $berita->id }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <nav aria-label="News page navigation">
        <ul class="pagination justify-content-center mt-5" id="news-pagination"></ul>
      </nav>
    </section>
  </main>
@endsection