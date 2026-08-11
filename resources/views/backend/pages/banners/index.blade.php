@extends('layouts.backend.app')

@section('title', 'Banners Management')
@section('page-title', 'Banners')

@section('content')

@if (session('success')) <div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>
@endif

<div class="card border-0 shadow-sm">


<div class="card-header bg-white py-3">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h5 class="mb-1">Banner Management</h5>

            <p class="text-muted small mb-0">
                Manage banners across different pages.
            </p>
        </div>

        <a href="{{ route('admin.banners.create') }}"
            class="btn btn-dark">

            <i class="fa-solid fa-plus me-1"></i>
            Add Banner
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

                @forelse ($banners as $banner)

                    <tr>

                        <td class="ps-4">

                            <strong>
                                {{ Str::headline($banner->page_name) }}
                            </strong>

                        </td>

                        <td style="min-width: 260px;">

                            <strong>
                                {{ $banner->heading ?: '-' }}
                            </strong>

                        </td>

                        <td>

                            @if ($banner->image_path)

                                <img src="{{ Storage::url($banner->image_path) }}"
                                    alt="{{ $banner->heading ?: 'Banner' }}"
                                    class="rounded"
                                    style="
                                        width: 110px;
                                        height: 65px;
                                        object-fit: cover;
                                    ">

                            @else

                                <span class="text-muted">
                                    -
                                </span>

                            @endif

                        </td>

                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                <a href="{{ route('admin.banners.edit', $banner) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="{{ route('admin.banners.destroy', $banner) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                        'Are you sure you want to delete this banner?'
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

                        <td colspan="4"
                            class="text-center py-5">

                            <i class="fa-regular fa-image fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No banners found.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@if ($banners->hasPages())

    <div class="card-footer bg-white">

        {{ $banners->links('pagination::bootstrap-5') }}

    </div>

@endif


</div>

@endsection
