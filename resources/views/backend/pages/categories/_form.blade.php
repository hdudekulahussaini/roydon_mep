<div class="row g-4">

    {{-- Category Name --}}
    <div class="col-md-6">
        <label for="name" class="form-label fw-semibold">
            Category Name
        </label>
        <input type="text"
            id="name"
            name="name"
            value="{{ old('name', $category?->name) }}"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="e.g. Services"
            required>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Slug (Optional) --}}
    <div class="col-md-6">
        <label for="slug" class="form-label fw-semibold">
            Slug (Optional)
        </label>
        <input type="text"
            id="slug"
            name="slug"
            value="{{ old('slug', $category?->slug) }}"
            class="form-control @error('slug') is-invalid @enderror"
            placeholder="e.g. services (auto-generated if empty)">
        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Status --}}
    <div class="col-12">
        <div class="form-check form-switch">
            <input class="form-check-input"
                type="checkbox"
                role="switch"
                id="is_active"
                name="is_active"
                value="1"
                {{ old('is_active', $category?->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="is_active">
                Active Category
            </label>
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                slugInput.value = nameInput.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .replace(/^-+|-+$/g, '');
            });
        }


    });
</script>
@endpush
