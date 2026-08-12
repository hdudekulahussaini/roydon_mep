@extends('layouts.backend.app')

@section('title', 'Edit Hospital Specialisation')
@section('page-title', 'Edit Hospital Specialisation')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Edit Hospital Specialisation</h5>

                    <p class="text-muted small mb-0">
                        Update the selected hospital specialisation details and icon.
                    </p>
                </div>

                <a href="{{ route('admin.hospital-specialisations.index') }}"
                    class="btn btn-outline-secondary btn-sm">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>

            </div>

        </div>

        <div class="card-body p-4">

            <form action="{{ route(
                'admin.hospital-specialisations.update',
                $hospitalSpecialisation
            ) }}"
                method="POST">

                @csrf
                @method('PUT')

                @include(
                    'backend.pages.hospital-specialisations._form',
                    ['hospitalSpecialisation' => $hospitalSpecialisation]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update Specialisation
                    </button>

                    <a href="{{ route('admin.hospital-specialisations.index') }}"
                        class="btn btn-outline-secondary ms-2">

                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
