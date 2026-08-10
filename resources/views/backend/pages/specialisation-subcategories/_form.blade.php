<div class="row g-4">

    {{-- Category is derived automatically --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">Category</label>
        <input type="text" class="form-control bg-light @error('category_id') is-invalid @enderror" value="{{ $specialisationSubcategory?->category?->name ?? \App\Models\Category::where('slug', 'specialisations')->first()?->name ?? '' }}" readonly>
        <input type="hidden" name="category_id" id="category_id" value="{{ old('category_id', $specialisationSubcategory?->category_id ?? \App\Models\Category::where('slug', 'specialisations')->first()?->id ?? '') }}">
        @error('category_id')
            <div class="invalid-feedback">You need to create a "Specialisations" category first before you can save.</div>
        @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" {{ old('status', $specialisationSubcategory?->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Active Specialisation</label>
        </div>
    </div>

    {{-- Basic Info --}}
    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
        <input type="text" id="title" name="title" value="{{ old('title', $specialisationSubcategory?->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="slug" class="form-label fw-semibold">Slug (Optional)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $specialisationSubcategory?->slug ?? '') }}" class="form-control @error('slug') is-invalid @enderror">
        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Main Description <span class="text-danger">*</span></label>
        <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $specialisationSubcategory?->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Banner Section --}}
    <h5 class="mb-3 mt-5">Banner Section</h5>
    
    <div class="col-md-6">
        <label for="banner_image" class="form-label fw-semibold">Banner Image</label>
        <input type="file" id="banner_image" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror" accept="image/*">
        @error('banner_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        
        <div id="banner-preview-container" class="mt-2" style="display: none;">
            <img id="banner-preview" src="#" alt="Banner Preview" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
        </div>

        @if(isset($specialisationSubcategory) && $specialisationSubcategory->banner_image)
            <div class="mt-2" id="existing-banner-container">
                <img src="{{ Storage::url($specialisationSubcategory->banner_image) }}" alt="Current Banner" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                <div class="small text-muted mt-1" id="existing-banner-help">Uploading a new image will replace this one.</div>
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Banner Tags (e.g. MODULAR OT)</label>
        <div id="banner-tags-container">
            @php
                $bannerTags = old('banner_tags', isset($specialisationSubcategory) ? $specialisationSubcategory->banner_tags : []);
                if (empty($bannerTags)) $bannerTags = [''];
            @endphp
            @foreach($bannerTags as $index => $bTag)
            <div class="input-group mb-2 banner-tag-row">
                <input type="text" name="banner_tags[]" value="{{ $bTag }}" class="form-control" placeholder="Tag Name">
                <button class="btn btn-outline-danger remove-banner-tag-btn" type="button"><i class="fa-solid fa-times"></i></button>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary mt-1" id="add-banner-tag-btn"><i class="fa-solid fa-plus"></i> Add Banner Tag</button>
    </div>

    {{-- Content Section --}}
    <h5 class="mb-3 mt-5">Content Section</h5>

    <div class="col-12">
        <label for="image" class="form-label fw-semibold">Content Image</label>
        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        
        <div id="image-preview-container" class="mt-2" style="display: none;">
            <img id="image-preview" src="#" alt="Image Preview" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
        </div>

        @if(isset($specialisationSubcategory) && $specialisationSubcategory->image)
            <div class="mt-2" id="existing-image-container">
                <img src="{{ Storage::url($specialisationSubcategory->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                <div class="small text-muted mt-1" id="existing-image-help">Uploading a new image will replace this one.</div>
            </div>
        @endif
    </div>

    <div class="col-md-4">
        <label for="cta_title" class="form-label fw-semibold">CTA Title</label>
        <input type="text" id="cta_title" name="cta_title" value="{{ old('cta_title', $specialisationSubcategory?->cta_title ?? '') }}" class="form-control">
    </div>

    <div class="col-md-8">
        <label for="cta_description" class="form-label fw-semibold">CTA Description</label>
        <input type="text" id="cta_description" name="cta_description" value="{{ old('cta_description', $specialisationSubcategory?->cta_description ?? '') }}" class="form-control">
    </div>

    <div class="col-12">
        <label for="cta_button_url" class="form-label fw-semibold">CTA Button URL</label>
        <input type="text" id="cta_button_url" name="cta_button_url" value="{{ old('cta_button_url', $specialisationSubcategory?->cta_button_url ?? '') }}" class="form-control" placeholder="e.g. /contact-us">
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
            $featuresHeading = old('features_heading', isset($specialisationSubcategory) ? $specialisationSubcategory->features_heading : []);
            $featuresDesc = old('features_description', isset($specialisationSubcategory) ? $specialisationSubcategory->features_description : []);
            
            if(empty($featuresHeading)) {
                $featuresHeading = [''];
            }
        @endphp

        @foreach($featuresHeading as $index => $fHeading)
            <div class="feature-row card mb-3 bg-light border-0">
                <div class="card-body position-relative pb-4">
                    <button type="button" class="btn btn-sm btn-danger remove-feature-btn position-absolute top-0 end-0 m-2" title="Remove">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Heading</label>
                            <input type="text" name="features_heading[]" value="{{ $fHeading }}" class="form-control form-control-sm" placeholder="e.g. HVAC">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-semibold">Description</label>
                            <input type="text" name="features_description[]" value="{{ $featuresDesc[$index] ?? '' }}" class="form-control form-control-sm" placeholder="Laminar airflow, +2.5 Pa...">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr class="my-4">

    {{-- Tags Section --}}
    <h5 class="mb-3">Bottom Tags</h5>
    <div class="col-12">
        <div id="tags-container">
            @php
                $bottomTags = old('tags', isset($specialisationSubcategory) ? $specialisationSubcategory->tags : []);
                if (empty($bottomTags)) $bottomTags = [''];
            @endphp
            @foreach($bottomTags as $index => $tag)
            <div class="input-group mb-2 tag-row">
                <input type="text" name="tags[]" value="{{ $tag }}" class="form-control" placeholder="e.g. Laminar Airflow">
                <button class="btn btn-outline-danger remove-tag-btn" type="button"><i class="fa-solid fa-times"></i></button>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary mt-1" id="add-tag-btn"><i class="fa-solid fa-plus"></i> Add Tag</button>
    </div>

    <hr class="my-4">

    {{-- SEO Section --}}
    <h5 class="mb-3">SEO Text</h5>
    <div class="col-12">
        <label for="seo_text" class="form-label fw-semibold">Footer SEO Text</label>
        <textarea id="seo_text" name="seo_text" rows="2" class="form-control" placeholder="SEO: OT MEP contractor...">{{ old('seo_text', $specialisationSubcategory?->seo_text ?? '') }}</textarea>
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

        // Banner Tags Repeater
        const bannerTagsContainer = document.getElementById('banner-tags-container');
        document.getElementById('add-banner-tag-btn').addEventListener('click', function() {
            const row = bannerTagsContainer.querySelector('.banner-tag-row').cloneNode(true);
            row.querySelector('input').value = '';
            bannerTagsContainer.appendChild(row);
            attachBannerTagRemoveEvents();
        });

        function attachBannerTagRemoveEvents() {
            document.querySelectorAll('.remove-banner-tag-btn').forEach(btn => {
                btn.replaceWith(btn.cloneNode(true));
            });
            document.querySelectorAll('.remove-banner-tag-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (bannerTagsContainer.querySelectorAll('.banner-tag-row').length > 1) {
                        this.closest('.banner-tag-row').remove();
                    } else {
                        this.closest('.banner-tag-row').querySelector('input').value = '';
                    }
                });
            });
        }
        attachBannerTagRemoveEvents();

        // Features Repeater
        const featuresContainer = document.getElementById('features-container');
        document.getElementById('add-feature-btn').addEventListener('click', function() {
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

        // Bottom Tags Repeater
        const tagsContainer = document.getElementById('tags-container');
        document.getElementById('add-tag-btn').addEventListener('click', function() {
            const row = tagsContainer.querySelector('.tag-row').cloneNode(true);
            row.querySelector('input').value = '';
            tagsContainer.appendChild(row);
            attachTagRemoveEvents();
        });

        function attachTagRemoveEvents() {
            document.querySelectorAll('.remove-tag-btn').forEach(btn => {
                btn.replaceWith(btn.cloneNode(true));
            });
            document.querySelectorAll('.remove-tag-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (tagsContainer.querySelectorAll('.tag-row').length > 1) {
                        this.closest('.tag-row').remove();
                    } else {
                        this.closest('.tag-row').querySelector('input').value = '';
                    }
                });
            });
        }
        attachTagRemoveEvents();
    });
</script>
@endpush
