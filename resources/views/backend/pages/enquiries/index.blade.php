@extends('layouts.backend.app')

@section('title', 'Enquiries')
@section('page-title', 'Enquiries')

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Enquiries</h5>
                <p class="small text-muted mb-0">Recent contact form submissions</p>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->id }}</td>
                                <td>{{ $enquiry->name }}</td>
                                <td>{{ $enquiry->email }}</td>
                                <td>{{ $enquiry->phone }}</td>
                                <td>{{ $enquiry->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}"
                                        class="btn btn-sm btn-primary">Show</a>

                                    <form action="{{ route('admin.enquiries.destroy', $enquiry) }}" method="POST"
                                        style="display:inline-block" onsubmit="return confirm('Delete this enquiry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No enquiries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($enquiries->hasPages())
            <div class="card-footer">
                {{ $enquiries->links() }}
            </div>
        @endif
    </div>

@endsection
