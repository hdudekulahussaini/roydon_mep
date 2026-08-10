@extends('layouts.backend.app')

@section('title', 'Edit Standard')
@section('page-title', 'Edit Standard')

@section('content')

<div class="card">

    {{-- Header --}}
    <div class="card-header bg-white py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Edit Standard
                </h5>

                <p class="text-muted small mb-0">
                    Update the selected technical or healthcare standard.
                </p>

            </div>


            <a
                href="{{ route('admin.standards.index') }}"
                class="btn btn-outline-secondary btn-sm"
            >

                <i class="fa-solid fa-arrow-left me-1"></i>

                Back

            </a>

        </div>

    </div>


    {{-- Form --}}
    <div class="card-body p-4">

        <form
            action="{{ route(
                'admin.standards.update',
                $standard
            ) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            @include(
                'backend.pages.standards._form',
                [
                    'standard' => $standard
                ]
            )

        </form>

    </div>

</div>

@endsection