@extends('layouts.backend.app')

@section('title', 'Add Compliance Baseline')
@section('page-title', 'Add Compliance Baseline')

@section('content')

<div class="card">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Create Compliance Baseline
                </h5>

                <p class="text-muted small mb-0">
                    Add a new compliance baseline item.
                </p>

            </div>

            <a
                href="{{ route('admin.baselines.index') }}"
                class="btn btn-outline-secondary btn-sm"
            >

                <i class="fa-solid fa-arrow-left me-1"></i>

                Back

            </a>

        </div>

    </div>


    <div class="card-body p-4">

        <form
            action="{{ route('admin.baselines.store') }}"
            method="POST"
        >

            @csrf

            @include(
                'backend.pages.baselines._form',
                ['baseline' => null]
            )


            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark"
                >

                    <i class="fa-solid fa-floppy-disk me-1"></i>

                    Save Baseline

                </button>

                <a
                    href="{{ route('admin.baselines.index') }}"
                    class="btn btn-outline-secondary ms-2"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection