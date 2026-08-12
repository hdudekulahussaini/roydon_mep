<div class="row g-4">

    {{-- Category is derived automatically --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">Category</label>
        <input type="text" class="form-control bg-light @error('category_id') is-invalid @enderror"
            value="{{ $serviceSubcategory?->category?->name ?? (\App\Models\Category::where('slug', 'services')->first()?->name ?? '') }}"
            readonly>
        <input type="hidden" name="category_id" id="category_id"
            value="{{ old('category_id', $serviceSubcategory?->category_id ?? (\App\Models\Category::where('slug', 'services')->first()?->id ?? '')) }}">
        @error('category_id')
            <div class="invalid-feedback">You need to create a "Services" category first before you can save.</div>
        @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                value="1" {{ old('status', $serviceSubcategory?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Active Subcategory</label>
        </div>
    </div>

    {{-- Basic Info --}}
    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
        <input type="text" id="title" name="title" value="{{ old('title', $serviceSubcategory?->title) }}"
            class="form-control @error('title') is-invalid @enderror" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="slug" class="form-label fw-semibold">Slug (Optional)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $serviceSubcategory?->slug) }}"
            class="form-control @error('slug') is-invalid @enderror">
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="heading" class="form-label fw-semibold">Main Heading <span class="text-danger">*</span></label>
        <input type="text" id="heading" name="heading"
            value="{{ old('heading', $serviceSubcategory?->heading) }}"
            class="form-control @error('heading') is-invalid @enderror" required>
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
        <textarea id="description" name="description" rows="4"
            class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $serviceSubcategory?->description) }}</textarea>
    </div>

    {{-- Banner Image --}}
    <div class="col-12">
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

        @if ($serviceSubcategory?->banner_image)
            <div class="mt-2" id="existing-banner-container">
                <img src="{{ asset('storage/' . $serviceSubcategory->banner_image) }}" alt="Current Banner"
                    class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                <div class="small text-muted mt-1" id="existing-banner-help">Uploading a new image will replace this
                    one.</div>
            </div>
        @endif
    </div>

    <div class="col-12">
        {{-- Images Section --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">Images</label>
            @if ($serviceSubcategory?->images)
                <div class="mt-2 d-flex gap-2 flex-wrap">
                    @foreach ($serviceSubcategory->images as $img)
                        <img src="{{ asset('storage/' . $img) }}" alt="image" width="100"
                            class="img-thumbnail">
                    @endforeach
                </div>
                <small class="text-muted">Uploading new images will replace existing ones.</small>
            @endif
            <input type="file" name="images[]" id="images"
                class="form-control @error('images.*') is-invalid @enderror" multiple accept="image/*">
            @error('images.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <hr class="my-4">

        {{-- CTA Section --}}
        <div class="mb-4">
            <h5 class="mb-3">Sidebar CTA Settings</h5>
            <div class="row">
                <div class="col-md-6">
                    <label for="cta_phone" class="form-label fw-semibold">CTA Phone Number <span
                            class="text-danger">*</span></label>
                    <input type="text" id="cta_phone" name="cta_phone"
                        value="{{ old('cta_phone', $serviceSubcategory?->cta_phone) }}" class="form-control"
                        required>
                </div>
            </div>
        </div>

        <hr class="my-4">

        {{-- Compliance Section --}}
        <div class="mb-4">
            <h5 class="mb-3">Compliance &amp; Certified Section</h5>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="compliance_title" class="form-label fw-semibold">Compliance Title <span
                            class="text-danger">*</span></label>
                    <input type="text" id="compliance_title" name="compliance_title"
                        value="{{ old('compliance_title', $serviceSubcategory?->compliance_title) }}"
                        class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="compliance_description" class="form-label fw-semibold">Compliance Description <span
                            class="text-danger">*</span></label>
                    <textarea id="compliance_description" name="compliance_description" rows="2" class="form-control" required>{{ old('compliance_description', $serviceSubcategory?->compliance_description) }}</textarea>
                </div>
            </div>
        </div>

        <hr class="my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Key Offerings</h5>
            <button type="button" class="btn btn-sm btn-outline-dark" id="add-offering-btn">
                <i class="fa-solid fa-plus me-1"></i> Add Offering
            </button>
        </div>

        <div id="offerings-container">
            @php
                $offeringsTitle = old('offerings_title', $serviceSubcategory?->offerings_title ?? []);
                $offeringsDesc = old('offerings_description', $serviceSubcategory?->offerings_description ?? []);
                $offeringsIcon = old('offerings_icon', $serviceSubcategory?->offerings_icon ?? []);
                $offeringsSort = old('offerings_sort_order', $serviceSubcategory?->offerings_sort_order ?? []);

                // If empty, start with 1 blank row
                if (count($offeringsTitle) === 0) {
                    $offeringsTitle = [''];
                }
            @endphp

            @foreach ($offeringsTitle as $index => $title)
                <div class="offering-row card mb-3 border border-light-subtle shadow-sm rounded-3">
                    <div class="card-body position-relative p-3">
                        <button type="button"
                            class="btn btn-sm btn-outline-danger remove-offering-btn position-absolute top-0 end-0 m-2"
                            title="Remove Offering">
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                        <div class="row g-3">
                            <div class="col-md-7">
                                <label class="form-label small fw-semibold">Offering Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="offerings_title[]" value="{{ $title }}"
                                    class="form-control form-control-sm" placeholder="e.g. System Installation & Maintenance" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label small fw-semibold">Sort Order <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="offerings_sort_order[]"
                                    value="{{ $offeringsSort[$index] ?? $index + 1 }}"
                                    class="form-control form-control-sm" required>
                            </div>

                            {{-- Upgraded Offering Icon Selection Structure Format --}}
                            <div class="col-12">
                                <div class="p-3 bg-light rounded-3 border border-light-subtle">
                                    <div class="row g-3 align-items-center">

                                        {{-- Live Dark Icon Preview Box --}}
                                        <div class="col-auto">
                                            <div class="d-flex flex-column align-items-center justify-content-center bg-dark text-white rounded-3 p-2 text-center"
                                                style="width: 75px; height: 75px; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.12);">
                                                <i id="offering-icon-preview-{{ $index }}"
                                                    class="offering-icon-preview {{ $offeringsIcon[$index] ?? 'fa-solid fa-gear' }} fs-3 text-warning"></i>
                                                <span class="badge bg-secondary text-white mt-1" style="font-size: 8px; max-width: 68px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" id="offering-icon-tag-{{ $index }}">
                                                    {{ $offeringsIcon[$index] ?? 'fa-solid fa-gear' }}
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Input & Style Selector --}}
                                        <div class="col">
                                            <label class="form-label small fw-semibold mb-1">
                                                Offering Icon Class <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group input-group-sm mb-2">
                                                <span class="input-group-text bg-white text-secondary"><i class="fa-solid fa-code"></i></span>
                                                <input type="text" name="offerings_icon[]"
                                                    data-preview="offering-icon-preview-{{ $index }}"
                                                    data-tag="offering-icon-tag-{{ $index }}"
                                                    value="{{ $offeringsIcon[$index] ?? 'fa-solid fa-gear' }}" class="form-control form-control-sm offering-icon-input"
                                                    placeholder="e.g. fa-solid fa-gear" required>
                                                <button type="button" class="btn btn-outline-secondary clear-offering-icon-btn" title="Clear Icon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </div>

                                            <div class="d-flex align-items-center gap-1 flex-wrap">
                                                <span class="small text-muted me-1 fw-medium" style="font-size: 11px;">Style Family:</span>
                                                <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 offering-style-btn" data-prefix="fa-solid" style="font-size: 11px;">fa-solid</button>
                                                <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 offering-style-btn" data-prefix="fa-light" style="font-size: 11px;">fa-light</button>
                                                <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 offering-style-btn" data-prefix="fa-regular" style="font-size: 11px;">fa-regular</button>
                                                <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 offering-style-btn" data-prefix="fa-duotone" style="font-size: 11px;">fa-duotone</button>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Preset Offering Icons Grid --}}
                                    <div class="mt-2 pt-2 border-top">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span class="small fw-semibold text-secondary" style="font-size: 11px;">
                                                <i class="fa-solid fa-grip me-1"></i> Quick Pick Offering Icon:
                                            </span>
                                            <small class="text-muted" style="font-size: 10px;">Click icon to select</small>
                                        </div>
                                        <div class="d-flex flex-wrap gap-1 offering-preset-grid">
                                            @php
                                                $offeringPresets = [
                                                    ['icon' => 'fa-light fa-house-crack', 'label' => 'Structural Repair'],
                                                    ['icon' => 'fa-light fa-mound', 'label' => 'Earth Mound'],
                                                    ['icon' => 'fa-light fa-paint-roller', 'label' => 'Paint Roller'],
                                                    ['icon' => 'fa-light fa-trowel-bricks', 'label' => 'Masonry Bricks'],
                                                    ['icon' => 'fa-light fa-plug', 'label' => 'Plug / Electrical'],
                                                    ['icon' => 'fa-solid fa-gear', 'label' => 'Gear'],
                                                    ['icon' => 'fa-solid fa-wrench', 'label' => 'Wrench'],
                                                    ['icon' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Tools'],
                                                    ['icon' => 'fa-solid fa-bolt', 'label' => 'Electrical'],
                                                    ['icon' => 'fa-solid fa-droplet', 'label' => 'Plumbing'],
                                                    ['icon' => 'fa-solid fa-building', 'label' => 'Building'],
                                                    ['icon' => 'fa-solid fa-shield-halved', 'label' => 'Safety'],
                                                    ['icon' => 'fa-solid fa-clipboard-check', 'label' => 'Audit'],
                                                    ['icon' => 'fa-solid fa-fan', 'label' => 'HVAC'],
                                                    ['icon' => 'fa-solid fa-layer-group', 'label' => 'Layers'],
                                                    ['icon' => 'fa-solid fa-chart-line', 'label' => 'Performance'],
                                                    ['icon' => 'fa-solid fa-circle-check', 'label' => 'Verified'],
                                                ];
                                            @endphp
                                            @foreach($offeringPresets as $preset)
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary offering-preset-btn d-inline-flex align-items-center gap-1 py-0 px-2"
                                                    data-icon="{{ $preset['icon'] }}"
                                                    title="{{ $preset['label'] }}" style="font-size: 11px;">
                                                    <i class="{{ $preset['icon'] }} text-primary"></i>
                                                    <span>{{ $preset['label'] }}</span>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="offerings_description[]" rows="2" class="form-control form-control-sm" placeholder="Provide offering details..." required>{{ $offeringsDesc[$index] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

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

            // Image Preview
            const imagesInput = document.getElementById('images');
            const previewContainer = document.getElementById('image-preview-container');
            const existingImagesContainer = document.getElementById('existing-images-container');
            const existingImagesHelp = document.getElementById('existing-images-help');

            if (imagesInput && previewContainer) {
                imagesInput.addEventListener('change', function() {
                    previewContainer.innerHTML = '';

                    if (this.files && this.files.length > 0) {
                        if (existingImagesContainer) existingImagesContainer.style.display = 'none';
                        if (existingImagesHelp) existingImagesHelp.style.display = 'none';

                        Array.from(this.files).forEach(file => {
                            if (file.type.match('image.*')) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const img = document.createElement('img');
                                    img.src = e.target.result;
                                    img.className = 'img-thumbnail';
                                    img.style.width = '100px';
                                    img.style.height = '100px';
                                    img.style.objectFit = 'cover';
                                    previewContainer.appendChild(img);
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                    } else {
                        if (existingImagesContainer) existingImagesContainer.style.display = 'flex';
                        if (existingImagesHelp) existingImagesHelp.style.display = 'block';
                    }
                });
            }

            // Banner Image Preview
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

            // Offerings Repeater
            const container = document.getElementById('offerings-container');
            const addBtn = document.getElementById('add-offering-btn');

            function updateOfferingRowIcon(row, val) {
                const input = row.querySelector('.offering-icon-input');
                const preview = row.querySelector('.offering-icon-preview');
                const tag = row.querySelector('.badge');
                const iconClass = (val || 'fa-solid fa-gear').trim();
                if (preview) preview.className = 'offering-icon-preview ' + iconClass + ' fs-3 text-warning';
                if (tag) tag.textContent = iconClass;

                row.querySelectorAll('.offering-preset-btn').forEach(btn => {
                    if (btn.dataset.icon.trim() === iconClass) {
                        btn.classList.remove('btn-outline-secondary');
                        btn.classList.add('btn-primary', 'text-white');
                        const icon = btn.querySelector('i');
                        if (icon) {
                            icon.classList.remove('text-primary');
                            icon.classList.add('text-white');
                        }
                    } else {
                        btn.classList.remove('btn-primary', 'text-white');
                        btn.classList.add('btn-outline-secondary');
                        const icon = btn.querySelector('i');
                        if (icon) {
                            icon.classList.remove('text-white');
                            icon.classList.add('text-primary');
                        }
                    }
                });
            }

            function attachOfferingIconEvents(row) {
                const input = row.querySelector('.offering-icon-input');
                const clearBtn = row.querySelector('.clear-offering-icon-btn');
                const presetBtns = row.querySelectorAll('.offering-preset-btn');
                const styleBtns = row.querySelectorAll('.offering-style-btn');

                if (input) {
                    input.addEventListener('input', function() {
                        updateOfferingRowIcon(row, this.value);
                    });
                    updateOfferingRowIcon(row, input.value);
                }

                if (clearBtn && input) {
                    clearBtn.addEventListener('click', function() {
                        input.value = '';
                        updateOfferingRowIcon(row, '');
                        input.focus();
                    });
                }

                presetBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const iconVal = this.dataset.icon;
                        if (input) {
                            input.value = iconVal;
                            updateOfferingRowIcon(row, iconVal);
                        }
                    });
                });

                styleBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        if (!input) return;
                        const newPrefix = this.dataset.prefix;
                        let currentVal = input.value.trim();
                        const parts = currentVal.split(' ');
                        let iconName = parts.length > 1 ? parts.slice(1).join(' ') : parts[0];
                        if (parts[0].startsWith('fa-')) {
                            iconName = parts.slice(1).join(' ');
                        }
                        const updated = `${newPrefix} ${iconName}`.trim();
                        input.value = updated;
                        updateOfferingRowIcon(row, updated);
                    });
                });
            }

            if (addBtn && container) {
                addBtn.addEventListener('click', function() {
                    const firstRow = container.querySelector('.offering-row');
                    const newRow = firstRow.cloneNode(true);

                    // Clear inputs
                    const inputs = newRow.querySelectorAll('input, textarea');
                    inputs.forEach(input => {
                        if (input.name === 'offerings_sort_order[]') {
                            input.value = container.querySelectorAll('.offering-row').length + 1;
                        } else if (input.name === 'offerings_icon[]') {
                            input.value = 'fa-solid fa-gear';
                        } else {
                            input.value = '';
                        }
                    });

                    // Reset preset grid highlight styles in cloned row
                    newRow.querySelectorAll('.offering-preset-btn').forEach(btn => {
                        btn.classList.remove('btn-primary', 'text-white');
                        btn.classList.add('btn-outline-secondary');
                        const icon = btn.querySelector('i');
                        if (icon) {
                            icon.classList.remove('text-white');
                            icon.classList.add('text-primary');
                        }
                    });

                    // Assign new unique preview and tag IDs
                    const newIndex = 'new-' + Date.now();
                    const newIconPreview = newRow.querySelector('.offering-icon-preview');
                    const newIconTag = newRow.querySelector('.badge');
                    const newIconInput = newRow.querySelector('.offering-icon-input');

                    if (newIconPreview) newIconPreview.id = 'offering-icon-preview-' + newIndex;
                    if (newIconTag) newIconTag.id = 'offering-icon-tag-' + newIndex;
                    if (newIconInput) {
                        newIconInput.dataset.preview = 'offering-icon-preview-' + newIndex;
                        newIconInput.dataset.tag = 'offering-icon-tag-' + newIndex;
                    }

                    container.appendChild(newRow);
                    attachOfferingIconEvents(newRow);
                    attachRemoveEvents();

                    setTimeout(() => {
                        newRow.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }, 50);
                });
            }

            function attachRemoveEvents() {
                const removeBtns = document.querySelectorAll('.remove-offering-btn');
                removeBtns.forEach(btn => {
                    btn.replaceWith(btn.cloneNode(true));
                });

                document.querySelectorAll('.remove-offering-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        if (container.querySelectorAll('.offering-row').length > 1) {
                            this.closest('.offering-row').remove();
                        } else {
                            alert('You must have at least one offering row. You can leave it empty if not needed.');
                        }
                    });
                });
            }

            document.querySelectorAll('.offering-row').forEach(function(row) {
                attachOfferingIconEvents(row);
            });

            attachRemoveEvents();
        });
    </script>
@endpush
