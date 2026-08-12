```blade
@extends('layouts.backend.app')

@section('title', 'Story Sections')
@section('page-title', 'Story Sections')

@section('content')

    <div class="card border-0 shadow-sm">

        {{-- Card Header --}}
        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">
                        Story Section Management
                    </h5>

                    <p class="text-muted small mb-0">
                        Manage the story content displayed on the homepage.
                    </p>
                </div>

                <a href="{{ route('admin.story-sections.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Story Section
                </a>

            </div>

        </div>


        {{-- Card Body --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="ps-4">
                                ID
                            </th>

                            <th>
                                Image
                            </th>

                            <th>
                                Title
                            </th>

                            <th>
                                Description
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

                        @forelse ($storySections as $story)
                            <tr>

                                {{-- ID --}}
                                <td class="ps-4">
                                    {{ $story->id }}
                                </td>


                                {{-- Image --}}
                                <td>

                                    @if ($story->image)
                                        <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}"
                                            class="rounded" width="80" height="60" style="object-fit: cover;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                            style="width: 80px; height: 60px;">
                                            <i class="fa-regular fa-image text-muted fs-5"></i>
                                        </div>
                                    @endif

                                </td>


                                {{-- Title --}}
                                <td>

                                    <strong>
                                        {{ $story->title }}
                                    </strong>

                                </td>


                                {{-- Description --}}
                                <td
                                    style="
                                    max-width: 450px;
                                    white-space: normal;
                                ">

                                    {{ Str::limit($story->description, 120) }}

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if ($story->status)
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
                                <td class="text-center" style="width: 140px;">

                                    <div class="d-inline-flex align-items-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.story-sections.edit', $story) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit">

                                            <i class="fa-solid fa-pen"></i>

                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.story-sections.destroy', $story) }}" method="POST"
                                            class="m-0"
                                            onsubmit="return confirm('Are you sure you want to delete this story section?');">

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

                                    <i class="fa-solid fa-book-open fs-2 text-muted"></i>

                                    <p class="mt-2 mb-0 text-muted">
                                        No story sections found.
                                    </p>

                                    <a href="{{ route('admin.story-sections.create') }}" class="btn btn-sm btn-dark mt-3">
                                        <i class="fa-solid fa-plus me-1"></i>
                                        Add Story Section
                                    </a>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if ($storySections->hasPages())
            <div class="card-footer bg-white">

                {{ $storySections->links('pagination::bootstrap-5') }}

            </div>
        @endif

    </div>
    <style>
        .table .btn-sm {
            width: 30px;
            height: 30px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
