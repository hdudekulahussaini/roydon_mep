@extends('layouts.backend.app')


@section('title', 'Footer Settings')
@section('page-title', 'Footer Settings')


@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h5 class="mb-1">Footer Configurations</h5>

                <p class="text-muted small mb-0">
                    Manage footer content and social links.
                </p>
            </div>

            <a href="{{ route('admin.footers.create') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-plus me-1"></i>
                Add Footer

            </a>

        </div>

    </div>


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="ps-4">
                            Description
                        </th>

                        <th>
                            Social Links Count
                        </th>

                        <th class="text-end pe-4">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($footers as $footer)

                        <tr>

                            <td class="ps-4" style="min-width: 300px;">

                                <strong>
                                    {{ Str::limit($footer->description, 50) }}
                                </strong>

                            </td>


                            <td>

                                <span class="badge bg-secondary">

                                    {{ is_array($footer->social_links) ? count($footer->social_links) : 0 }}
                                    Links

                                </span>

                            </td>


                            <td class="text-end pe-4">

                                <div class="d-inline-flex gap-2">

                                    <a href="{{ route('admin.footers.edit', $footer) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Edit">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    <form action="{{ route('admin.footers.destroy', $footer) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this footer?');">

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

                            <td colspan="3"
                                class="text-center py-5">

                                <i class="fa-solid fa-window-maximize fs-2 text-muted"></i>

                                <p class="mt-2 mb-0 text-muted">
                                    No footer configurations found.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    @if($footers->hasPages())

        <div class="card-footer bg-white">

            {{ $footers->links('pagination::bootstrap-5') }}

        </div>

    @endif

</div>

@endsection