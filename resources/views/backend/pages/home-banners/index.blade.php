@extends('layouts.backend.app')

@section('title', 'Home Banners')
@section('page-title', 'Home Banners')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Home Banner Management</h5>

                    <p class="text-muted small mb-0">
                        Manage the homepage banner and ISO certificates.
                    </p>
                </div>

                @if ($banners->isEmpty())
                    <a href="{{ route('admin.home-banners.create') }}"
                        class="btn btn-dark">

                        <i class="fa-solid fa-plus me-1"></i>
                        Add Banner
                    </a>
                @endif

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Background</th>
                            <th>Banner</th>
                            <th>Certificates</th>
                            <th>Specializations</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($banners as $banner)

                            <tr>

                                <td class="ps-4">
                                    {{ $banner->id }}
                                </td>

                                <td>

                                    <img src="{{ asset(
                                        'storage/' . $banner->background_image
                                    ) }}"
                                        alt="{{ $banner->title }}"
                                        class="rounded"
                                        style="
                                            width: 110px;
                                            height: 65px;
                                            object-fit: cover;
                                        ">

                                </td>

                                <td style="min-width: 260px;">

                                    <strong>
                                        {{ $banner->title }}
                                    </strong>

                                    <small class="d-block text-muted mt-1">
                                        {{ \Illuminate\Support\Str::limit(
                                            $banner->description,
                                            90
                                        ) }}
                                    </small>

                                </td>

                                <td style="min-width: 230px;">

                                    <div class="d-flex gap-2">

                                        @foreach ([
                                            [
                                                $banner->iso_9001_image,
                                                $banner->iso_9001_title,
                                            ],
                                            [
                                                $banner->iso_14001_image,
                                                $banner->iso_14001_title,
                                            ],
                                            [
                                                $banner->iso_45001_image,
                                                $banner->iso_45001_title,
                                            ],
                                        ] as [$image, $title])

                                            @if ($image)

                                                <div class="text-center">

                                                    <img src="{{ asset(
                                                        'storage/' . $image
                                                    ) }}"
                                                        alt="{{ $title }}"
                                                        title="{{ $title }}"
                                                        class="border rounded p-1"
                                                        style="
                                                            width: 55px;
                                                            height: 55px;
                                                            object-fit: contain;
                                                        ">

                                                    <small class="d-block text-muted mt-1"
                                                        style="
                                                            max-width: 65px;
                                                            font-size: 8px;
                                                        ">

                                                        {{ \Illuminate\Support\Str::limit(
                                                            $title,
                                                            15
                                                        ) }}

                                                    </small>

                                                </div>

                                            @endif

                                        @endforeach

                                    </div>

                                </td>

                                <td>

                                    @foreach (
                                        array_slice(
                                            $banner->specializations ?? [],
                                            0,
                                            3
                                        ) as $specialization
                                    )

                                        <span class="badge bg-light text-dark border mb-1">
                                            {{ $specialization }}
                                        </span>

                                    @endforeach

                                    @if (
                                        count($banner->specializations ?? []) > 3
                                    )

                                        <small class="d-block text-muted">
                                            +{{ count(
                                                $banner->specializations
                                            ) - 3 }} more
                                        </small>

                                    @endif

                                </td>

                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route(
                                            'admin.home-banners.edit',
                                            $banner
                                        ) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route(
                                            'admin.home-banners.destroy',
                                            $banner
                                        ) }}"
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

                                <td colspan="6"
                                    class="text-center py-5">

                                    <i class="fa-regular fa-image fs-2 text-muted"></i>

                                    <p class="mt-2 mb-0 text-muted">
                                        No home banners found.
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