@extends('layouts.front')
@section('title',$data->title.'PT. INTAN SEJAHTERA UTAMA')
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">Berita</h1>
        <p class="lead">{{ $data->title }}</p>
    </div>
</section>
@endsection

@section('konten')
  <!-- Isi Berita -->
  <main class="container my-5">
    <div class="card shadow-sm border-0">
      <img src="{{ asset('uploads/images/news/') }}/{{ $data->image }}" class="card-img-top" alt="{{ $data->title }}">
      <div class="card-body">
        <h2 class="card-title">{{ $data->title }}</h2>
        <p class="text-muted">{{ $data->date }} | {{ $data->author }}</p>
        <hr>
        <!-- Isi utama berita -->
        <div class="content-text">
          {!! $data->content !!}
        </div>

      </div>
    </div>
  </main>
@endsection