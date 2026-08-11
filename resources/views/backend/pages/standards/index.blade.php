@extends('layouts.backend.app')

@section('title', 'Standards')
@section('page-title', 'Standards')

@section('content')

<div class="card">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
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

                        <th class="ps-4">
                            #
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
                        <td class="ps-4">

                            <span class="badge bg-light text-dark">

                                {{ $loop->iteration }}

                            </span>

                        </td>


                        {{-- Section --}}
                        <td>

                            <strong>

                                {{ $standard->section->title ?? '—' }}

                            </strong>

                        </td>


                        {{-- Abbreviation --}}
                        <td>

                            @if($standard->abbr)

                            <span class="badge bg-light text-dark">

                                {{ $standard->abbr }}

                            </span>

                            @else

                            <span class="text-muted">
                                —
                            </span>

                            @endif

                        </td>


                        {{-- Title --}}
                        <td>

                            <strong>
                                {{ $standard->title }}
                            </strong>

                        </td>


                        {{-- Applied To --}}
                        <td>

                            <span
                                class="text-muted"
                                style="max-width: 250px; display: block;">

                                {{ $standard->applied_to ?? '—' }}

                            </span>

                        </td>


                        {{-- Sort Order --}}
                        <td>

                            <span class="badge bg-light text-dark">

                                {{ $standard->sort_order }}

                            </span>

                        </td>


                        {{-- Status --}}
                        <td>

                            @if($standard->status)

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
                            colspan="8"
                            class="text-center py-5">

                            <i
                                class="fa-solid fa-book-open fs-2 text-muted"></i>

                            <p class="mt-2 mb-0 text-muted">

                                No standards found.

                            </p>


                            <a
                                href="{{ route('admin.standards.create') }}"
                                class="btn btn-sm btn-dark mt-3">

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

    <div class="card-footer bg-white">

        {{ $standards->links('pagination::bootstrap-5') }}

    </div>

    @endif

</div>

@endsection