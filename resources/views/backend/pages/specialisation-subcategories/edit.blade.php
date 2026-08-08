@extends('layouts.backend.app')

@section('title', 'Edit Specialisation Subcategory')
@section('page-title', 'Edit Specialisation Subcategory')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Specialisation: {{ $specialisationSubcategory->title }}</h5>
                        <a href="{{ route('admin.specialisation-subcategories.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admin.specialisation-subcategories.update', $specialisationSubcategory) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('backend.pages.specialisation-subcategories._form', ['specialisationSubcategory' => $specialisationSubcategory])

                        <div class="mt-4 pt-3 border-top text-end">
                            <a href="{{ route('admin.specialisation-subcategories.index') }}" class="btn btn-light me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save me-1"></i> Update Specialisation
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
