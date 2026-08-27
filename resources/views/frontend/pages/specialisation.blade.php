@extends('layouts.frontend.app')

@section('title', $specialisation->title)
@section('meta_description', Str::limit($specialisation->description, 160))

@push('styles')
    <style>
        .spec-hero {
            position: relative;
            padding: 140px 0 80px;
            background-size: cover;
            background-position: center;
            color: #fff;
            margin-bottom: 50px;
            border-radius: 15px;
        }

        .spec-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(15, 32, 68, 0.92), rgba(14, 155, 155, 0.75));
            border-radius: 15px;
        }

        .spec-hero .container {
            position: relative;
            z-index: 2;
        }

        .spec-hero-subtitle {
            font-size: 0.95rem;
            color: #fff;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            padding: 6px 16px;
            border-radius: 50px;
            backdrop-filter: blur(4px);
        }

        .spec-hero-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
            line-height: 1.2;
        }

        .spec-breadcrumb {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 8px;
            font-size: 0.95rem;
        }

        .spec-breadcrumb a {
            color: #E0F4F4;
            text-decoration: none;
            transition: color 0.3s;
        }

        .spec-breadcrumb a:hover {
            color: #fff;
        }

        .spec-content-area {
            padding-bottom: 90px;
        }

        .spec-desc {
            font-size: 1.15rem;
            color: #4B5F70;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .spec-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .spec-item {
            background: #F6FAFA;
            border-left: 4px solid #0E9B9B;
            padding: 22px 25px;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .spec-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .spec-item .lb {
            font-weight: 800;
            color: #0F2044;
            font-size: 1.05rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .spec-item .vl {
            color: #4B5F70;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .spec-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .spec-tag {
            font-size: 0.85rem;
            color: #0E9B9B;
            background: #E0F4F4;
            padding: 7px 16px;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }


        .sidebar-cta {
            background: #0F2044;
            padding: 40px;
            border-radius: 12px;
            color: #fff;
            text-align: center;
            position: sticky;
            top: 100px;
        }

        .sidebar-cta h3 {
            color: #fff;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .sidebar-cta p {
            color: rgba(255,255,255,0.8);
            margin-bottom: 30px;
        }

        .sidebar-cta .btn-w {
            background: #0E9B9B;
            color: #fff;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 700;
            display: inline-block;
            transition: background 0.3s;
        }

        .sidebar-cta .btn-w:hover {
            background: #0C8888;
        }

        @media (max-width: 767px) {
            .spec-grid {
                grid-template-columns: 1fr;
            }

            .spec-hero-title {
                font-size: 2rem;
            }

            .spec-hero {
                padding: 100px 0 60px;
            }
        }
    </style>
@endpush

@section('content')
    <main>
        <!-- Hero Section -->
        @php
            $bgImage = $specialisation->banner_image
                ? (str_starts_with($specialisation->banner_image, 'assets/') ||
                str_starts_with($specialisation->banner_image, 'frontend/')
                    ? asset($specialisation->banner_image)
                    : asset('storage/' . $specialisation->banner_image))
                : '';

            $contentImage = $specialisation->image
                ? (str_starts_with($specialisation->image, 'assets/') ||
                str_starts_with($specialisation->image, 'frontend/')
                    ? asset($specialisation->image)
                    : asset('storage/' . $specialisation->image))
                : '';
        @endphp

        <section class="pl-50 pr-50">
            <div class="spec-hero"
                @if ($bgImage) style="background-image: url('{{ $bgImage }}');" @endif>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-10">
                            @if (!empty($specialisation->banner_tags))
                                <div class="spec-hero-subtitle">
                                    @foreach ($specialisation->banner_tags as $tag)
                                        @if (!empty($tag))
                                            {{ $tag }}{{ !$loop->last ? ' · ' : '' }}
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <h1 class="spec-hero-title">{{ $specialisation->title }}</h1>
                            <ul class="spec-breadcrumb">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><span>/</span></li>
                                <li><a href="#">Specialisations</a></li>
                                <li><span>/</span></li>
                                <li style="color: #0E9B9B; font-weight: 600;">{{ $specialisation->title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content Section -->
        <section class="spec-content-area">
            <div class="container">
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-lg-8 pr-lg-5 mb-50">
                        @if ($contentImage)
                            <img src="{{ $contentImage }}" alt="{{ $specialisation->title }}"
                                class="img-fluid rounded mb-4 shadow"
                                style="width: 100%; height: 380px; object-fit: cover; border-radius: 12px;">
                        @endif

                        @if ($specialisation->description)
                            <p class="spec-desc">{{ $specialisation->description }}</p>
                        @endif

                        @if (!empty($specialisation->features_heading))
                            <div class="spec-grid">
                                @foreach ($specialisation->features_heading as $index => $heading)
                                    @if (!empty($heading))
                                        <div class="spec-item">
                                            <div class="lb">{{ $heading }}</div>
                                            @if (isset($specialisation->features_description[$index]) && !empty($specialisation->features_description[$index]))
                                                <div class="vl">{{ $specialisation->features_description[$index] }}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        @if (!empty($specialisation->tags))
                            <div class="spec-tags">
                                @foreach ($specialisation->tags as $tag)
                                    @if (!empty($tag))
                                        <span class="spec-tag">{{ $tag }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-cta">
                            <h3>Need specialist MEP for your hospital area?</h3>
                            <p>Tell us the clinical area and we'll outline our approach and timeline.</p>
                            <a href="{{ route('contact') }}" class="btn-w">Discuss Your Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
