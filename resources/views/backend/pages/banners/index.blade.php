@extends('layouts.backend.app')

@section('title', 'Banners Management')
@section('page-title', 'Banners')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">All Banners</h5>
                    <p class="text-muted small mb-0">Manage banners across different pages.</p>
                </div>
                <a href="{{ route('admin.banners.create') }}" class="btn btn-dark btn-sm">
                    <i class="fa-solid fa-plus me-1"></i> Add Banner
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Page</th>
                            <th>Heading</th>
                            <th>Image</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td class="ps-4 fw-medium">
                                    {{ Str::headline($banner->page_name) }}
                                </td>
                                <td>
                                    {{ $banner->heading ?: '-' }}
                                </td>
                                <td>
                                    @if ($banner->image_path)
                                        <img src="{{ Storage::url($banner->image_path) }}" alt="Banner" class="rounded" style="width: 80px; height: 40px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    No banners found. <a href="{{ route('admin.banners.create') }}">Create one</a>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($banners->hasPages())
            <div class="card-footer bg-white border-top-0 py-3">
                {{ $banners->links() }}
            </div>
        @endif

    </div>
@endsection
