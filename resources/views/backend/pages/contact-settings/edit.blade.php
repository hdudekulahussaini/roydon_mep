@extends('layouts.backend.app')

@section('title', 'Edit Contact Settings')
@section('page-title', 'Edit Contact Settings')

@section('content')

<div class="cs-form-card">

    {{-- Header --}}
    <div class="cs-form-header">
        <h5><i class="fa-solid fa-pen-to-square me-2"></i>Edit Contact Settings</h5>
        <p>Update the contact information displayed on the website.</p>
    </div>

    <form method="POST" action="{{ route('admin.contact-settings.update', $setting) }}" id="contactSettingsForm">
        @csrf
        @method('PUT')

        <div class="cs-form-body">

            {{-- Section: Basic Info --}}
            <div class="cs-section-title"><i class="fa-solid fa-circle-info me-1"></i> Basic Information</div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="cs-form-group">
                        <label><i class="fa-solid fa-phone"></i> Phone Number</label>
                        <input type="text" class="form-control" name="phone"
                            placeholder="e.g. +91 98765 43210"
                            value="{{ old('phone', $setting->phone) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cs-form-group">
                        <label><i class="fa-solid fa-envelope"></i> Email Address</label>
                        <input type="email" class="form-control" name="email"
                            placeholder="e.g. info@roydonmep.com"
                            value="{{ old('email', $setting->email) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cs-form-group">
                        <label><i class="fa-solid fa-clock"></i> Response Time</label>
                        <input type="text" class="form-control" name="response_time"
                            placeholder="e.g. Within 24 Hours"
                            value="{{ old('response_time', $setting->response_time) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cs-form-group">
                        <label><i class="fa-solid fa-location-dot"></i> Address</label>
                        <textarea class="form-control" name="address" rows="3"
                            placeholder="e.g. 123 Business Park, Mumbai, India">{{ old('address', $setting->address) }}</textarea>
                    </div>
                </div>
            </div>

            <hr class="cs-divider">

            {{-- Section: Process --}}
            <div class="cs-section-title"><i class="fa-solid fa-list-check me-1"></i> Process Description</div>
            <p class="text-muted small mb-3">Add each process step as a separate item (e.g. "Submit your inquiry", "We review your requirements").</p>

            <div class="process-builder">
                <div class="process-builder-head">
                    <span><i class="fa-solid fa-list-ol me-1"></i> Process Steps</span>
                </div>
                <div id="processRows">
                    @php
                        $existingSteps = old('process_steps') ?? array_filter(explode("\n", $setting->process ?? ''));
                        $existingSteps = array_values(array_filter(array_map('trim', $existingSteps)));
                    @endphp

                    @if (!empty($existingSteps))
                        @foreach ($existingSteps as $idx => $step)
                            <div class="process-row">
                                <div class="process-step-num">{{ $idx + 1 }}</div>
                                <input type="text" name="process_steps[]"
                                    placeholder="e.g. Submit your enquiry form"
                                    value="{{ $step }}">
                                <button type="button" class="btn-remove-row" onclick="removeProcessRow(this)" title="Remove step">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="process-row">
                            <div class="process-step-num">1</div>
                            <input type="text" name="process_steps[]" placeholder="e.g. Submit your enquiry form">
                            <button type="button" class="btn-remove-row" onclick="removeProcessRow(this)" title="Remove step">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <button type="button" class="btn-add-row" onclick="addProcessRow()">
                <i class="fa-solid fa-plus"></i> Add Step
            </button>

            {{-- Hidden process field (assembled from steps on submit) --}}
            <input type="hidden" name="process" id="processHidden">

            <hr class="cs-divider">

            {{-- Section: Metrics --}}
            <div class="cs-section-title"><i class="fa-solid fa-chart-bar me-1"></i> Stats / Metrics</div>
            <p class="text-muted small mb-3">Add key statistics shown on the contact page (e.g. "Hospital Projects — 8+").</p>

            <div class="metrics-builder">
                <div class="metrics-builder-head">
                    <span>Label</span>
                    <span>Value</span>
                    <span></span>
                </div>
                <div id="metricsRows">
                    @php $existingMetrics = old('metrics_label') ? null : ($setting->metrics ?? []); @endphp

                    @if (!empty($existingMetrics))
                        @foreach ($existingMetrics as $i => $m)
                            <div class="metrics-row">
                                <input type="text" name="metrics_label[]"
                                    placeholder="e.g. Hospital Projects"
                                    value="{{ old('metrics_label.' . $i, $m['label'] ?? '') }}">
                                <input type="text" name="metrics_value[]"
                                    placeholder="e.g. 8+"
                                    value="{{ old('metrics_value.' . $i, $m['value'] ?? '') }}">
                                <button type="button" class="btn-remove-row" onclick="removeMetricRow(this)" title="Remove">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        {{-- At least one blank row --}}
                        <div class="metrics-row">
                            <input type="text" name="metrics_label[]" placeholder="e.g. Hospital Projects">
                            <input type="text" name="metrics_value[]" placeholder="e.g. 8+">
                            <button type="button" class="btn-remove-row" onclick="removeMetricRow(this)" title="Remove">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <button type="button" class="btn-add-row" onclick="addMetricRow()">
                <i class="fa-solid fa-plus"></i> Add Metric
            </button>

            {{-- Hidden JSON field (assembled by JS on submit) --}}
            <input type="hidden" name="metrics_json" id="metricsJson">

        </div>

        {{-- Footer Actions --}}
        <div class="cs-form-actions">
            <button type="submit" class="btn-save">
                <i class="fa-solid fa-floppy-disk"></i> Save Changes
            </button>
            <a href="{{ route('admin.contact-settings.index') }}" class="btn-cancel">
                <i class="fa-solid fa-xmark"></i> Cancel
            </a>
        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
    // ---- Process Steps ----
    function addProcessRow() {
        const container = document.getElementById('processRows');
        const index = container.querySelectorAll('.process-row').length + 1;
        const row = document.createElement('div');
        row.className = 'process-row';
        row.innerHTML = `
            <div class="process-step-num">${index}</div>
            <input type="text" name="process_steps[]" placeholder="e.g. We review your requirements">
            <button type="button" class="btn-remove-row" onclick="removeProcessRow(this)" title="Remove step">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(row);
        renumberProcessRows();
    }

    function removeProcessRow(btn) {
        const row = btn.closest('.process-row');
        const container = document.getElementById('processRows');
        if (container.querySelectorAll('.process-row').length > 1) {
            row.remove();
        } else {
            row.querySelector('input').value = '';
        }
        renumberProcessRows();
    }

    function renumberProcessRows() {
        document.querySelectorAll('#processRows .process-step-num').forEach((el, i) => {
            el.textContent = i + 1;
        });
    }

    // ---- Metrics ----
    function addMetricRow() {
        const container = document.getElementById('metricsRows');
        const row = document.createElement('div');
        row.className = 'metrics-row';
        row.innerHTML = `
            <input type="text" name="metrics_label[]" placeholder="e.g. Hospital Projects">
            <input type="text" name="metrics_value[]" placeholder="e.g. 8+">
            <button type="button" class="btn-remove-row" onclick="removeMetricRow(this)" title="Remove">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(row);
    }

    function removeMetricRow(btn) {
        const row = btn.closest('.metrics-row');
        const container = document.getElementById('metricsRows');
        if (container.querySelectorAll('.metrics-row').length > 1) {
            row.remove();
        } else {
            row.querySelectorAll('input').forEach(i => i.value = '');
        }
    }

    // ---- On Submit: assemble hidden fields ----
    document.getElementById('contactSettingsForm').addEventListener('submit', function () {
        // Process: join non-empty steps with newlines
        const steps = [...document.querySelectorAll('input[name="process_steps[]"]')]
            .map(i => i.value.trim())
            .filter(v => v !== '');
        document.getElementById('processHidden').value = steps.join('\n');

        // Metrics: build JSON array
        const labels = [...document.querySelectorAll('input[name="metrics_label[]"]')].map(i => i.value.trim());
        const values = [...document.querySelectorAll('input[name="metrics_value[]"]')].map(i => i.value.trim());
        const metrics = [];
        for (let i = 0; i < labels.length; i++) {
            if (labels[i] || values[i]) {
                metrics.push({ label: labels[i], value: values[i] });
            }
        }
        document.getElementById('metricsJson').value = JSON.stringify(metrics);
    });
</script>
@endpush
