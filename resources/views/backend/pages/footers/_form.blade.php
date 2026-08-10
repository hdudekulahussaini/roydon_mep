<div class="row g-4">
    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Common Description <span class="text-danger">*</span></label>
        <textarea id="description" name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $footer?->description ?? '') }}</textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<h5 class="mt-5 mb-3">Social Links</h5>

<div id="social-links-container">
    @php
        // Old input could be array of arrays: [['icon'=>'', 'url'=>'']] 
        // Or if nothing in old, use the model's social_links.
        $links = old('social_links', $footer?->social_links ?? []);
        // If it's completely empty, provide one blank row so the user sees fields immediately.
        if(empty($links)) {
            $links = [['icon' => '', 'url' => '']];
        }
    @endphp

    @foreach($links as $index => $link)
        <div class="row g-3 mb-3 social-link-row align-items-end">
            <div class="col-md-5">
                <label class="form-label fw-semibold">Icon Class <small class="text-muted">(e.g. fa-brands fa-facebook)</small></label>
                <input type="text" name="social_links[{{ $index }}][icon]" value="{{ $link['icon'] ?? '' }}" class="form-control @error('social_links.'.$index.'.icon') is-invalid @enderror" placeholder="fa-brands fa-facebook" required>
                @error('social_links.'.$index.'.icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="col-md-6">
                <label class="form-label fw-semibold">URL</label>
                <input type="url" name="social_links[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" class="form-control @error('social_links.'.$index.'.url') is-invalid @enderror" placeholder="https://..." required>
                @error('social_links.'.$index.'.url') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-outline-danger remove-social-link" title="Remove Link">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>
    @endforeach
</div>

<div class="row mt-3">
    <div class="col-12">
        <button type="button" class="btn btn-outline-primary btn-sm" id="add-social-link">
            <i class="fa-solid fa-plus me-1"></i> Add Social Link
        </button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('social-links-container');
        const addButton = document.getElementById('add-social-link');
        
        let indexCount = {{ count($links) }};

        addButton.addEventListener('click', function() {
            const newRow = document.createElement('div');
            newRow.className = 'row g-3 mb-3 social-link-row align-items-end';
            newRow.innerHTML = `
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Icon Class <small class="text-muted">(e.g. fa-brands fa-facebook)</small></label>
                    <input type="text" name="social_links[${indexCount}][icon]" class="form-control" placeholder="fa-brands fa-facebook" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label fw-semibold">URL</label>
                    <input type="url" name="social_links[${indexCount}][url]" class="form-control" placeholder="https://..." required>
                </div>

                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-outline-danger remove-social-link" title="Remove Link">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(newRow);
            indexCount++;
        });

        container.addEventListener('click', function(e) {
            if(e.target.closest('.remove-social-link')) {
                const rows = container.querySelectorAll('.social-link-row');
                if (rows.length > 1) {
                    e.target.closest('.social-link-row').remove();
                } else {
                    alert('You must have at least one social link row, even if empty.');
                }
            }
        });
    });
</script>
@endpush
