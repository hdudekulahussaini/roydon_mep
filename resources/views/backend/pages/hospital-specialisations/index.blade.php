@extends('layouts.backend.app')

@section('title', 'Specialisations')
@section('page-title', 'Specialisations')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Hospital Specialisations Management</h5>

                    <p class="text-muted small mb-0">
                        Manage the cards displayed in the Hospital Specialisations section of the homepage.
                    </p>
                </div>

                <a href="{{ route('admin.hospital-specialisations.create') }}"
                    class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>
                    Add Specialisation
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($specialisations as $spec)

                            <tr>

                                <td class="ps-4">
                                    {{ $spec->id }}
                                </td>

                                <td>
                                    <div class="fs-5 text-secondary">
                                        <i class="{{ $spec->icon }}"></i>
                                    </div>
                                    <small class="text-muted d-block" style="font-size: 11px;">
                                        <code>{{ $spec->icon }}</code>
                                    </small>
                                </td>

                                <td>
                                    <strong>{{ $spec->title }}</strong>
                                </td>

                                <td style="max-width: 400px; white-space: normal;">
                                    {{ Str::limit($spec->description, 120) }}
                                </td>

                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route(
                                            'admin.hospital-specialisations.edit',
                                            $spec
                                        ) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route(
                                            'admin.hospital-specialisations.destroy',
                                            $spec
                                        ) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this specialisation?'
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

                                <td colspan="5"
                                    class="text-center py-5">

                                    <i class="fa-solid fa-house-medical-flag fs-2 text-muted"></i>

                                    <p class="mt-2 mb-0 text-muted">
                                        No specialisations found.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

        @if ($specialisations->hasPages())
            <div class="card-footer bg-white">
                {{ $specialisations->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>

@endsection
