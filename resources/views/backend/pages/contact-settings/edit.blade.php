@extends('layouts.backend.app')

@section('title', 'Edit Contact Settings')
@section('page-title', 'Edit Contact Settings')

@section('content')
@push('styles')
<style>
.quote-form-box {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
}
.btn-submit {
    display: inline-block;
    padding: 12px 22px;
    background: #0E9B9B;
    color: #fff;
    border-radius: 8px;
    font-weight: 700;
    border: none;
}
.btn-submit:hover { background: #087474; }
</style>
@endpush

    <div class="card">
        <div class="card-body">
            <div class="quote-form-box">
            <form method="POST" action="{{ route('admin.contact-settings.update', $setting) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input class="form-control" name="phone" value="{{ old('phone', $setting->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email" value="{{ old('email', $setting->email) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" name="address" rows="3">{{ old('address', $setting->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Response Time</label>
                    <input class="form-control" name="response_time" value="{{ old('response_time', $setting->response_time) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Process (plain text)</label>
                    <textarea class="form-control" name="process" rows="4">{{ old('process', $setting->process) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metrics (JSON array)</label>
                    <textarea class="form-control" name="metrics_json" rows="6">{{ old('metrics_json', json_encode($setting->metrics ?? [], JSON_PRETTY_PRINT)) }}</textarea>
                    <div class="form-text">Provide JSON array like: [{"label":"Hospital Projects","value":"8+"}, ...]</div>
                </div>

                <button class="btn-submit" type="submit">Save</button>
                <a href="{{ route('admin.contact-settings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
            </div>
        </div>
    </div>

@endsection
