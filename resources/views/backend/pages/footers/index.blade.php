@extends('layouts.backend.app')

@section('title', 'Footer Settings')
@section('page-title', 'Footer Settings')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Footer Configurations</h5>
        <a href="{{ route('admin.footers.create') }}" class="btn btn-dark btn-sm">
            <i class="fa-solid fa-plus me-1"></i> Add Footer
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Description</th>
                        <th>Social Links Count</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($footers as $footer)
                    <tr>
                        <td class="ps-4">{{ Str::limit($footer->description, 50) }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ is_array($footer->social_links) ? count($footer->social_links) : 0 }} Links
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.footers.edit', $footer) }}" class="btn btn-sm btn-light" title="Edit">
                                <i class="fa-solid fa-edit text-primary"></i>
                            </a>
                            <form action="{{ route('admin.footers.destroy', $footer) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light" title="Delete">
                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">No footer configurations found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    @if($footers->hasPages())
    <div class="card-footer bg-white border-top-0 py-3">
        {{ $footers->links() }}
    </div>
    @endif
</div>
@endsection
