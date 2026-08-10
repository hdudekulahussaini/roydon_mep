@extends('layouts.backend.app')

@section('title', 'Contact Settings')
@section('page-title', 'Contact Settings')

@section('content')
@push('styles')
<style>
.contact-info-box {
    background: #fff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.06);
}
.btn-submit { background:#0E9B9B; color:#fff; border-radius:8px; padding:10px 18px; font-weight:700; border:none; }
.btn-submit:hover{ background:#087474 }
</style>
@endpush

    <div class="card">
        <div class="card-body">
            @if ($setting)
                <div class="contact-info-box">
                <dl class="row">
                    <dt class="col-sm-3">Phone</dt>
                    <dd class="col-sm-9">{{ $setting->phone }}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $setting->email }}</dd>

                    <dt class="col-sm-3">Address</dt>
                    <dd class="col-sm-9">{!! nl2br(e($setting->address)) !!}</dd>

                    <dt class="col-sm-3">Response Time</dt>
                    <dd class="col-sm-9">{{ $setting->response_time }}</dd>

                    <dt class="col-sm-3">Process</dt>
                    <dd class="col-sm-9">{!! nl2br(e($setting->process)) !!}</dd>

                    <dt class="col-sm-3">Metrics</dt>
                    <dd class="col-sm-9">
                        @php $metrics = collect($setting->metrics ?? []); @endphp

                        @if($metrics->isEmpty())
                            <p class="text-muted">No metrics configured.</p>
                        @else
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Label</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($metrics as $m)
                                        <tr>
                                            <td>{{ $m['label'] ?? '' }}</td>
                                            <td>{{ $m['value'] ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </dd>
                </dl>
                </div>

                <a href="{{ route('admin.contact-settings.edit', $setting) }}" class="btn-submit">Edit</a>
            @else
                <div class="alert alert-info">No contact settings found. Create one using tinker or a migration.</div>
            @endif
        </div>
    </div>

@endsection
