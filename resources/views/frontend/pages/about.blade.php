@extends('layouts.frontend.app')

@section('title', 'About Roydon MEP | Healthcare & Hotel MEP Contractors')
@section('meta_description', 'Learn about Roydon MEP Contracting, a design and build contractor specialising in healthcare infrastructure, hospital projects and luxury hotel construction.')
@section('meta_keywords', 'Roydon MEP, Hospital EPC Contractors, Hotel MEP Contractors, Healthcare MEP Contractors, Hospitality Project Management')

@push('styles')
<style>
    .about-hero {
        position: relative;
        padding: 160px 0 100px;
        background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
        color: #fff;
        text-align: center;
    }

    .about-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: #fff;
    }

    .about-hero-title em {
        color: #0E9B9B;
        font-style: normal;
    }

    .about-hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .story-section,
    .cta-section {
        padding: 100px 0;
        background: #fff;
    }

    .story-title,
    .values-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 30px;
    }

    .story-title span {
        color: #0E9B9B;
    }

    .story-content {
        font-size: 1.05rem;
        color: #4B5F70;
        line-height: 1.8;
    }

    .story-content p {
        margin-bottom: 20px;
    }

    .story-img-wrapper {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }

    .story-img-wrapper img {
        width: 100%;
        height: auto;
        display: block;
    }

    .values-section {
        padding: 100px 0;
        background: #F6FAFA;
    }

    .values-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .value-card {
        background: #fff;
        padding: 50px 30px;
        border-radius: 12px;
        text-align: center;
        transition: all 0.4s ease;
        border-bottom: 4px solid transparent;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(14, 155, 155, 0.1);
        border-bottom-color: #0E9B9B;
    }

    .value-icon {
        font-size: 3.5rem;
        color: #0E9B9B;
        margin-bottom: 25px;
    }

    .value-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 15px;
    }

    .value-desc {
        color: #4B5F70;
        line-height: 1.6;
    }

    .metrics-section {
        padding: 80px 0;
        background: #0F2044;
        color: #fff;
    }

    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        text-align: center;
    }

    .metric-number {
        font-size: 3.5rem;
        font-weight: 900;
        color: #0E9B9B;
        margin-bottom: 10px;
    }

    .metric-label {
        font-size: 1.1rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .cta-section {
        text-align: center;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 25px;
    }

    .cta-desc {
        font-size: 1.1rem;
        color: #4B5F70;
        max-width: 600px;
        margin: 0 auto 40px;
    }

    .btn-primary-custom {
        display: inline-block;
        padding: 15px 40px;
        background: #0E9B9B;
        color: #fff;
        font-weight: 700;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background: #086b6b;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(14, 155, 155, 0.3);
    }

    @media (max-width: 991px) {

        .values-grid,
        .metrics-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767px) {

        .values-grid,
        .metrics-grid {
            grid-template-columns: 1fr;
        }

        .story-title {
            font-size: 1.8rem;
        }

        .about-hero-title {
            font-size: 2.5rem;
        }
    }
</style>
@endpush

@section('content')
<section class="about-hero">
    <div class="container">
        <h1 class="about-hero-title">
            About <em>Roydon MEP</em> – Top Hospitality &amp; Healthcare Contractors
        </h1>
        <p class="about-hero-subtitle">
            Engineering the infrastructure of modern healthcare and luxury hospitality.
            We deliver high-velocity MEP solutions for hospitals, five-star hotels and luxury resorts.
        </p>
    </div>
</section>

@if($storySection)

<section class="story-section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-5 mb-lg-0 wow fadeInLeft" data-wow-delay="0.1s">

                <div class="story-content pr-lg-5">

                    {{-- Dynamic Title --}}
                    <h2 class="story-title">
                        {!! $storySection->title !!}
                    </h2>

                    {{-- Dynamic Description --}}
                    {!! $storySection->description !!}

                </div>

            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">

                <div class="story-img-wrapper">

                    @if($storySection->image)

                    <img
                        src="{{ asset('storage/' . $storySection->image) }}"
                        alt="{{ strip_tags($storySection->title) }}">

                    @endif

                </div>

            </div>

        </div>
    </div>
</section>

@endif

<section class="values-section">
    <div class="container">
        <div class="values-header wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="values-title">Why Hospitals Choose Us</h2>
            <p style="color: #4B5F70; font-size: 1.1rem;">
                Our execution philosophy is built on three uncompromising pillars.
            </p>
        </div>

        <div class="values-grid">

            @foreach($companyValues as $value)

            <div
                class="value-card wow fadeInUp"
                data-wow-delay="{{ 0.2 + ($loop->index * 0.1) }}s">

                <div class="value-icon">
                    @if($loop->index === 0)
                    <i class="fa-light fa-shield-check"></i>
                    @elseif($loop->index === 1)
                    <i class="fa-light fa-rocket-launch"></i>
                    @elseif($loop->index === 2)
                    <i class="fa-light fa-users-gear"></i>
                    @endif
                </div>

                <h3 class="value-title">
                    {{ $value->title }}
                </h3>

                <p class="value-desc">
                    {{ $value->description }}
                </p>

            </div>

            @endforeach

        </div>
    </div>
</section>


<section class="metrics-section">
    <div class="container">
        <div class="metrics-grid">

            @foreach($metrics as $metric)

            <div
                class="metric-item wow fadeInUp"
                data-wow-delay="{{ 0.1 + ($loop->index * 0.1) }}s">

                <div class="metric-number">
                    {{ $metric->number }}
                </div>

                <div class="metric-label">
                    {{ $metric->label }}
                </div>

            </div>

            @endforeach

        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container wow fadeInUp" data-wow-delay="0.1s">
        <h2 class="cta-title">Ready to build your next healthcare facility?</h2>
        <p class="cta-desc">
            Partner with the MEP contractor that understands clinical excellence.
            Let's discuss your project scope and timelines.
        </p>
        <a href="{{ route('contact') }}" class="btn-primary-custom">Contact Our Team</a>
    </div>
</section>
@endsection