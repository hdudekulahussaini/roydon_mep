@extends('layouts.backend.app')

@section('title', 'Standards')
@section('page-title', 'Standards')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1 fw-semibold">
                    Standards Management
                </h5>

                <p class="text-muted small mb-0">
                    Manage technical and healthcare standards displayed on the website.
                </p>

            </div>


            <a
                href="{{ route('admin.standards.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>

                Add Standard

            </a>

        </div>

    </div>


    {{-- Table --}}
    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="ps-4" style="width: 60px;">
                            #
                        </th>

                        <th style="width: 70px;">
                            Icon
                        </th>

                        <th>
                            Section
                        </th>

                        <th>
                            Abbreviation
                        </th>

                        <th>
                            Title
                        </th>

                        <th>
                            Applied To
                        </th>

                        <th>
                            Order
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

                    @forelse($standards as $standard)

                    <tr>

                        {{-- Number --}}
                        <td class="ps-4 fw-semibold text-muted">
                            #{{ $loop->iteration }}
                        </td>


                        {{-- Icon --}}
                        <td>
                            <div class="bg-dark text-warning rounded-2 d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 40px; height: 40px;">
                                <i class="{{ $standard->icon ?? 'fa-light fa-notes-medical' }} fs-5"></i>
                            </div>
                        </td>


                        {{-- Section --}}
                        <td>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">
                                <i class="fa-solid fa-folder me-1"></i>{{ $standard->section->title ?? '—' }}
                            </span>
                        </td>


                        {{-- Abbreviation --}}
                        <td>

                            @if($standard->abbr)

                            <code class="bg-light px-2 py-1 rounded text-dark border" style="font-size: 12px;">
                                {{ $standard->abbr }}
                            </code>

                            @else

                            <span class="text-muted">
                                —
                            </span>

                            @endif

                        </td>


                        {{-- Title --}}
                        <td>

                            <strong class="text-dark">
                                {{ $standard->title }}
                            </strong>

                        </td>


                        {{-- Applied To --}}
                        <td>

                            <span
                                class="text-muted small"
                                style="max-width: 250px; display: block;">

                                {{ $standard->applied_to ?? '—' }}

                            </span>

                        </td>


                        {{-- Sort Order --}}
                        <td>

                            <span class="badge bg-light text-dark border">

                                {{ $standard->sort_order }}

                            </span>

                        </td>


                        {{-- Status --}}
                        <td>

                            @if($standard->status)

                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                                Active
                            </span>

                            @else

                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">
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
                                            'admin.standards.edit',
                                            $standard
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route(
                                            'admin.standards.destroy',
                                            $standard
                                        ) }}"
                                    method="POST"
                                    onsubmit="return confirm(
                                            'Are you sure you want to delete this standard?'
                                        );">

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
                            colspan="9"
                            class="text-center py-5 text-muted">

                            <i class="fa-solid fa-book-open fs-2 text-muted opacity-50 d-block mb-2"></i>

                            <p class="mb-2">
                                No standards found.
                            </p>


                            <a
                                href="{{ route('admin.standards.create') }}"
                                class="btn btn-sm btn-dark">

                                <i class="fa-solid fa-plus me-1"></i>

                                Add First Standard

                            </a>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if(method_exists($standards, 'hasPages') && $standards->hasPages())

    <div class="card-footer bg-white py-3 border-top border-light">

        {{ $standards->links('pagination::bootstrap-5') }}

    </div>

    @endif

</div>

@endsection