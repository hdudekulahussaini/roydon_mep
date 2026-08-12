@extends('layouts.backend.app')

@section('title', 'Enquiries')
@section('page-title', 'Enquiries')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Card Header --}}
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="mb-1">Enquiries</h5>
                <p class="small text-muted mb-0">Recent contact form submissions</p>
            </div>

            {{-- Search --}}
            <form action="{{ route('admin.enquiries.index') }}" method="GET" class="d-flex gap-2">
                <div class="input-group" style="max-width: 320px;">
                    <input type="text" name="search" class="form-control form-control-sm"
                        placeholder="Search name, email, phone…"
                        value="{{ request('search') }}">
                    <button class="btn btn-sm btn-outline-secondary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                @if(request('search'))
                    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-sm btn-outline-dark">
                        Clear
                    </a>
                @endif
            </form>
        </div>
    </div>

    {{-- Bulk Actions Bar (hidden by default) --}}
    <div id="bulk-bar" class="card-header bg-light py-2 border-top d-none">
        <div class="d-flex align-items-center gap-3">
            <span class="small fw-semibold">
                <span id="selected-count">0</span> selected
            </span>
            <button type="button" id="bulk-delete-btn" class="btn btn-sm btn-danger">
                <i class="fa-solid fa-trash me-1"></i> Delete Selected
            </button>
        </div>
    </div>

    {{-- Table --}}
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 40px;">
                            <input type="checkbox" id="select-all" class="form-check-input">
                        </th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Submitted</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($enquiries as $enquiry)
                        <tr>
                            <td class="ps-4">
                                <input type="checkbox" class="form-check-input row-checkbox"
                                    value="{{ $enquiry->id }}">
                            </td>
                            <td>{{ $enquiry->id }}</td>
                            <td><strong>{{ $enquiry->name }}</strong></td>
                            <td>{{ $enquiry->email }}</td>
                            <td>{{ $enquiry->phone ?: '—' }}</td>
                            <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>

                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}"
                                        class="btn btn-sm btn-outline-primary" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <form action="{{ route('admin.enquiries.destroy', $enquiry) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this enquiry?');">
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
                            <td colspan="7" class="text-center py-5">
                                <i class="fa-solid fa-inbox fs-2 text-muted"></i>
                                <p class="mt-2 mb-0 text-muted">
                                    @if(request('search'))
                                        No enquiries match "<strong>{{ request('search') }}</strong>".
                                    @else
                                        No enquiries found.
                                    @endif
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Footer / Pagination --}}
    @if ($enquiries->total() > 0)
        <div class="card-footer bg-white py-3">
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

                <div class="overflow-auto">
                    {{ $enquiries->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @endif

</div>

{{-- Hidden bulk-delete form --}}
<form id="bulk-delete-form"
    action="{{ route('admin.enquiries.bulk-destroy') }}"
    method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAll    = document.getElementById('select-all');
    const bulkBar      = document.getElementById('bulk-bar');
    const selectedCount = document.getElementById('selected-count');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
    const bulkForm     = document.getElementById('bulk-delete-form');

    function getCheckboxes() {
        return document.querySelectorAll('.row-checkbox');
    }

    function getChecked() {
        return document.querySelectorAll('.row-checkbox:checked');
    }

    function updateUI() {
        const checked = getChecked();
        const all     = getCheckboxes();

        selectedCount.textContent = checked.length;

        if (checked.length > 0) {
            bulkBar.classList.remove('d-none');
        } else {
            bulkBar.classList.add('d-none');
        }

        selectAll.checked = all.length > 0 && checked.length === all.length;
        selectAll.indeterminate = checked.length > 0 && checked.length < all.length;
    }

    selectAll.addEventListener('change', function () {
        getCheckboxes().forEach(cb => cb.checked = this.checked);
        updateUI();
    });

    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('row-checkbox')) {
            updateUI();
        }
    });

    bulkDeleteBtn.addEventListener('click', function () {
        const checked = getChecked();
        if (checked.length === 0) return;

        if (!confirm('Delete ' + checked.length + ' selected enquir' + (checked.length === 1 ? 'y' : 'ies') + '?')) {
            return;
        }

        // Clear old hidden inputs
        bulkForm.querySelectorAll('input[name="ids[]"]').forEach(el => el.remove());

        checked.forEach(cb => {
            const input = document.createElement('input');
            input.type  = 'hidden';
            input.name  = 'ids[]';
            input.value = cb.value;
            bulkForm.appendChild(input);
        });

        bulkForm.submit();
    });
});
</script>
@endpush
