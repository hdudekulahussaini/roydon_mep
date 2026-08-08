@extends('layouts.backend.app')

@section('title', 'Specialisation Subcategories')
@section('page-title', 'Specialisation Subcategories')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Specialisation Subcategories</h5>
                    <p class="text-muted small mb-0">
                        Manage dynamic pages for Specialisation Subcategories.
                    </p>
                </div>
                <a href="{{ route('admin.specialisation-subcategories.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Specialisation
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Parent Category</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($specialisations as $spec)
                            <tr>
                                <td class="ps-4">{{ $spec->id }}</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                        {{ $spec->category->name ?? 'N/A' }}
                                    </span>
                                </td>
                                <td><strong>{{ $spec->title }}</strong></td>
                                <td><code>{{ $spec->slug }}</code></td>
                                <td>
                                    @if ($spec->status)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle">Active</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('admin.specialisation-subcategories.edit', $spec) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.specialisation-subcategories.destroy', $spec) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this specialisation? This action cannot be undone.')">
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
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No Specialisation Subcategories found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($specialisations->hasPages())
            <div class="card-footer bg-white py-3">
                {{ $specialisations->links() }}
            </div>
        @endif
    </div>

@endsection
