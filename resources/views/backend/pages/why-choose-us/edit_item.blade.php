@extends('layouts.backend.app')

@section('title', 'Edit Timeline Item')
@section('page-title', 'Edit Timeline Item')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Edit Timeline Item</h5>
                    <p class="text-muted small mb-0">Update the details of a timeline card on the homepage.</p>
                </div>
                <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.why-choose-us-items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Title --}}
                    <div class="col-12">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}" 
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="e.g. In-House Workforce" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-12">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea id="description" name="description" rows="4" 
                            class="form-control @error('description') is-invalid @enderror" 
                            placeholder="Provide a short description of this reason..." required>{{ old('description', $item->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-dark">
                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update Item
                    </button>
                    <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
