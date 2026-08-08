@extends('layouts.backend.app')

@section('title', 'Add Category')
@section('page-title', 'Categories')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Add New Category</h5>
                </div>

                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        @include('backend.pages.categories._form', ['category' => null])
                    </div>

                    <div class="card-footer bg-white py-3 text-end">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light me-2">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-dark">
                            <i class="fa-solid fa-save me-1"></i>
                            Save Category
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection
