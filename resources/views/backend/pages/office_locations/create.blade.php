@extends('layouts.backend.app')

@section('title', 'Add Office Location')
@section('page-title', 'Add Office Location')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Create Office Location
                </h5>

                <p class="text-muted small mb-0">
                    Add a new office or regional location to the website.
                </p>

            </div>

            <a
                href="{{ route('admin.office-locations.index') }}"
                class="btn btn-outline-secondary btn-sm">

                <i class="fa-solid fa-arrow-left me-1"></i>
                Back

            </a>

        </div>

    </div>


    <div class="card-body p-4">

        <form
            action="{{ route('admin.office-locations.store') }}"
            method="POST">

            @csrf

            @include(
            'backend.pages.office_locations._form',
            ['officeLocation' => null]
            )

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark">

                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Save Office

                </button>

                <a
                    href="{{ route('admin.office-locations.index') }}"
                    class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection