@extends('layouts.backend.app')

@section('title', 'Contact Settings')
@section('page-title', 'Contact Settings')

@section('content')

    @if ($setting)
        <div class="cs-card">

            {{-- Header --}}
            <div class="cs-card-header">
                <div>
                    <h5><i class="fa-solid fa-address-card me-2"></i>Contact Settings</h5>
                    <p>The contact information displayed on your website.</p>
                </div>
                <a href="{{ route('admin.contact-settings.edit', $setting) }}" class="cs-btn-edit">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>
            </div>

            {{-- Info Grid --}}
            <div class="cs-info-grid">

                {{-- Phone --}}
                <div class="cs-info-item">
                    <div class="cs-icon"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <div class="cs-info-label">Phone</div>
                        <div class="cs-info-value {{ $setting->phone ? '' : 'empty' }}">
                            {{ $setting->phone ?: 'Not set' }}
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="cs-info-item">
                    <div class="cs-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <div class="cs-info-label">Email</div>
                        <div class="cs-info-value {{ $setting->email ? '' : 'empty' }}">
                            {{ $setting->email ?: 'Not set' }}
                        </div>
                    </div>
                </div>

                {{-- Response Time --}}
                <div class="cs-info-item">
                    <div class="cs-icon"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <div class="cs-info-label">Response Time</div>
                        <div class="cs-info-value {{ $setting->response_time ? '' : 'empty' }}">
                            {{ $setting->response_time ?: 'Not set' }}
                        </div>
                    </div>
                </div>

                {{-- Address --}}
                <div class="cs-info-item">
                    <div class="cs-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <div class="cs-info-label">Address</div>
                        <div class="cs-info-value {{ $setting->address ? '' : 'empty' }}">
                            {!! $setting->address ? nl2br(e($setting->address)) : 'Not set' !!}
                        </div>
                    </div>
                </div>

                {{-- Process --}}
                <div class="cs-info-item full-width">
                    <div class="cs-icon"><i class="fa-solid fa-list-check"></i></div>
                    <div style="width:100%">
                        <div class="cs-info-label">Process Description</div>
                        @php
                            $processSteps = array_values(array_filter(array_map('trim', explode("\n", $setting->process ?? ''))));
                        @endphp
                        @if (!empty($processSteps))
                            <ol class="mb-0 ps-3 mt-1" style="font-size:0.92rem; color:#1e2533; line-height:2;">
                                @foreach ($processSteps as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                        @else
                            <div class="cs-info-value empty">Not set</div>
                        @endif
                    </div>
                </div>

                {{-- Metrics --}}
                <div class="cs-info-item full-width">
                    <div class="cs-icon"><i class="fa-solid fa-chart-bar"></i></div>
                    <div style="width:100%">
                        <div class="cs-info-label">Stats / Metrics</div>
                        @php $metrics = collect($setting->metrics ?? []); @endphp
                        @if ($metrics->isEmpty())
                            <div class="cs-info-value empty">No metrics configured.</div>
                        @else
                            <table class="cs-metrics-table mt-2">
                                <thead>
                                    <tr>
                                        <th>Label</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metrics as $m)
                                        <tr>
                                            <td>{{ $m['label'] ?? '—' }}</td>
                                            <td><strong>{{ $m['value'] ?? '—' }}</strong></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    @else
        <div class="cs-card">
            <div class="no-setting-box">
                <i class="fa-solid fa-address-card"></i>
                <p class="fw-semibold mb-1">No contact settings found.</p>
                <p class="small text-muted">Please seed or create a contact settings record to get started.</p>
            </div>
        </div>
    @endif

@endsection
