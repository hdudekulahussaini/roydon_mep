@extends('layouts.backend.app')

@section('title', 'Edit Home Banner')
@section('page-title', 'Edit Home Banner')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Edit Home Banner</h5>

                    <p class="text-muted small mb-0">
                        Update the banner and certificate details.
                    </p>
                </div>

                <a href="{{ route('admin.home-banners.index') }}"
                    class="btn btn-outline-secondary btn-sm">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>

            </div>

        </div>

        <div class="card-body p-4">

            <form action="{{ route(
                'admin.home-banners.update',
                $homeBanner
            ) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include(
                    'backend.pages.home-banners._form',
                    ['homeBanner' => $homeBanner]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update Banner
                    </button>

                    <a href="{{ route('admin.home-banners.index') }}"
                        class="btn btn-outline-secondary ms-2">

                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection