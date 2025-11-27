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

        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
    </aside>