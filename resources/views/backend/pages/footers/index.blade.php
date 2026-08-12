@extends('layouts.backend.app')

@section('title', 'Footer Settings')
@section('page-title', 'Footer Settings')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Card Header --}}
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="mb-1">Footer Configurations</h5>
                <p class="small text-muted mb-0">Manage website footer description and social links.</p>
            </div>

            @if($footers->isEmpty())
                <a href="{{ route('admin.footers.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa-solid fa-plus me-1"></i> Add Footer Setting
                </a>
            @endif
        </div>
    </div>

    {{-- Table Body --}}
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 60px;">#</th>
                        <th>Footer Description</th>
                        <th>Social Links</th>
                        <th>Updated Date</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($footers as $footer)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                            <td style="min-width: 320px;">
                                <div class="text-dark fw-bold text-truncate" style="max-width: 450px;">
                                    {{ $footer->description }}
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">
                                    <i class="fa-solid fa-share-nodes me-1"></i>
                                    {{ is_array($footer->social_links) ? count($footer->social_links) : 0 }} Links
                                </span>
                            </td>

                            <td class="text-muted small">
                                {{ $footer->updated_at ? $footer->updated_at->format('d M Y, h:i A') : '—' }}
                            </td>

                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.footers.edit', $footer) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <form action="{{ route('admin.footers.destroy', $footer) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this footer configuration?');">
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
                            <td colspan="5" class="empty-table py-5 text-center">
                                <i class="fa-solid fa-window-maximize text-muted opacity-50 mb-2 fs-1"></i>
                                <h5 class="fw-bold text-dark mb-1">No Footer Settings Available</h5>
                                <p class="text-muted small mb-3">Add footer description and social links for the website.</p>
                                <a href="{{ route('admin.footers.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-plus me-1"></i> Add Footer Setting
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($footers->hasPages())
        <div class="card-footer bg-white py-3">
            {{ $footers->links('pagination::bootstrap-5') }}
        </div>
    @endif

</div>

@endsection