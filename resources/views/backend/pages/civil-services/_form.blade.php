<div class="row g-4">

    {{-- Title --}}
    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">
            Service Title
        </label>
        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $civilService?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Structural & RCC Works"
            required>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Icon --}}
    <div class="col-md-6">
        <label for="icon" class="form-label fw-semibold">
            Icon (FontAwesome Class)
        </label>
        <div class="input-group">
            <span class="input-group-text bg-light text-dark fs-5">
                <i id="icon-preview" class="{{ old('icon', $civilService?->icon ?? 'fa-light fa-helmet-safety') }}"></i>
            </span>
            <input type="text"
                id="icon"
                name="icon"
                value="{{ old('icon', $civilService?->icon ?? 'fa-light fa-helmet-safety') }}"
                class="form-control @error('icon') is-invalid @enderror"
                placeholder="fa-light fa-helmet-safety"
                required>
        </div>
        @error('icon')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror
        <small class="d-block text-muted mt-1">
            Enter a FontAwesome class (e.g. <code>fa-light fa-hospital</code>, <code>fa-light fa-palette</code>).
        </small>
    </div>

    {{-- Description --}}
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">
            Service Description
        </label>
        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Describe the civil service work details..."
            required>{{ old('description', $civilService?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const iconInput = document.getElementById('icon');
        const iconPreview = document.getElementById('icon-preview');

        if (iconInput && iconPreview) {
            iconInput.addEventListener('input', function () {
                const iconClass = this.value.trim() || 'fa-solid fa-star';
                iconPreview.className = iconClass;
            });
        }
    });
</script>
@endpush
