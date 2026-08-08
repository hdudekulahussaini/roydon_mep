@extends('layouts.backend.app')

@section('title', 'Edit Metric')
@section('page-title', 'Edit Metric')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Edit Metric
                </h5>

                <p class="text-muted small mb-0">
                    Update the selected metric displayed on the website.
                </p>

            </div>

            <a
                href="{{ route('admin.metrics.index') }}"
                class="btn btn-outline-secondary btn-sm">

                <i class="fa-solid fa-arrow-left me-1"></i>
                Back

            </a>

        </div>

    </div>


    <div class="card-body p-4">

        <form
            action="{{ route(
                'admin.metrics.update',
                $metric
            ) }}"
            method="POST">

            @csrf

            @method('PUT')


            @include(
            'backend.pages.metrics._form',
            ['metric' => $metric]
            )


            <div class="mt-4">

                <button
                    type="submit"
                    class="btn btn-dark">

                    <i class="fa-solid fa-floppy-disk me-1"></i>
                    Update Metric

                </button>


                <a
                    href="{{ route('admin.metrics.index') }}"
                    class="btn btn-outline-secondary ms-2">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection