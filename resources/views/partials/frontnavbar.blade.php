<nav class="navbar navbar-expand-md">
  <ul class="navbar-nav ms-auto fw-bold">
    <!-- Dropdown Home -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="{{ route('home') }}" data-bs-toggle="dropdown" onclick="window.location='#';"> Beranda </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('aspek_hukum') }}">Aspek Hukum</a></li>
        <li><a class="dropdown-item" href="{{ route('pemegang_saham') }}">Susunan Pemegang Saham dan Organisasi</a></li>
        <li><a class="dropdown-item" href="{{ route('bisnis_proses') }}">Bisnis Proses dan Layanan</a></li>
        <li><a class="dropdown-item" href="{{ route('sebaran_tk') }}">Sebaran Tenaga Kerja</a></li>
        <li><a class="dropdown-item" href="{{ route('mitra') }}">Mitra</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="{{ route('mitra') }}" data-bs-toggle="dropdown" onclick="window.location='#about';">Tentang Kami</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('sertifikat') }}">Sertifikat</a></li>
        <li><a class="dropdown-item" href="{{ route('pembelajaran') }}">Materi Pembelajaran</a></li>
      </ul>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ request()->segment(1) == '' ? '#news' : route('berita') }}">Berita</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#moment">Giat</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#contact">Kontak</a></li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://flagcdn.com/w20/id.png" class="me-1">
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#" onclick="changeLang('id'); return false;">
            <img src="https://flagcdn.com/w20/id.png" class="me-2"> Indonesia
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#" onclick="changeLang('en'); return false;">
            <img src="https://flagcdn.com/w20/us.png" class="me-2"> English
          </a>
        </li>
      </ul>
    </li>

    <div id="google_translate_element" style="display:none"></div>

    <style>
      /* sembunyikan banner dan widget google */
      .goog-te-banner-frame.skiptranslate,
      .goog-te-gadget-icon,
      .goog-logo-link,
      .goog-te-gadget {
        display: none !important;
        visibility: hidden !important;
      }
      body { 
        top: 0 !important; 
        padding-top: 120px; /* tambahkan padding biar konten tidak ketimpa header */
      }
      .goog-te-menu-frame { display: none !important; }

      /* biar header turun smooth */
      #header {
        transition: margin-top 0.3s ease;
      }
    </style>

    <!-- Inisialisasi Google Translate -->
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'id',
          includedLanguages: 'id,en',
          autoDisplay: false
        }, 'google_translate_element');
        window._gt_ready = true;
      }
    </script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
      function changeLang(lang) {
        var dd = document.getElementById('languageDropdown');
        if (dd) {
          dd.innerHTML = '<img src="https://flagcdn.com/w20/' + (lang === 'id' ? 'id' : 'us') + '.png" class="me-1"> ' + (lang === 'id' ? '' : '');
        }

        var attempts = 0;
        var maxAttempts = 40;
        var interval = 200;

        var tryTranslate = function() {
          attempts++;
          var combo = document.querySelector('.goog-te-combo');
          if (combo) {
            try {
              combo.value = (lang === 'en') ? 'en' : 'id';
              combo.dispatchEvent(new Event('change'));
              clearInterval(timer);
              return;
            } catch (e) {}
          }
          if (attempts >= maxAttempts) clearInterval(timer);
        };
        var timer = setInterval(tryTranslate, interval);
        tryTranslate();
      }

      document.addEventListener('DOMContentLoaded', function() {
        var last = localStorage.getItem('site_lang');
        if (last) {
          var dd = document.getElementById('languageDropdown');
          if (dd) dd.innerHTML = '<img src="https://flagcdn.com/w20/' + (last === 'id' ? 'id' : 'us') + '.png" class="me-1"> ' + (last === 'id' ? '' : '');
        }
        var originalChangeLang = changeLang;
        changeLang = function(lang) {
          localStorage.setItem('site_lang', lang);
          originalChangeLang(lang);
        };
      });

      // ==== FUNGSI UNTUK TURUNKAN HEADER KALO TOOLBAR GOOGLE MUNCUL ====
      function adjustForTranslateToolbar() {
        let banner = document.querySelector("iframe.goog-te-banner-frame");
        let header = document.getElementById("header");
        if (banner && banner.offsetHeight > 0) {
          header.style.marginTop = banner.offsetHeight + "px";
        } else {
          header.style.marginTop = "0px";
        }
      }
      window.addEventListener("load", function () {
        setInterval(adjustForTranslateToolbar, 500);
      });
    </script>
  </ul>
</nav>