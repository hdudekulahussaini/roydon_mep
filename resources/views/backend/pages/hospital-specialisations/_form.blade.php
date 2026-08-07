<div class="row g-4">

    {{-- Title --}}
    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">
            Specialisation Title
        </label>
        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $hospitalSpecialisation?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Operation Theatre"
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
                <i id="icon-preview" class="{{ old('icon', $hospitalSpecialisation?->icon ?? 'fa-light fa-shield-check') }}"></i>
            </span>
            <input type="text"
                id="icon"
                name="icon"
                value="{{ old('icon', $hospitalSpecialisation?->icon ?? 'fa-light fa-shield-check') }}"
                class="form-control @error('icon') is-invalid @enderror"
                placeholder="fa-light fa-shield-check"
                required>
        </div>
        @error('icon')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror
        <small class="d-block text-muted mt-1">
            Enter a FontAwesome class (e.g. <code>fa-light fa-microscope</code>, <code>fa-light fa-hospital-user</code>).
        </small>
    </div>

    {{-- Description --}}
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">
            Description
        </label>
        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Describe this specialisation details..."
            required>{{ old('description', $hospitalSpecialisation?->description) }}</textarea>
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
