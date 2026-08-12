@extends('layouts.backend.app')

@section('title', 'Create Standard')
@section('page-title', 'Create Standard')

@section('content')

<div class="card border-0 shadow-sm">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1 fw-semibold">
                    Create Standard
                </h5>

                <p class="text-muted small mb-0">
                    Add a new technical or healthcare standard to the website.
                </p>

            </div>


            <a
                href="{{ route('admin.standards.index') }}"
                class="btn btn-outline-secondary btn-sm">

                <i class="fa-solid fa-arrow-left me-1"></i>

                Back

            </a>

        </div>

    </div>


    {{-- Form --}}
    <div class="card-body p-4">

        <form
            action="{{ route('admin.standards.store') }}"
            method="POST">

            @csrf

            @include(
                'backend.pages.standards._form',
                [
                    'standard' => null
                ]
            )

            <div class="mt-4">
                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Save Standard
                </button>

                <a href="{{ route('admin.standards.index') }}" class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection