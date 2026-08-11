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


                <a href="{{ route('admin.standard-banners.create') }}" class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>

                    Add Banner

                </a>

            </div>

        </div>


        @if (session('success'))
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
                                    @if ($banner->image)
                                        <img src="{{ asset('storage/' . $banner->image) }}" alt="Standards Banner"
                                            class="rounded border"
                                            style="
                width: 110px;
                height: 65px;
                object-fit: cover;
            ">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                              

                                {{-- Actions --}}
                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.standard-banners.edit', $banner->id) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit Standard Banner">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <form action="{{ route('admin.standard-banners.destroy', $banner->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this banner?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                title="Delete Standard Banner">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="fa-solid fa-image fs-2 text-muted"></i>

                                    <p class="mt-2 mb-0 text-muted">
                                        No standards banners found.
                                    </p>


                                    <a href="{{ route('admin.standard-banners.create') }}" class="btn btn-dark btn-sm mt-3">

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


        @if ($banners->hasPages())
            <div class="card-footer bg-white">

                {{ $banners->links('pagination::bootstrap-5') }}

            </div>
        @endif

    </div>

@endsection
