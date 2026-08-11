@extends('layouts.backend.app')

@section('title', 'Office Locations')
@section('page-title', 'Office Locations')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Office Locations Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage company offices, branches and regional locations.
                </p>

            </div>

            <a
                href="{{ route('admin.office-locations.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>
                Add Office

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
                            Location
                        </th>

                        <th>
                            Type
                        </th>

                        <th>
                            Contact
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

                    @forelse($officeLocations as $office)

                    <tr>

                        {{-- Order --}}
                        <td class="ps-4">

                            <span class="badge bg-light text-dark">
                                {{ $office->sort_order }}
                            </span>

                        </td>


                        {{-- Location --}}
                        <td>

                            <div class="d-flex align-items-center gap-2">

                                <span class="fs-4">
                                    {{ $office->flag }}
                                </span>

                                <div>

                                    <strong>
                                        {{ $office->city }}
                                    </strong>

                                    <small class="text-muted d-block">
                                        {{ Str::limit(
                                                $office->address,
                                                60
                                            ) }}
                                    </small>

                                </div>

                            </div>

                        </td>


                        {{-- Type --}}
                        <td>

                            <span>
                                {{ $office->type }}
                            </span>

                        </td>


                        {{-- Contact --}}
                        <td>

                            @if($office->email)

                            <small class="d-block">
                                <i class="fa-solid fa-envelope me-1"></i>
                                {{ $office->email }}
                            </small>

                            @endif

                            @if($office->phone)

                            <small class="d-block mt-1">
                                <i class="fa-solid fa-phone me-1"></i>
                                {{ $office->phone }}
                            </small>

                            @endif

                        </td>


                        {{-- Status --}}
                        <td>

                            @if($office->status)

                            <span class="badge bg-success">
                              
                                Active
                            </span>

                            @else

                            <span class="badge bg-secondary">
                             
                                Inactive
                            </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                <a
                                    href="{{ route(
                                            'admin.office-locations.edit',
                                            $office
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    action="{{ route(
                                            'admin.office-locations.destroy',
                                            $office
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this office location?'
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
                                class="fa-solid fa-location-dot fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No office locations found.
                            </p>

                            <a
                                href="{{ route(
                                        'admin.office-locations.create'
                                    ) }}"
                                class="btn btn-sm btn-dark mt-3">

                                <i class="fa-solid fa-plus me-1"></i>
                                Add Office

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($officeLocations->hasPages())

    <div class="card-footer bg-white">

        {{ $officeLocations->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection