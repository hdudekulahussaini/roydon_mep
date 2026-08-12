<div class="row g-4 mb-4">
    <div class="col-12">
        <label for="description" class="form-label-custom">
            <i class="fa-solid fa-align-left text-primary me-1"></i> Footer Description Text *
        </label>
        <textarea id="description" name="description" rows="4"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter company summary text displayed in the website footer..." required>{{ old('description', $footer?->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <small class="text-muted mt-1 d-block">This summary appears directly under the company logo in the website footer.</small>
    </div>
</div>

<div class="border-top pt-4 mt-2">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div>
            <h5 class="fw-bold text-dark mb-1">
                <i class="fa-solid fa-share-nodes text-primary me-2"></i> Social Media Links
            </h5>
            <p class="text-muted small mb-0">Add icons and profile URLs to display in the website footer.</p>
        </div>

        {{-- Quick Preset Helper Buttons --}}
        <div class="d-flex flex-wrap gap-1 align-items-center">
            <span class="small text-muted me-1 fw-semibold">Quick Presets:</span>
            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-icon="fa-brands fa-facebook-f" data-url="https://facebook.com/">
                <i class="fa-brands fa-facebook-f me-1 text-primary"></i> Facebook
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-icon="fa-brands fa-linkedin-in" data-url="https://linkedin.com/">
                <i class="fa-brands fa-linkedin-in me-1 text-info"></i> LinkedIn
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-icon="fa-brands fa-instagram" data-url="https://instagram.com/">
                <i class="fa-brands fa-instagram me-1 text-danger"></i> Instagram
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-icon="fa-brands fa-x-twitter" data-url="https://x.com/">
                <i class="fa-brands fa-x-twitter me-1 text-dark"></i> X
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary btn-preset" data-icon="fa-brands fa-youtube" data-url="https://youtube.com/">
                <i class="fa-brands fa-youtube me-1 text-danger"></i> YouTube
            </button>
        </div>
    </div>

    <div id="social-links-container" class="mt-3">
        @php
            $links = old('social_links', $footer?->social_links ?? []);
            if (empty($links)) {
                $links = [
                    ['icon' => 'fa-brands fa-facebook-f', 'url' => 'https://facebook.com/'],
                    ['icon' => 'fa-brands fa-linkedin-in', 'url' => 'https://linkedin.com/']
                ];
            }
        @endphp

        @foreach($links as $index => $link)
            <div class="card mb-3 social-link-row border shadow-sm">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center">

                        {{-- Icon Input & Live Preview --}}
                        <div class="col-md-5">
                            <label class="form-label-custom mb-2">FontAwesome Icon Class *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-primary fs-5 border-end-0" style="min-width: 46px; justify-content: center;">
                                    <i id="icon-preview-{{ $index }}" class="fa-fw {{ $link['icon'] ?? 'fa-solid fa-link' }}"></i>
                                </span>
                                <input type="text"
                                    name="social_links[{{ $index }}][icon]"
                                    id="icon-{{ $index }}"
                                    value="{{ $link['icon'] ?? '' }}"
                                    class="form-control icon-class-input @error('social_links.'.$index.'.icon') is-invalid @enderror"
                                    placeholder="e.g. fa-brands fa-facebook-f"
                                    required>
                            </div>
                            @error('social_links.'.$index.'.icon')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- URL Input --}}
                        <div class="col-md-6">
                            <label class="form-label-custom mb-2">Social Profile URL *</label>
                            <input type="url"
                                name="social_links[{{ $index }}][url]"
                                value="{{ $link['url'] ?? '' }}"
                                class="form-control @error('social_links.'.$index.'.url') is-invalid @enderror"
                                placeholder="https://facebook.com/yourpage"
                                required>
                            @error('social_links.'.$index.'.url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Remove Row Button --}}
                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-outline-danger remove-social-link btn-sm mt-md-4" title="Remove Link">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        <button type="button" class="btn btn-outline-primary fw-bold" id="add-social-link">
            <i class="fa-solid fa-plus me-1"></i> Add Another Social Link
        </button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('social-links-container');
        const addButton = document.getElementById('add-social-link');
        let indexCount = {{ count($links) }};

        // Live icon preview handler
        function setupIconPreview(row) {
            const iconInput = row.querySelector('.icon-class-input');
            const iconPreview = row.querySelector('[id^="icon-preview-"]');
            if (iconInput && iconPreview) {
                iconInput.addEventListener('input', function () {
                    const iconClass = this.value.trim() || 'fa-solid fa-link';
                    iconPreview.className = 'fa-fw ' + iconClass;
                });
            }
        }

        // Setup existing rows
        container.querySelectorAll('.social-link-row').forEach(setupIconPreview);

        // Add new link row
        addButton.addEventListener('click', function () {
            const newRow = document.createElement('div');
            newRow.className = 'card mb-3 social-link-row border shadow-sm';
            newRow.innerHTML = `
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-5">
                            <label class="form-label-custom mb-2">FontAwesome Icon Class *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-primary fs-5 border-end-0" style="min-width: 46px; justify-content: center;">
                                    <i id="icon-preview-${indexCount}" class="fa-solid fa-link"></i>
                                </span>
                                <input type="text"
                                    name="social_links[${indexCount}][icon]"
                                    id="icon-${indexCount}"
                                    class="form-control icon-class-input"
                                    placeholder="e.g. fa-brands fa-instagram"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom mb-2">Social Profile URL *</label>
                            <input type="url"
                                name="social_links[${indexCount}][url]"
                                class="form-control"
                                placeholder="https://..."
                                required>
                        </div>

                        <div class="col-md-1 text-end">
                            <button type="button" class="btn btn-outline-danger remove-social-link btn-sm mt-md-4" title="Remove Link">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(newRow);
            setupIconPreview(newRow);
            indexCount++;
        });

        // Preset button click listener
        document.querySelectorAll('.btn-preset').forEach(function(presetBtn) {
            presetBtn.addEventListener('click', function() {
                const icon = this.dataset.icon;
                const url = this.dataset.url;

                // Add row pre-filled
                const newRow = document.createElement('div');
                newRow.className = 'card mb-3 social-link-row border shadow-sm';
                newRow.innerHTML = `
                    <div class="card-body p-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-5">
                                <label class="form-label-custom mb-2">FontAwesome Icon Class *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-primary fs-5 border-end-0" style="min-width: 46px; justify-content: center;">
                                        <i id="icon-preview-${indexCount}" class="fa-fw ${icon}"></i>
                                    </span>
                                    <input type="text"
                                        name="social_links[${indexCount}][icon]"
                                        id="icon-${indexCount}"
                                        value="${icon}"
                                        class="form-control icon-class-input"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom mb-2">Social Profile URL *</label>
                                <input type="url"
                                    name="social_links[${indexCount}][url]"
                                    value="${url}"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="col-md-1 text-end">
                                <button type="button" class="btn btn-outline-danger remove-social-link btn-sm mt-md-4" title="Remove Link">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(newRow);
                setupIconPreview(newRow);
                indexCount++;
            });
        });

        // Remove row delegate
        container.addEventListener('click', function (e) {
            if (e.target.closest('.remove-social-link')) {
                const rows = container.querySelectorAll('.social-link-row');
                if (rows.length > 1) {
                    e.target.closest('.social-link-row').remove();
                } else {
                    alert('At least one social link row is required.');
                }
            }
        });
    });
</script>
@endpush