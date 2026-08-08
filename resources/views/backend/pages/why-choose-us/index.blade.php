@extends('layouts.backend.app')

@section('title', 'Why Choose Us')
@section('page-title', 'Why Choose Us')

@section('content')

    {{-- Main Section Settings Card --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Why Choose Us - Main Section Settings</h5>
                    <p class="text-muted small mb-0">
                        Manage the text content and main image displayed on the left side of the "Why Choose Us" section.
                    </p>
                </div>
                <a href="{{ route('admin.why-choose-us.edit-section') }}" class="btn btn-dark">
                    <i class="fa-solid fa-pen me-1"></i>
                    Edit Section Details
                </a>
            </div>
        </div>
        <div class="card-body">
            @if ($section)
                <div class="row g-4">
                    <div class="col-md-8">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th style="width: 200px;" class="bg-light">Sub-title</th>
                                <td>{{ $section->sub_title }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Title</th>
                                <td>{{ $section->title }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Description</th>
                                <td>{{ $section->description }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="border rounded p-2 text-center bg-light">
                            <span class="d-block fw-semibold text-muted mb-2 small">Section Image</span>
                            @if ($section->image)
                                <img src="{{ asset('storage/' . $section->image) }}" alt="Section image" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                            @else
                                <span class="text-muted small">No image uploaded</span>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning mb-0">
                    No section details seeded. Please click <strong>Edit Section Details</strong> to configure this section.
                </div>
            @endif
        </div>
    </div>

    {{-- Timeline items Table Card --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Why Choose Us - Timeline Items</h5>
                    <p class="text-muted small mb-0">
                        Manage the bullet points/reasons shown in the scrollable timeline.
                    </p>
                </div>
                <a href="{{ route('admin.why-choose-us-items.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Timeline Item
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 80px;">ID</th>
                            <th style="width: 250px;">Title</th>
                            <th>Description</th>
                            <th class="text-end pe-4" style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td class="ps-4">{{ $item->id }}</td>
                                <td><strong>{{ $item->title }}</strong></td>
                                <td>{{ $item->description }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('admin.why-choose-us-items.edit', $item->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.why-choose-us-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this timeline item?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <i class="fa-solid fa-list-check fs-2 text-muted"></i>
                                    <p class="mt-2 mb-0 text-muted">No timeline items found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
