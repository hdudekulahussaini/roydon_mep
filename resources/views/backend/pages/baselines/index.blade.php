@extends('layouts.backend.app')

@section('title', 'Compliance Baseline')
@section('page-title', 'Compliance Baseline')

@section('content')

<div class="card">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Compliance Baseline Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage compliance baseline items displayed on the website.
                </p>

            </div>

            <a
                href="{{ route('admin.baselines.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>

                Add Baseline

            </a>

        </div>

    </div>

    {{-- Table --}}
    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="ps-4">
                            #
                        </th>

                        <th>
                            Title
                        </th>

                        <th>
                            Description
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

                    @forelse($baselines as $baseline)

                    <tr>

                        <td class="ps-4">
                            {{ $loop->iteration }}
                        </td>


                        <td>

                            <strong>
                                {{ $baseline->title }}
                            </strong>

                        </td>


                        <td>

                            <div
                                class="text-muted small"
                                style="max-width: 500px;">

                                {{ Str::limit(
                                        $baseline->description,
                                        120
                                    ) }}

                            </div>

                        </td>


                        <td>

                            <span class="badge bg-light text-dark">

                                {{ $baseline->sort_order }}

                            </span>

                        </td>


                        <td>

                            @if($baseline->status)

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

                                {{-- Edit --}}
                                <a
                                    href="{{ route(
                                            'admin.baselines.edit',
                                            $baseline
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route(
                                            'admin.baselines.destroy',
                                            $baseline
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this baseline item?'
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
                                class="fa-solid fa-shield-halved fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No compliance baseline items found.
                            </p>

                            <a
                                href="{{ route(
                                        'admin.baselines.create'
                                    ) }}"
                                class="btn btn-dark btn-sm mt-3">

                                <i class="fa-solid fa-plus me-1"></i>

                                Add First Baseline

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($baselines->hasPages())

    <div class="card-footer bg-white">

        {{ $baselines->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection