@extends('layouts.backend.app')

@section('title', 'Edit Footer Setting')
@section('page-title', 'Footer Settings')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">Edit Footer Configuration</h5>
            </div>

            <form action="{{ route('admin.footers.update', $footer) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('backend.pages.footers._form', ['footer' => $footer])
                </div>

                <div class="card-footer bg-white py-3 text-end">
                    <a href="{{ route('admin.footers.index') }}" class="btn btn-light me-2">Cancel</a>
                    <button type="submit" class="btn btn-dark">
                        <i class="fa-solid fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
