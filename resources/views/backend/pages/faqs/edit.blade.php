@extends('layouts.backend.app')

@section('title', 'Edit FAQ')
@section('page-title', 'Edit FAQ')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Edit FAQ</h5>

                    <p class="text-muted small mb-0">
                        Update the Frequently Asked Question and its answer.
                    </p>
                </div>

                <a href="{{ route('admin.faqs.index') }}"
                    class="btn btn-outline-secondary btn-sm">

                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>

            </div>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('admin.faqs.update', $faq) }}"
                method="POST">

                @csrf
                @method('PUT')

                @include(
                    'backend.pages.faqs._form',
                    ['faq' => $faq]
                )

                <div class="mt-4">

                    <button type="submit" class="btn btn-dark">

                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Update FAQ
                    </button>

                    <a href="{{ route('admin.faqs.index') }}"
                        class="btn btn-outline-secondary ms-2">

                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
