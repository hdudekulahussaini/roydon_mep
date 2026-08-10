@extends('layouts.backend.app')

@section('title', 'Contact Settings')
@section('page-title', 'Contact Settings')

@push('styles')
<style>
    .cs-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        overflow: hidden;
    }
    .cs-card-header {
        background: linear-gradient(135deg, #0E9B9B 0%, #087474 100%);
        padding: 24px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .cs-card-header h5 {
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        margin: 0;
    }
    .cs-card-header p {
        color: rgba(255,255,255,0.8);
        font-size: 0.83rem;
        margin: 2px 0 0;
    }
    .cs-btn-edit {
        background: #fff;
        color: #0E9B9B;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 700;
        font-size: 0.88rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s, color 0.2s;
    }
    .cs-btn-edit:hover {
        background: #e6f7f7;
        color: #087474;
    }
    .cs-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }
    .cs-info-item {
        padding: 20px 28px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }
    .cs-info-item:nth-child(odd) {
        border-right: 1px solid #f0f0f0;
    }
    .cs-info-item.full-width {
        grid-column: 1 / -1;
        border-right: none;
    }
    .cs-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #e8f7f7;
        color: #0E9B9B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .cs-info-label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #9aa0b0;
        margin-bottom: 4px;
    }
    .cs-info-value {
        font-size: 0.95rem;
        color: #1e2533;
        line-height: 1.5;
        word-break: break-word;
    }
    .cs-info-value.empty {
        color: #c0c6d0;
        font-style: italic;
    }
    .cs-metrics-table {
        width: 100%;
        border-collapse: collapse;
    }
    .cs-metrics-table th {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #9aa0b0;
        font-weight: 700;
        padding: 6px 12px;
        background: #f8f9fc;
        border-bottom: 1px solid #eee;
    }
    .cs-metrics-table td {
        padding: 8px 12px;
        font-size: 0.9rem;
        color: #1e2533;
        border-bottom: 1px solid #f4f4f4;
    }
    .cs-metrics-table tr:last-child td {
        border-bottom: none;
    }
    .no-setting-box {
        text-align: center;
        padding: 60px 20px;
        color: #9aa0b0;
    }
    .no-setting-box i {
        font-size: 2.5rem;
        margin-bottom: 12px;
        display: block;
        color: #c0c6d0;
    }
</style>
@endpush

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
