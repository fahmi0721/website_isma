<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('home') }}" target='_blank' class="brand-link">
            <img src="{{ getLogoAplikasi() }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text">{{ getNamaAplikasi() }}</span>
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >
          

            <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>Dashboard</p>
            </a>
            </li>

            <li class="nav-header">GENERAL</li>
            <li class="nav-item">
            <a href="{{ route('setting') }}" class="nav-link {{ Route::is('setting') ? 'active' : '' }}">
                <i class="nav-icon fa fa-solid fa-gear"></i>
                <p>Pengaturan Umum</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.berita') }}" class="nav-link {{  setActive(['admin.berita', 'admin.berita.create', 'admin.berita.edit'], 'active')  }}">
                <i class="nav-icon fa fa-solid fa-newspaper"></i>
                <p>Berita</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.sto') }}" class="nav-link {{  setActive(['admin.sto', 'admin.berita.sto', 'admin.berita.sto'], 'active')  }}">
                <i class="nav-icon fa fa-solid fa-sitemap"></i>
                <p>Struktur Organisasi</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.giat') }}" class="nav-link {{  setActive(['admin.giat', 'admin.berita.giat', 'admin.berita.giat'], 'active')  }}">
                <i class="nav-icon fa fa-solid fa-calendar-check"></i>
                <p>Giat</p>
            </a>
            </li>

            <li class="nav-item">
            <a href="{{ route('admin.kontak') }}" class="nav-link {{  setActive(['admin.kontak', 'admin.berita.kontak', 'admin.berita.kontak'], 'active')  }}">
                <i class="nav-icon fa fa-solid fa-envelope"></i>
                <p>Kontak</p>
            </a>
            </li>

            

        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
    </aside>