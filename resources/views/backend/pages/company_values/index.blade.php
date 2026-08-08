@extends('layouts.backend.app')

@section('title', 'Company Values')
@section('page-title', 'Company Values')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h5 class="mb-1">
                    Company Values Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage the values displayed on the About page.
                </p>
            </div>

            <a
                href="{{ route('admin.company-values.create') }}"
                class="btn btn-dark">
                <i class="fa-solid fa-plus me-1"></i>
                Add Company Value
            </a>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($companyValues as $value)

                    <tr>

                        <td class="ps-4">
                            {{ $value->id }}
                        </td>

                        <td>
                            <strong>
                                {{ $value->title }}
                            </strong>
                        </td>

                        <td
                            style="
                                    max-width: 500px;
                                    white-space: normal;
                                ">
                            {{ Str::limit(
                                    $value->description,
                                    120
                                ) }}
                        </td>

                        <td>

                            @if($value->status)

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

                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                <a
                                    href="{{ route(
                                            'admin.company-values.edit',
                                            $value
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form
                                    action="{{ route(
                                            'admin.company-values.destroy',
                                            $value
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this company value?'
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
                                class="fa-solid fa-star fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No company values found.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($companyValues->hasPages())

    <div class="card-footer bg-white">

        {{ $companyValues->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection