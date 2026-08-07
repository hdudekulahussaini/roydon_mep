<div class="row g-4">

    {{-- Count --}}
    <div class="col-12">
        <label for="count" class="form-label fw-semibold">
            Count/Value
        </label>
        <input type="text"
            id="count"
            name="count"
            value="{{ old('count', $premiumStat?->count) }}"
            class="form-control @error('count') is-invalid @enderror"
            placeholder="e.g. 8+ or 3.4M"
            required>
        @error('count')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Title --}}
    <div class="col-12">
        <label for="title" class="form-label fw-semibold">
            Title
        </label>
        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $premiumStat?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Projects or Sq.Ft Engineered"
            required>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Description --}}
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">
            Description
        </label>
        <input type="text"
            id="description"
            name="description"
            value="{{ old('description', $premiumStat?->description) }}"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="e.g. Delivered 2018–2026 or Healthcare & Commercial"
            required>
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>

