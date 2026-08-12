@extends('layouts.backend.app')

@section('title', 'Add Service Subcategory')
@section('page-title', 'Add Service Subcategory')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Create Service</h5>

                    <p class="text-muted small mb-0">
                        Add a new service and configure its details, media, and key offerings.
                    </p>
                </div>

                <a href="{{ route('admin.service-subcategories.index') }}"
                    class="btn btn-outline-secondary btn-sm">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>

            </div>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('admin.service-subcategories.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @include(
                    'backend.pages.service-subcategories._form',
                    ['serviceSubcategory' => null]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Save 
                    </button>

                    <a href="{{ route('admin.service-subcategories.index') }}"
                        class="btn btn-outline-secondary ms-2">

                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
