@extends('layouts.backend.app')

@section('title', 'Create Standard Section')
@section('page-title', 'Create Standard Section')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1 fw-semibold">
                    Create Standard Section
                </h5>

                <p class="text-muted small mb-0">
                    Add a new standards section to the website.
                </p>

            </div>


            <a
                href="{{ route('admin.standard-sections.index') }}"
                class="btn btn-outline-secondary btn-sm"
            >

                <i class="fa-solid fa-arrow-left me-1"></i>

                Back

            </a>

        </div>

    </div>


    {{-- Form --}}
    <div class="card-body p-4">

        <form
            action="{{ route('admin.standard-sections.store') }}"
            method="POST"
        >

            @csrf

            @include(
                'backend.pages.standard_sections._form',
                [
                    'standardSection' => null
                ]
            )

            <div class="mt-4">

                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Save Section
                </button>

                <a href="{{ route('admin.standard-sections.index') }}" class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection