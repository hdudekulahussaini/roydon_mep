@extends('layouts.frontend.app')


@section('content')

    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="pl-50 pr-50 ">
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $banner?->image_path ? Storage::url($banner->image_path) : '' }}'); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2>{!! $banner?->heading !!}</h2>
                                    <div class="breadcrumb-wrap">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #0E9B9B; font-weight: 700;">Projects</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        
        <!-- projects-area -->
        @if ($projects && $projects->isNotEmpty())
            <section class="projects-area p-relative fix pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            <div class="col-lg-6 col-md-12 mb-40">
                                <div class="custom-project-card wow fadeInUp" data-delay=".{{ ($index % 2) + 1 }}s">
                                    <div class="custom-project-img-wrapper">
                                        <span class="project-meta-type">{{ $project->type }}</span>
                                        <img src="{{ str_contains($project->image, 'assets/') ? asset($project->image) : asset('storage/' . $project->image) }}" alt="{{ $project->title }} - Roydon MEP" class="custom-project-img">
                                    </div>
                                    <div class="custom-project-content">
                                        <h3 class="project-title">{{ $project->title }}</h3>

                                        @if ($project->tags)
                                            <div class="project-services-tags">
                                                @foreach (explode(',', $project->tags) as $tag)
                                                    <span class="service-pill">{{ trim($tag) }}</span>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="project-details-grid">
                                            @if ($project->beds)
                                                <div class="detail-item"><i class="fa-light fa-bed"></i>
                                                    <div><strong>Beds</strong> {{ $project->beds }}</div>
                                                </div>
                                            @endif
                                            @if ($project->scale)
                                                <div class="detail-item"><i class="fa-light fa-ruler-combined"></i>
                                                    <div><strong>Scale</strong> {{ $project->scale }}</div>
                                                </div>
                                            @endif
                                            @if ($project->scope)
                                                <div class="detail-item"><i class="fa-light fa-clipboard-list"></i>
                                                    <div><strong>Scope</strong> {{ $project->scope }}</div>
                                                </div>
                                            @endif
                                            @if ($project->location)
                                                <div class="detail-item"><i class="fa-light fa-map-marker-alt"></i>
                                                    <div><strong>Location</strong> {{ $project->location }}</div>
                                                </div>
                                            @endif
                                            @if ($project->programme)
                                                <div class="detail-item"><i class="fa-light fa-clock"></i>
                                                    <div><strong>Programme</strong> {{ $project->programme }}</div>
                                                </div>
                                            @endif
                                            @if ($project->result)
                                                <div class="detail-item"><i class="fa-light fa-check-circle"></i>
                                                    <div><strong>Result</strong> {{ $project->result }}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="projects-area p-relative fix pt-120 pb-120">
                <div class="container text-center py-5">
                    <h3 class="text-muted">No projects found.</h3>
                </div>
            </section>
        @endif
        <!-- projects-area-end -->
@endsection
