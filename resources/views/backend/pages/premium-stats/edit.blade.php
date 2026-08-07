@extends('layouts.backend.app')

@section('title', 'Edit Stat')
@section('page-title', 'Edit Stat')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Edit Premium Stat</h5>

                    <p class="text-muted small mb-0">
                        Update the details of the selected homepage statistic card.
                    </p>
                </div>

                <a href="{{ route('admin.premium-stats.index') }}"
                    class="btn btn-outline-secondary btn-sm">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>

            </div>

        </div>

        <div class="card-body p-4">

            <form action="{{ route(
                'admin.premium-stats.update',
                $premiumStat
            ) }}"
                method="POST">

                @csrf
                @method('PUT')

                @include(
                    'backend.pages.premium-stats._form',
                    ['premiumStat' => $premiumStat]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update Stat
                    </button>

                    <a href="{{ route('admin.premium-stats.index') }}"
                        class="btn btn-outline-secondary ms-2">

                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
