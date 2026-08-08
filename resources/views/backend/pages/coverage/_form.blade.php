<div class="row g-4">

    {{-- City --}}
    <div class="col-md-6">

        <label
            for="city"
            class="form-label fw-semibold">
            City
        </label>

        <input
            type="text"
            id="city"
            name="city"
            value="{{ old('city', $coverage?->city) }}"
            class="form-control @error('city') is-invalid @enderror"
            placeholder="e.g. Hyderabad"
            maxlength="100"
            required>

        @error('city')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- State --}}
    <div class="col-md-6">

        <label
            for="state"
            class="form-label fw-semibold">
            State / Region
        </label>

        <input
            type="text"
            id="state"
            name="state"
            value="{{ old('state', $coverage?->state) }}"
            class="form-control @error('state') is-invalid @enderror"
            placeholder="e.g. Telangana"
            maxlength="100"
            required>

        @error('state')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- Sort Order --}}
    <div class="col-md-6">

        <label
            for="sort_order"
            class="form-label fw-semibold">
            Display Order
        </label>

        <input
            type="number"
            id="sort_order"
            name="sort_order"
            value="{{ old(
                'sort_order',
                $coverage?->sort_order ?? 0
            ) }}"
            class="form-control @error('sort_order') is-invalid @enderror"
            min="0"
            placeholder="0">

        @error('sort_order')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <small class="text-muted">
            Lower numbers appear first.
        </small>

    </div>


    {{-- Status --}}
    <div class="col-md-6">

        <div class="form-check form-switch mt-4">

            <input
                class="form-check-input"
                type="checkbox"
                id="status"
                name="status"
                value="1"
                {{ old(
                    'status',
                    $coverage?->status ?? true
                ) ? 'checked' : '' }}>

            <label
                class="form-check-label fw-semibold"
                for="status">
                Active Status
            </label>

        </div>

        <small class="text-muted">
            Only active locations will appear on the website.
        </small>

    </div>

</div>