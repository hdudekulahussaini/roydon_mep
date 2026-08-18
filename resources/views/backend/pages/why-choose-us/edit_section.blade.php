@extends('layouts.backend.app')

@section('title', 'Edit Section Details')
@section('page-title', 'Edit Section Details')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Edit Why Choose Us Section Details</h5>
                    <p class="text-muted small mb-0">Update titles, description, and upload the main image.</p>
                </div>
                <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.why-choose-us.update-section') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Sub Title --}}
                    <div class="col-12">
                        <label for="sub_title" class="form-label fw-semibold">Sub-title</label>
                        <input type="text" id="sub_title" name="sub_title" 
                            value="{{ old('sub_title', $section?->sub_title ?? 'Why Choose Us') }}" 
                            class="form-control @error('sub_title') is-invalid @enderror" 
                            placeholder="e.g. Why Choose Us" required>
                        @error('sub_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div class="col-12">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" id="title" name="title" 
                            value="{{ old('title', $section?->title ?? 'Why Roydon MEP Contracting') }}" 
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="e.g. Why Roydon <span>MEP</span> Contracting" required>
                        <small class="text-muted d-block mt-1">
                            <i class="fa-solid fa-circle-info me-1"></i> Tip: Wrap words in <code>&lt;span&gt;word&lt;/span&gt;</code> to highlight them in color (e.g., <code>Why Roydon &lt;span&gt;MEP&lt;/span&gt; Contracting</code>).
                        </small>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-12">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea id="description" name="description" rows="5" 
                            class="form-control @error('description') is-invalid @enderror" 
                            placeholder="Provide the main text description..." required>{{ old('description', $section?->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="col-12">
                        <label for="image" class="form-label fw-semibold">Main Section Image</label>
                        @if ($section && $section->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $section->image) }}" alt="Current section image" class="img-thumbnail" style="max-height: 150px;">
                            </div>
                        @endif
                        <input type="file" id="image" name="image" 
                            class="form-control @error('image') is-invalid @enderror" 
                            accept="image/*">
                        <small class="text-muted">Allowed types: JPG, JPEG, PNG, WEBP. Max size: 4MB.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-dark">
                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Save Details
                    </button>
                    <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
