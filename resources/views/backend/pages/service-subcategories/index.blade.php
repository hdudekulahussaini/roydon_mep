@extends('layouts.backend.app')

@section('title', 'Service Subcategories')
@section('page-title', 'Service Subcategories')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1 fw-semibold">Service Subcategories</h5>

                    <p class="text-muted small mb-0">
                        Manage dynamic pages for individual services and specialisations.
                    </p>
                </div>

                <a href="{{ route('admin.service-subcategories.create') }}"
                    class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>
                    Add Subcategory
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="ps-4" style="width: 70px;">ID</th>
                            <th style="width: 90px;">Image</th>
                            <th>Title &amp; Heading</th>
                            <th>Parent Category</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($subcategories as $sub)

                            <tr>

                                <td class="ps-4 fw-semibold text-muted">
                                    #{{ $sub->id }}
                                </td>

                                <td>
                                    @if ($sub->banner_image)
                                        <img src="{{ asset('storage/' . $sub->banner_image) }}"
                                            alt="{{ $sub->title }}"
                                            class="rounded-2 border object-fit-cover shadow-sm"
                                            style="width: 45px; height: 45px;">
                                    @else
                                        <div class="bg-dark text-warning rounded-2 d-flex align-items-center justify-content-center shadow-sm"
                                            style="width: 45px; height: 45px; min-width: 45px;">
                                            <i class="fa-solid fa-screwdriver-wrench fs-6"></i>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <strong class="d-block text-dark">{{ $sub->title }}</strong>
                                    @if ($sub->heading)
                                        <small class="text-muted d-block text-truncate" style="max-width: 280px; font-size: 12px;">
                                            {{ $sub->heading }}
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-medium px-2 py-1">
                                        <i class="fa-solid fa-folder me-1"></i>{{ $sub->category->name ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    <code class="bg-light px-2 py-1 rounded text-dark border" style="font-size: 12px;">{{ $sub->slug }}</code>
                                </td>

                                <td>
                                    @if ($sub->status)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route(
                                            'admin.service-subcategories.edit',
                                            $sub
                                        ) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route(
                                            'admin.service-subcategories.destroy',
                                            $sub
                                        ) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this subcategory? This action cannot be undone.'
                                            )">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete">

                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-folder-open fs-2 mb-2 text-muted opacity-50 d-block"></i>
                                    No service subcategories found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        @if ($subcategories->hasPages())
            <div class="card-footer bg-white py-3 border-top border-light">
                {{ $subcategories->links() }}
            </div>
        @endif

    </div>

@endsection
