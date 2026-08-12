@extends('layouts.backend.app')

@section('title', 'Hospital Specialisations')
@section('page-title', 'Hospital Specialisations')

@section('content')

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Hospital Specialisations</h5>
                    <p class="text-muted small mb-0">Manage hospital specialisations.</p>
                </div>
                <a href="{{ route('admin.hospital-specialisations.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i> Add Specialisation
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($specialisations as $spec)
                            <tr>
                                <td class="ps-4">{{ $spec->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-dark text-info rounded-3 d-flex align-items-center justify-content-center shadow-sm"
                                            style="width: 40px; height: 40px; min-width: 40px;">
                                            <i class="{{ $spec->icon }} fs-5"></i>
                                        </div>
                                        <small class="text-muted text-nowrap" style="font-size: 11px;">
                                            <code>{{ $spec->icon }}</code>
                                        </small>
                                    </div>
                                </td>
                                <td><strong>{{ $spec->title }}</strong></td>
                                <td>{{ Str::limit($spec->description, 50) }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <a href="{{ route('admin.hospital-specialisations.edit', $spec) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('admin.hospital-specialisations.destroy', $spec) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this specialisation? This action cannot be undone.')">
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
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No hospital specialisations found.
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
