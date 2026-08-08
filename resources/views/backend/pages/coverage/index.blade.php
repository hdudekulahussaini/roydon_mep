@extends('layouts.backend.app')

@section('title', 'Pan-India Coverage')
@section('page-title', 'Pan-India Coverage')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Pan-India Coverage Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage cities displayed in the Pan-India Coverage section.
                </p>

            </div>

            <a
                href="{{ route('admin.coverages.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>
                Add City

            </a>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="ps-4">
                            Order
                        </th>

                        <th>
                            City
                        </th>

                        <th>
                            State / Region
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

                    @forelse($coverages as $coverage)

                    <tr>

                        {{-- Order --}}
                        <td class="ps-4">

                            <span class="badge bg-light text-dark">
                                {{ $coverage->sort_order }}
                            </span>

                        </td>


                        {{-- City --}}
                        <td>

                            <strong>
                                {{ $coverage->city }}
                            </strong>

                        </td>


                        {{-- State --}}
                        <td>
                            {{ $coverage->state }}
                        </td>


                        {{-- Status --}}
                        <td>

                            @if($coverage->status)

                            <span class="badge bg-success">

                                <i class="fa-solid fa-check me-1"></i>
                                Active

                            </span>

                            @else

                            <span class="badge bg-secondary">

                                <i class="fa-solid fa-xmark me-1"></i>
                                Inactive

                            </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                {{-- Edit --}}
                                <a
                                    href="{{ route(
                                            'admin.coverages.edit',
                                            $coverage
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route(
                                            'admin.coverages.destroy',
                                            $coverage
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this coverage location?'
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
                            colspan="5"
                            class="text-center py-5">

                            <i
                                class="fa-solid fa-map-location-dot fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No coverage locations found.
                            </p>

                            <a
                                href="{{ route(
                                        'admin.coverages.create'
                                    ) }}"
                                class="btn btn-sm btn-dark mt-3">

                                <i class="fa-solid fa-plus me-1"></i>
                                Add City

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($coverages->hasPages())

    <div class="card-footer bg-white">

        {{ $coverages->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection