@extends('layouts.front')
@section('title','PT. INTAN SEJAHTERA UTAMA')
@section('header')
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Ganti gambar carousel dengan video -->
        <div class="carousel-item active">
            <video autoplay muted loop playsinline style="width:100%; height:90vh; object-fit:cover;">
                <source src="{{ asset('front/assets/img/isma.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <!-- Caption tetap di atas video -->
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                <h1 class="text-white fw-bold display-1">PT. INTAN SEJAHTERA UTAMA</h1>
            </div>
        </div>
    </div>
</div>

<style>
.carousel-item {
    height: 90vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.carousel-caption {
    height: 100%;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    background: rgba(0, 0, 0, 0.3);
}
.carousel-caption h1 {
    font-size: 3rem;
    border-radius: 10px;
    padding: 10px;
}
</style>
@endsection

@section('konten')
<!-- About Section -->
    <section id="about" class="about" style="background-image: url('assets/img/bg4.jpg'); background-size: cover;">
    <div class="container" data-aos="fade-up">
        <div class="section-header text-center">
        <h2 class="text-dark">Tentang kami</h2>
        <p>PT. <span class="text-primary">INTAN SEJAHTERA UTAMA</span></p>
        </div>
        <div class="row align-items-center g-4">
        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <p class="fst-italic">
            PT Intan Sejahtera Utama adalah perusahaan yang bergerak di bidang manning agency (perekrutan dan penempatan awak kapal) berdasarkan SIUPPAK Nomor 232.35 Tahun 2022 yang berbadan hukum Indonesia dengan akta pendirian Nomor 09 pada tanggal 29 November 2018 dan telah mendapatkan pengesahan dari Kementerian Hukum & HAM pada tanggal 30 November 2018 dengan Nomor AHU 0057261.AH.01.01 Tahun 2018 serta Nomor Induk Berusaha 8120213230436.
            </p>
            <p>
            Keberadaan PT Intan Sejahtera Utama sesuai dengan komitmen PT Pelabuhan Indonesia (Persero) dalam melaksanakan fungsi BUMN dalam penyediaan tenaga kerja sebagaimana yang tertuang dalam surat Direktur Utama PT PELINDO No. PD.02/13/2/3PBAP/UTMA/PLND-23, Perihal Pelaksanaan Pemurnian Bisnis PELINDO Group tanggal 13 Februari 2023.
            </p>
        </div>
        <div class="col-lg-5 text-center">
            <img src="{{ asset('front/assets/img/ISMA.png') }}" class="img-fluid" alt="About Image" />
        </div>
        </div>
    </div>
    </section>

    <!-- Why Us / RJPP -->
    <section id="about" class="about section-bg" style="background-image: url('{{ asset('front/assets/img/bg.png') }}'); background-size: cover; background-position: center;">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
        <!-- Visi & Misi -->
        <div class="col-lg-12 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row gx-4 gy-4 w-100">
            <div class="col-md-6">
                <div class="why-box p-4 d-flex flex-column" style="height: 270px">
                <h3>VISI</h3>
                <div class="flex-grow-1 d-flex align-items-center">
                    <p class="mb-0">
                    Menjadi perusahaan agen perekrutan dan penempatan awak kapal terkemuka dalam memberikan solusi dan kualitas terbaik untuk industri maritim.
                    </p>
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="why-box p-4" style="height: 270px">
                <h3 class="text-end">MISI</h3>
                <ol class="mb-0 ps-3">
                    <li>Penyediaan Jasa Tenaga Kerja Berkualitas</li>
                    <li>Peningkatan Kualitas Pelatihan</li>
                    <li>Keamanan dan Kesejahteraan</li>
                    <li>Meningkatkan Kepuasan Klien</li>
                    <li>Memenuhi Standar Regulasi Nasional &amp; Internasional</li>
                    <li>Inovasi dan Pengembangan</li>
                </ol>
                </div>
            </div>
            </div>
        </div>

        <!-- Corporate Strategy -->
        <div class="col-lg-12 d-flex align-items-center flex-column">
            <h2 class="text-center text-light mb-4" style="margin-top: 20px;">CORPORATE STRATEGY</h2>
        
            <div class="row gx-4 gy-4 w-100">
        
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center p-4" style="border-radius: 15px;">
                <i class="bi bi-lightbulb-fill" style="color: dodgerblue; background-color: #B0E0E6;"></i>
                <h4>A. Innovation</h4>
                <p>Menghadirkan inovasi produk atau layanan baru yang memenuhi kebutuhan dan harapan pelanggan</p>
                </div>
            </div>
        
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center p-4" style="border-radius: 15px;">
                <i class="bi bi-clipboard-data" style="color: dodgerblue; background-color: #B0E0E6;"></i>
                <h4>B. Operational Excellence</h4>
                <p>Meningkatkan produktivitas, mengurangi biaya operasional, dan memperkuat rantai pasokan</p>
                </div>
            </div>
        
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center p-4" style="border-radius: 15px;">
                <i class="bi bi-shop" style="color: dodgerblue; background-color: #B0E0E6;"></i>
                <h4>C. Market Expansion</h4>
                <p>Ekspansi ke pasar baru dan peningkatan pangsa pasar di pasar yang ada</p>
                </div>
            </div>
        
            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center p-4" style="border-radius: 15px;">
                <i class="bi bi-person-arms-up" style="color: dodgerblue; background-color: #B0E0E6;"></i>
                <h4>D. Customer Focus</h4>
                <p>Meningkatkan kepuasan pelanggan dan loyalitas melalui pelayanan yang unggul dan penawaran yang tepat</p>
                </div>
            </div>
        
            </div>
        </div>
        
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <!-- Judul di tengah dengan jarak atas -->
            <h2 class="text-center text-light mt-5 mb-4">KEY ENABLES</h2>
        
            <!-- Wrapper untuk box -->
            <div class="d-flex flex-column align-items-center gap-3">
            
            <!-- Box 1 -->
            <div class="why-box p-4" style="border-radius: 15px; background-color: dodgerblue; display: inline-block; height: 70px;">
                <p>Digital Transformation: Pengembangan Aplikasi dan sistem informasi yang terintegrasi</p>
            </div>
        
            <!-- Box 2 -->
            <div class="why-box p-4" style="border-radius: 15px; background-color: dodgerblue; display: inline-block; height: 70px;">
                <p>Strategic Financing: Pengembangan strategi keuangan yang optimal dan berkelanjutan</p>
            </div>
        
            <!-- Box 3 -->
            <div class="why-box p-4" style="border-radius: 15px; background-color: dodgerblue; display: inline-block; height: 70px;">
                <p>Talent Development: Peningkatan kapasitas dan kapabilitas Crewing serta kesejahteraan Crew</p>
            </div>
        
            <!-- Box 4 -->
            <div class="why-box p-4" style="border-radius: 15px; background-color: dodgerblue; display: inline-block; height: 70px;">
                <p>Sustainability Program: Pengembangan program keberlanjutan pada penggunaan sumber daya dan peningkatan efisiensi</p>
            </div>
        
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- News Section -->
    <section id="news" class="news" style="background-image: url('{{ asset('front/assets/img/bg4.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
        <h2 style="color: black;">Berita</h2>
        <p style="color: black;">PT. <span style="color: primary;">ISMA</span></p>
        </div>
        <main id="main">
        <section class="container my-2">
            <div class="row g-4" id="news-container">

            @foreach($beritas as $berita)
            <div class="col-md-6 col-lg-3 news-item" data-aos="fade-up">
                    <div class="card shadow-sm border-0 h-100">
                        <a href="{{ asset('uploads/images/news') }}/{{ $berita->image }}" class="glightbox">
                        <img src="{{ asset('uploads/images/news') }}/{{ $berita->image }}" 
                            class="card-img-top img-fluid" 
                            alt="<?php //echo $row['title']; ?>" 
                            style="height:200px; object-fit:cover;" />
                        </a>
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $berita->title }}</h5>
                        <p class="card-text">
                            {{ substr(strip_tags($berita->content), 0, 80) }}...
                        </p>
                        <small class="text-muted d-block mb-2">
                           {{ \Carbon\Carbon::parse($berita->date)->locale('id')->translatedFormat('d F Y'); }}| {{ $berita->author }}
                        </small>
                        <!-- tombol di bawah -->
                        <div class="mt-auto">
                            <a href="{{ route('berita_detail') }}?id={{ $berita->id }}" 
                            class="btn btn-primary btn-sm w-100" target="_blank">
                            Baca Selengkapnya
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </section>
        </main>
        <!-- Tombol menuju halaman baru -->
        <div class="text-center mt-4">
        <a href="{{ route('berita') }}" class="btn btn-primary px-4 py-2">
            Berita Lainnya
        </a>
        </div>
    </div>
    </section>


    <section id="moment" class="moment section-bg" style="background-image: url('{{ asset('front/assets/img/bg4.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
        <h2 class="text-dark">GIAT</h2>
        <p><span class="text-primary">Aktivitas</span></p>
    </div>

    <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
        @if($giats)
            @foreach($giats as $giat)
            <div class="swiper-slide text-center">
                <a class="glightbox" data-gallery="images-moment" href="{{ asset('front/assets/img/moment/') }}/{{ $giat->image }}" title="{{ $giat->image }}">
                    <img src="{{ asset('front/assets/img/moment/') }}/{{ $giat->image }}" class="img-fluid" alt="{{ $giat->image }}" style="border-radius: 15px; display: block; margin-bottom: 10px;">
                </a>
                <h6 class="text-dark fw-bold" style="font-size: 0.9rem;">{{ $giat->title }}</h6>
            </div>
            @endforeach
        @else
        <div class="swiper-slide w-100">
            <p class="text-center">Belum ada Giat</p>
        </div>
        @endif
        </div>
        <div class="mt-5"><div class="swiper-pagination"></div></div>
    </div>
    </div>
    </section>


    <section id="contact" class="contact" style="background-image: url('assets/img/bg.png'); background-size: cover; background-position: center">
    <div class="container" data-aos="fade-up">
        <div class="section-header text-center">
        <h2 class="text-dark">Kontak</h2>
        <p class="text-dark">Butuh Bantuan? <span class="text-white">Hubungi Kami</span></p>
        </div>

        <!-- MAP -->
        <div class="mb-3" style="max-width: 2000px; margin: 0 auto">
        <iframe
            src="https://www.google.com/maps?q=PT.+Intan+Sejahtera+Utama,+Jl.+H.I.A.+Saleh+Daeng+Tompo+No.+11,+Losari,+Ujung+Pandang,+Makassar,+Sulawesi+Selatan&hl=id&z=18&output=embed"
            width="100%" height="450"
            style="border: 0; border-radius: 20px; overflow: hidden"
            allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>

        <div class="row gy-4 mt-3">
        @foreach($kontaks as $kontak)
            <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
                <i class="icon bi {{ $kontak['icon'] }} flex-shrink-0"></i>
                <div>
                <h3 class="mb-1">{{ $kontak['label'] }}</h3>
                <strong>
                    <a href="{{ $kontak['url'] }}" target="_blank" rel="noopener">
                    {{ $kontak['value'] }}
                    </a>
                </strong>
                </div>
            </div>
            </div>
        @endforeach
        </div>
    </div>
    </section>
@endsection