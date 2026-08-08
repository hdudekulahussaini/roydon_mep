@extends('layouts.backend.app')

@section('title', 'Works')
@section('page-title', 'Works')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Works Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage the work items displayed on the homepage.
                </p>

            </div>

            <a
                href="{{ route('admin.works.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>
                Add Work

            </a>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Order</th>
                        <th>Image</th>
                        <th> Subtitle</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($works as $work)

                    <tr>
                        <td class="ps-4">

                            <span class="badge bg-light text-dark">
                                {{ $work->sort_order }}
                            </span>

                        </td>

                        <td>

                            <img
                                src="{{ asset(
                                        'storage/' . $work->image
                                    ) }}"
                                alt="{{ $work->title }}"
                                class="rounded border"
                                style="
                                        width: 100px;
                                        height: 65px;
                                        object-fit: cover;
                                    ">

                        </td>

                        <td>

                            <span class="text-muted">
                                {{ $work->subtitle }}
                            </span>

                        </td>

                        <td>

                            <strong>
                                {{ $work->title }}
                            </strong>

                        </td>

                        <td>

                            @if($work->status)

                            <span class="badge bg-success">
                                Active
                            </span>

                            @else

                            <span class="badge bg-secondary">
                                Inactive
                            </span>

                            @endif

                        </td>

                        <td class="text-end pe-4">

                            <div class="d-inline-flex gap-2">

                                <a
                                    href="{{ route(
                                            'admin.works.edit',
                                            $work
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    action="{{ route(
                                            'admin.works.destroy',
                                            $work
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this work?'
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
                                class="fa-solid fa-images fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">
                                No works found.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($works->hasPages())

    <div class="card-footer bg-white">

        {{ $works->links(
                'pagination::bootstrap-5'
            ) }}

    </div>

    @endif

</div>

@endsection