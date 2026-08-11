<div class="row g-4">

    {{-- Title --}}
    <div class="col-md-6 col-12">
        <label for="title" class="form-label fw-semibold">
            Project Title
        </label>
        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $project?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Neelima Hospitals, Hyderabad"
            required>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Type --}}
    <div class="col-md-6 col-12">
        <label for="type" class="form-label fw-semibold">
            Project Type
        </label>
        <input type="text"
            id="type"
            name="type"
            value="{{ old('type', $project?->type ?? 'Multispeciality') }}"
            class="form-control @error('type') is-invalid @enderror"
            placeholder="e.g. Multispeciality, Commercial, Hospitality"
            required>
        @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Tags / Specializations --}}
    <div class="col-md-6 col-12">
        <label for="tag-input" class="form-label fw-semibold">
            Specializations / Services Tags
        </label>

        <div class="input-group mb-2">
            <input type="text"
                id="tag-input"
                class="form-control"
                placeholder="e.g., OT HVAC Systems, Medical Gas (MGPS)"
                autocomplete="off">
            <button type="button" class="btn btn-success px-4 fw-semibold" id="add-tag-btn">
                <i class="fa-solid fa-plus me-1"></i> Add
            </button>
        </div>

        <div id="tag-chips" class="d-flex flex-wrap gap-2 mt-2">
            @php
                $existingTags = collect(explode(',', old('tags', $project?->tags ?? '')))
                    ->map(fn ($tag) => trim($tag))
                    ->filter()
                    ->values();
            @endphp

            @foreach ($existingTags as $tag)
                <span class="tag-chip badge rounded-pill bg-light text-dark border d-inline-flex align-items-center gap-2 px-3 py-2 fs-6 shadow-sm"
                    data-value="{{ $tag }}">
                    <span class="tag-chip-text fw-medium">{{ $tag }}</span>
                    <i class="fa-solid fa-xmark text-danger cursor-pointer ms-1"
                        data-remove-tag="{{ $tag }}"
                        style="cursor: pointer; font-size: 0.9rem;"
                        title="Remove {{ $tag }}"></i>
                </span>
            @endforeach
        </div>

        <input type="hidden"
            id="tags"
            name="tags"
            value="{{ old('tags', $project?->tags) }}">

        <small class="text-muted d-block mt-2">Type specialization name and click + Add or press Enter.</small>
        @error('tags')
            <div class="invalid-feedback d-block mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tagInput = document.getElementById('tag-input');
                const addTagBtn = document.getElementById('add-tag-btn');
                const tagChips = document.getElementById('tag-chips');
                const hiddenTagsInput = document.getElementById('tags');
                const form = tagInput?.closest('form');

                function updateHiddenInput() {
                    const tags = Array.from(tagChips.querySelectorAll('.tag-chip'))
                        .map((chip) => chip.dataset.value.trim())
                        .filter(Boolean);

                    hiddenTagsInput.value = tags.join(', ');
                }

                function addSingleTag(value) {
                    const trimmedValue = value.trim();
                    if (!trimmedValue) return;

                    const exists = Array.from(tagChips.querySelectorAll('.tag-chip'))
                        .some((chip) => chip.dataset.value.toLowerCase() === trimmedValue.toLowerCase());

                    if (exists) return;

                    const chip = document.createElement('span');
                    chip.className = 'tag-chip badge rounded-pill bg-light text-dark border d-inline-flex align-items-center gap-2 px-3 py-2 fs-6 shadow-sm';
                    chip.dataset.value = trimmedValue;
                    chip.innerHTML = `
                        <span class="tag-chip-text fw-medium">${trimmedValue}</span>
                        <i class="fa-solid fa-xmark text-danger cursor-pointer ms-1" data-remove-tag="${trimmedValue}" style="cursor: pointer; font-size: 0.9rem;" title="Remove ${trimmedValue}"></i>
                    `;

                    tagChips.appendChild(chip);
                }

                function processInput(inputValue) {
                    if (!inputValue || !inputValue.trim()) return;

                    const parts = inputValue.split(',');
                    parts.forEach(part => addSingleTag(part));

                    tagInput.value = '';
                    updateHiddenInput();
                }

                addTagBtn?.addEventListener('click', function (e) {
                    e.preventDefault();
                    processInput(tagInput.value);
                });

                tagInput?.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        processInput(tagInput.value);
                    }
                });

                tagChips?.addEventListener('click', function (event) {
                    const removeButton = event.target.closest('[data-remove-tag]');
                    if (!removeButton) return;

                    const chip = removeButton.closest('.tag-chip');
                    if (chip) {
                        chip.remove();
                        updateHiddenInput();
                    }
                });

                form?.addEventListener('submit', function () {
                    if (tagInput && tagInput.value.trim()) {
                        processInput(tagInput.value);
                    } else {
                        updateHiddenInput();
                    }
                });

                updateHiddenInput();
            });
        </script>
    @endpush

    {{-- Beds --}}
    <div class="col-md-6 col-12">
        <label for="beds" class="form-label fw-semibold">
            Beds Count
        </label>
        <input type="text"
            id="beds"
            name="beds"
            value="{{ old('beds', $project?->beds) }}"
            class="form-control @error('beds') is-invalid @enderror"
            placeholder="e.g. 900 or N/A">
        @error('beds')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Scale --}}
    <div class="col-md-6 col-12">
        <label for="scale" class="form-label fw-semibold">
            Project Scale / Area
        </label>
        <input type="text"
            id="scale"
            name="scale"
            value="{{ old('scale', $project?->scale) }}"
            class="form-control @error('scale') is-invalid @enderror"
            placeholder="e.g. 500,000 sq ft or Various"
            required>
        @error('scale')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Scope --}}
    <div class="col-md-6 col-12">
        <label for="scope" class="form-label fw-semibold">
            Scope
        </label>
        <input type="text"
            id="scope"
            name="scope"
            value="{{ old('scope', $project?->scope) }}"
            class="form-control @error('scope') is-invalid @enderror"
            placeholder="e.g. Full MEP — No sub-bids or Electrical & HVAC"
            required>
        @error('scope')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Location --}}
    <div class="col-md-6 col-12">
        <label for="location" class="form-label fw-semibold">
            Location
        </label>
        <input type="text"
            id="location"
            name="location"
            value="{{ old('location', $project?->location) }}"
            class="form-control @error('location') is-invalid @enderror"
            placeholder="e.g. Hyderabad, Telangana"
            required>
        @error('location')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Programme --}}
    <div class="col-md-6 col-12">
        <label for="programme" class="form-label fw-semibold">
            Programme / Duration
        </label>
        <input type="text"
            id="programme"
            name="programme"
            value="{{ old('programme', $project?->programme) }}"
            class="form-control @error('programme') is-invalid @enderror"
            placeholder="e.g. 70 Days or 5 Months"
            required>
        @error('programme')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Result --}}
    <div class="col-md-6 col-12">
        <label for="result" class="form-label fw-semibold">
            Result / Status
        </label>
        <input type="text"
            id="result"
            name="result"
            value="{{ old('result', $project?->result) }}"
            class="form-control @error('result') is-invalid @enderror"
            placeholder="e.g. Zero defect handover or Compliance certified"
            required>
        @error('result')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="col-12">
        <label for="image" class="form-label fw-semibold">
            Project Image
        </label>
        
        @if($project?->image)
            <div class="mb-3">
                <p class="text-muted small mb-1">Current Image:</p>
                <img src="{{ str_contains($project->image, 'assets/') ? asset($project->image) : asset('storage/' . $project->image) }}" 
                     alt="{{ $project->title }}" 
                     style="height: 120px; width: 160px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
            </div>
        @endif

        <input type="file"
            id="image"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/*"
            {{ $project ? '' : 'required' }}>
        <small class="text-muted d-block mt-1">Recommended size: 600x400 pixels. Format: JPEG, PNG, JPG, or WEBP.</small>
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>
