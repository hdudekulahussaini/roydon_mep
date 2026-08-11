<header class="admin-header">

    <div class="header-left">

        <button type="button"
            class="sidebar-toggle"
            id="sidebarToggle">

            <i class="fa-solid fa-bars"></i>
        </button>

        <div>
            <h1>@yield('page-title', 'Dashboard')</h1>

            <p>
                Manage Roydon MEP website content
            </p>
        </div>

    </div>

    <div class="header-right">

        <a href="{{ url('/') }}"
            target="_blank"
            class="view-website-button">

            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>View Website</span>
        </a>

        <button type="button" class="notification-button">
            <i class="fa-regular fa-bell"></i>

            @if (($stats['new_enquiries'] ?? 0) > 0)
                <span class="notification-dot"></span>
            @endif
        </button>

        <div class="dropdown">

            <button type="button"
                class="admin-profile"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                <div class="admin-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'Admin', 0, 2)) }}
                </div>

                <div class="admin-details">
                    <strong>
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </strong>

                    <span>Administrator</span>
                </div>

                <i class="fa-solid fa-chevron-down profile-arrow"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end profile-menu">

                <li class="profile-menu-header">
                    <strong>
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </strong>

                    <span>
                        {{ auth()->user()->email ?? '' }}
                    </span>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a href="{{ route('admin.profile.show') }}"
                        class="dropdown-item">

                        <i class="fa-regular fa-user"></i>
                        Profile settings
                    </a>
                </li>

                <li>
                    <form action="{{ route('admin.logout') }}"
                        method="POST">

                        @csrf

                        <button type="submit"
                            class="dropdown-item logout-button">

                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</header>