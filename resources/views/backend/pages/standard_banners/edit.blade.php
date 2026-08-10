@extends('layouts.backend.app')

@section('title', 'Edit Standards Banner')
@section('page-title', 'Edit Standards Banner')

@section('content')

<div class="card">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Edit Standards Banner
                </h5>

                <p class="text-muted small mb-0">
                    Update the standards page banner.
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
            action="{{ route(
                'admin.standard-banners.update',
                $standardBanner
            ) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')


            @include(
            'backend.pages.standard_banners._form',
            ['standardBanner' => $standardBanner]
            )


            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark">

                    <i class="fa-solid fa-floppy-disk me-1"></i>

                    Update Banner

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