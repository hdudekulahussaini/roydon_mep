@extends('layouts.backend.app')

@section('title', 'Premium Stats')
@section('page-title', 'Premium Stats')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Premium Stats Management</h5>

                    <p class="text-muted small mb-0">
                        Manage the four statistics cards displayed on the homepage stats section.
                    </p>
                </div>

                <a href="{{ route('admin.premium-stats.create') }}"
                    class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>
                    Add Stat
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Count/Value</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($stats as $stat)

                            <tr>

                                <td class="ps-4">
                                    {{ $stat->id }}
                                </td>

                                <td>
                                    <strong>{{ $stat->count }}</strong>
                                </td>

                                <td>
                                    {{ $stat->title }}
                                </td>

                                <td>
                                    {{ $stat->description }}
                                </td>

                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route(
                                            'admin.premium-stats.edit',
                                            $stat
                                        ) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route(
                                            'admin.premium-stats.destroy',
                                            $stat
                                        ) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this stat?'
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

                                    <i class="fa-solid fa-chart-simple fs-2 text-muted"></i>

                                    <p class="mt-2 mb-0 text-muted">
                                        No statistics found.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

        @if ($stats->hasPages())
            <div class="card-footer bg-white">
                {{ $stats->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>

@endsection
