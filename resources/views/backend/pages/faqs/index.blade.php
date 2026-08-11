@extends('layouts.backend.app')

@section('title', 'FAQs')
@section('page-title', 'FAQs')

@section('content')

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-1">Frequently Asked Questions</h5>

                    <p class="text-muted small mb-0">
                        Manage the FAQ accordion items displayed on the homepage.
                    </p>
                </div>

                <a href="{{ route('admin.faqs.create') }}"
                    class="btn btn-dark">

                    <i class="fa-solid fa-plus me-1"></i>
                    Add FAQ
                </a>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($faqs as $faq)

                            <tr>

                                <td class="ps-4">
                                    {{ $faq->id }}
                                </td>

                                <td>
                                    <strong>{{ $faq->question }}</strong>
                                </td>

                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 400px;" title="{{ $faq->answer }}">
                                        {{ $faq->answer }}
                                    </span>
                                </td>

                                <td class="text-end pe-4">

                                    <div class="d-inline-flex gap-2">

                                        <a href="{{ route(
                                            'admin.faqs.edit',
                                            $faq
                                        ) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form action="{{ route(
                                            'admin.faqs.destroy',
                                            $faq
                                        ) }}"
                                            method="POST"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this FAQ?'
                                            )">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete">

                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-4 text-muted">
                                    No FAQs found. Add your first FAQ!
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

     @if ($faqs->hasPages())
    <div class="card-footer bg-white">
        {{ $faqs->links('pagination::bootstrap-5') }}
    </div>
@endif
    </div>

@endsection
