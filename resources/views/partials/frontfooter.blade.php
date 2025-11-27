
<footer id="footer" class="footer bg-dark pt-5 pb-3" style="background-image: url('assets/img/bg3.png'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="row gy-4 justify-content-center text-center">

      <!-- Alamat -->
      <div class="col-md-4 d-flex flex-column align-items-center">
        <i class="bi bi-geo-alt fs-3 mb-2"></i>
        <div>
          <h5 class="fw-bold">Alamat</h5>
          <p class="mb-0">{{ getFooter()['Alamat'] }}</p>
        </div>
      </div>

      <!-- Hubungi -->
      <div class="col-md-4 d-flex flex-column align-items-center">
        <i class="bi bi-telephone fs-3 mb-2"></i>
        <div>
          <h5 class="fw-bold">Hubungi</h5>
          <p class="mb-0">
            <strong>Email:</strong> <br />{{ getFooter()['Email'] }} <br />
            <strong>Whatsapp:</strong> <br /><a href="https://wa.me/{{ getFooter()['Nomor'] }}">{{ getFooter()['Nomor'] }}</a>
          </p>
        </div>
      </div>

      <!-- Tersedia -->
      <div class="col-md-4 d-flex flex-column align-items-center">
        <i class="bi bi-clock fs-3 mb-2"></i>
        <div>
          <h5 class="fw-bold">Tersedia</h5>
          <p class="mb-0">
            <strong>Senin - Jumat:</strong> <br />{{ getFooter()['Waktu'] }}<br />
            <strong>Sabtu - Minggu:</strong> <br />Tutup
          </p>
        </div>
      </div>
    </div>

    <hr class="border-secondary my-4" />
    <div class="text-center small">© Hak Cipta <strong>PT. INTAN SEJAHTERA UTAMA</strong>.</div>
  </div>
</footer>