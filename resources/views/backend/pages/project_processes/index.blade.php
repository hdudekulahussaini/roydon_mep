@extends('layouts.backend.app')

@section('title', 'Project Process')
@section('page-title', 'Project Process')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Project Process Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage process sections displayed on the website.
                </p>

            </div>

            <a
                href="{{ route('admin.project-processes.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>
                Add Process

            </a>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>
                        <th class="ps-4">Order</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Small Title</th>
                        <th>Features</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>

                </thead>
                <tbody>

                    @forelse($processes as $process)

                    <tr>

                        <td class="ps-4">

                            <span class="badge bg-light text-dark">
                                {{ $process->sort_order }}
                            </span>

                        </td>


                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-dark text-warning rounded-2 d-flex align-items-center justify-content-center shadow-sm"
                                    style="width: 42px; height: 42px; min-width: 42px;">
                                    <i class="{{ $process->icon ?? 'fa-light fa-clipboard-list-check' }} fs-5"></i>
                                </div>
                                <code class="bg-light px-2 py-1 rounded text-dark border" style="font-size: 11px;">
                                    {{ $process->icon }}
                                </code>
                            </div>
                        </td>


                        <td>

                            <strong>
                                {{ $process->title }}
                            </strong>

                            <div
                                class="text-muted small mt-1"
                                style="max-width: 350px;">

                                {{ Str::limit(
                                        $process->description,
                                        100
                                    ) }}

                            </div>

                        </td>


                        <td>

                            @if($process->small_title)

                            <span class="badge bg-light text-dark">

                                {{ $process->small_title }}

                            </span>

                            @else

                            <span class="text-muted">
                                —
                            </span>

                            @endif

                        </td>


                        <td>

                            <span class="badge bg-light text-dark">

                                {{ count($process->features ?? []) }}
                                Features

                            </span>

                        </td>


                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                <a
                                    href="{{ route(
                                            'admin.project-processes.edit',
                                            $process
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    action="{{ route(
                                            'admin.project-processes.destroy',
                                            $process
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this process?'
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
                                class="fa-solid fa-list-check fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No project processes found.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($processes->hasPages())

    <div class="card-footer bg-white">

        {{ $processes->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection