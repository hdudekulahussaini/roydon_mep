<div class="row g-4">

    {{-- Title --}}
    <div class="col-12">

        <label
            for="title"
            class="form-label fw-semibold"
        >
            Value Title
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $companyValue?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Clinical Precision"
            maxlength="255"
            required
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Description --}}
    <div class="col-12">

        <label
            for="description"
            class="form-label fw-semibold"
        >
            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Describe this company value..."
            required
        >{{ old('description', $companyValue?->description) }}</textarea>

        @error('description')
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
                    $companyValue?->status ?? true
                ) ? 'checked' : '' }}
            >

            <label
                class="form-check-label fw-semibold"
                for="status"
            >
                Active Status
            </label>

        </div>

        <small class="text-muted">
            Enable this option to display this value on the website.
        </small>

        @error('status')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>