@extends('layouts.backend.app')

@section('title', 'Enquiries')
@section('page-title', 'Enquiries')

@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Enquiries</h5>
            <p class="small text-muted mb-0">Recent contact form submissions</p>
        </div>
    </div>


<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Submitted</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($enquiries as $enquiry)
                    <tr>
                        <td>{{ $enquiry->id }}</td>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->phone ?: '—' }}</td>
                        <td>
                            {{ $enquiry->created_at->format('d M Y, h:i A') }}
                        </td>

                        <td class="text-center">
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('admin.enquiries.show', $enquiry) }}"
                                    class="btn btn-sm btn-primary">
                                    Show
                                </a>

                                <form action="{{ route('admin.enquiries.destroy', $enquiry) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Delete this enquiry?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-5">
                            No enquiries found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if ($enquiries->total() > 0)
    <div class="card-footer bg-white">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">

            <div class="small text-muted">
                Showing
                <strong>{{ $enquiries->firstItem() }}</strong>
                to
                <strong>{{ $enquiries->lastItem() }}</strong>
                of
                <strong>{{ $enquiries->total() }}</strong>
                enquiries
            </div>

            @if ($enquiries->hasPages())
                <div>
                    {{ $enquiries->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>
    </div>
@endif


</div>

@endsection
