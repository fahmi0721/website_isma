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

      /* Business Process Styles */
      .process-timeline {
        position: relative;
        display: grid;
        gap: 2rem;
      }
      .grid-4 {
        grid-template-columns: repeat(4, 1fr);
      }
      .grid-5 {
        grid-template-columns: repeat(5, 1fr);
      }
      .process-card {
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 20px;
        padding: 1.5rem;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .process-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 22px rgba(0, 0, 0, 0.15);
      }
      .step-number {
        width: 50px;
        height: 50px;
        background: #0d6efd;
        color: #fff;
        font-weight: bold;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px auto;
        font-size: 1.2rem;
      }
      .icon-wrap i {
        transition: transform 0.3s ease;
      }
      .process-card:hover .icon-wrap i {
        transform: scale(1.2);
      }
      .process-timeline::before {
        content: "";
        position: absolute;
        top: 35px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #0d6efd, #20c997, #ffc107, #dc3545, #0dcaf0, #6c757d, #198754);
        z-index: -1;
      }

      /* Service Card Styles */
      .service-card {
        transition: all 0.3s ease;
        border: 1px solid #eaeaea;
      }
      .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 22px rgba(0, 0, 0, 0.15);
      }
      .service-img {
        height: 220px;
        width: 100%;
        object-fit: cover;
      }
    </style>

@endsection
@section('header')
<section class="position-relative text-white">
    <img src="{{ asset('front/assets/img/kapal.jpg') }}" class="img-fluid w-100" style="object-fit: cover; max-height: 400px" alt="Kapal Maritim" />
    <div class="position-absolute  start-0 w-100 h-100" style="top:60px;background: rgba(0, 60, 120, 0.55); max-height: 400px"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="fw-bold display-5">Bisnis Proses dan Layanan</h1>
        <p class="lead">PT Intan Sejahtera Utama (ISMA)</p>
    </div>
</section>
@endsection

@section('konten')

  <section class="container my-5">
    <div class="text-center mb-5">
      <h3 class="fw-bold text-primary">Business Process</h3>
      <p class="text-muted">
        Alur proses bisnis PT. Intan Sejahtera Utama (ISMA) dimulai dari kontrak kerja, perekrutan awak kapal, pengendalian mutu, hingga serah terima pekerjaan kepada pelanggan. Berikut tahapan lengkap yang dijalankan perusahaan untuk menjamin kualitas layanan dan kepuasan pelanggan.
      </p>
    </div>

    <div class="process-timeline grid-4">
      <div class="process-card" data-aos="fade-up">
        <div class="step-number">01</div>
        <div class="icon-wrap mb-3"><i class="fas fa-file-contract fa-2x text-primary"></i></div>
        <h5 class="fw-bold text-primary">CBA / Contract</h5>
        <p class="text-muted small mb-0">
          Tahap awal dimulai dari perolehan pekerjaan dengan kontrak kerjasama (CBA). Perusahaan melakukan negosiasi serta menetapkan kesepakatan formal mengenai ruang lingkup, biaya, dan tanggung jawab sebelum masuk ke tahap tender dan perencanaan.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="100">
        <div class="step-number">02</div>
        <div class="icon-wrap mb-3"><i class="fas fa-gavel fa-2x text-success"></i></div>
        <h5 class="fw-bold text-success">Tender</h5>
        <p class="text-muted small mb-0">
          Proses pemilihan penyedia jasa dilakukan secara terbuka dan transparan melalui tender. Perusahaan yang memenuhi syarat ditetapkan sebagai pemenang tender dan mendapatkan hak untuk melaksanakan pekerjaan sesuai kontrak.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="200">
        <div class="step-number">03</div>
        <div class="icon-wrap mb-3"><i class="fas fa-calendar-check fa-2x text-warning"></i></div>
        <h5 class="fw-bold text-warning">Plan</h5>
        <p class="text-muted small mb-0">
          Setelah kontrak diperoleh, tim melakukan perencanaan pekerjaan. Tahapan ini meliputi penyusunan strategi pelaksanaan, penjadwalan, alokasi sumber daya manusia dan peralatan, serta pemetaan risiko untuk memastikan operasional berjalan efektif.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="300">
        <div class="step-number">04</div>
        <div class="icon-wrap mb-3"><i class="fas fa-user-plus fa-2x text-danger"></i></div>
        <h5 class="fw-bold text-danger">Recruitment & Placement (RPM)</h5>
        <p class="text-muted small mb-0">
          Perekrutan awak kapal dilakukan secara ketat melalui tahapan rekrutmen, mutasi, promosi, maupun demosi sesuai kebutuhan. Proses ini mencakup <b>sign on/off, transfer, hingga penempatan personel</b> yang sesuai dengan kompetensi agar mendukung kinerja optimal.
        </p>
      </div>
    </div>

    <div class="process-timeline grid-5 mt-5">
      <div class="process-card" data-aos="fade-up" data-aos-delay="400">
        <div class="step-number">05</div>
        <div class="icon-wrap mb-3"><i class="fas fa-check-circle fa-2x text-info"></i></div>
        <h5 class="fw-bold text-info">Quality Control</h5>
        <p class="text-muted small mb-0">
          Untuk memastikan kesiapan kerja, dilakukan pemeriksaan <b>fit to work</b>, pelatihan dan drill, pengecekan higienitas, serta audit lingkungan kerja. Tahap ini juga mencakup management walkthrough untuk menjamin bahwa seluruh awak kapal mematuhi standar keselamatan dan prosedur kerja.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="500">
        <div class="step-number">06</div>
        <div class="icon-wrap mb-3"><i class="fas fa-certificate fa-2x text-secondary"></i></div>
        <h5 class="fw-bold text-secondary">Certification</h5>
        <p class="text-muted small mb-0">
          Awak kapal wajib memiliki sertifikat yang sah dan berlaku. Pada tahap ini dilakukan pembaruan sertifikat, pelatihan keselamatan, serta revalidasi kompetensi sesuai standar internasional untuk memastikan kelayakan bekerja di laut.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="600">
        <div class="step-number">07</div>
        <div class="icon-wrap mb-3"><i class="fas fa-ship fa-2x text-dark"></i></div>
        <h5 class="fw-bold text-dark">Repatriation</h5>
        <p class="text-muted small mb-0">
          Pemulangan awak kapal dilakukan dengan dua mekanisme: <b>normal basis</b> setelah masa kerja selesai, atau <b>emergency response</b> ketika terjadi kondisi darurat. Proses ini menjamin hak-hak awak kapal tetap terlindungi.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="700">
        <div class="step-number">08</div>
        <div class="icon-wrap mb-3"><i class="fas fa-users fa-2x text-primary"></i></div>
        <h5 class="fw-bold text-primary">Process (Execution)</h5>
        <p class="text-muted small mb-0">
          Pelaksanaan pekerjaan dilakukan sesuai perencanaan dan standar regulasi maritim. Termasuk di dalamnya seleksi awak kapal, registrasi pada DirJenHubla, serta operasional seperti <b>PKL awak kapal, Sijil On/Off, dan MCU approval</b> dari pihak berwenang.
        </p>
      </div>

      <div class="process-card" data-aos="fade-up" data-aos-delay="800">
        <div class="step-number">09</div>
        <div class="icon-wrap mb-3"><i class="fas fa-handshake fa-2x text-success"></i></div>
        <h5 class="fw-bold text-success">Customer / Handover</h5>
        <p class="text-muted small mb-0">
          Tahap akhir adalah serah terima hasil kerja kepada pelanggan. Penyerahan dilakukan secara formal untuk memastikan pelanggan menerima layanan sesuai kontrak, serta menjadi evaluasi bagi peningkatan kualitas perusahaan ke depan.
        </p>
      </div>
    </div>
  </section>

  <section class="container my-5">
    <div class="text-center mb-5">
      <h3 class="fw-bold text-primary">Service Provide</h3>
      <p class="text-muted">
        Sebagai pendukung dalam dunia Kemaritiman dan Fasilitas Kepelabuhanan, PT. Intan Sejahtera Utama berkomitmen untuk mensupport Indonesia Maritime Gateway.
      </p>
    </div>

    <div class="row g-4">
      <div class="col-md-6" data-aos="zoom-in">
        <div class="service-card shadow-sm rounded-4 overflow-hidden h-100">
          <img src="{{ asset('front/assets/img/awak kapal.jpg') }}" class="img-fluid service-img" alt="Tenaga Awak Kapal" />
          <div class="p-4 bg-light">
            <h5 class="fw-bold text-primary">Tenaga Awak Kapal</h5>
            <p class="text-muted small mb-0">
              <strong>PT Intan Sejahtera Utama</strong> menyediakan jasa tenaga awak kapal yang berkompeten dengan latar belakang di bidang kelautan. Awak kapal kami dilatih untuk memberikan kenyamanan, keselamatan, serta profesionalisme tinggi dalam beroperasi.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-6" data-aos="zoom-in" data-aos-delay="150">
        <div class="service-card shadow-sm rounded-4 overflow-hidden h-100">
          <img src="{{ asset('front/assets/img/maritim pilot.jpg') }}" class="img-fluid service-img" alt="Maritime Pilot" />
          <div class="p-4 bg-white">
            <h5 class="fw-bold text-success">Maritime Pilot</h5>
            <p class="text-muted small mb-0">
              <strong>PT Intan Sejahtera Utama</strong> juga menyediakan jasa <em>Maritime Pilot Expert (Pandu)</em> yang berkompeten dengan sertifikasi resmi. Para maritime pilot kami siap membantu klien dalam mengarahkan kapal dengan aman dan efisien ketika masuk ataupun keluar pelabuhan.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection