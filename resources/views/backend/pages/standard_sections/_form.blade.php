@csrf

<div class="row g-3">
    <div class="col-12">
        <label for="title" class="form-label fw-semibold">Section Title <span class="text-danger">*</span></label>
        <input
            type="text"
            name="title"
            id="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $standardSection->title ?? '') }}"
            placeholder="e.g. Fire & Life Safety"
            required
        >
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
        <input
            type="number"
            name="sort_order"
            id="sort_order"
            class="form-control @error('sort_order') is-invalid @enderror"
            value="{{ old('sort_order', $standardSection->sort_order ?? 0) }}"
            min="0"
        >
        @error('sort_order')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input
                type="hidden"
                name="status"
                value="0"
            >
            <input
                type="checkbox"
                name="status"
                value="1"
                id="status"
                class="form-check-input"
                {{ old('status', $standardSection->status ?? true) ? 'checked' : '' }}
            >
            <label class="form-check-label fw-semibold" for="status">Active Status</label>
        </div>
    </div>
</div>