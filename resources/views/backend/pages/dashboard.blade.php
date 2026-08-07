@extends('layouts.backend.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')

    <section class="welcome-section">

        <div>
            <span class="welcome-label">
                ROYDON ADMINISTRATION
            </span>

            <h2>
                Welcome back, {{ auth()->user()->name ?? 'Administrator' }}
            </h2>

            <p>
                Manage website projects, services, locations and
                consultation enquiries from this dashboard.
            </p>
        </div>

        <div class="welcome-date">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->format('d M Y') }}
        </div>

    </section>

    <section class="statistics-grid">

        <div class="stat-card">

            <div class="stat-icon green">
                <i class="fa-solid fa-building"></i>
            </div>

            <div class="stat-content">
                <span>Total Projects</span>

                <h3>{{ $stats['projects'] }}</h3>

                <a href="{{ url('/admin/projects') }}">
                    Manage projects
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon blue">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>

            <div class="stat-content">
                <span>Active Services</span>

                <h3>{{ $stats['services'] }}</h3>

                <a href="{{ url('/admin/services') }}">
                    Manage services
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon orange">
                <i class="fa-regular fa-envelope"></i>
            </div>

            <div class="stat-content">
                <span>Total Enquiries</span>

                <h3>{{ $stats['enquiries'] }}</h3>

                <a href="{{ url('/admin/enquiries') }}">
                    View enquiries
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon red">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>

            <div class="stat-content">
                <span>New Enquiries</span>

                <h3>{{ $stats['new_enquiries'] }}</h3>

                <a href="{{ url('/admin/enquiries?status=new') }}">
                    View new enquiries
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon purple">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div class="stat-content">
                <span>Completed Projects</span>

                <h3>{{ $stats['completed_projects'] }}</h3>

                <a href="{{ url('/admin/projects?status=completed') }}">
                    View completed
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon cyan">
                <i class="fa-solid fa-location-dot"></i>
            </div>

            <div class="stat-content">
                <span>Office Locations</span>

                <h3>{{ $stats['locations'] }}</h3>

                <a href="{{ url('/admin/locations') }}">
                    Manage locations
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

        </div>

    </section>

    <section class="dashboard-grid">

        <div class="dashboard-panel">

            <div class="panel-header">

                <div>
                    <h3>Recent Enquiries</h3>

                    <p>
                        Latest consultation requests received
                    </p>
                </div>

                <a href="{{ url('/admin/enquiries') }}" class="view-all-link">

                    View all
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

            <div class="table-responsive">

                <table class="table admin-table">

                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Customer</th>
                            <th>Project Type</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($recentEnquiries as $enquiry)
                            <tr>
                                <td>
                                    {{ $enquiry->reference_number }}
                                </td>

                                <td>
                                    <strong>{{ $enquiry->name }}</strong>

                                    <span>{{ $enquiry->email }}</span>
                                </td>

                                <td>
                                    {{ $enquiry->project_type }}
                                </td>

                                <td>
                                    <span class="status-badge status-{{ $enquiry->status }}">
                                        {{ ucfirst($enquiry->status) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $enquiry->created_at->format('d M Y') }}
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="empty-table">

                                    <i class="fa-regular fa-folder-open"></i>

                                    <h4>No enquiries available</h4>

                                    <p>
                                        New consultation enquiries will appear here.
                                    </p>

                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="dashboard-panel quick-actions-panel">

            <div class="panel-header">

                <div>
                    <h3>Quick Actions</h3>

                    <p>Frequently used options</p>
                </div>

            </div>

            <div class="quick-actions">

                <a href="{{ url('/admin/projects/create') }}" class="quick-action">

                    <span class="quick-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>

                    <span class="quick-content">
                        <strong>Add Project</strong>
                        <small>Create a new MEP project</small>
                    </span>

                    <i class="fa-solid fa-chevron-right"></i>
                </a>

                <a href="{{ url('/admin/services/create') }}" class="quick-action">

                    <span class="quick-icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </span>

                    <span class="quick-content">
                        <strong>Add Service</strong>
                        <small>Create a new service</small>
                    </span>

                    <i class="fa-solid fa-chevron-right"></i>
                </a>

                <a href="{{ url('/admin/enquiries') }}" class="quick-action">

                    <span class="quick-icon">
                        <i class="fa-regular fa-envelope"></i>
                    </span>

                    <span class="quick-content">
                        <strong>Check Enquiries</strong>
                        <small>View customer requests</small>
                    </span>

                    <i class="fa-solid fa-chevron-right"></i>
                </a>

                <a href="{{ url('/') }}" target="_blank" class="quick-action">

                    <span class="quick-icon">
                        <i class="fa-solid fa-globe"></i>
                    </span>

                    <span class="quick-content">
                        <strong>View Website</strong>
                        <small>Open frontend website</small>
                    </span>

                    <i class="fa-solid fa-chevron-right"></i>
                </a>

            </div>

        </div>

    </section>

@endsection
