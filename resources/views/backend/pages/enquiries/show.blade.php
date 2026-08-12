@extends('layouts.backend.app')

@section('title', 'Enquiry #' . $enquiry->id)
@section('page-title', 'Enquiry Details')

@section('content')

    <div class="card border-0 shadow-sm">

        {{-- Card Header --}}
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h5 class="mb-1">Enquiry #{{ $enquiry->id }}</h5>
                    <p class="small text-muted mb-0">
                        Submitted {{ $enquiry->created_at->format('d M Y, h:i A') }} ({{ $enquiry->created_at->diffForHumans() }})
                    </p>
                </div>

                <a href="{{ route('admin.enquiries.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to Enquiries
                </a>
            </div>
        </div>

        {{-- Card Body --}}
        <div class="card-body p-4">

            <div class="row g-4">

                {{-- Customer Information --}}
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100 border">
                        <h6 class="fw-bold mb-3 text-dark pb-2 border-bottom">
                            <i class="fa-solid fa-user me-2 text-primary"></i> Customer Information
                        </h6>

                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <th class="text-muted fw-semibold ps-0" style="width: 35%;">Name:</th>
                                <td class="fw-bold text-dark">{{ $enquiry->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Organisation:</th>
                                <td>{{ $enquiry->organisation ?: '—' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Email:</th>
                                <td>
                                    <a href="mailto:{{ $enquiry->email }}" class="text-primary text-decoration-none">
                                        <i class="fa-regular fa-envelope me-1"></i> {{ $enquiry->email }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Phone:</th>
                                <td>
                                    @if($enquiry->phone)
                                        <a href="tel:{{ $enquiry->phone }}" class="text-dark text-decoration-none me-2">
                                            <i class="fa-solid fa-phone me-1"></i> {{ $enquiry->phone }}
                                        </a>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $enquiry->phone) }}" target="_blank" class="text-success small">
                                            <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                        </a>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">City / Location:</th>
                                <td>{{ $enquiry->city ?: '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Project Requirements --}}
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100 border">
                        <h6 class="fw-bold mb-3 text-dark pb-2 border-bottom">
                            <i class="fa-solid fa-clipboard-list me-2 text-primary"></i> Requirement Details
                        </h6>

                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <th class="text-muted fw-semibold ps-0" style="width: 40%;">Project Type:</th>
                                <td><span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1">{{ $enquiry->project_type ?: 'General' }}</span></td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Bed Count:</th>
                                <td>{{ $enquiry->bed_count ?: '—' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Budget Range:</th>
                                <td>{{ $enquiry->budget_range ?: '—' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Expected Programme:</th>
                                <td>{{ $enquiry->expected_programme ?: '—' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted fw-semibold ps-0">Referral Source:</th>
                                <td>{{ $enquiry->referral_source ?: '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Message Details --}}
                <div class="col-12 mt-4">
                    <h6 class="fw-bold mb-2 text-dark">
                        <i class="fa-solid fa-align-left me-2 text-primary"></i> Message & Requirements
                    </h6>
                    <div class="p-3 bg-white border rounded-3 text-dark" style="min-height: 90px; line-height: 1.6; white-space: pre-line;">
                        {{ $enquiry->details ?: 'No detailed message was provided.' }}
                    </div>
                </div>

            </div>

        </div>

        {{-- Card Footer --}}
        <div class="card-footer bg-white py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex gap-2">
                @if($enquiry->email)
                    <a href="mailto:{{ $enquiry->email }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-reply me-1"></i> Reply Email
                    </a>
                @endif
                @if($enquiry->phone)
                    <a href="tel:{{ $enquiry->phone }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa-solid fa-phone me-1"></i> Call Phone
                    </a>
                @endif
            </div>

            <form action="{{ route('admin.enquiries.destroy', $enquiry) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fa-solid fa-trash me-1"></i> Delete Enquiry
                </button>
            </form>
        </div>

    </div>

@endsection
