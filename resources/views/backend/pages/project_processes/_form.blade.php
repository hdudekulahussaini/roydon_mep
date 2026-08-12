<div class="row g-4">

    {{-- Upgraded Icon Selection Card Structure --}}
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-3">
            <div class="card-header bg-light py-2 px-3">
                <span class="fw-semibold text-dark small">
                    <i class="fa-solid fa-icons me-2 text-primary"></i>Process Icon Selection
                </span>
            </div>
            <div class="card-body p-3">
                <div class="row g-3 align-items-center">

                    {{-- Live Dark Icon Preview Avatar Box --}}
                    <div class="col-auto">
                        <div class="d-flex flex-column align-items-center justify-content-center bg-dark text-white rounded-3 p-2 text-center"
                            style="width: 85px; height: 85px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            <i id="icon-preview" class="{{ old('icon', $projectProcess?->icon ?? 'fa-light fa-clipboard-list-check') }} fs-2 text-warning mb-1"></i>
                            <span class="badge bg-secondary text-white" style="font-size: 9px; max-width: 75px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" id="icon-tag">
                                {{ old('icon', $projectProcess?->icon ?? 'fa-light fa-clipboard-list-check') }}
                            </span>
                        </div>
                    </div>

                    {{-- Input & Style Selector --}}
                    <div class="col">
                        <label for="icon" class="form-label small fw-semibold mb-1">
                            FontAwesome Icon Class <span class="text-danger">*</span>
                        </label>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text bg-white text-secondary"><i class="fa-solid fa-code"></i></span>
                            <input type="text" id="icon" name="icon"
                                value="{{ old('icon', $projectProcess?->icon ?? 'fa-light fa-clipboard-list-check') }}"
                                class="form-control form-control-sm @error('icon') is-invalid @enderror"
                                placeholder="e.g. fa-light fa-clipboard-list-check" required>
                            <button type="button" class="btn btn-outline-secondary" id="clear-icon-btn" title="Clear Icon">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        @error('icon')
                            <div class="text-danger small mb-1">{{ $message }}</div>
                        @enderror

                        {{-- Style Family Buttons --}}
                        <div class="d-flex align-items-center gap-1 flex-wrap">
                            <span class="small text-muted me-1 fw-medium" style="font-size: 11px;">Style Family:</span>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 style-btn" data-prefix="fa-solid" style="font-size: 11px;">fa-solid</button>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 style-btn" data-prefix="fa-light" style="font-size: 11px;">fa-light</button>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 style-btn" data-prefix="fa-regular" style="font-size: 11px;">fa-regular</button>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 style-btn" data-prefix="fa-duotone" style="font-size: 11px;">fa-duotone</button>
                        </div>
                    </div>

                </div>

                {{-- Preset Process Icons Grid --}}
                <div class="mt-3 pt-2 border-top">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold text-secondary" style="font-size: 11px;">
                            <i class="fa-solid fa-grip me-1"></i> Quick Pick Preset Process Icon:
                        </span>
                        <small class="text-muted" style="font-size: 10px;">Click icon to select</small>
                    </div>
                    <div class="d-flex flex-wrap gap-1">
                        @php
                            $presetIcons = [
                                ['icon' => 'fa-light fa-house-crack', 'label' => 'Structural Repair'],
                                ['icon' => 'fa-light fa-mound', 'label' => 'Earth Mound'],
                                ['icon' => 'fa-light fa-paint-roller', 'label' => 'Paint Roller'],
                                ['icon' => 'fa-light fa-trowel-bricks', 'label' => 'Masonry Bricks'],
                                ['icon' => 'fa-light fa-plug', 'label' => 'Plug / Electrical'],
                                ['icon' => 'fa-light fa-lungs', 'label' => 'Pulmonology / Lungs'],
                                ['icon' => 'fa-light fa-clipboard-list-check', 'label' => 'Process Audit'],
                                ['icon' => 'fa-light fa-diagram-project', 'label' => 'Project Flow'],
                                ['icon' => 'fa-light fa-compass-drafting', 'label' => 'Engineering Design'],
                                ['icon' => 'fa-light fa-gears', 'label' => 'Systems Integration'],
                                ['icon' => 'fa-light fa-shield-check', 'label' => 'QA & Safety'],
                                ['icon' => 'fa-light fa-truck-ramp-box', 'label' => 'Commissioning'],
                                ['icon' => 'fa-light fa-headset', 'label' => 'Handover Support'],
                                ['icon' => 'fa-light fa-sitemap', 'label' => 'Architecture'],
                                ['icon' => 'fa-light fa-chart-line-up', 'label' => 'Execution Track'],
                                ['icon' => 'fa-light fa-layer-group', 'label' => 'Multidisciplinary'],
                            ];
                        @endphp
                        @foreach($presetIcons as $preset)
                            <button type="button"
                                class="btn btn-sm btn-outline-secondary preset-icon-btn d-inline-flex align-items-center gap-1 py-1 px-2"
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
    </div>

    {{-- Sort Order & Title Details --}}
    <div class="col-md-4">
        <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
        <input type="number" id="sort_order" name="sort_order"
            value="{{ old('sort_order', $projectProcess?->sort_order ?? 0) }}"
            class="form-control @error('sort_order') is-invalid @enderror" min="0" placeholder="e.g. 1">
        @error('sort_order')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
        <input type="text" id="title" name="title"
            value="{{ old('title', $projectProcess?->title) }}"
            class="form-control @error('title') is-invalid @enderror" placeholder="e.g. Brief & Scope Definition" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="small_title" class="form-label fw-semibold">Small Title</label>
        <input type="text" id="small_title" name="small_title"
            value="{{ old('small_title', $projectProcess?->small_title) }}"
            class="form-control @error('small_title') is-invalid @enderror" placeholder="e.g. Clinical Planning">
        @error('small_title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Description --}}
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
        <textarea id="description" name="description" rows="4"
            class="form-control @error('description') is-invalid @enderror" placeholder="Enter the process description..." required>{{ old('description', $projectProcess?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Features Section --}}
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <label class="form-label fw-semibold mb-1">Process Features</label>
                <div class="text-muted small">Add key highlight points displayed under this process.</div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-dark" id="add-feature">
                <i class="fa-solid fa-plus me-1"></i> Add Feature
            </button>
        </div>

        <div id="features-wrapper">
            @php
                $features = old('features', $projectProcess?->features ?? ['']);
            @endphp

            @foreach($features as $feature)
                <div class="feature-row mb-2">
                    <div class="input-group">
                        <span class="input-group-text bg-white text-secondary"><i class="fa-solid fa-check text-success"></i></span>
                        <input type="text" name="features[]" value="{{ $feature }}" class="form-control" placeholder="Enter feature bullet point...">
                        <button type="button" class="btn btn-outline-danger remove-feature" title="Delete Feature">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        @error('features')
            <div class="text-danger small mt-2">{{ $message }}</div>
        @enderror
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');
    const iconTag = document.getElementById('icon-tag');
    const clearBtn = document.getElementById('clear-icon-btn');
    const styleBtns = document.querySelectorAll('.style-btn');
    const presetBtns = document.querySelectorAll('.preset-icon-btn');

    function updateIconPreview(val) {
        const iconClass = (val || 'fa-light fa-clipboard-list-check').trim();
        if (iconPreview) {
            iconPreview.className = iconClass + ' fs-2 text-warning mb-1';
        }
        if (iconTag) {
            iconTag.textContent = iconClass;
        }

        presetBtns.forEach(btn => {
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

    if (iconInput) {
        iconInput.addEventListener('input', function () {
            updateIconPreview(this.value);
        });
        updateIconPreview(iconInput.value);
    }

    if (clearBtn && iconInput) {
        clearBtn.addEventListener('click', function() {
            iconInput.value = '';
            updateIconPreview('');
            iconInput.focus();
        });
    }

    styleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (!iconInput) return;
            const newPrefix = this.dataset.prefix;
            let currentVal = iconInput.value.trim();
            const parts = currentVal.split(' ');
            let iconName = parts.length > 1 ? parts.slice(1).join(' ') : parts[0];
            if (parts[0].startsWith('fa-')) {
                iconName = parts.slice(1).join(' ');
            }
            const updated = `${newPrefix} ${iconName}`.trim();
            iconInput.value = updated;
            updateIconPreview(updated);
        });
    });

    presetBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const selectedIcon = this.dataset.icon;
            if (iconInput) {
                iconInput.value = selectedIcon;
                updateIconPreview(selectedIcon);
            }
        });
    });

    /* Feature Management */
    const featuresWrapper = document.getElementById('features-wrapper');
    const addFeatureButton = document.getElementById('add-feature');

    if (addFeatureButton && featuresWrapper) {
        addFeatureButton.addEventListener('click', function () {
            const row = document.createElement('div');
            row.className = 'feature-row mb-2';
            row.innerHTML = `
                <div class="input-group">
                    <span class="input-group-text bg-white text-secondary"><i class="fa-solid fa-check text-success"></i></span>
                    <input type="text" name="features[]" class="form-control" placeholder="Enter feature bullet point...">
                    <button type="button" class="btn btn-outline-danger remove-feature" title="Delete Feature">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;
            featuresWrapper.appendChild(row);
        });

        featuresWrapper.addEventListener('click', function (event) {
            const deleteButton = event.target.closest('.remove-feature');
            if (!deleteButton) return;
            const rows = featuresWrapper.querySelectorAll('.feature-row');
            if (rows.length === 1) {
                const input = rows[0].querySelector('input');
                input.value = '';
                return;
            }
            deleteButton.closest('.feature-row').remove();
        });
    }
});
</script>
@endpush