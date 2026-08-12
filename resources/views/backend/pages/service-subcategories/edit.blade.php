@extends('layouts.backend.app')

@section('title', 'Edit Service Subcategory')
@section('page-title', 'Edit Service Subcategory')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Edit Service </h5>

                    <p class="text-muted small mb-0">
                        Update the details, media, compliance, and key offerings of this service subcategory.
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

            <form action="{{ route(
                'admin.service-subcategories.update',
                $serviceSubcategory
            ) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include(
                    'backend.pages.service-subcategories._form',
                    ['serviceSubcategory' => $serviceSubcategory]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update 
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
