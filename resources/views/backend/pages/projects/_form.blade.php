<div class="row g-4">

    {{-- Title --}}
    <div class="col-12">
        <label for="title" class="form-label fw-semibold">
            Project Title
        </label>
        <input type="text"
            id="title"
            name="title"
            value="{{ old('title', $project?->title) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="e.g. Neelima Hospital"
            required>
        @error('title')
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
                     style="height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
            </div>
        @endif

        <input type="file"
            id="image"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/*"
            {{ $project ? '' : 'required' }}>
        <small class="text-muted d-block mt-1">Recommended size: 400x300 pixels. Format: JPEG, PNG, JPG, or WEBP.</small>
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>
