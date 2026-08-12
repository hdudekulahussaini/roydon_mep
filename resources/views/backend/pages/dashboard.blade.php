@extends('layouts.backend.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')

    {{-- Welcome Banner --}}
    <section class="welcome-section mb-4">
        <div>
            <span class="welcome-label">
                ROYDON ADMINISTRATION
            </span>
            <h2>
                Welcome back, {{ auth()->user()->name ?? 'Administrator' }}
            </h2>
            <p>
                Manage website projects, services, locations and consultation enquiries from this dashboard.
            </p>
        </div>
        <div class="welcome-date">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->format('d M Y') }}
        </div>
    </section>

    {{-- 4 Stat Cards --}}
    <section class="statistics-grid">
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fa-solid fa-building"></i>
            </div>
            <div class="stat-content">
                <span>Total Projects</span>
                <h3>{{ $stats['projects'] ?? 0 }}</h3>
                <a href="{{ route('admin.projects.index') }}">
                    Manage projects <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <div class="stat-content">
                <span>Active Services</span>
                <h3>{{ $stats['services'] ?? 0 }}</h3>
                <a href="{{ route('admin.service-subcategories.index') }}">
                    Manage services <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="stat-content">
                <span>Total Enquiries</span>
                <h3>{{ $stats['enquiries'] ?? 0 }}</h3>
                <a href="{{ route('admin.enquiries.index') }}">
                    View enquiries <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cyan">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="stat-content">
                <span>Office Locations</span>
                <h3>{{ $stats['locations'] ?? 0 }}</h3>
                <a href="{{ route('admin.office-locations.index') }}">
                    Manage locations <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- Panels Grid --}}
    <section class="dashboard-grid">

        {{-- Recent Enquiries --}}
        <div class="dashboard-panel">
            <div class="panel-header">
                <div>
                    <h3>Recent Enquiries</h3>
                    <p>Latest consultation requests received</p>
                </div>
                <a href="{{ route('admin.enquiries.index') }}" class="view-all-link">
                    View all <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Customer Name</th>
                            <th>Email Address</th>
                            <th>Phone</th>
                            <th>Submitted Date</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentEnquiries as $enquiry)
                            <tr>
                                <td class="ps-4">
                                    <strong class="text-dark">{{ $enquiry->name }}</strong>
                                    @if($enquiry->organisation)
                                        <span class="small text-muted d-block">{{ $enquiry->organisation }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="mailto:{{ $enquiry->email }}" class="text-primary text-decoration-none">
                                        {{ $enquiry->email }}
                                    </a>
                                </td>
                                <td>{{ $enquiry->phone ?: '—' }}</td>
                                <td class="text-muted small">{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="btn btn-sm btn-outline-primary" title="View Enquiry">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-table">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <h4>No enquiries available</h4>
                                    <p>New consultation enquiries will appear here.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="dashboard-panel quick-actions-panel">
            <div class="panel-header">
                <div>
                    <h3>Quick Actions</h3>
                    <p>Frequently used management options</p>
                </div>
            </div>

            <div class="quick-actions">
                <a href="{{ route('admin.projects.create') }}" class="quick-action">
                    <span class="quick-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="quick-content">
                        <strong>Add New Project</strong>
                        <small>Create a new MEP project listing</small>
                    </span>
                    <i class="fa-solid fa-chevron-right text-muted small"></i>
                </a>

                <a href="{{ route('admin.service-subcategories.create') }}" class="quick-action">
                    <span class="quick-icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </span>
                    <span class="quick-content">
                        <strong>Add New Service</strong>
                        <small>Create a new service offering</small>
                    </span>
                    <i class="fa-solid fa-chevron-right text-muted small"></i>
                </a>

                <a href="{{ route('admin.enquiries.index') }}" class="quick-action">
                    <span class="quick-icon">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <span class="quick-content">
                        <strong>View All Enquiries</strong>
                        <small>Check customer consultation messages</small>
                    </span>
                    <i class="fa-solid fa-chevron-right text-muted small"></i>
                </a>

                <a href="{{ url('/') }}" target="_blank" class="quick-action">
                    <span class="quick-icon">
                        <i class="fa-solid fa-globe"></i>
                    </span>
                    <span class="quick-content">
                        <strong>View Live Website</strong>
                        <small>Open frontend website in new tab</small>
                    </span>
                    <i class="fa-solid fa-chevron-right text-muted small"></i>
                </a>
            </div>
        </div>

    </section>

@endsection
