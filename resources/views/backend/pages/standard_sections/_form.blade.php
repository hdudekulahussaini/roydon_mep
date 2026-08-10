@csrf

<div class="form-group">
    <label for="title">
        Section Title
        <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="title"
        id="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $standardSection->title ?? '') }}"
        placeholder="Example: Fire & Life Safety"
        required
    >

    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="form-row">

    <div class="form-group">
        <label for="sort_order">
            Sort Order
        </label>

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


    <div class="form-group">

        <label>
            Status
        </label>

        <div class="form-check mt-2">

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
                {{ old(
                    'status',
                    $standardSection->status ?? true
                ) ? 'checked' : '' }}
            >

            <label
                class="form-check-label"
                for="status"
            >
                Active
            </label>

        </div>

    </div>

</div>


<div class="form-actions">

    <a
        href="{{ route('admin.standard-sections.index') }}"
        class="btn btn-secondary"
    >
        Cancel
    </a>

    <button
        type="submit"
        class="btn btn-primary"
    >
        {{ isset($standardSection) ? 'Update Section' : 'Create Section' }}
    </button>

</div>