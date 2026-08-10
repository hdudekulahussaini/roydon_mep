@extends('layouts.backend.app')

@section('title', 'Enquiry')
@section('page-title', 'Enquiry Details')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Enquiry #{{ $enquiry->id }}</h5>
                <p class="small text-muted mb-0">Submitted {{ $enquiry->created_at->diffForHumans() }}</p>
            </div>
            <div>
                <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary btn-sm">Back to list</a>
            </div>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $enquiry->name }}</dd>

                <dt class="col-sm-3">Organisation</dt>
                <dd class="col-sm-9">{{ $enquiry->organisation }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $enquiry->email }}</dd>

                <dt class="col-sm-3">Phone</dt>
                <dd class="col-sm-9">{{ $enquiry->phone }}</dd>

                <dt class="col-sm-3">City</dt>
                <dd class="col-sm-9">{{ $enquiry->city }}</dd>

                <dt class="col-sm-3">Details</dt>
                <dd class="col-sm-9">{{ $enquiry->details }}</dd>

                <dt class="col-sm-3">Budget Range</dt>
                <dd class="col-sm-9">{{ $enquiry->budget_range }}</dd>

                <dt class="col-sm-3">Referral Source</dt>
                <dd class="col-sm-9">{{ $enquiry->referral_source }}</dd>
            </dl>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <div>
                <form action="{{ route('admin.enquiries.destroy', $enquiry) }}" method="POST" onsubmit="return confirm('Delete this enquiry?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete Enquiry</button>
                </form>
            </div>
            <div>
                <a href="{{ route('admin.enquiries.index') }}" class="btn btn-secondary">Close</a>
            </div>
        </div>
    </div>

@endsection
