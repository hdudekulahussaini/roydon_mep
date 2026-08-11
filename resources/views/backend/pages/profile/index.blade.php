@extends('layouts.backend.app')

@section('page-title', 'My Profile')

@push('styles')
<style>
    .profile-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.07);
        overflow: hidden;
    }

    .profile-banner {
        padding: 40px 40px 70px;
        position: relative;
    }

    .profile-banner-title {
        color: rgba(255,255,255,0.5);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .profile-banner h2 {
        color: #fff;
        font-size: 22px;
        font-weight: 800;
        margin: 0;
    }

    .profile-avatar-area {
        padding: 0 40px 30px;
        margin-top: -45px;
        display: flex;
        align-items: flex-end;
        gap: 24px;
    }

    .profile-avatar-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #82b440;
        border: 4px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
        box-shadow: 0 4px 16px rgba(130,180,64,0.3);
    }

    .profile-info-text {
        padding-bottom: 8px;
    }

    .profile-info-text h3 {
        font-size: 20px;
        font-weight: 800;
        color: #0F2044;
        margin: 0 0 4px;
    }

    .profile-info-text .profile-email-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(14,155,155,0.1);
        color: #0E9B9B;
        font-size: 13px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
    }

    .profile-info-text .profile-email-badge i {
        font-size: 11px;
    }

    .profile-body {
        padding: 30px 40px 40px;
        border-top: 1px solid #f1f5f9;
    }

    .profile-section-title {
        font-size: 14px;
        font-weight: 800;
        color: #0F2044;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .profile-section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }

    .form-label-custom {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 6px;
    }

    .form-control-custom {
        width: 100%;
        height: 48px;
        padding: 10px 16px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 9px;
        font-size: 14px;
        color: #0F2044;
        transition: all 0.2s;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: #82b440;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(130,180,64,0.12);
    }

    .form-control-custom:disabled {
        opacity: 0.65;
        cursor: not-allowed;
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper .form-control-custom {
        padding-right: 44px;
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
        padding: 0;
        font-size: 15px;
        transition: color 0.2s;
    }

    .toggle-pw:hover {
        color: #82b440;
    }

    .btn-save-password {
        background: #82b440;
        color: #fff;
        border: none;
        border-radius: 9px;
        height: 48px;
        padding: 0 28px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-save-password:hover {
        background: #6a9634;
        box-shadow: 0 4px 12px rgba(130,180,64,0.3);
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            {{-- Flash Messages --}}
            @if (session('flash_notification'))
                @foreach (session('flash_notification') as $flash)
                    <div class="alert alert-{{ $flash['level'] === 'success' ? 'success' : 'danger' }} alert-dismissible fade show mb-4" role="alert">
                        {{ $flash['message'] }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endforeach
            @endif

            <div class="profile-card">

                {{-- Banner --}}
                <div class="profile-banner">
                    <div class="profile-banner-title">Admin Panel</div>
                    <h2>My Profile</h2>
                </div>

                {{-- Avatar + Info --}}
                <div class="profile-avatar-area">
                    <div class="profile-avatar-circle">
                        {{ strtoupper(substr($user->name ?? 'A', 0, 2)) }}
                    </div>
                    <div class="profile-info-text">
                        <h3>{{ $user->name }}</h3>
                        <span class="profile-email-badge">
                            <i class="fa-solid fa-envelope"></i>
                            {{ $user->email }}
                        </span>
                    </div>
                </div>

                {{-- Change Password Form --}}
                <div class="profile-body">

                    <div class="profile-section-title">
                        <i class="fa-solid fa-lock" style="color:#82b440;"></i>
                        Change Password
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('admin.profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label-custom">Username</label>
                            <input type="text" class="form-control-custom" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">Email Address</label>
                            <input type="email" class="form-control-custom" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom" for="current_password">Current Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="current_password" name="current_password"
                                    class="form-control-custom @error('current_password') is-invalid @enderror"
                                    placeholder="Enter current password" autocomplete="current-password">
                                <button type="button" class="toggle-pw" data-target="current_password">
                                    <i class="fa-regular fa-eye" id="icon-current_password"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom" for="password">New Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="password" name="password"
                                    class="form-control-custom @error('password') is-invalid @enderror"
                                    placeholder="Enter new password" autocomplete="new-password">
                                <button type="button" class="toggle-pw" data-target="password">
                                    <i class="fa-regular fa-eye" id="icon-password"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom" for="password_confirmation">Confirm New Password</label>
                            <div class="password-wrapper">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control-custom"
                                    placeholder="Re-enter new password" autocomplete="new-password">
                                <button type="button" class="toggle-pw" data-target="password_confirmation">
                                    <i class="fa-regular fa-eye" id="icon-password_confirmation"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-save-password">
                            <i class="fa-solid fa-key me-2"></i> Update Password
                        </button>
                    </form>

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
