@extends('layouts.backend.app')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="container mt-4">
  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
      <h5 class="mb-0">Profile Information</h5>
    </div>
    <div class="card-body text-center">
        <i class="fas fa-user-circle fa-5x mb-3"></i>
      <h4 class="card-title mb-1">{{ auth()->user()->name }}</h4>
      <p class="text-muted mb-3">{{ auth()->user()->email }}</p>
    </div>
    <div class="card-body">
      <h5 class="mb-3">Change Password</h5>
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <form action="{{ route('admin.profile.password.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="current_password" class="form-label">Current Password</label>
          <div class="input-group">
            <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" required autocomplete="current-password">
            <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePassword('current_password')">👁</button>
          </div>
          @error('current_password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
            <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePassword('password')">👁</button>
          </div>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm New Password</label>
          <div class="input-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
            <button type="button" class="btn btn-outline-secondary toggle-password" onclick="togglePassword('password_confirmation')">👁</button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
      </form>
    </div>
  </div>
</div>
<script>
function togglePassword(id) {
  const input = document.getElementById(id);
  if (input.type === 'password') {
    input.type = 'text';
  } else {
    input.type = 'password';
  }
}
</script>
@endsection