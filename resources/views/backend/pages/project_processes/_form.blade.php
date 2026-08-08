<div class="row g-4">

    {{-- Icon --}}
    <div class="col-md-6">

        <label
            for="icon"
            class="form-label fw-semibold"
        >
            Icon Class
        </label>

        <div class="input-group">

            <span class="input-group-text bg-light">
                <i
                    id="icon-preview"
                    class="{{ old(
                        'icon',
                        $projectProcess?->icon ??
                        'fa-light fa-clipboard-list-check'
                    ) }}"
                ></i>
            </span>

            <input
                type="text"
                id="icon"
                name="icon"
                value="{{ old(
                    'icon',
                    $projectProcess?->icon ??
                    'fa-light fa-clipboard-list-check'
                ) }}"
                class="form-control @error('icon') is-invalid @enderror"
                placeholder="fa-light fa-clipboard-list-check"
                required
            >

        </div>

        @error('icon')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror

        <small class="text-muted">
            Enter a FontAwesome icon class.
        </small>

    </div>


    {{-- Sort Order --}}
    <div class="col-md-6">

        <label
            for="sort_order"
            class="form-label fw-semibold"
        >
            Sort Order
        </label>

        <input
            type="number"
            id="sort_order"
            name="sort_order"
            value="{{ old(
                'sort_order',
                $projectProcess?->sort_order ?? 0
            ) }}"
            class="form-control @error('sort_order') is-invalid @enderror"
            min="0"
            placeholder="e.g. 1"
        >

        @error('sort_order')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <small class="text-muted">
            Lower numbers will appear first.
        </small>

    </div>


    {{-- Title --}}
    <div class="col-12">

        <label
            for="title"
            class="form-label fw-semibold"
        >
            Title
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old(
                'title',
                $projectProcess?->title
            ) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Brief & Scope Definition"
            required
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Small Title --}}
    <div class="col-12">

        <label
            for="small_title"
            class="form-label fw-semibold"
        >
            Small Title
        </label>

        <input
            type="text"
            id="small_title"
            name="small_title"
            value="{{ old(
                'small_title',
                $projectProcess?->small_title
            ) }}"
            class="form-control @error('small_title') is-invalid @enderror"
            placeholder="e.g. Clinical Planning"
        >

        @error('small_title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Description --}}
    <div class="col-12">

        <label
            for="description"
            class="form-label fw-semibold"
        >
            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter the process description..."
            required
        >{{ old(
            'description',
            $projectProcess?->description
        ) }}</textarea>

        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Features --}}
    <div class="col-12">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <label class="form-label fw-semibold mb-1">
                    Features
                </label>

                <div class="text-muted small">
                    Add the key points displayed under this process.
                </div>

            </div>

            <button
                type="button"
                class="btn btn-sm btn-dark"
                id="add-feature"
            >

                <i class="fa-solid fa-plus me-1"></i>
                Add Feature

            </button>

        </div>


        <div id="features-wrapper">

            @php

                $features = old(
                    'features',
                    $projectProcess?->features ?? ['']
                );

            @endphp


            @foreach($features as $feature)

                <div class="feature-row mb-2">

                    <div class="input-group">

                        <span class="input-group-text bg-light">
                            <i class="fa-solid fa-check"></i>
                        </span>

                        <input
                            type="text"
                            name="features[]"
                            value="{{ $feature }}"
                            class="form-control"
                            placeholder="Enter feature"
                        >

                        <button
                            type="button"
                            class="btn btn-outline-danger remove-feature"
                            title="Delete Feature"
                        >

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>

                </div>

            @endforeach

        </div>

        @error('features')
            <div class="text-danger small mt-2">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
     * Icon Preview
     */
    const iconInput =
        document.getElementById('icon');

    const iconPreview =
        document.getElementById('icon-preview');


    if (iconInput && iconPreview) {

        iconInput.addEventListener('input', function () {

            iconPreview.className =
                this.value.trim() ||
                'fa-light fa-clipboard-list-check';

        });

    }


    /*
     * Feature Management
     */
    const featuresWrapper =
        document.getElementById('features-wrapper');

    const addFeatureButton =
        document.getElementById('add-feature');


    /*
     * Add Feature
     */
    addFeatureButton.addEventListener('click', function () {

        const row =
            document.createElement('div');

        row.className =
            'feature-row mb-2';

        row.innerHTML = `
            <div class="input-group">

                <span class="input-group-text bg-light">
                    <i class="fa-solid fa-check"></i>
                </span>

                <input
                    type="text"
                    name="features[]"
                    class="form-control"
                    placeholder="Enter feature"
                >

                <button
                    type="button"
                    class="btn btn-outline-danger remove-feature"
                    title="Delete Feature"
                >

                    <i class="fa-solid fa-trash"></i>

                </button>

            </div>
        `;

        featuresWrapper.appendChild(row);

    });


    /*
     * Delete Feature
     */
    featuresWrapper.addEventListener(
        'click',
        function (event) {

            const deleteButton =
                event.target.closest(
                    '.remove-feature'
                );


            if (!deleteButton) {
                return;
            }


            const rows =
                featuresWrapper.querySelectorAll(
                    '.feature-row'
                );


            /*
             * Keep one empty field
             */
            if (rows.length === 1) {

                const input =
                    rows[0].querySelector('input');

                input.value = '';

                return;
            }


            deleteButton
                .closest('.feature-row')
                .remove();

        }
    );

});
</script>

@endpush