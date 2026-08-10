<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Dashboard') | Roydon MEP Admin
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link href="{{ asset('assets/fontawesome-pro/css/all.min.css') }}"
        rel="stylesheet">

    <link href="{{ asset('backend/assets/css/admin.css') }}"
        rel="stylesheet">

    @stack('styles')
</head>

<body>

    <div class="admin-wrapper">

        @include('backend.partials.sidebar')

        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <main class="admin-main">

            @include('backend.partials.header')

            <div class="admin-content">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fa-solid fa-circle-check me-2"></i>

                        {{ session('success') }}

                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>

                        {{ session('error') }}

                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        {{ session('warning') }}
                        <a href="{{ route('admin.categories.create') }}" class="alert-link ms-2">
                            Create a Category now &rarr;
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')

            </div>

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/assets/js/admin.js') }}"></script>

    <script>
        const sidebar = document.getElementById('adminSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        sidebarToggle?.addEventListener('click', function () {
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        });

        sidebarOverlay?.addEventListener('click', function () {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    </script>

    @stack('scripts')
</body>

</html>