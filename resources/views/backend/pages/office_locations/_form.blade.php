<div class="row g-4">

    {{-- Flag --}}
    <div class="col-md-3">

        <label
            for="flag"
            class="form-label fw-semibold">
            Country Flag
        </label>

        <input
            type="text"
            id="flag"
            name="flag"
            value="{{ old('flag', $officeLocation?->flag) }}"
            class="form-control @error('flag') is-invalid @enderror"
            placeholder="🇮🇳"
            maxlength="20"
            required>

        @error('flag')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <small class="text-muted">
            Example: 🇮🇳 🇦🇪 🇸🇦 🇬🇧 🇩🇪
        </small>

    </div>


    {{-- City --}}
    <div class="col-md-5">

        <label
            for="city"
            class="form-label fw-semibold">
            City
        </label>

        <input
            type="text"
            id="city"
            name="city"
            value="{{ old('city', $officeLocation?->city) }}"
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


    {{-- Sort Order --}}
    <div class="col-md-4">

        <label
            for="sort_order"
            class="form-label fw-semibold">
            Display Order
        </label>

        <input
            type="number"
            id="sort_order"
            name="sort_order"
            value="{{ old('sort_order', $officeLocation?->sort_order ?? 0) }}"
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


    {{-- Office Type --}}
    <div class="col-12">

        <label
            for="type"
            class="form-label fw-semibold">
            Office Type
        </label>

        <input
            type="text"
            id="type"
            name="type"
            value="{{ old('type', $officeLocation?->type) }}"
            class="form-control @error('type') is-invalid @enderror"
            placeholder="e.g. Telangana, India — Corporate HQ"
            maxlength="255"
            required>

        @error('type')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- Description --}}
    <div class="col-12">

        <label
            for="description"
            class="form-label fw-semibold">
            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Describe the office and its responsibilities..."
            required>{{ old('description', $officeLocation?->description) }}</textarea>

        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- Address --}}
    <div class="col-12">

        <label
            for="address"
            class="form-label fw-semibold">
            Address
        </label>

        <textarea
            id="address"
            name="address"
            rows="3"
            class="form-control @error('address') is-invalid @enderror"
            placeholder="Office address...">{{ old('address', $officeLocation?->address) }}</textarea>

        @error('address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- Phone --}}
    <div class="col-md-6">

        <label
            for="phone"
            class="form-label fw-semibold">
            Phone
        </label>

        <input
            type="text"
            id="phone"
            name="phone"
            value="{{ old('phone', $officeLocation?->phone) }}"
            class="form-control @error('phone') is-invalid @enderror"
            placeholder="+91-73307 56745"
            maxlength="100">

        @error('phone')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- Email --}}
    <div class="col-md-6">

        <label
            for="email"
            class="form-label fw-semibold">
            Email
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $officeLocation?->email) }}"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="info@example.com"
            maxlength="255">

        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>


    {{-- SEO --}}
    <div class="col-12">

        <label
            for="seo"
            class="form-label fw-semibold">
            SEO Keywords
        </label>

        <textarea
            id="seo"
            name="seo"
            rows="3"
            class="form-control @error('seo') is-invalid @enderror"
            placeholder="Hospital MEP contractor Hyderabad · Medical gas contractor Telangana...">{{ old('seo', $officeLocation?->seo) }}</textarea>

        @error('seo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <small class="text-muted">
            SEO keywords are displayed only where required.
        </small>

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
                    $officeLocation?->status ?? true
                ) ? 'checked' : '' }}>

            <label
                class="form-check-label fw-semibold"
                for="status">
                Active Status
            </label>

        </div>

        <small class="text-muted">
            Only active offices will appear on the website.
        </small>

    </div>

</div>