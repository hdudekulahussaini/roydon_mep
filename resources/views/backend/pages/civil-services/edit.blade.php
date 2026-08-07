@extends('layouts.backend.app')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Edit Civil Service</h5>

                    <p class="text-muted small mb-0">
                        Update the details of the selected homepage civil service card.
                    </p>
                </div>

                <a href="{{ route('admin.civil-services.index') }}"
                    class="btn btn-outline-secondary btn-sm">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>

            </div>

        </div>

        <div class="card-body p-4">

            <form action="{{ route(
                'admin.civil-services.update',
                $civilService
            ) }}"
                method="POST">

                @csrf
                @method('PUT')

                @include(
                    'backend.pages.civil-services._form',
                    ['civilService' => $civilService]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update Service
                    </button>

                    <a href="{{ route('admin.civil-services.index') }}"
                        class="btn btn-outline-secondary ms-2">

                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
