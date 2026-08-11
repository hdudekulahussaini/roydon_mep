@extends('layouts.backend.app')

@section('title', 'Metrics')
@section('page-title', 'Metrics')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Metrics Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage the metrics displayed on the About page.
                </p>

            </div>


            <a
                href="{{ route('admin.metrics.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>
                Add Metric

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
                            ID
                        </th>

                        <th>
                            Number
                        </th>

                        <th>
                            Label
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

                    @forelse($metrics as $metric)

                    <tr>

                        {{-- ID --}}
                        <td class="ps-4">
                            {{ $metric->id }}
                        </td>


                        {{-- Number --}}
                        <td>

                            <strong class="fs-5">
                                {{ $metric->number }}
                            </strong>

                        </td>


                        {{-- Label --}}
                        <td>

                            {{ $metric->label }}

                        </td>


                        {{-- Status --}}
                        <td>

                            @if($metric->status)

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

                                {{-- Edit --}}
                                <a
                                    href="{{ route(
                                            'admin.metrics.edit',
                                            $metric
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route(
                                            'admin.metrics.destroy',
                                            $metric
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this metric?'
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
                                class="fa-solid fa-chart-column fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No metrics found.
                            </p>

                            <a
                                href="{{ route(
                                        'admin.metrics.create'
                                    ) }}"
                                class="btn btn-sm btn-dark mt-3">

                                <i class="fa-solid fa-plus me-1"></i>
                                Add Metric

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if($metrics->hasPages())

    <div class="card-footer bg-white">

        {{ $metrics->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection