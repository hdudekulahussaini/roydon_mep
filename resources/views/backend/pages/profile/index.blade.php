@extends('layouts.backend.app')

@section('page-title', 'My Profile')

@push('styles')
<style>
    .profile-header-banner {
        background: linear-gradient(135deg, #074e4e 0%, #0E9B9B 100%);
        border-radius: 16px;
        padding: 35px 35px 75px;
        position: relative;
        overflow: hidden;
        color: #fff;
        box-shadow: 0 10px 30px rgba(14, 155, 155, 0.2);
    }

    .profile-header-banner::after {
        content: '';
        position: absolute;
        right: -50px;
        bottom: -50px;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        pointer-events: none;
    }

    .profile-header-banner .badge-role {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(4px);
        color: #ffffff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 50px;
    }

    .profile-header-banner h2 {
        font-size: 26px;
        font-weight: 800;
        margin: 12px 0 4px;
    }

    .profile-header-banner p {
        color: #e2f8f8;
        font-size: 13.5px;
        margin: 0;
    }

    /* Main Container Offset */
    .profile-container-offset {
        margin-top: -50px;
        position: relative;
        z-index: 2;
    }

    .profile-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        height: 100%;
        overflow: hidden;
    }

    .profile-avatar-box {
        text-align: center;
        padding: 30px 24px 24px;
        border-bottom: 1px solid #f1f5f9;
    }

    .profile-avatar-circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(135deg, #0E9B9B 0%, #066d6d 100%);
        border: 4px solid #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        font-weight: 800;
        color: #ffffff;
        margin: 0 auto 16px;
        box-shadow: 0 8px 24px rgba(14, 155, 155, 0.35);
    }

    .profile-avatar-box h4 {
        font-size: 20px;
        font-weight: 800;
        color: #0f1714;
        margin: 0 0 6px;
    }

    .profile-email-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(14, 155, 155, 0.1);
        color: #0E9B9B;
        font-size: 13px;
        font-weight: 600;
        padding: 5px 14px;
        border-radius: 50px;
    }

    .profile-detail-list {
        padding: 24px;
    }

    .detail-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px dashed #e2e8f0;
        font-size: 13.5px;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-item .label {
        color: #64748b;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .detail-item .value {
        color: #0f1714;
        font-weight: 700;
    }

    /* Form Styles */
    .profile-body {
        padding: 32px 36px;
    }

    .profile-form-title {
        font-size: 15px;
        font-weight: 800;
        color: #0f1714;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-form-title i {
        color: #0E9B9B;
        font-size: 18px;
    }

    .profile-form-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }

    .form-label-custom {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
    }

    .form-control-custom {
        width: 100%;
        height: 48px;
        padding: 10px 16px;
        background: #f8fafc;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 14px;
        color: #0f1714;
        transition: all 0.25s ease;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: #0E9B9B;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(14, 155, 155, 0.15);
    }

    .form-control-custom:disabled {
        background: #f1f5f9;
        color: #64748b;
        cursor: not-allowed;
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper .form-control-custom {
        padding-right: 46px;
    }

    .toggle-pw {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #94a3b8;
        cursor: pointer;
        padding: 4px;
        font-size: 16px;
        transition: color 0.2s ease;
    }

    .toggle-pw:hover {
        color: #0E9B9B;
    }

    .btn-save-password {
        background: linear-gradient(135deg, #0E9B9B 0%, #077979 100%);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        height: 48px;
        padding: 0 32px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(14, 155, 155, 0.35);
        transition: all 0.25s ease;
    }

    .btn-save-password:hover {
        background: linear-gradient(135deg, #0b8484 0%, #056161 100%);
        box-shadow: 0 6px 18px rgba(14, 155, 155, 0.45);
        transform: translateY(-1px);
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

    {{-- Header Banner --}}
    <div class="profile-header-banner">
        <span class="badge-role"><i class="fa-solid fa-shield-halved me-1"></i> Administrator Account</span>
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
                            <span class="label"><i class="fa-solid fa-user-tag text-muted"></i> Role</span>
                            <span class="value text-success"><i class="fa-solid fa-circle-check me-1"></i> Super Admin</span>
                        </div>
                        <div class="detail-item">
                            <span class="label"><i class="fa-solid fa-shield-halved text-muted"></i> Account Status</span>
                            <span class="value badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill">Active</span>
                        </div>
                        <div class="detail-item">
                            <span class="label"><i class="fa-solid fa-clock text-muted"></i> Account Created</span>
                            <span class="value">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</span>
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
                                <strong><i class="fa-solid fa-triangle-exclamation me-2"></i> Please fix the following errors:</strong>
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

                            <div class="mb-3">
                                <label class="form-label-custom" for="current_password">Current Password *</label>
                                <div class="password-wrapper">
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control-custom @error('current_password') is-invalid @enderror"
                                        placeholder="Enter your current password" autocomplete="current-password" required>
                                    <button type="button" class="toggle-pw" data-target="current_password" aria-label="Toggle password visibility">
                                        <i class="fa-regular fa-eye" id="icon-current_password"></i>
                                    </button>
                                </div>
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
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.toggle-pw').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var targetId = this.dataset.target;
            var input = document.getElementById(targetId);
            var icon  = document.getElementById('icon-' + targetId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>
@endpush
