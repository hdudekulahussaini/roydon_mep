<div class="row g-4">

    {{-- Title --}}
    <div class="col-md-12">
        <label for="title" class="form-label fw-semibold">
            Specialisation Title <span class="text-danger">*</span>
        </label>
        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $hospitalSpecialisation?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Operation Theatre (OT) Systems & Airflow"
            required>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Icon Structure Redesign --}}
    <div class="col-12">
        <div class="card border border-light-subtle shadow-sm rounded-3">
            <div class="card-header bg-light py-2 px-3 d-flex justify-content-between align-items-center">
                <span class="fw-semibold text-dark">
                    <i class="fa-solid fa-icons me-2 text-primary"></i>Icon Selection & Structure
                </span>
                <span class="badge bg-primary-subtle text-primary fw-normal">FontAwesome Pro</span>
            </div>
            <div class="card-body p-3">
                <div class="row g-3 align-items-center">

                    {{-- Live Icon Preview Box --}}
                    <div class="col-auto">
                        <div class="d-flex flex-column align-items-center justify-content-center bg-dark text-white rounded-3 p-3 text-center"
                            style="width: 105px; height: 105px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            <i id="icon-preview" class="{{ old('icon', $hospitalSpecialisation?->icon ?? 'fa-light fa-hospital') }} fs-1 mb-1 text-info"></i>
                            <span class="badge bg-secondary text-white small" style="font-size: 9px; max-width: 95px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" id="icon-tag">
                                {{ old('icon', $hospitalSpecialisation?->icon ?? 'fa-light fa-hospital') }}
                            </span>
                        </div>
                    </div>

                    {{-- Icon Input & Style Selector --}}
                    <div class="col">
                        <label for="icon" class="form-label fw-semibold mb-1">
                            Icon Class Name <span class="text-danger">*</span>
                        </label>

                        <div class="input-group mb-2">
                            <span class="input-group-text bg-white text-secondary">
                                <i class="fa-solid fa-code"></i>
                            </span>
                            <input type="text"
                                id="icon"
                                name="icon"
                                value="{{ old('icon', $hospitalSpecialisation?->icon ?? 'fa-light fa-hospital') }}"
                                class="form-control @error('icon') is-invalid @enderror"
                                placeholder="e.g. fa-light fa-hospital"
                                required>
                            <button type="button" class="btn btn-outline-secondary" id="clear-icon-btn" title="Clear Icon">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        @error('icon')
                            <div class="text-danger small mb-2">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Icon Style Prefix Quick Toggles --}}
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                            <span class="small text-muted me-1 fw-medium">Style Family:</span>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 icon-style-btn" data-prefix="fa-light">fa-light</button>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 icon-style-btn" data-prefix="fa-solid">fa-solid</button>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 icon-style-btn" data-prefix="fa-regular">fa-regular</button>
                            <button type="button" class="btn btn-sm btn-outline-dark py-0 px-2 icon-style-btn" data-prefix="fa-duotone">fa-duotone</button>
                        </div>
                    </div>

                </div>

                {{-- Preset Hospital Specialisation Icons --}}
                <div class="mt-3 pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label small fw-semibold text-secondary mb-0">
                            <i class="fa-solid fa-grip me-1"></i> Quick Pick Hospital & Healthcare Icons:
                        </label>
                        <small class="text-muted" style="font-size: 11px;">Click icon to select</small>
                    </div>

                    <div class="d-flex flex-wrap gap-2 icon-preset-grid" id="icon-preset-container">
                        @php
                            $presetIcons = [
                                ['icon' => 'fa-light fa-hospital', 'label' => 'Hospital Building'],
                                ['icon' => 'fa-light fa-heart-pulse', 'label' => 'Heart & Pulse'],
                                ['icon' => 'fa-light fa-stethoscope', 'label' => 'Stethoscope'],
                                ['icon' => 'fa-light fa-user-doctor', 'label' => 'Doctor / Specialist'],
                                ['icon' => 'fa-light fa-x-ray', 'label' => 'X-Ray & Radiology'],
                                ['icon' => 'fa-light fa-flask-vial', 'label' => 'Pathology Lab'],
                                ['icon' => 'fa-light fa-biohazard', 'label' => 'Cleanroom & Biohazard'],
                                ['icon' => 'fa-light fa-wind', 'label' => 'Medical HVAC Air'],
                                ['icon' => 'fa-light fa-shield-virus', 'label' => 'Infection Control'],
                                ['icon' => 'fa-light fa-hospital-user', 'label' => 'Patient Care'],
                                ['icon' => 'fa-light fa-syringe', 'label' => 'Pharma Systems'],
                                ['icon' => 'fa-light fa-dna', 'label' => 'Genomics & Speciality'],
                                ['icon' => 'fa-light fa-ambulance', 'label' => 'Emergency Care'],
                                ['icon' => 'fa-light fa-microscope', 'label' => 'Research Lab'],
                                ['icon' => 'fa-light fa-plug-circle-bolt', 'label' => 'Medical Power'],
                                ['icon' => 'fa-light fa-brain', 'label' => 'Neurology Care'],
                                ['icon' => 'fa-light fa-house-crack', 'label' => 'Structural Repair'],
                                ['icon' => 'fa-light fa-mound', 'label' => 'Earth Mound'],
                                ['icon' => 'fa-light fa-paint-roller', 'label' => 'Paint Roller'],
                                ['icon' => 'fa-light fa-trowel-bricks', 'label' => 'Masonry Bricks'],
                                ['icon' => 'fa-light fa-plug', 'label' => 'Plug / Electrical'],
                            ];
                        @endphp

                        @foreach($presetIcons as $item)
                            <button type="button"
                                class="btn btn-sm btn-outline-secondary icon-preset-btn d-inline-flex align-items-center gap-2 py-1 px-2"
                                data-icon="{{ $item['icon'] }}"
                                title="{{ $item['label'] }}">
                                <i class="{{ $item['icon'] }} fs-6 text-primary"></i>
                                <span style="font-size: 12px;">{{ $item['label'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Description --}}
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">
            Specialisation Description <span class="text-danger">*</span>
        </label>
        <textarea
            id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Describe the hospital specialisation details..."
            required>{{ old('description', $hospitalSpecialisation?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
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
        const presetBtns = document.querySelectorAll('.icon-preset-btn');
        const styleBtns = document.querySelectorAll('.icon-style-btn');

        function updateIconDisplay(val) {
            const iconClass = val.trim() || 'fa-light fa-hospital';
            if (iconPreview) {
                iconPreview.className = iconClass + ' fs-1 mb-1 text-info';
            }
            if (iconTag) {
                iconTag.textContent = iconClass;
            }
            highlightActivePreset(iconClass);
        }

        function highlightActivePreset(currentClass) {
            presetBtns.forEach(btn => {
                if (btn.dataset.icon.trim() === currentClass.trim()) {
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
                updateIconDisplay(this.value);
            });

            // Initial highlight
            updateIconDisplay(iconInput.value);
        }

        if (clearBtn && iconInput) {
            clearBtn.addEventListener('click', function() {
                iconInput.value = '';
                updateIconDisplay('');
                iconInput.focus();
            });
        }

        presetBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const selectedIcon = this.dataset.icon;
                if (iconInput) {
                    iconInput.value = selectedIcon;
                    updateIconDisplay(selectedIcon);
                }
            });
        });

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

                const updatedClass = `${newPrefix} ${iconName}`.trim();
                iconInput.value = updatedClass;
                updateIconDisplay(updatedClass);
            });
        });
    });
</script>
@endpush
