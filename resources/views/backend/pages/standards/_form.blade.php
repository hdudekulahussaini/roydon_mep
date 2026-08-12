@csrf

<div class="row g-3">
    {{-- Section & Status --}}
    <div class="col-md-6">
        <label for="standard_section_id" class="form-label fw-semibold">Section <span class="text-danger">*</span></label>
        <select name="standard_section_id" id="standard_section_id"
            class="form-select @error('standard_section_id') is-invalid @enderror" required>
            <option value="">Select Section</option>
            @foreach ($sections as $section)
                <option value="{{ $section->id }}"
                    {{ old('standard_section_id', $standard->standard_section_id ?? '') == $section->id ? 'selected' : '' }}>
                    {{ $section->title }}
                </option>
            @endforeach
        </select>
        @error('standard_section_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" name="status" value="1" id="status" class="form-check-input"
                {{ old('status', $standard->status ?? true) ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold" for="status">Active Status</label>
        </div>
    </div>

    {{-- Abbreviation & Title --}}
    <div class="col-md-6">
        <label for="abbr" class="form-label fw-semibold">Abbreviation <span class="text-danger">*</span></label>
        <input type="text" name="abbr" id="abbr" class="form-control @error('abbr') is-invalid @enderror"
            value="{{ old('abbr', $standard->abbr ?? '') }}" placeholder="e.g. NFPA 99" required>
        @error('abbr')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="title" class="form-label fw-semibold">Card Title <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $standard->title ?? '') }}" placeholder="e.g. Health Care Facilities Code" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Upgraded Icon Selection Card Structure --}}
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-3">
            <div class="card-header bg-light py-2 px-3">
                <span class="fw-semibold text-dark small">
                    <i class="fa-solid fa-icons me-2 text-primary"></i>Icon Selection
                </span>
            </div>
            <div class="card-body p-3">
                <div class="row g-3 align-items-center">

                    {{-- Live Dark Preview Card --}}
                    <div class="col-auto">
                        <div class="d-flex flex-column align-items-center justify-content-center bg-dark text-white rounded-3 p-2 text-center"
                            style="width: 85px; height: 85px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            <i id="icon-preview" class="{{ old('icon', $standard->icon ?? 'fa-light fa-notes-medical') }} fs-2 text-warning mb-1"></i>
                            <span class="badge bg-secondary text-white" style="font-size: 9px; max-width: 75px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" id="icon-tag">
                                {{ old('icon', $standard->icon ?? 'fa-light fa-notes-medical') }}
                            </span>
                        </div>
                    </div>

                    {{-- Input & Style Controls --}}
                    <div class="col">
                        <label for="icon" class="form-label small fw-semibold mb-1">FontAwesome Icon Class</label>
                        <div class="input-group input-group-sm mb-2">
                            <span class="input-group-text bg-white text-secondary"><i class="fa-solid fa-code"></i></span>
                            <input type="text" name="icon" id="icon"
                                class="form-control form-control-sm @error('icon') is-invalid @enderror"
                                value="{{ old('icon', $standard->icon ?? 'fa-light fa-notes-medical') }}"
                                placeholder="e.g. fa-light fa-notes-medical">
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

                {{-- Preset Icon Selection Grid --}}
                <div class="mt-3 pt-2 border-top">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-semibold text-secondary" style="font-size: 11px;">
                            <i class="fa-solid fa-grip me-1"></i> Quick Pick Preset Standard Icon:
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
                                ['icon' => 'fa-light fa-notes-medical', 'label' => 'Medical Notes'],
                                ['icon' => 'fa-light fa-heart-pulse', 'label' => 'Pulse'],
                                ['icon' => 'fa-light fa-hospital', 'label' => 'Hospital'],
                                ['icon' => 'fa-light fa-shield-check', 'label' => 'Shield Check'],
                                ['icon' => 'fa-light fa-clipboard-check', 'label' => 'Audit Check'],
                                ['icon' => 'fa-light fa-fan', 'label' => 'HVAC Fan'],
                                ['icon' => 'fa-light fa-bolt', 'label' => 'Electrical'],
                                ['icon' => 'fa-light fa-droplet', 'label' => 'Plumbing'],
                                ['icon' => 'fa-light fa-file-certificate', 'label' => 'Certificate'],
                                ['icon' => 'fa-light fa-microscope', 'label' => 'Lab Test'],
                                ['icon' => 'fa-light fa-award', 'label' => 'Compliance Award'],
                                ['icon' => 'fa-light fa-book-medical', 'label' => 'Medical Code'],
                                ['icon' => 'fa-light fa-plug', 'label' => 'Plug / Electrical'],
                                ['icon' => 'fa-light fa-lungs', 'label' => 'Pulmonology / Lungs'],
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

    {{-- Description & Applied To --}}
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
        <textarea name="description" id="description" rows="4"
            class="form-control @error('description') is-invalid @enderror" placeholder="Enter standard description..."
            required>{{ old('description', $standard->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8">
        <label for="applied_to" class="form-label fw-semibold">Applied To</label>
        <input type="text" name="applied_to" id="applied_to" class="form-control"
            value="{{ old('applied_to', $standard->applied_to ?? '') }}"
            placeholder="Example: MGPS, electrical, HVAC">
    </div>

    <div class="col-md-4">
        <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
        <input type="number" name="sort_order" id="sort_order" class="form-control"
            value="{{ old('sort_order', $standard->sort_order ?? 0) }}" min="0">
    </div>

</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconInput = document.getElementById('icon');
            const iconPreview = document.getElementById('icon-preview');
            const iconTag = document.getElementById('icon-tag');
            const clearBtn = document.getElementById('clear-icon-btn');
            const styleBtns = document.querySelectorAll('.style-btn');
            const presetBtns = document.querySelectorAll('.preset-icon-btn');

            function updateIconPreview(val) {
                const iconClass = (val || 'fa-light fa-notes-medical').trim();
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
                iconInput.addEventListener('input', function() {
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
        });
    </script>
@endpush
