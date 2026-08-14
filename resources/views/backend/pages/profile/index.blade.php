@extends('layouts.backend.app')

@section('page-title', 'My Profile')

@section('content')
<div class="container-fluid px-0">

    {{-- Header Banner --}}
    <div class="profile-header-banner">
        <span class="badge-role">
            <i class="fa-solid fa-shield-halved me-1"></i> Administrator Account
        </span>
        <h2>Account Settings & Security</h2>
        <p>Manage your personal administrator credentials and login password.</p>
    </div>

    {{-- Offset Content --}}
    <div class="profile-container-offset">
        <div class="row g-4">

            {{-- Left Column: Admin Info Card --}}
            <div class="col-lg-4">
                <div class="profile-card">
                    <div class="profile-avatar-box">
                        <div class="profile-avatar-circle">
                            {{ strtoupper(substr($user->name ?? 'A', 0, 2)) }}
                        </div>
                        <h4>{{ $user->name }}</h4>
                        <span class="profile-email-badge">
                            <i class="fa-solid fa-envelope"></i>
                            {{ $user->email }}
                        </span>
                    </div>

                    <div class="profile-detail-list">
                        <div class="detail-item">
                            <span class="label">
                                <i class="fa-solid fa-user-tag text-muted"></i> Role
                            </span>
                            <span class="value text-success">
                                <i class="fa-solid fa-circle-check me-1"></i>  Admin
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="label">
                                <i class="fa-solid fa-shield-halved text-muted"></i> Account Status
                            </span>
                            <span class="value badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill">
                                Active
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="label">
                                <i class="fa-solid fa-clock text-muted"></i> Account Created
                            </span>
                            <span class="value">
                                {{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Change Password & Account Details Form --}}
            <div class="col-lg-8">
                <div class="profile-card">
                    <div class="profile-body">

                        {{-- Flash Messages --}}
                        @if (session('flash_notification'))
                            @foreach (session('flash_notification') as $flash)
                                <div class="alert alert-{{ $flash['level'] === 'success' ? 'success' : 'danger' }} alert-dismissible fade show mb-4" role="alert">
                                    <i class="fa-solid {{ $flash['level'] === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation' }} me-2"></i>
                                    {{ $flash['message'] }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endforeach
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                <strong>
                                    <i class="fa-solid fa-triangle-exclamation me-2"></i> Please fix the following errors:
                                </strong>
                                <ul class="mb-0 mt-2 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- Form Title --}}
                        <div class="profile-form-title">
                            <i class="fa-solid fa-lock"></i>
                            Security & Password Update
                        </div>

                        <form action="{{ route('admin.profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label-custom">Administrator Name</label>
                                    <input type="text" class="form-control-custom" value="{{ $user->name }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label-custom">Email Address</label>
                                    <input type="email" class="form-control-custom" value="{{ $user->email }}" disabled>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label-custom" for="current_password">Current Password *</label>
                                <div class="password-wrapper">
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control-custom @error('current_password') is-invalid @enderror"
                                        placeholder="Enter your current password" autocomplete="new-password" required>
                                    <button type="button" class="toggle-pw" data-target="current_password" aria-label="Toggle password visibility">
                                        <i class="fa-regular fa-eye" id="icon-current_password"></i>
                                    </button>
                                </div>
                                @error('current_password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label-custom" for="password">New Password *</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password" name="password"
                                            class="form-control-custom @error('password') is-invalid @enderror"
                                            placeholder="Enter new password" autocomplete="new-password" required>
                                        <button type="button" class="toggle-pw" data-target="password" aria-label="Toggle password visibility">
                                            <i class="fa-regular fa-eye" id="icon-password"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label-custom" for="password_confirmation">Confirm New Password *</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control-custom"
                                            placeholder="Re-enter new password" autocomplete="new-password" required>
                                        <button type="button" class="toggle-pw" data-target="password_confirmation" aria-label="Toggle password visibility">
                                            <i class="fa-regular fa-eye" id="icon-password_confirmation"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn-save-password">
                                    <i class="fa-solid fa-key me-2"></i> Update Password
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    (function() {
        function initPasswordToggles() {
            document.querySelectorAll('.toggle-pw').forEach(function (button) {
                const newButton = button.cloneNode(true);
                button.parentNode.replaceChild(newButton, button);
                
                newButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const targetId = newButton.getAttribute('data-target');
                    const inputField = document.getElementById(targetId);
                    const icon = newButton.querySelector('i');
                    
                    if (inputField && icon) {
                        if (inputField.type === 'password') {
                            inputField.type = 'text';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        } else {
                            inputField.type = 'password';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        }
                    }
                });
            });

        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initPasswordToggles);
        } else {
            initPasswordToggles();
        }
    })();
</script>
@endsection
