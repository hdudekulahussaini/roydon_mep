@extends('layouts.backend.app')

@section('title', 'Add Service Subcategory')
@section('page-title', 'Service Subcategories')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Add New Service Subcategory</h5>
                </div>

                <form action="{{ route('admin.service-subcategories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        @include('backend.pages.service-subcategories._form', ['serviceSubcategory' => null])
                    </div>

                    <div class="card-footer bg-white py-3 text-end">
                        <a href="{{ route('admin.service-subcategories.index') }}" class="btn btn-light me-2">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-dark">
                            <i class="fa-solid fa-save me-1"></i>
                            Save Subcategory
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection
