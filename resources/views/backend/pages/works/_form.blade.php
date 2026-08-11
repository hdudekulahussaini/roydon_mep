<div class="row g-4">

    {{-- Image --}}
    <div class="col-12">

        <label for="image" class="form-label fw-semibold">
            Work Image
        </label>

        <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp"
            class="form-control @error('image') is-invalid @enderror" {{ isset($work) && $work ? '' : 'required' }}>

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <small class="text-muted d-block mt-1">
            JPG, JPEG, PNG or WEBP. Maximum size: 2MB.
        </small>


        {{-- Existing Image --}}
        @if (isset($work) && $work?->image)
            <div class="mt-3">

                <p class="small text-muted mb-2">
                    Current Image
                </p>

                <img src="{{ asset('storage/' . $work->image) }}" alt="{{ $work->title }}" class="rounded border"
                    style="
                        width: 220px;
                        height: 140px;
                        object-fit: cover;
                    ">

            </div>
        @endif

    </div>


    {{-- Subtitle --}}
    <div class="col-md-6">

        <label for="subtitle" class="form-label fw-semibold">
            Subtitle
        </label>

        <input type="text" id="subtitle" name="subtitle"
            value="{{ old('subtitle', $work?->subtitle) }}"
            class="form-control @error('subtitle') is-invalid @enderror" placeholder="e.g. Hospital MEP execution"
            required>

        @error('subtitle')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Title --}}
    <div class="col-md-6">

        <label for="title" class="form-label fw-semibold">
            Title
        </label>

        <input type="text" id="title" name="title"
            value="{{ old('title', $work?->title) }}"
            class="form-control @error('title') is-invalid @enderror" placeholder="e.g. Site Execution" required>

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Sort Order --}}
    <div class="col-md-6">

        <label for="sort_order" class="form-label fw-semibold">
            Sort Order
        </label>

        <input type="number" id="sort_order" name="sort_order"
            value="{{ old('sort_order', $work?->sort_order ?? 0) }}"
            class="form-control @error('sort_order') is-invalid @enderror" min="0" placeholder="e.g. 1">

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

        <div class="form-check form-switch">

            <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                {{ old('status', $work?->status ?? true) ? 'checked' : '' }}>

            <label class="form-check-label fw-semibold" for="status">
                Active Status
            </label>

        </div>

        <small class="text-muted">
            Enable this option to display the work on the website.
        </small>

        @error('status')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>
</div>
