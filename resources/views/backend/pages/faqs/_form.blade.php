<div class="row g-4">

    {{-- Question --}}
    <div class="col-12">
        <label for="question" class="form-label fw-semibold">
            Question
        </label>
        <input type="text"
            id="question"
            name="question"
            value="{{ old('question', $faq?->question) }}"
            class="form-control @error('question') is-invalid @enderror"
            placeholder="e.g. What is your track record on project delivery timelines?"
            required>
        @error('question')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Answer --}}
    <div class="col-12">
        <label for="answer" class="form-label fw-semibold">
            Answer
        </label>
        <textarea
            id="answer"
            name="answer"
            rows="5"
            class="form-control @error('answer') is-invalid @enderror"
            placeholder="Provide the answer here..."
            required>{{ old('answer', $faq?->answer) }}</textarea>
        @error('answer')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>
