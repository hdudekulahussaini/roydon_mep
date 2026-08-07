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

        <a href="{{ url('/admin/projects') }}"
            class="sidebar-link
            {{ request()->is('admin/projects*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-building"></i>
            </span>

            <span>Projects</span>
        </a>

        <a href="{{ url('/admin/services') }}"
            class="sidebar-link
            {{ request()->is('admin/services*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </span>

            <span>Services</span>
        </a>

        <a href="{{ url('/admin/enquiries') }}"
            class="sidebar-link
            {{ request()->is('admin/enquiries*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-regular fa-envelope"></i>
            </span>

            <span>Enquiries</span>

            @if (($stats['new_enquiries'] ?? 0) > 0)
                <span class="sidebar-badge">
                    {{ $stats['new_enquiries'] }}
                </span>
            @endif
        </a>

        <a href="{{ url('/admin/statistics') }}"
            class="sidebar-link
            {{ request()->is('admin/statistics*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-chart-simple"></i>
            </span>

            <span>Statistics</span>
        </a>

        <a href="{{ url('/admin/locations') }}"
            class="sidebar-link
            {{ request()->is('admin/locations*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-location-dot"></i>
            </span>

            <span>Locations</span>
        </a>

        <div class="sidebar-section-title second-title">
            WEBSITE
        </div>

        <a href="{{ url('/admin/homepage') }}"
            class="sidebar-link
            {{ request()->is('admin/homepage*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-house"></i>
            </span>

            <span>Homepage</span>
        </a>

        <a href="{{ url('/admin/settings') }}"
            class="sidebar-link
            {{ request()->is('admin/settings*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-gear"></i>
            </span>

            <span>Settings</span>
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