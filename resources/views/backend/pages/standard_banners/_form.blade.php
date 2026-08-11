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



</div>