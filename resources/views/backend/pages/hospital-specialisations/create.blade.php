@extends('layouts.backend.app')

@section('title', 'Add Hospital Specialisation')
@section('page-title', 'Add Hospital Specialisation')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Specialisation</h5>
                        <a href="{{ route('admin.hospital-specialisations.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.hospital-specialisations.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Icon (FontAwesome Class) <span class="text-danger">*</span></label>
                            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control @error('icon') is-invalid @enderror" required placeholder="fa-solid fa-heartbeat">
                            @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-dark">
                                <i class="fa-solid fa-save me-1"></i> Save Specialisation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
