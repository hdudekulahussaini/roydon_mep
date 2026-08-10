@extends('layouts.backend.app')

@section('title', 'Add Standards Banner')
@section('page-title', 'Add Standards Banner')

@section('content')

<div class="card">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Create Standards Banner
                </h5>

                <p class="text-muted small mb-0">
                    Add the banner image displayed on the standards page.
                </p>

            </div>


            <a
                href="{{ route('admin.standard-banners.index') }}"
                class="btn btn-outline-secondary btn-sm">

                <i class="fa-solid fa-arrow-left me-1"></i>

                Back

            </a>

        </div>

    </div>


    <div class="card-body p-4">

        <form
            action="{{ route('admin.standard-banners.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @include(
            'backend.pages.standard_banners._form',
            ['standardBanner' => null]
            )


            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark">

                    <i class="fa-solid fa-floppy-disk me-1"></i>

                    Save Banner

                </button>


                <a
                    href="{{ route('admin.standard-banners.index') }}"
                    class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection