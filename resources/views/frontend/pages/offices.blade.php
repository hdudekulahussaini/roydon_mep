@extends('layouts.frontend.app')

@push('styles')
<style>
    .main-menu ul li a {
        font-size: 17px !important;
    }
</style>

<style>
    .office-hero {
        position: relative;
        padding: 160px 0 100px;
        background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
        color: #fff;
        text-align: center;
    }

    .office-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: #fff;
    }

    .office-hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .intro-section {
        padding: 80px 0 40px;
        text-align: center;
    }

    .intro-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 20px;
    }

    .intro-desc {
        font-size: 1.1rem;
        color: #4B5F70;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .grid-section {
        padding: 40px 0 100px;
        background: #F6FAFA;
    }

    .office-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .office-card {
        background: #fff;
        border-radius: 12px;
        padding: 40px 30px;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border-bottom: 4px solid transparent;
    }

    .office-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(14, 155, 155, 0.1);
        border-bottom-color: #0E9B9B;
    }

    .office-card-flag {
        font-size: 3rem;
        margin-bottom: 15px;
        display: inline-block;
    }

    .office-card-city {
        font-size: 1.8rem;
        font-weight: 900;
        color: #0F2044;
        margin-bottom: 5px;
    }

    .office-card-type {
        font-size: 1rem;
        font-weight: 700;
        color: #0E9B9B;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .office-card-desc {
        font-size: 1rem;
        color: #4B5F70;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .office-card-contact {
        margin-bottom: 20px;
        padding: 15px;
        background: #F6FAFA;
        border-radius: 8px;
    }

    .office-card-contact p {
        margin: 0 0 5px;
        font-size: 0.95rem;
        color: #0F2044;
        font-weight: 500;
    }

    .office-card-contact p:last-child {
        margin-bottom: 0;
    }

    .office-card-seo {
        font-size: 0.85rem;
        color: #9AA9B5;
        font-style: italic;
    }

    .coverage-section {
        padding: 100px 0;
        background: #0F2044;
        color: #fff;
    }

    .coverage-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 15px;
        text-align: center;
    }

    .coverage-subtitle {
        font-size: 1.2rem;
        color: #0E9B9B;
        margin-bottom: 50px;
        text-align: center;
    }

    .coverage-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
        text-align: center;
    }

    .coverage-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 20px 15px;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .coverage-item:hover {
        background: rgba(14, 155, 155, 0.2);
    }

    .coverage-city {
        font-size: 1.1rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 5px;
    }

    .coverage-state {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }

    @media (max-width: 991px) {
        .office-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .coverage-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 767px) {
        .office-grid {
            grid-template-columns: 1fr;
        }

        .coverage-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endpush

@section('content')
<!-- main-area -->
<main>
    <!-- Hero Section -->
    <section class="office-hero">
        <div class="container">
            <h1 class="office-hero-title">Hospital MEP Contractor<br>Hyderabad & Across India</h1>
            <p class="office-hero-subtitle">Headquartered in Hyderabad with offices in Bengaluru, Dubai and Saudi — delivering hospital MEP execution across India and the Gulf. London and Munich upcoming.</p>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="intro-section">
        <div class="container">
            <h2 class="intro-title">Our Offices</h2>
            <p class="intro-desc">Pan-India delivery. International presence.<br>We mobilise to any hospital project in India within 48 hours. Our Dubai and Saudi offices provide on-the-ground support for GCC projects.</p>
        </div>
    </section>

    <!-- Grid Section -->
    <section class="grid-section">
        <div class="container">
            <div class="office-grid">

                @foreach($officeLocations as $office)

                <div
                    class="office-card wow fadeInUp"
                    data-wow-delay="{{ 0.1 + ($loop->index * 0.1) }}s">

                    <div class="office-card-flag">
                        {{ $office->flag }}
                    </div>

                    <div class="office-card-city">
                        {{ $office->city }}
                    </div>

                    <div class="office-card-type">
                        {{ $office->type }}
                    </div>

                    <div class="office-card-desc">
                        {{ $office->description }}
                    </div>

                    <div class="office-card-contact">

                        @if($office->address)
                        <p>
                            <i class="fa-solid fa-location-dot"></i>
                            {!! nl2br(e($office->address)) !!}
                        </p>
                        @endif

                        @if($office->phone)
                        <p>
                            <i class="fa-solid fa-phone"></i>
                            {{ $office->phone }}
                        </p>
                        @endif

                        @if($office->email)
                        <p>
                            <i class="fa-solid fa-envelope"></i>
                            {{ $office->email }}
                        </p>
                        @endif

                    </div>

                    @if($office->seo)
                    <div class="office-card-seo">
                        {{ $office->seo }}
                    </div>
                    @endif

                </div>

                @endforeach

            </div>
        </div>
    </section>

    <!-- Coverage Section -->
    <section class="coverage-section">
        <div class="container">

            <h2 class="coverage-title">
                Pan-India Coverage
            </h2>

            <p class="coverage-subtitle">
                We deliver hospital MEP anywhere in India
            </p>

            <div class="coverage-grid">

                @foreach($coverages as $coverage)

                <div class="coverage-item">

                    <div class="coverage-city">
                        {{ $coverage->city }}
                    </div>

                    <div class="coverage-state">
                        {{ $coverage->state }}
                    </div>

                </div>

                @endforeach

            </div>

        </div>
    </section>
</main>
<!-- main-area-end -->
@endsection