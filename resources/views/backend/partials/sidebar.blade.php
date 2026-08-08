<aside class="admin-sidebar" id="adminSidebar">

    <div class="sidebar-brand">

        <div class="brand-symbol">
            R
        </div>

        <div class="brand-text">
            <h2>ROYDON</h2>
            <span>MEP ADMIN</span>
        </div>

    </div>

    <div class="sidebar-section-title">
        MAIN MENU
    </div>

    <nav class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}"
            class="sidebar-link
            {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-chart-line"></i>
            </span>

            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.home-banners.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.home-banners.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-regular fa-image"></i>
            </span>
            <span>Home Banner</span>
        </a>

        <a href="{{ route('admin.premium-stats.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.premium-stats.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-chart-simple"></i>
            </span>
            <span>Premium Stats</span>
        </a>

        <a href="{{ route('admin.civil-services.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.civil-services.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-helmet-safety"></i>
            </span>
            <span>Civil Services</span>
        </a>

        <a href="{{ route('admin.hospital-specialisations.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.hospital-specialisations.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-house-medical-flag"></i>
            </span>
            <span>Specialisations</span>
        </a>
        {{-- About Section Dropdown --}}
        <div class="sidebar-dropdown">

        <a href="{{ route('admin.projects.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-diagram-project"></i>
            </span>
            <span>Recent Projects</span>
        </a>

        <a href="{{ route('admin.why-choose-us.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.why-choose-us.*') || request()->routeIs('admin.why-choose-us-items.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-list-check"></i>
            </span>
            <span>Why Choose Us</span>
        </a>

        <a href="{{ route('admin.faqs.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-circle-question"></i>
            </span>
            <span>FAQs</span>
        </a>

        <a href="{{ route('admin.compliance-standards.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.compliance-standards.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-clipboard-check"></i>
            </span>
            <span>Compliance Standards</span>
        </a>

        <a href="{{ route('admin.standards-page.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.standards-page.*') || request()->routeIs('admin.standards-baseline-items.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-gears"></i>
            </span>
            <span>Standards Page Settings</span>
        </a>

    </nav>

    <div class="sidebar-footer">

        <div class="security-icon">
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <div>
            <strong>Secure Admin</strong>
            <span>Protected connection</span>
        </div>

    </div>

</aside>