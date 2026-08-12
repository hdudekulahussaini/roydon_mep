<div class="row g-4">

    {{-- Banner title --}}

    <div class="col-12">

        <label for="title" class="form-label">
            Banner Title
        </label>

        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $homeBanner?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="Hospital Civil & MEP Turnkey Contractors"
            required>

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <small class="d-block text-muted mt-1">
            The word <strong>MEP</strong> is highlighted automatically. Wrap any other word or phrase in curly braces (e.g. <code>{Civil}</code>) to highlight it instead.
        </small>

    </div>

    {{-- Description --}}

    <div class="col-12">

        <label for="description" class="form-label">
            Banner Description
        </label>

        <textarea id="description"
            name="description"
            rows="5"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter banner description"
            required>{{ old('description', $homeBanner?->description) }}</textarea>

        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Background image --}}

    <div class="col-12">

        <label for="background_image" class="form-label">
            Background Image
        </label>

        <input type="file"
            id="background_image"
            name="background_image"
            class="form-control
            @error('background_image') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp"
            @if (!$homeBanner) required @endif>

        @error('background_image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <small class="d-block text-muted mt-1">
            Recommended size: 1920 × 900 pixels. Maximum: 4 MB.
        </small>

        <div class="mt-3" id="preview-container-background_image" style="{{ $homeBanner?->background_image ? '' : 'display: none;' }}">

            <p class="small fw-semibold mb-2" id="preview-label-background_image">
                Current background image
            </p>

            <img id="preview-img-background_image"
                src="{{ $homeBanner?->background_image ? asset('storage/' . $homeBanner->background_image) : '#' }}"
                alt="{{ $homeBanner?->title ?? 'Background Image Preview' }}"
                class="img-thumbnail"
                style="
                    width: 320px;
                    height: 160px;
                    object-fit: cover;
                ">

        </div>

    </div>

    {{-- Specializations --}}

    <div class="col-12">

        <label class="form-label fw-semibold">
            Specializations
        </label>

        <div class="input-group">
            <input type="text"
                id="specialization_input"
                class="form-control"
                placeholder="e.g., OT HVAC Systems, Medical Gas (MGPS)">
            <button type="button"
                id="add_specialization_btn"
                class="btn btn-success">
                <i class="fa-solid fa-plus me-1"></i> Add
            </button>
        </div>

        {{-- Container for visual tags --}}
        <div id="specializations_tags_container" class="d-flex flex-wrap gap-2 mt-2">
            {{-- Tags will be populated here via JS --}}
        </div>

        {{-- Hidden input to store comma-separated values --}}
        <input type="hidden"
            id="specializations_hidden"
            name="specializations"
            value="{{ old(
                'specializations',
                $homeBanner
                    ? implode(', ', $homeBanner->specializations ?? [])
                    : ''
            ) }}">

        @error('specializations')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror

        <small class="d-block text-muted mt-1">
            Type a specialization and click "Add" (or press Enter) to add it to the list. You can also paste comma-separated values.
        </small>

    </div>

    {{-- Certificate section --}}

    <div class="col-12">
        <hr>

        <h5 class="mb-1">ISO Certificates</h5>

        <p class="text-muted small mb-0">
            Enter the certificate title and upload its image.
        </p>
    </div>

    @php
        $certificates = [
            [
                'title_field' => 'iso_9001_title',
                'image_field' => 'iso_9001_image',
                'label' => 'ISO 9001 Certificate',
                'placeholder' => 'ISO 9001:2015 QMS',
            ],
            [
                'title_field' => 'iso_14001_title',
                'image_field' => 'iso_14001_image',
                'label' => 'ISO 14001 Certificate',
                'placeholder' => 'ISO 14001:2015 EMS',
            ],
            [
                'title_field' => 'iso_45001_title',
                'image_field' => 'iso_45001_image',
                'label' => 'ISO 45001 Certificate',
                'placeholder' => 'ISO 45001:2018 OHSMS',
            ],
        ];
    @endphp

    @foreach ($certificates as $certificate)

        @php
            $titleField = $certificate['title_field'];
            $imageField = $certificate['image_field'];
        @endphp

        <div class="col-12">

            <div class="border rounded p-3">

                <h6 class="mb-3">
                    {{ $certificate['label'] }}
                </h6>

                <div class="row g-3">

                    @php
                        $titleVal = old($titleField, $homeBanner?->{$titleField} ?? '');
                        $parts = explode('|', $titleVal);
                        $part1 = old($titleField . '_part1', $parts[0] ?? '');
                        $part2 = old($titleField . '_part2', $parts[1] ?? '');
                    @endphp

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Certificate Title
                        </label>

                        <div class="row g-2">
                            <div class="col-6">
                                <input type="text"
                                    name="{{ $titleField }}_part1"
                                    value="{{ $part1 }}"
                                    class="form-control @error($titleField . '_part1') is-invalid @enderror"
                                    placeholder="e.g. ISO 9001:2015"
                                    required>
                                <span class="text-muted small">Standard (e.g. ISO 9001:2015)</span>
                                @error($titleField . '_part1')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="text"
                                    name="{{ $titleField }}_part2"
                                    value="{{ $part2 }}"
                                    class="form-control @error($titleField . '_part2') is-invalid @enderror"
                                    placeholder="e.g. QMS"
                                    required>
                                <span class="text-muted small">System / Subtitle (e.g. QMS)</span>
                                @error($titleField . '_part2')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <label for="{{ $imageField }}"
                            class="form-label">

                            Certificate Image
                        </label>

                        <input type="file"
                            id="{{ $imageField }}"
                            name="{{ $imageField }}"
                            class="form-control
                            @error($imageField) is-invalid @enderror"
                            accept=".jpg,.jpeg,.png,.webp"
                            @if (!$homeBanner) required @endif>

                        @error($imageField)
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-12 mt-2" id="preview-container-{{ $imageField }}" style="{{ $homeBanner?->{$imageField} ? '' : 'display: none;' }}">

                        <p class="small fw-semibold mb-2" id="preview-label-{{ $imageField }}">
                            Current image
                        </p>

                        <img id="preview-img-{{ $imageField }}"
                            src="{{ $homeBanner?->{$imageField} ? asset('storage/' . $homeBanner->{$imageField}) : '#' }}"
                            alt="{{ $homeBanner?->{$titleField} ?? 'Certificate Image Preview' }}"
                            class="img-thumbnail"
                            style="
                                width: 100px;
                                height: 100px;
                                object-fit: contain;
                            ">

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInputs = [
            {
                input: document.getElementById('background_image'),
                container: document.getElementById('preview-container-background_image'),
                img: document.getElementById('preview-img-background_image'),
                label: document.getElementById('preview-label-background_image'),
                defaultSrc: "{{ $homeBanner?->background_image ? asset('storage/' . $homeBanner->background_image) : '' }}",
                defaultLabel: "Current background image"
            },
            {
                input: document.getElementById('iso_9001_image'),
                container: document.getElementById('preview-container-iso_9001_image'),
                img: document.getElementById('preview-img-iso_9001_image'),
                label: document.getElementById('preview-label-iso_9001_image'),
                defaultSrc: "{{ $homeBanner?->iso_9001_image ? asset('storage/' . $homeBanner->iso_9001_image) : '' }}",
                defaultLabel: "Current image"
            },
            {
                input: document.getElementById('iso_14001_image'),
                container: document.getElementById('preview-container-iso_14001_image'),
                img: document.getElementById('preview-img-iso_14001_image'),
                label: document.getElementById('preview-label-iso_14001_image'),
                defaultSrc: "{{ $homeBanner?->iso_14001_image ? asset('storage/' . $homeBanner->iso_14001_image) : '' }}",
                defaultLabel: "Current image"
            },
            {
                input: document.getElementById('iso_45001_image'),
                container: document.getElementById('preview-container-iso_45001_image'),
                img: document.getElementById('preview-img-iso_45001_image'),
                label: document.getElementById('preview-label-iso_45001_image'),
                defaultSrc: "{{ $homeBanner?->iso_45001_image ? asset('storage/' . $homeBanner->iso_45001_image) : '' }}",
                defaultLabel: "Current image"
            }
        ];

        imageInputs.forEach(item => {
            if (!item.input) return;

            item.input.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        item.img.src = e.target.result;
                        item.label.textContent = "New Selected Image Preview";
                        item.container.style.display = "block";
                    };
                    reader.readAsDataURL(file);
                } else {
                    if (item.defaultSrc) {
                        item.img.src = item.defaultSrc;
                        item.label.textContent = item.defaultLabel;
                        item.container.style.display = "block";
                    } else {
                        item.container.style.display = "none";
                        item.img.src = "#";
                    }
                }
            });
        });

        // Specializations Tag Manager
        const specInput = document.getElementById('specialization_input');
        const addBtn = document.getElementById('add_specialization_btn');
        const tagsContainer = document.getElementById('specializations_tags_container');
        const hiddenInput = document.getElementById('specializations_hidden');

        let specializations = [];

        // Load initial values
        if (hiddenInput && hiddenInput.value.trim() !== '') {
            specializations = hiddenInput.value.split(',')
                .map(item => item.trim())
                .filter(item => item.length > 0);
        }

        function renderTags() {
            tagsContainer.innerHTML = '';
            specializations.forEach((tag, index) => {
                const badge = document.createElement('span');
                badge.className = 'badge rounded-pill bg-light text-dark border d-inline-flex align-items-center gap-2 px-3 py-2 fs-6 shadow-sm';
                badge.innerHTML = `
                    <span>${tag}</span>
                    <i class="fa-solid fa-xmark remove-tag-btn text-danger" data-index="${index}" style="cursor: pointer; font-size: 0.9rem;" title="Remove"></i>
                `;
                tagsContainer.appendChild(badge);
            });
            hiddenInput.value = specializations.join(', ');
        }

        function addTag() {
            const rawValue = specInput.value.trim();
            if (rawValue) {
                const parts = rawValue.split(',').map(item => item.trim()).filter(item => item.length > 0);
                parts.forEach(value => {
                    if (value && !specializations.includes(value)) {
                        specializations.push(value);
                    }
                });
                specInput.value = '';
                renderTags();
            }
        }

        if (addBtn && specInput && tagsContainer) {
            addBtn.addEventListener('click', function (e) {
                e.preventDefault();
                addTag();
            });

            specInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addTag();
                }
            });

            tagsContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-tag-btn') || e.target.parentElement.classList.contains('remove-tag-btn')) {
                    const targetBtn = e.target.classList.contains('remove-tag-btn') ? e.target : e.target.parentElement;
                    const index = parseInt(targetBtn.getAttribute('data-index'), 10);
                    specializations.splice(index, 1);
                    renderTags();
                }
            });

            // Initial render
            renderTags();
        }
    });
</script>
@endpush