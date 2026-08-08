@extends('layouts.backend.app')

@section('title', 'Recent Projects')
@section('page-title', 'Recent Projects')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Recent Projects Management</h5>

                    <p class="text-muted small mb-0">
                        Manage the projects carousel cards displayed on the homepage.
                    </p>
                </div>

                <a href="{{ route('admin.projects.create') }}"
                    class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>
                    Add Project
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($projects as $project)

                            <tr>

                                <td class="ps-4">
                                    {{ $project->id }}
                                </td>

                                <td>
                                    @if ($project->image)
                                        <img src="{{ str_contains($project->image, 'assets/') ? asset($project->image) : asset('storage/' . $project->image) }}" 
                                             alt="{{ $project->title }}" 
                                             style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px;">
                                    @else
                                        <span class="text-muted small">No Image</span>
                                    @endif
                                </td>

                                <td>
                                    <strong>{{ $project->title }}</strong>
                                </td>

                                <td>
                                    <span class="badge bg-light text-dark border">{{ $project->type }}</span>
                                </td>

                                <td>
                                    {{ $project->location }}
                                </td>

                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route(
                                            'admin.projects.edit',
                                            $project
                                        ) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route(
                                            'admin.projects.destroy',
                                            $project
                                        ) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this project?'
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

                                <td colspan="4" class="text-center py-4 text-muted">
                                    No projects found. Add your first project!
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        @if ($projects->hasPages())
            <div class="card-footer bg-white py-3">
                {{ $projects->links() }}
            </div>
        @endif

    </div>

@endsection
