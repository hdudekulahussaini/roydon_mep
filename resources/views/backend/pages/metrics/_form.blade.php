<div class="row g-4">

    {{-- Number --}}
    <div class="col-md-6">

        <label
            for="number"
            class="form-label fw-semibold">
            Metric Number
        </label>

        <input
            type="text"
            id="number"
            name="number"
            value="{{ old('number', $metric?->number) }}"
            class="form-control @error('number') is-invalid @enderror"
            placeholder="e.g. 900+"
            maxlength="100"
            required>

        @error('number')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <small class="text-muted d-block mt-1">
            Examples: <code>900+</code>, <code>800k</code>,
            <code>70</code>, <code>0</code>
        </small>

    </div>


    {{-- Label --}}
    <div class="col-md-6">

        <label
            for="label"
            class="form-label fw-semibold">
            Metric Label
        </label>

        <input
            type="text"
            id="label"
            name="label"
            value="{{ old('label', $metric?->label) }}"
            class="form-control @error('label') is-invalid @enderror"
            placeholder="e.g. Hospital Beds Delivered"
            maxlength="255"
            required>

        @error('label')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- Status --}}
    <div class="col-12">

        <div class="form-check form-switch">

            <input
                class="form-check-input"
                type="checkbox"
                id="status"
                name="status"
                value="1"
                {{ old(
                    'status',
                    $metric?->status ?? true
                ) ? 'checked' : '' }}>

            <label
                class="form-check-label fw-semibold"
                for="status">
                Active Status
            </label>

        </div>

        <small class="text-muted">
            Enable this option to display this metric on the website.
        </small>

        @error('status')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>

</div>