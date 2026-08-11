@extends('layouts.backend.app')

@section('title', 'Standard Sections')
@section('page-title', 'Standard Sections')

@section('content')

    <div class="card">

        {{-- Header --}}
        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="mb-1">
                        Standard Sections Management
                    </h5>

                    <p class="text-muted small mb-0">
                        Manage standard sections and their related standards displayed on the website.
                    </p>

                </div>

                <a href="{{ route('admin.standard-sections.create') }}" class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>

                    Add Section

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
                                Standards
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

                        @forelse($sections as $section)
                            <tr>

                                {{-- Number --}}
                                <td class="ps-4">

                                    <span class="badge bg-light text-dark">

                                        {{ $loop->iteration }}

                                    </span>

                                </td>


                                {{-- Title --}}
                                <td>

                                    <strong>
                                        {{ $section->title }}
                                    </strong>

                                </td>


                                {{-- Standards Count --}}
                                <td>

                                    <span class="badge bg-light text-dark">

                                        {{ $section->standards_count }}

                                        {{ Str::plural('Standard', $section->standards_count) }}

                                    </span>

                                </td>


                                {{-- Sort Order --}}
                                <td>

                                    <span class="badge bg-light text-dark">

                                        {{ $section->sort_order }}

                                    </span>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if ($section->status)
                                        <span class="badge bg-success">
                                           
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                           
                                            Inactive
                                        </span>
                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">


                                        {{-- Edit --}}
                                        <a href="{{ route('admin.standard-sections.edit', $section) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>


                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.standard-sections.destroy', $section) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                            'Are you sure you want to delete this section and all its standards?'
                                        );">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="fa-solid fa-layer-group fs-2 text-muted"></i>

                                    <p class="mt-2 mb-0 text-muted">

                                        No standard sections found.

                                    </p>

                                    <a href="{{ route('admin.standard-sections.create') }}"
                                        class="btn btn-sm btn-dark mt-3">

                                        <i class="fa-solid fa-plus me-1"></i>

                                        Add First Section

                                    </a>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if (method_exists($sections, 'hasPages') && $sections->hasPages())
            <div class="card-footer bg-white">

                {{ $sections->links('pagination::bootstrap-5') }}

            </div>
        @endif

    </div>

@endsection
