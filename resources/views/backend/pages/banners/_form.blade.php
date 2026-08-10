@php
    $pages = [
        'about' => 'About',
        'standards' => 'Standards',
        'process' => 'Process',
        'offices' => 'Offices',
        'get_a_quote' => 'Get a Quote',
        'projects' => 'Projects',
    ];
@endphp

<div class="row g-4">
    <div class="col-md-12">
        <label for="page_name" class="form-label fw-medium">Page <span class="text-danger">*</span></label>
        <select name="page_name" id="page_name" class="form-select @error('page_name') is-invalid @enderror" required>
            <option value="">Select a Page</option>
            @foreach($pages as $value => $label)
                <option value="{{ $value }}" {{ old('page_name', $banner?->page_name) == $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('page_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12" id="heading-group" style="display: none;">
        <label for="heading" class="form-label fw-medium">Heading</label>
        <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ old('heading', $banner?->heading) }}">
        @error('heading')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12" id="description-group" style="display: none;">
        <label for="description" class="form-label fw-medium">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $banner?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12" id="image-group" style="display: none;">
        <label for="banner_image" class="form-label fw-medium">Banner Image</label>
        <input type="file" class="form-control @error('banner_image') is-invalid @enderror" id="banner_image" name="banner_image" accept="image/*">
        @if($banner?->image_path)
            <div class="mt-2">
                <img src="{{ Storage::url($banner->image_path) }}" alt="Current Banner Image" class="img-thumbnail" style="max-height: 150px;">
                <p class="text-muted small mt-1 mb-0">Current Image</p>
            </div>
        @endif
        @error('banner_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pageSelect = document.getElementById('page_name');
        const headingGroup = document.getElementById('heading-group');
        const descriptionGroup = document.getElementById('description-group');
        const imageGroup = document.getElementById('image-group');

        function toggleFields() {
            const page = pageSelect.value;
            
            // Hide all by default
            headingGroup.style.display = 'none';
            descriptionGroup.style.display = 'none';
            imageGroup.style.display = 'none';

            if (!page) return;

            // Show heading for all
            headingGroup.style.display = 'block';

            if (page === 'projects') {
                imageGroup.style.display = 'block';
            } else {
                descriptionGroup.style.display = 'block';
            }
        }

        pageSelect.addEventListener('change', toggleFields);
        
        // Initial state
        toggleFields();
    });
</script>
@endpush
