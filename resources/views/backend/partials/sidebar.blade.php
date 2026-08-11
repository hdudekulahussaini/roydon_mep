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
                <i class="fa-solid fa-image"></i>
            </span>
            <span>Home Banner</span>
        </a>

        <a href="{{ route('admin.banners.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-regular fa-images"></i>
            </span>
            <span>Page Banners</span>
        </a>
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

        <a href="{{ route('admin.why-choose-us.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.why-choose-us.*') || request()->routeIs('admin.why-choose-us-items.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-list-check"></i>
            </span>
            <span>Why Choose Us</span>
        </a>


        <a href="{{ route('admin.projects.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-diagram-project"></i>
            </span>
            <span>Projects</span>
        </a>

        <a href="{{ route('admin.faqs.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-circle-question"></i>
            </span>
            <span>FAQs</span>
        </a>

        <div class="sidebar-section-title">
            ABOUT
        </div>
        <a href="{{ route('admin.story-sections.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.story-sections.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-book-open"></i>
            </span>
            <span>Story Sections</span>
        </a>
        <a href="{{ route('admin.company-values.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.company-values.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-handshake"></i>
            </span>
            <span>Company Values</span>
        </a>
        <a href="{{ route('admin.metrics.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.metrics.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-chart-bar"></i>
            </span>
            <span>Metrics</span>
        </a>

        <div class="sidebar-section-title">
            PROCESS & STEPS
        </div>
        <a href="{{ route('admin.project-processes.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.project-processes.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-arrows-spin"></i>
            </span>
            <span>Project Processes</span>
        </a>
        <a href="{{ route('admin.works.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.works.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span>Works / Steps</span>
        </a>

        <div class="sidebar-section-title">
            OFFICES
        </div>
        <a href="{{ route('admin.office-locations.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.office-locations.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-map-location-dot"></i>
            </span>
            <span>Office Locations</span>
        </a>
        <a href="{{ route('admin.coverages.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.coverages.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-globe"></i>
            </span>
            <span>Coverages</span>
        </a>



        <div class="sidebar-section-title">
            CONTACT
        </div>
        <a href="{{ route('admin.contact-settings.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.contact-settings.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-address-book"></i>
            </span>
            <span>Contact Settings</span>
        </a>
        <a href="{{ route('admin.enquiries.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-inbox"></i>
            </span>
            <span>Enquiries</span>
        </a>

        <div class="sidebar-section-title">
            OTHER
        </div>

        <a href="{{ route('admin.footers.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.footers.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-shoe-prints"></i>
            </span>
            <span>Footer Settings</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <span>Categories</span>
        </a>
        <a href="{{ route('admin.service-subcategories.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.service-subcategories.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-tags"></i>
            </span>
            <span>Service Subcategories</span>
        </a>
        <a href="{{ route('admin.specialisation-subcategories.index') }}"
            class="sidebar-link
          {{ request()->routeIs('admin.specialisation-subcategories.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <i class="fa-solid fa-house-medical-circle-check"></i>
            </span>
            <span>Specialisation Subcat.</span>
        </a>

        {{-- Standards --}}
        <div class="sidebar-section-title">
            STANDARDS_OVERVIEW
        </div>
        <a
            href="{{ route('admin.standard-banners.index') }}"
            class="sidebar-link
    {{ request()->routeIs('admin.standard-banners.*') ? 'active' : '' }}">

            <span class="sidebar-icon">

                <i class="fa-solid fa-image"></i>

            </span>

            <span>
                Standards Banner
            </span>

        </a>

        <a
            href="{{ route('admin.standard-sections.index') }}"
            class="sidebar-link
    {{ request()->routeIs('admin.standard-sections.*')
        ? 'active'
        : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-layer-group"></i>
            </span>

            <span class="sidebar-text">
                Standard Sections
            </span>

        </a>


        <a
            href="{{ route('admin.standards.index') }}"
            class="sidebar-link
    {{ request()->routeIs('admin.standards.*')
        ? 'active'
        : '' }}">

            <span class="sidebar-icon">
                <i class="fa-solid fa-list-check"></i>
            </span>

            <span class="sidebar-text">
                Standards
            </span>

        </a>
        {{-- Compliance Baseline --}}

        <a
            href="{{ route('admin.baselines.index') }}"
            class="sidebar-link
    {{ request()->routeIs('admin.baselines.*') ? 'active' : '' }}">

            <span class="sidebar-icon">

                <i class="fa-solid fa-shield-halved"></i>

            </span>

            <span>
                Compliance Baseline
            </span>

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
<style>
/* Rounded scrollbar thumb for sidebar */
.admin-sidebar {
    overflow-y: scroll; /* always show scrollbar */
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: #82b440 transparent; /* Firefox thumb color */
}
.admin-sidebar::-webkit-scrollbar {
    width: 8px; /* always show scrollbar */
}
.admin-sidebar::-webkit-scrollbar-thumb {
    background-color: #82b440;
    border-radius: 8px;
}
</style>