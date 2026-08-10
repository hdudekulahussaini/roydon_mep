@csrf

<div class="form-group">

    <label for="standard_section_id">
        Section
        <span class="text-danger">*</span>
    </label>

    <select
        name="standard_section_id"
        id="standard_section_id"
        class="form-control @error('standard_section_id') is-invalid @enderror"
        required>

        <option value="">
            Select Section
        </option>

        @foreach($sections as $section)

        <option
            value="{{ $section->id }}"
            {{ old(
                    'standard_section_id',
                    $standard->standard_section_id ?? ''
                ) == $section->id ? 'selected' : '' }}>
            {{ $section->title }}
        </option>

        @endforeach

    </select>

    @error('standard_section_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>


<div class="form-group">

    <label for="icon">
        Icon Class
    </label>

    <input
        type="text"
        name="icon"
        id="icon"
        class="form-control"
        value="{{ old(
            'icon',
            $standard->icon ?? ''
        ) }}"
        placeholder="fa-light fa-notes-medical">

</div>


<div class="form-group">

    <label for="abbr">
        Abbreviation
        <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="abbr"
        id="abbr"
        class="form-control @error('abbr') is-invalid @enderror"
        value="{{ old(
            'abbr',
            $standard->abbr ?? ''
        ) }}"
        placeholder="Example: NFPA 99"
        required>

    @error('abbr')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>


<div class="form-group">

    <label for="title">
        Card Title
        <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="title"
        id="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old(
            'title',
            $standard->title ?? ''
        ) }}"
        placeholder="Example: Health Care Facilities Code"
        required>

    @error('title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>


<div class="form-group">

    <label for="description">
        Description
        <span class="text-danger">*</span>
    </label>

    <textarea
        name="description"
        id="description"
        rows="5"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Enter standard description..."
        required>{{ old(
        'description',
        $standard->description ?? ''
    ) }}</textarea>

    @error('description')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

</div>


<div class="form-group">

    <label for="applied_to">
        Applied To
    </label>

    <input
        type="text"
        name="applied_to"
        id="applied_to"
        class="form-control"
        value="{{ old(
            'applied_to',
            $standard->applied_to ?? ''
        ) }}"
        placeholder="Example: MGPS, electrical, HVAC">

</div>


<div class="form-row">

    <div class="form-group">

        <label for="sort_order">
            Sort Order
        </label>

        <input
            type="number"
            name="sort_order"
            id="sort_order"
            class="form-control"
            value="{{ old(
                'sort_order',
                $standard->sort_order ?? 0
            ) }}"
            min="0">

    </div>


    <div class="form-group">

        <label>
            Status
        </label>

        <div class="form-check mt-2">

            <input
                type="hidden"
                name="status"
                value="0">

            <input
                type="checkbox"
                name="status"
                value="1"
                id="status"
                class="form-check-input"
                {{ old(
                    'status',
                    $standard->status ?? true
                ) ? 'checked' : '' }}>

            <label
                class="form-check-label"
                for="status">
                Active
            </label>

        </div>

    </div>

</div>


<div class="form-actions">

    <a
        href="{{ route('admin.standards.index') }}"
        class="btn btn-secondary">
        Cancel
    </a>

    <button
        type="submit"
        class="btn btn-primary">
        {{ isset($standard) ? 'Update Standard' : 'Create Standard' }}
    </button>

</div>