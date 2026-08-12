<aside class="admin-sidebar" id="adminSidebar">

    <div class="sidebar-brand">

        <a href="{{ route('admin.dashboard') }}" class="brand-logo-link">
            <img src="{{ asset('frontend/assets/img/logo/roydon_mep_no_bg.webp') }}"
                alt="Roydon MEP Contracting"
                class="sidebar-logo-img">
        </a>

        <button type="button" class="sidebar-close-btn d-lg-none ms-auto" id="sidebarClose" aria-label="Close Sidebar">
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>

    <div class="sidebar-section-title">
        MAIN MENU
    </div>

    <nav class="sidebar-menu">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
            class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="sidebar-icon"><i class="fa-solid fa-chart-line"></i></span>
            <span>Dashboard</span>
        </a>

        {{-- Enquiries --}}
        @php
            $maxEnquiryId = \App\Models\Enquiry::max('id') ?? 0;
            $lastSeenId = session('last_seen_enquiry_id', $maxEnquiryId);
            $unseenEnquiries = \App\Models\Enquiry::where('id', '>', $lastSeenId)->count();
        @endphp
        <a href="{{ route('admin.enquiries.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
            <span class="sidebar-icon"><i class="fa-solid fa-inbox"></i></span>
            <span>Enquiries</span>
            @if($unseenEnquiries > 0)
                <span class="sidebar-count-badge ms-auto">{{ $unseenEnquiries }}</span>
            @endif
        </a>

        {{-- Home Page --}}
        @php
            $homeActive = request()->routeIs(
                'admin.home-banners.*',
                'admin.premium-stats.*',
                'admin.civil-services.*',
                'admin.hospital-specialisations.*',
                'admin.why-choose-us.*',
                'admin.why-choose-us-items.*',
                'admin.faqs.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $homeActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $homeActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-house"></i></span>
                <span>Home Page</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.home-banners.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.home-banners.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-image"></i></span>
                    <span>Home Banner</span>
                </a>
                <a href="{{ route('admin.premium-stats.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.premium-stats.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-trophy"></i></span>
                    <span>Premium Stats</span>
                </a>
                <a href="{{ route('admin.civil-services.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.civil-services.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-helmet-safety"></i></span>
                    <span>Civil Services</span>
                </a>
                <a href="{{ route('admin.hospital-specialisations.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.hospital-specialisations.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-house-medical-flag"></i></span>
                    <span>Specialisations</span>
                </a>
                <a href="{{ route('admin.why-choose-us.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.why-choose-us.*') || request()->routeIs('admin.why-choose-us-items.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-list-check"></i></span>
                    <span>Why Choose Us</span>
                </a>
                <a href="{{ route('admin.faqs.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-circle-question"></i></span>
                    <span>FAQs</span>
                </a>
            </div>
        </div>

        {{-- Projects --}}
        @php
            $projectsActive = request()->routeIs('admin.projects.*');
        @endphp
        <div class="sidebar-dropdown {{ $projectsActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $projectsActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-diagram-project"></i></span>
                <span>Projects</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.projects.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.projects.index') || request()->routeIs('admin.projects.create') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-list"></i></span>
                    <span>All Projects</span>
                </a>
            </div>
        </div>

        {{-- About Page --}}
        @php
            $aboutActive = request()->routeIs(
                'admin.story-sections.*',
                'admin.company-values.*',
                'admin.metrics.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $aboutActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $aboutActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-circle-info"></i></span>
                <span>About Page</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.story-sections.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.story-sections.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-book-open"></i></span>
                    <span>Story Sections</span>
                </a>
                <a href="{{ route('admin.company-values.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.company-values.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-handshake"></i></span>
                    <span>Company Values</span>
                </a>
                <a href="{{ route('admin.metrics.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.metrics.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-chart-bar"></i></span>
                    <span>Metrics</span>
                </a>
            </div>
        </div>

        {{-- Categories Dropdown --}}
        @php
            $categoriesActive = request()->routeIs(
                'admin.categories.*',
                'admin.service-subcategories.*',
                'admin.specialisation-subcategories.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $categoriesActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $categoriesActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-layer-group"></i></span>
                <span>Categories</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.categories.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-layer-group"></i></span>
                    <span>Categories</span>
                </a>
                <a href="{{ route('admin.service-subcategories.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.service-subcategories.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-tags"></i></span>
                    <span>Service Subcategories</span>
                </a>
                <a href="{{ route('admin.specialisation-subcategories.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.specialisation-subcategories.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-house-medical-circle-check"></i></span>
                    <span>Specialisation Subcat.</span>
                </a>
            </div>
        </div>

        {{-- Standards Page --}}
        @php
            $standardsActive = request()->routeIs(
                'admin.standard-banners.*',
                'admin.standard-sections.*',
                'admin.standards.*',
                'admin.baselines.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $standardsActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $standardsActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-certificate"></i></span>
                <span>Standards</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.standard-banners.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.standard-banners.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-image"></i></span>
                    <span>Standards Banner</span>
                </a>
                <a href="{{ route('admin.standard-sections.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.standard-sections.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-layer-group"></i></span>
                    <span>Standard Sections</span>
                </a>
                <a href="{{ route('admin.standards.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.standards.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-list-check"></i></span>
                    <span>Standards</span>
                </a>
                <a href="{{ route('admin.baselines.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.baselines.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-shield-halved"></i></span>
                    <span>Compliance Baseline</span>
                </a>
            </div>
        </div>

        {{-- Process Page --}}
        @php
            $processActive = request()->routeIs(
                'admin.project-processes.*',
                'admin.works.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $processActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $processActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-arrows-spin"></i></span>
                <span>Process</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.project-processes.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.project-processes.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-arrows-spin"></i></span>
                    <span>Project Processes</span>
                </a>
                <a href="{{ route('admin.works.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.works.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-briefcase"></i></span>
                    <span>Works / Steps</span>
                </a>
            </div>
        </div>

        {{-- Offices Page --}}
        @php
            $officesActive = request()->routeIs(
                'admin.office-locations.*',
                'admin.coverages.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $officesActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $officesActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-map-location-dot"></i></span>
                <span>Offices</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.office-locations.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.office-locations.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-map-location-dot"></i></span>
                    <span>Office Locations</span>
                </a>
                <a href="{{ route('admin.coverages.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.coverages.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-globe"></i></span>
                    <span>Coverages</span>
                </a>
            </div>
        </div>

        {{-- Contact Settings --}}
        <a href="{{ route('admin.contact-settings.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.contact-settings.*') ? 'active' : '' }}">
            <span class="sidebar-icon"><i class="fa-solid fa-address-book"></i></span>
            <span>Contact Settings</span>
        </a>


        {{-- Site Settings --}}
        @php
            $settingsActive = request()->routeIs(
                'admin.banners.*',
                'admin.footers.*',
            );
        @endphp
        <div class="sidebar-dropdown {{ $settingsActive ? 'open' : '' }}">
            <button type="button" class="sidebar-link sidebar-dropdown-toggle {{ $settingsActive ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fa-solid fa-gear"></i></span>
                <span>Site Settings</span>
                <span class="sidebar-chevron ms-auto"><i class="fa-solid fa-chevron-down"></i></span>
            </button>
            <div class="sidebar-dropdown-menu">
                <a href="{{ route('admin.banners.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-regular fa-images"></i></span>
                    <span>Page Banners</span>
                </a>
                <a href="{{ route('admin.footers.index') }}"
                    class="sidebar-link sidebar-sub-link {{ request()->routeIs('admin.footers.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-shoe-prints"></i></span>
                    <span>Footer Settings</span>
                </a>
            </div>
        </div>

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
    /* Sidebar Dropdown & Sub-link Styles (White Theme) */
    .sidebar-dropdown {
        width: 100%;
        margin-bottom: 2px;
        overflow-x: hidden;
    }

    .sidebar-dropdown-toggle {
        width: 100%;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 0;
    }

    .sidebar-dropdown.open > .sidebar-dropdown-toggle {
        background: #f0fdfd;
        color: #0E9B9B;
        font-weight: 600;
    }

    .sidebar-chevron {
        margin-left: auto;
        font-size: 0.7rem;
        transition: transform 0.25s ease;
        padding-left: 8px;
        flex-shrink: 0;
        color: #0E9B9B;
    }

    .sidebar-dropdown.open > .sidebar-dropdown-toggle .sidebar-chevron i,
    .sidebar-dropdown-toggle[aria-expanded="true"] .sidebar-chevron i {
        transform: rotate(180deg);
    }

    .sidebar-dropdown-menu {
        display: none;
        flex-direction: column;
        padding-left: 6px;
        margin-top: 2px;
        margin-bottom: 4px;
        overflow: hidden;
        border-left: 2px solid #cceeee;
        margin-left: 20px;
    }

    .sidebar-dropdown.open > .sidebar-dropdown-menu {
        display: flex;
    }

    .sidebar-sub-link {
        padding-left: 1.2rem !important;
        font-size: 0.84rem !important;
        min-height: 38px !important;
        margin-bottom: 2px !important;
        border-radius: 6px !important;
        color: #64748b !important;
    }

    .sidebar-sub-link:hover {
        background: #f0fdfd !important;
        color: #0E9B9B !important;
    }

    .sidebar-sub-link.active {
        background: #e6f7f7 !important;
        color: #0E9B9B !important;
        font-weight: 700 !important;
        box-shadow: inset 0 0 0 1px #b3e6e6 !important;
    }

    .sidebar-sub-link:before {
        content: '';
        display: inline-block;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #94a3b8;
        margin-right: 8px;
        flex-shrink: 0;
    }

    .sidebar-sub-link.active:before {
        background: #0E9B9B;
        box-shadow: 0 0 6px rgba(14, 155, 155, 0.6);
    }

    .sidebar-sub-link .sidebar-icon {
        font-size: 0.8rem;
    }

    .sidebar-count-badge {
        margin-left: auto;
        background: #0E9B9B;
        color: #ffffff;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 2px 8px;
        border-radius: 50rem;
        line-height: 1.2;
        box-shadow: 0 2px 8px rgba(14, 155, 155, 0.3);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.sidebar-dropdown-toggle');

        toggles.forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const dropdown = this.closest('.sidebar-dropdown');
                const isOpen = dropdown.classList.contains('open');

                // Close all dropdowns
                document.querySelectorAll('.sidebar-dropdown').forEach(function (d) {
                    d.classList.remove('open');
                });

                // Toggle clicked one
                if (!isOpen) {
                    dropdown.classList.add('open');
                }
            });
        });
    });
</script>
