<div class="row g-4">

    {{-- Category is derived automatically --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">Category</label>
        <input type="text" class="form-control bg-light @error('category_id') is-invalid @enderror"
            value="{{ $specialisationSubcategory?->category?->name ?? (\App\Models\Category::where('slug', 'specialisations')->first()?->name ?? 'Specialisation') }}"
            readonly>
        <input type="hidden" name="category_id" id="category_id"
            value="{{ old('category_id', $specialisationSubcategory?->category_id ?? (\App\Models\Category::where('slug', 'specialisations')->first()?->id ?? '')) }}">
        @error('category_id')
            <div class="invalid-feedback">You need to create a "Specialisations" category first before you can save.</div>
        @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1"
                {{ old('status', $specialisationSubcategory?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Active Specialisation</label>
        </div>
    </div>

    {{-- Basic Info --}}
    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
        <input type="text" id="title" name="title"
            value="{{ old('title', $specialisationSubcategory?->title ?? '') }}"
            class="form-control @error('title') is-invalid @enderror" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="slug" class="form-label fw-semibold">Slug (Optional)</label>
        <input type="text" id="slug" name="slug"
            value="{{ old('slug', $specialisationSubcategory?->slug ?? '') }}"
            class="form-control @error('slug') is-invalid @enderror">
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Main Description <span
                class="text-danger">*</span></label>
        <textarea id="description" name="description" rows="4"
            class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $specialisationSubcategory?->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Banner Section --}}
    <h5 class="mb-3 mt-5">Banner Section</h5>

    <div class="col-md-6">
        <label for="banner_image" class="form-label fw-semibold">Banner Image</label>
        <input type="file" id="banner_image" name="banner_image"
            class="form-control @error('banner_image') is-invalid @enderror" accept="image/*">
        @error('banner_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div id="banner-preview-container" class="mt-2" style="display: none;">
            <img id="banner-preview" src="#" alt="Banner Preview" class="img-thumbnail"
                style="max-height: 150px; object-fit: cover;">
        </div>

        @if (isset($specialisationSubcategory) && $specialisationSubcategory->banner_image)
            <div class="mt-2" id="existing-banner-container">
                <img src="{{ asset('storage/' . $specialisationSubcategory->banner_image) }}" alt="Current Banner"
                    class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                <div class="small text-muted mt-1" id="existing-banner-help">Uploading a new image will replace this
                    one.</div>
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Banner Tags (e.g. MODULAR OT)</label>

        <div class="input-group mb-2">
            <input type="text"
                id="banner_tag_input"
                class="form-control"
                placeholder="e.g., MODULAR OT, NABH"
                autocomplete="off">
            <button type="button" class="btn btn-success px-4 fw-semibold" id="add_banner_tag_btn">
                <i class="fa-solid fa-plus me-1"></i> Add
            </button>
        </div>

        <div id="banner_tag_chips" class="d-flex flex-wrap gap-2 mt-2">
            @php
                $bannerTags = old('banner_tags', isset($specialisationSubcategory) ? $specialisationSubcategory->banner_tags : []);
                if (!is_array($bannerTags)) {
                    $bannerTags = array_filter(array_map('trim', explode(',', (string) $bannerTags)));
                }
            @endphp

            @foreach ($bannerTags as $bTag)
                @if(!empty(trim($bTag)))
                    <span class="tag-chip badge rounded-pill bg-light text-dark border d-inline-flex align-items-center gap-2 px-3 py-2 fs-6 shadow-sm" data-value="{{ trim($bTag) }}">
                        <span class="fw-medium">{{ trim($bTag) }}</span>
                        <i class="fa-solid fa-xmark text-danger cursor-pointer ms-1 remove-banner-tag-btn" style="cursor: pointer; font-size: 0.9rem;" title="Remove"></i>
                        <input type="hidden" name="banner_tags[]" value="{{ trim($bTag) }}">
                    </span>
                @endif
            @endforeach
        </div>
        <small class="text-muted d-block mt-2">Type tag name (or comma-separated tags) and click + Add or press Enter.</small>
    </div>

    {{-- Content Section --}}
    <h5 class="mb-3 mt-5">Content Section</h5>

    <div class="col-12">
        <label for="image" class="form-label fw-semibold">Content Image</label>
        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
            accept="image/*">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <div id="image-preview-container" class="mt-2" style="display: none;">
            <img id="image-preview" src="#" alt="Image Preview" class="img-thumbnail"
                style="max-height: 150px; object-fit: cover;">
        </div>

        @if (isset($specialisationSubcategory) && $specialisationSubcategory->image)
            <div class="mt-2" id="existing-image-container">
                <img src="{{ asset('storage/' . $specialisationSubcategory->image) }}" alt="Current Image"
                    class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                <div class="small text-muted mt-1" id="existing-image-help">Uploading a new image will replace this
                    one.</div>
            </div>
        @endif
    </div>



    <hr class="my-4">

    {{-- Features Repeater --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Features / Attributes (e.g. HVAC, POWER, MGPS)</h5>
        <button type="button" class="btn btn-sm btn-outline-dark" id="add-feature-btn">
            <i class="fa-solid fa-plus me-1"></i> Add Feature
        </button>
    </div>

    <div id="features-container">
        @php
            $featuresHeading = old(
                'features_heading',
                isset($specialisationSubcategory) ? $specialisationSubcategory->features_heading : [],
            );
            $featuresDesc = old(
                'features_description',
                isset($specialisationSubcategory) ? $specialisationSubcategory->features_description : [],
            );

            if (empty($featuresHeading)) {
                $featuresHeading = [''];
            }
        @endphp

        @foreach ($featuresHeading as $index => $fHeading)
            <div class="feature-row card mb-3 bg-light border-0">
                <div class="card-body position-relative pb-4">
                    <button type="button"
                        class="btn btn-sm btn-danger remove-feature-btn position-absolute top-0 end-0 m-2"
                        title="Remove">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Heading <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="features_heading[]" value="{{ $fHeading }}"
                                class="form-control form-control-sm" placeholder="e.g. HVAC" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-semibold">Description <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="features_description[]"
                                value="{{ $featuresDesc[$index] ?? '' }}" class="form-control form-control-sm"
                                placeholder="Laminar airflow, +2.5 Pa..." required>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr class="my-4">

    {{-- Tags Section --}}
    <h5 class="mb-3">Bottom Tags / Specializations</h5>
    <div class="col-12">
        <div class="input-group mb-2">
            <input type="text"
                id="bottom_tag_input"
                class="form-control"
                placeholder="e.g., OT HVAC Systems, Medical Gas (MGPS)"
                autocomplete="off">
            <button type="button" class="btn btn-success px-4 fw-semibold" id="add_bottom_tag_btn">
                <i class="fa-solid fa-plus me-1"></i> Add
            </button>
        </div>

        <div id="bottom_tag_chips" class="d-flex flex-wrap gap-2 mt-2">
            @php
                $bottomTags = old('tags', isset($specialisationSubcategory) ? $specialisationSubcategory->tags : []);
                if (!is_array($bottomTags)) {
                    $bottomTags = array_filter(array_map('trim', explode(',', (string) $bottomTags)));
                }
            @endphp

            @foreach ($bottomTags as $tag)
                @if(!empty(trim($tag)))
                    <span class="tag-chip badge rounded-pill bg-light text-dark border d-inline-flex align-items-center gap-2 px-3 py-2 fs-6 shadow-sm" data-value="{{ trim($tag) }}">
                        <span class="fw-medium">{{ trim($tag) }}</span>
                        <i class="fa-solid fa-xmark text-danger cursor-pointer ms-1 remove-bottom-tag-btn" style="cursor: pointer; font-size: 0.9rem;" title="Remove"></i>
                        <input type="hidden" name="tags[]" value="{{ trim($tag) }}">
                    </span>
                @endif
            @endforeach
        </div>
        <small class="text-muted d-block mt-2">Type tag name (or comma-separated tags) and click + Add or press Enter.</small>
    </div>

</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Slug generation
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            if (titleInput && slugInput) {
                titleInput.addEventListener('input', function() {
                    slugInput.value = titleInput.value
                        .toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .replace(/^-+|-+$/g, '');
                });
            }

            // Image Preview - Banner
            const bannerInput = document.getElementById('banner_image');
            const bannerPreviewContainer = document.getElementById('banner-preview-container');
            const bannerPreview = document.getElementById('banner-preview');
            const existingBannerContainer = document.getElementById('existing-banner-container');
            const existingBannerHelp = document.getElementById('existing-banner-help');

            if (bannerInput && bannerPreviewContainer && bannerPreview) {
                bannerInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        if (existingBannerContainer) existingBannerContainer.style.display = 'none';
                        if (existingBannerHelp) existingBannerHelp.style.display = 'none';

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            bannerPreview.src = e.target.result;
                            bannerPreviewContainer.style.display = 'block';
                        }
                        reader.readAsDataURL(this.files[0]);
                    } else {
                        bannerPreviewContainer.style.display = 'none';
                        bannerPreview.src = '#';
                        if (existingBannerContainer) existingBannerContainer.style.display = 'block';
                        if (existingBannerHelp) existingBannerHelp.style.display = 'block';
                    }
                });
            }

            // Image Preview - Content Image
            const imageInput = document.getElementById('image');
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const imagePreview = document.getElementById('image-preview');
            const existingImageContainer = document.getElementById('existing-image-container');
            const existingImageHelp = document.getElementById('existing-image-help');

            if (imageInput && imagePreviewContainer && imagePreview) {
                imageInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        if (existingImageContainer) existingImageContainer.style.display = 'none';
                        if (existingImageHelp) existingImageHelp.style.display = 'none';

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreviewContainer.style.display = 'block';
                        }
                        reader.readAsDataURL(this.files[0]);
                    } else {
                        imagePreviewContainer.style.display = 'none';
                        imagePreview.src = '#';
                        if (existingImageContainer) existingImageContainer.style.display = 'block';
                        if (existingImageHelp) existingImageHelp.style.display = 'block';
                    }
                });
            }

            // Helper function for tag managers
            function initTagManager(inputId, addBtnId, chipsContainerId, inputName, removeBtnClass) {
                const input = document.getElementById(inputId);
                const addBtn = document.getElementById(addBtnId);
                const container = document.getElementById(chipsContainerId);
                if (!input || !container) return;

                const form = input.closest('form');

                function addSingleTag(value) {
                    const trimmed = value.trim();
                    if (!trimmed) return;

                    const exists = Array.from(container.querySelectorAll('.tag-chip'))
                        .some(chip => chip.dataset.value.toLowerCase() === trimmed.toLowerCase());

                    if (exists) return;

                    const chip = document.createElement('span');
                    chip.className = 'tag-chip badge rounded-pill bg-light text-dark border d-inline-flex align-items-center gap-2 px-3 py-2 fs-6 shadow-sm';
                    chip.dataset.value = trimmed;
                    chip.innerHTML = `
                        <span class="fw-medium">${trimmed}</span>
                        <i class="fa-solid fa-xmark text-danger cursor-pointer ms-1 ${removeBtnClass}" style="cursor: pointer; font-size: 0.9rem;" title="Remove"></i>
                        <input type="hidden" name="${inputName}" value="${trimmed}">
                    `;

                    container.appendChild(chip);
                }

                function processInput(val) {
                    if (!val || !val.trim()) return;
                    const parts = val.split(',');
                    parts.forEach(part => addSingleTag(part));
                    input.value = '';
                }

                addBtn?.addEventListener('click', function (e) {
                    e.preventDefault();
                    processInput(input.value);
                });

                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        processInput(input.value);
                    }
                });

                container.addEventListener('click', function (e) {
                    if (e.target.classList.contains(removeBtnClass) || e.target.closest('.' + removeBtnClass)) {
                        const chip = e.target.closest('.tag-chip');
                        chip?.remove();
                    }
                });

                form?.addEventListener('submit', function () {
                    if (input && input.value.trim()) {
                        processInput(input.value);
                    }
                });
            }

            initTagManager('banner_tag_input', 'add_banner_tag_btn', 'banner_tag_chips', 'banner_tags[]', 'remove-banner-tag-btn');
            initTagManager('bottom_tag_input', 'add_bottom_tag_btn', 'bottom_tag_chips', 'tags[]', 'remove-bottom-tag-btn');

            // Features Repeater
            const featuresContainer = document.getElementById('features-container');
            document.getElementById('add-feature-btn')?.addEventListener('click', function() {
                const firstRow = featuresContainer.querySelector('.feature-row');
                const newRow = firstRow.cloneNode(true);
                const inputs = newRow.querySelectorAll('input');
                inputs.forEach(input => input.value = '');
                featuresContainer.appendChild(newRow);
                attachFeatureRemoveEvents();
            });

            function attachFeatureRemoveEvents() {
                document.querySelectorAll('.remove-feature-btn').forEach(btn => {
                    btn.replaceWith(btn.cloneNode(true));
                });
                document.querySelectorAll('.remove-feature-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        if (featuresContainer.querySelectorAll('.feature-row').length > 1) {
                            this.closest('.feature-row').remove();
                        } else {
                            alert('You must have at least one feature row.');
                        }
                    });
                });
            }
            attachFeatureRemoveEvents();
        });
    </script>
@endpush
