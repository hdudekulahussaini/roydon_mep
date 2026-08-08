{{-- Title --}}
<div class="row g-4">

    {{-- Title --}}
    <div class="col-md-6">

        <label
            for="title"
            class="form-label fw-semibold"
        >
            Story Title
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $storySection?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Setting the Benchmark for Clinical Engineering"
            maxlength="255"
            required
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Image --}}
    <div class="col-md-6">

        <label
            for="image"
            class="form-label fw-semibold"
        >
            Story Image
        </label>

        <input
            type="file"
            id="image"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/jpeg,image/png,image/webp"
            {{ empty($storySection?->image) ? 'required' : '' }}
        >

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <small class="d-block text-muted mt-1">
            JPG, JPEG, PNG or WEBP. Maximum size: 2MB.
        </small>

        @if($storySection?->image)

            <div class="mt-3">

                <p class="small text-muted mb-2">
                    Current Image
                </p>

                <img
                    src="{{ asset('storage/' . $storySection->image) }}"
                    alt="{{ $storySection->title }}"
                    class="img-thumbnail"
                    style="
                        width: 220px;
                        height: 140px;
                        object-fit: cover;
                    "
                >

            </div>

        @endif

    </div>


    {{-- Description --}}
    <div class="col-12">

        <label
            for="description"
            class="form-label fw-semibold"
        >
            Description
        </label>

        <textarea
            id="description"
            name="description"
            rows="7"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter the story section description..."
            required
        >{{ old('description', $storySection?->description) }}</textarea>

        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- Status --}}
    <div class="col-12">

        <div class="form-check form-switch">

            <input
                class="form-check-input"
                type="checkbox"
                id="status"
                name="status"
                value="1"
                {{ old('status', $storySection?->status ?? true) ? 'checked' : '' }}
            >

            <label
                class="form-check-label fw-semibold"
                for="status"
            >
                Active Status
            </label>

        </div>

        <small class="text-muted">
            Enable this option to display the story section on the website.
        </small>

        @error('status')
            <div class="text-danger small mt-1">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const imageInput = document.getElementById('image');

        if (imageInput) {
            imageInput.addEventListener('change', function () {

                const file = this.files[0];

                if (!file) {
                    return;
                }

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];

                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a JPG, PNG or WEBP image.');
                    this.value = '';
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    alert('Image size must not exceed 2MB.');
                    this.value = '';
                }
            });
        }

    });
</script>
@endpush