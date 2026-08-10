<div class="row g-4">

    {{-- Title --}}
    <div class="col-md-12">

        <label
            for="title"
            class="form-label fw-semibold"
        >
            Title
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            id="title"
            value="{{ old(
                'title',
                $baseline?->title
            ) }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="NABH Ready"
        >

        @error('title')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- Description --}}
    <div class="col-12">

        <label
            for="description"
            class="form-label fw-semibold"
        >
            Description
            <span class="text-danger">*</span>
        </label>

        <textarea
            name="description"
            id="description"
            rows="4"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter compliance information..."
        >{{ old(
            'description',
            $baseline?->description
        ) }}</textarea>

        @error('description')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- Sort Order --}}
    <div class="col-md-6">

        <label
            for="sort_order"
            class="form-label fw-semibold"
        >
            Sort Order
            <span class="text-danger">*</span>
        </label>

        <input
            type="number"
            name="sort_order"
            id="sort_order"
            min="1"
            value="{{ old(
                'sort_order',
                $baseline?->sort_order ?? 1
            ) }}"
            class="form-control @error('sort_order') is-invalid @enderror"
        >

        @error('sort_order')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- Status --}}
    <div class="col-md-6">

        <label
            for="status"
            class="form-label fw-semibold"
        >
            Status
        </label>

        <select
            name="status"
            id="status"
            class="form-select"
        >

            <option
                value="1"
                {{ old(
                    'status',
                    $baseline?->status ?? true
                ) ? 'selected' : '' }}
            >
                Active
            </option>

            <option
                value="0"
                {{ !old(
                    'status',
                    $baseline?->status ?? true
                ) ? 'selected' : '' }}
            >
                Inactive
            </option>

        </select>

    </div>

</div>