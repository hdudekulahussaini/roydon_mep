@extends('layouts.backend.app')

@section('title', 'Standards Banner')
@section('page-title', 'Standards Banner')

@section('content')

<div class="card">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Standards Banner Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage the banner displayed on the standards page.
                </p>

            </div>


            <a
                href="{{ route('admin.standard-banners.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>

                Add Banner

            </a>

        </div>

    </div>


    @if(session('success'))

    <div class="alert alert-success m-3 mb-0">

        <i class="fa-solid fa-circle-check me-1"></i>

        {{ session('success') }}

    </div>

    @endif


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="ps-4">
                            #
                        </th>

                        <th>
                            Banner
                        </th>

                        <th>
                            Alt Text
                        </th>

                        <th>
                            Sort Order
                        </th>

                        <th>
                            Status
                        </th>

                        <th class="text-end pe-4">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($banners as $banner)

                    <tr>

                        <td class="ps-4">

                            {{ $loop->iteration }}

                        </td>


                        <td>

                            <img
                                src="{{ asset(
                                        'storage/' . $banner->image
                                    ) }}"
                                alt="{{ $banner->alt_text }}"
                                style="
                                        width: 180px;
                                        height: 70px;
                                        object-fit: cover;
                                        border-radius: 6px;
                                        border: 1px solid #ddd;
                                    ">

                        </td>


                        <td>

                            {{ $banner->alt_text ?? '-' }}

                        </td>


                        <td>

                            <span class="badge bg-light text-dark">

                                {{ $banner->sort_order }}

                            </span>

                        </td>


                        <td>

                            @if($banner->status)

                            <span class="badge bg-success">
                                Active
                            </span>

                            @else

                            <span class="badge bg-danger">
                                Inactive
                            </span>

                            @endif

                        </td>


                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                <a
                                    href="{{ route(
                                            'admin.standard-banners.edit',
                                            $banner
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    action="{{ route(
                                            'admin.standard-banners.destroy',
                                            $banner
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this banner?'
                                        )">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
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

                        <td
                            colspan="6"
                            class="text-center py-5">

                            <i
                                class="fa-solid fa-image fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No standards banners found.
                            </p>


                            <a
                                href="{{ route(
                                        'admin.standard-banners.create'
                                    ) }}"
                                class="btn btn-dark btn-sm mt-3">

                                <i class="fa-solid fa-plus me-1"></i>

                                Add First Banner

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($banners->hasPages())

    <div class="card-footer bg-white">

        {{ $banners->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection