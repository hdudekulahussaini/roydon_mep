  <div class="row g-4">

    {{-- Category is derived automatically --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">Category</label>
        <input type="text" class="form-control bg-light @error('category_id') is-invalid @enderror" value="{{ $serviceSubcategory?->category?->name ?? \App\Models\Category::where('slug', 'services')->first()?->name ?? '' }}" readonly>
        <input type="hidden" name="category_id" id="category_id" value="{{ old('category_id', $serviceSubcategory?->category_id ?? \App\Models\Category::where('slug', 'services')->first()?->id ?? '') }}">
        @error('category_id')
            <div class="invalid-feedback">You need to create a "Services" category first before you can save.</div>
        @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" {{ old('status', $serviceSubcategory?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Active Subcategory</label>
        </div>
    </div>

    {{-- Basic Info --}}
    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
        <input type="text" id="title" name="title" value="{{ old('title', $serviceSubcategory?->title) }}" class="form-control @error('title') is-invalid @enderror" required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="slug" class="form-label fw-semibold">Slug (Optional)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $serviceSubcategory?->slug) }}" class="form-control @error('slug') is-invalid @enderror">
        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="heading" class="form-label fw-semibold">Main Heading</label>
        <input type="text" id="heading" name="heading" value="{{ old('heading', $serviceSubcategory?->heading) }}" class="form-control @error('heading') is-invalid @enderror">
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Description</label>
        <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $serviceSubcategory?->description) }}</textarea>
    </div>

    {{-- Banner Image --}}
    <div class="col-12">
        <label for="banner_image" class="form-label fw-semibold">Banner Image</label>
        <input type="file" id="banner_image" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*">
        @error('banner_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        
        <div id="banner-preview-container" class="mt-2" style="display: none;">
            <img id="banner-preview" src="#" alt="Banner Preview" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
        </div>

        @if($serviceSubcategory?->banner_image)
            <div class="mt-2" id="existing-banner-container">
                <img src="{{ asset('storage/' . $serviceSubcategory->banner_image) }}" alt="Current Banner" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                <div class="small text-muted mt-1" id="existing-banner-help">Uploading a new image will replace this one.</div>
            </div>
        @endif
    </div>

<div class="col-12">
    {{-- Images Section --}}
    <div class="mb-4">
        <label class="form-label fw-semibold">Images</label>
        @if($serviceSubcategory?->images)
            <div class="mt-2 d-flex gap-2 flex-wrap">
                @foreach($serviceSubcategory->images as $img)
                    <img src="{{ asset('storage/' . $img) }}" alt="image" width="100" class="img-thumbnail">
                @endforeach
            </div>
            <small class="text-muted">Uploading new images will replace existing ones.</small>
        @endif
        <input type="file" name="images[]" id="images" class="form-control @error('images.*') is-invalid @enderror" multiple accept="image/*">
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
                <label for="cta_phone" class="form-label fw-semibold">CTA Phone Number</label>
                <input type="text" id="cta_phone" name="cta_phone" value="{{ old('cta_phone', $serviceSubcategory?->cta_phone) }}" class="form-control">
            </div>
        </div>
    </div>

    <hr class="my-4">

    {{-- Compliance Section --}}
    <div class="mb-4">
        <h5 class="mb-3">Compliance &amp; Certified Section</h5>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="compliance_title" class="form-label fw-semibold">Compliance Title</label>
                <input type="text" id="compliance_title" name="compliance_title" value="{{ old('compliance_title', $serviceSubcategory?->compliance_title) }}" class="form-control">
            </div>
            <div class="col-12">
                <label for="compliance_description" class="form-label fw-semibold">Compliance Description</label>
                <textarea id="compliance_description" name="compliance_description" rows="2" class="form-control">{{ old('compliance_description', $serviceSubcategory?->compliance_description) }}</textarea>
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
            if(count($offeringsTitle) === 0) {
                $offeringsTitle = [''];
            }
        @endphp

        @foreach($offeringsTitle as $index => $title)
            <div class="offering-row card mb-3 bg-light border-0">
                <div class="card-body position-relative pb-4">
                    <button type="button" class="btn btn-sm btn-danger remove-offering-btn position-absolute top-0 end-0 m-2" title="Remove">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label small fw-semibold">Offering Title</label>
                            <input type="text" name="offerings_title[]" value="{{ $title }}" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Icon (FontAwesome Class)</label>
                            <input type="text" name="offerings_icon[]" value="{{ $offeringsIcon[$index] ?? '' }}" class="form-control form-control-sm" placeholder="fa-solid fa-gear">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Sort Order</label>
                            <input type="number" name="offerings_sort_order[]" value="{{ $offeringsSort[$index] ?? ($index + 1) }}" class="form-control form-control-sm">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Description</label>
                            <textarea name="offerings_description[]" rows="2" class="form-control form-control-sm">{{ $offeringsDesc[$index] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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

        addBtn.addEventListener('click', function() {
            // Get the first offering row as a template
            const firstRow = container.querySelector('.offering-row');
            const newRow = firstRow.cloneNode(true);
            
            // Clear inputs
            const inputs = newRow.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                if(input.name === 'offerings_sort_order[]') {
                    input.value = container.querySelectorAll('.offering-row').length + 1;
                } else {
                    input.value = '';
                }
            });

            container.appendChild(newRow);
            attachRemoveEvents();
        });

        function attachRemoveEvents() {
            const removeBtns = document.querySelectorAll('.remove-offering-btn');
            removeBtns.forEach(btn => {
                // Remove old listeners to prevent duplicates
                btn.replaceWith(btn.cloneNode(true));
            });
            
            // Attach fresh listeners
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

        attachRemoveEvents();
    });
</script>
@endpush
