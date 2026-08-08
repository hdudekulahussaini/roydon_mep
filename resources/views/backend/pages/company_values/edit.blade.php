@extends('layouts.backend.app')

@section('title', 'Edit Company Value')
@section('page-title', 'Edit Company Value')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h5 class="mb-1">
                    Edit Company Value
                </h5>

                <p class="text-muted small mb-0">
                    Update the selected value displayed on the website.
                </p>
            </div>

            <a
                href="{{ route('admin.company-values.index') }}"
                class="btn btn-outline-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i>
                Back
            </a>

        </div>

    </div>

    <div class="card-body p-4">

        <form
            action="{{ route(
                'admin.company-values.update',
                $companyValue
            ) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include(
            'backend.pages.company_values._form',
            ['companyValue' => $companyValue]
            )

            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark">
                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Update Company Value
                </button>

                <a
                    href="{{ route('admin.company-values.index') }}"
                    class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection