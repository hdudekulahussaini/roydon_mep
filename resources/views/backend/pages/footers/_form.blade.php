<div class="row g-4">
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Common Description</label>
        <textarea id="description" name="description" rows="4"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $footer?->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


<h5 class="mt-5 mb-3">Social Links</h5>


<div id="social-links-container">
    @php
        $links = old('social_links', $footer?->social_links ?? []);

        if (empty($links)) {
            $links = [['icon' => '', 'url' => '']];
        }
    @endphp


    @foreach($links as $index => $link)
        <div class="row g-3 mb-3 social-link-row align-items-end">

            {{-- Icon --}}
            <div class="col-md-5">

                <label class="form-label fw-semibold">
                    Icon (FontAwesome Class)
                </label>

                <div class="input-group">

                    <span class="input-group-text bg-light text-dark fs-5">
                        <i id="icon-preview-{{ $index }}"
                            class="fa-fw {{ $link['icon'] ?? 'fa-light fa-link' }}"></i>
                    </span>

                    <input type="text"
                        name="social_links[{{ $index }}][icon]"
                        id="icon-{{ $index }}"
                        value="{{ $link['icon'] ?? '' }}"
                        class="form-control @error('social_links.'.$index.'.icon') is-invalid @enderror"
                        placeholder="fa-brands fa-facebook"
                        required>

                </div>

                @error('social_links.'.$index.'.icon')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror

                <small class="d-block text-muted mt-1">
                    Enter a FontAwesome class
                    (e.g. <code>fa-brands fa-facebook</code>).
                </small>

            </div>


            {{-- URL --}}
            <div class="col-md-6">

                <label class="form-label fw-semibold">
                    URL
                </label>

                <input type="url"
                    name="social_links[{{ $index }}][url]"
                    value="{{ $link['url'] ?? '' }}"
                    class="form-control @error('social_links.'.$index.'.url') is-invalid @enderror"
                    placeholder="https://..."
                    required>

                @error('social_links.'.$index.'.url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Remove --}}
            <div class="col-md-1 text-end">

                <button type="button"
                    class="btn btn-outline-danger remove-social-link"
                    title="Remove Link">

                    <i class="fa-solid fa-trash"></i>

                </button>

            </div>

        </div>
    @endforeach
</div>


<div class="row mt-3">
    <div class="col-12">

        <button type="button"
            class="btn btn-outline-primary btn-sm"
            id="add-social-link">

            <i class="fa-solid fa-plus me-1"></i>
            Add Social Link

        </button>

    </div>
</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const container = document.getElementById('social-links-container');
        const addButton = document.getElementById('add-social-link');

        let indexCount = {{ count($links) }};


        // Live icon preview for existing fields
        container.querySelectorAll('.social-link-row').forEach(function (row) {

            const iconInput = row.querySelector('input[name*="[icon]"]');
            const iconPreview = row.querySelector('[id^="icon-preview-"]');

            if (iconInput && iconPreview) {

                iconInput.addEventListener('input', function () {

                    const iconClass = this.value.trim() || 'fa-solid fa-link';

                    // Ensure FontAwesome fixed width class
                    iconPreview.className = 'fa-fw ' + iconClass;

                });

            }

        });


        // Add new social link
        addButton.addEventListener('click', function () {

            const newRow = document.createElement('div');

            newRow.className = 'row g-3 mb-3 social-link-row align-items-end';

            newRow.innerHTML = `
                <div class="col-md-5">

                    <label class="form-label fw-semibold">
                        Icon (FontAwesome Class)
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-light text-dark fs-5">
                            <i id="icon-preview-${indexCount}" class="fa-solid fa-link"></i>
                        </span>

                        <input type="text"
                            name="social_links[${indexCount}][icon]"
                            id="icon-${indexCount}"
                            class="form-control"
                            placeholder="fa-brands fa-facebook"
                            required>

                    </div>

                    <small class="d-block text-muted mt-1">
                        Enter a FontAwesome class
                        (e.g. <code>fa-brands fa-facebook</code>).
                    </small>

                </div>


                <div class="col-md-6">

                    <label class="form-label fw-semibold">
                        URL
                    </label>

                    <input type="url"
                        name="social_links[${indexCount}][url]"
                        class="form-control"
                        placeholder="https://..."
                        required>

                </div>


                <div class="col-md-1 text-end">

                    <button type="button"
                        class="btn btn-outline-danger remove-social-link"
                        title="Remove Link">

                        <i class="fa-solid fa-trash"></i>

                    </button>

                </div>
            `;

            container.appendChild(newRow);


            // Live preview for newly added icon
            const iconInput = newRow.querySelector('input[name*="[icon]"]');
            const iconPreview = newRow.querySelector('[id^="icon-preview-"]');

            iconInput.addEventListener('input', function () {

                const iconClass = this.value.trim() || 'fa-solid fa-link';

                // Add fixed width class for alignment
                iconPreview.className = 'fa-fw ' + iconClass;

            });


            indexCount++;

        });


        // Remove social link
        container.addEventListener('click', function (e) {

            if (e.target.closest('.remove-social-link')) {

                const rows = container.querySelectorAll('.social-link-row');

                if (rows.length > 1) {

                    e.target.closest('.social-link-row').remove();

                } else {

                    alert('You must have at least one social link row, even if empty.');

                }

            }

        });

    });
</script>
@endpush