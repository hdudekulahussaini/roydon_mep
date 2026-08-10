<div class="row g-4">

    {{-- Banner Image --}}
    <div class="col-12">

        <label
            for="image"
            class="form-label fw-semibold">
            Banner Image
            @if(!$standardBanner?->image)
            <span class="text-danger">*</span>
            @endif
        </label>

        <input
            type="file"
            name="image"
            id="image"
            class="form-control @error('image') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp">

        @error('image')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

        <div class="form-text">
            Recommended format: JPG, PNG or WebP. Maximum size: 5MB.
        </div>

    </div>


    {{-- Existing Image --}}
    @if($standardBanner?->image)

    <div class="col-12">

        <label class="form-label fw-semibold">
            Current Banner
        </label>

        <div>

            <img
                src="{{ asset('storage/' . $standardBanner->image) }}"
                alt="{{ $standardBanner->alt_text }}"
                style="
                        max-width: 500px;
                        width: 100%;
                        height: auto;
                        border-radius: 8px;
                        border: 1px solid #ddd;
                        padding: 5px;
                    ">

        </div>

    </div>

    @endif


    {{-- Alt Text --}}
    <div class="col-md-8">

        <label
            for="alt_text"
            class="form-label fw-semibold">
            Alt Text
        </label>

        <input
            type="text"
            name="alt_text"
            id="alt_text"
            value="{{ old(
                'alt_text',
                $standardBanner?->alt_text
            ) }}"
            class="form-control @error('alt_text') is-invalid @enderror"
            placeholder="Roydon MEP - Standards">

        @error('alt_text')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

    </div>


    {{-- Sort Order --}}
    <div class="col-md-2">

        <label
            for="sort_order"
            class="form-label fw-semibold">
            Sort Order
        </label>

        <input
            type="number"
            name="sort_order"
            id="sort_order"
            min="1"
            value="{{ old(
                'sort_order',
                $standardBanner?->sort_order ?? 1
            ) }}"
            class="form-control @error('sort_order') is-invalid @enderror">

        @error('sort_order')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

        @enderror

    </div>


    {{-- Status --}}
    <div class="col-md-2">

        <label
            for="status"
            class="form-label fw-semibold">
            Status
        </label>

        <select
            name="status"
            id="status"
            class="form-select">

            <option
                value="1"
                {{ old(
                    'status',
                    $standardBanner?->status ?? true
                ) ? 'selected' : '' }}>
                Active
            </option>

            <option
                value="0"
                {{ !old(
                    'status',
                    $standardBanner?->status ?? true
                ) ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

</div>