@extends('layouts.backend.app')

@section('title', 'Add Coverage')
@section('page-title', 'Add Coverage')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Add Coverage Location
                </h5>

                <p class="text-muted small mb-0">
                    Add a city to the Pan-India Coverage section.
                </p>

            </div>

            <a
                href="{{ route('admin.coverages.index') }}"
                class="btn btn-outline-secondary btn-sm">

                <i class="fa-solid fa-arrow-left me-1"></i>
                Back

            </a>

        </div>

    </div>


    <div class="card-body p-4">

        <form
            action="{{ route('admin.coverages.store') }}"
            method="POST">

            @csrf

            @include(
            'backend.pages.coverage._form',
            ['coverage' => null]
            )


            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark">

                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Save Coverage

                </button>

                <a
                    href="{{ route('admin.coverages.index') }}"
                    class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection