@extends('layouts.frontend.app')

@push('styles')
<style>
    .std-hero {
        position: relative;
        padding: 160px 0 100px;
        background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
        color: #fff;
        text-align: center;
    }

    .std-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: #fff;
    }

    .std-hero-title em {
        color: #0E9B9B;
        font-style: normal;
    }

    .std-hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .std-banner-section {
        padding: 60px 0;
        background: #F6FAFA;
        text-align: center;
    }

    .std-banner-img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .std-section {
        padding: 80px 0 40px;
    }

    .std-section-bg {
        background: #F6FAFA;
    }

    .std-section-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 50px;
        text-align: center;
    }

    .std-section-title span {
        color: #0E9B9B;
    }

    .std-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .std-card {
        background: #fff;
        border: 1px solid #D5E5E5;
        border-radius: 12px;
        padding: 40px 30px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .std-card-bg {
        background: #F6FAFA;
    }

    .std-card:hover {
        border-color: #0E9B9B;
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(14, 155, 155, 0.15);
    }

    .std-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0E9B9B;
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.4s ease;
        z-index: -1;
    }

    .std-card:hover::before {
        transform: scaleY(1);
    }

    .std-card-icon {
        font-size: 3rem;
        color: #0E9B9B;
        margin-bottom: 25px;
        transition: all 0.4s ease;
    }

    .std-card:hover .std-card-icon {
        color: #fff;
        transform: scale(1.1) rotate(5deg);
    }

    .std-card-abbr {
        font-size: 1.5rem;
        font-weight: 900;
        color: #0F2044;
        margin-bottom: 5px;
        transition: color 0.4s ease;
    }

    .std-card:hover .std-card-abbr {
        color: #fff;
    }

    .std-card-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0E9B9B;
        margin-bottom: 20px;
        line-height: 1.4;
        transition: color 0.4s ease;
    }

    .std-card:hover .std-card-title {
        color: rgba(255, 255, 255, 0.9);
    }

    .std-card-desc {
        font-size: 1rem;
        color: #4B5F70;
        line-height: 1.6;
        margin-bottom: 20px;
        transition: color 0.4s ease;
    }

    .std-card:hover .std-card-desc {
        color: rgba(255, 255, 255, 0.8);
    }

    .std-card-applied {
        font-size: 0.9rem;
        font-weight: 700;
        color: #fff;
        background: #0F2044;
        padding: 5px 12px;
        border-radius: 4px;
        display: inline-block;
        transition: all 0.4s ease;
    }

    .std-card:hover .std-card-applied {
        background: #fff;
        color: #0E9B9B;
    }

    .baseline-section {
        padding: 80px 0;
        background: #0F2044;
        color: #fff;
    }

    .baseline-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 50px;
        text-align: center;
    }

    .baseline-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        text-align: center;
    }

    .baseline-item .icon {
        font-size: 3rem;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
        display: inline-block;
    }

    .baseline-item:hover .icon {
        transform: scale(1.2) translateY(-5px);
    }

    .baseline-item h4 {
        color: #0E9B9B;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .baseline-item p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1rem;
        line-height: 1.6;
    }

    @media (max-width: 991px) {
        .std-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .baseline-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767px) {
        .std-grid {
            grid-template-columns: 1fr;
        }

        .baseline-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- main-area -->
<main>
    <!-- Hero Section -->
    <section class="std-hero">
        <div class="container">
            <h1 class="std-hero-title">Certifications, Standards<br><em>& Compliance</em></h1>
            <p class="std-hero-subtitle">We engineer to the standards that govern hospital operation in India and internationally — not as a checkbox, but as a baseline for every design decision.</p>
        </div>
    </section>

    <!-- Image Banner Section -->
    <section class="std-banner-section">

        <div class="container">

            @if($banner)

            <img
                src="{{ asset('storage/' . $banner->image) }}"
                alt="{{ $banner->alt_text ?? 'Roydon MEP - Standards' }}"
                class="std-banner-img">

            @endif

        </div>

    </section>

    @foreach($standardSections as $section)

    <section class="std-section">

        <div class="container">

            <h2 class="std-section-title">
                {{ $section->title }}
            </h2>


            <div class="std-grid">

                @foreach($section->standards as $standard)

                <div class="std-card">

                    <div class="std-card-icon">

                        @if($standard->icon)
                        <i class="{{ $standard->icon }}"></i>
                        @endif

                    </div>


                    <div class="std-card-abbr">
                        {{ $standard->abbr }}
                    </div>


                    <div class="std-card-title">
                        {{ $standard->title }}
                    </div>


                    <div class="std-card-desc">
                        {{ $standard->description }}
                    </div>


                    @if($standard->applied_to)

                    <div class="std-card-applied">
                        {{ $standard->applied_to }}
                    </div>

                    @endif

                </div>

                @endforeach

            </div>

        </div>

    </section>

    @endforeach

    <!-- Final Section: Why Compliance Is Our Baseline -->
    <section class="baseline-section">
        <div class="container">

            <h2 class="baseline-title">
                Why Compliance Is Our Baseline
            </h2>

            <div class="baseline-grid">

                @forelse($baselines as $baseline)

                <div class="baseline-item">

                    {{-- Static Icon --}}
                    @if($loop->iteration == 1)

                    <div class="icon">🛡️</div>

                    @elseif($loop->iteration == 2)

                    <div class="icon">🔥</div>

                    @elseif($loop->iteration == 3)

                    <div class="icon">⚡</div>

                    @elseif($loop->iteration == 4)

                    <div class="icon">🌡️</div>

                    @else

                    <div class="icon">✓</div>

                    @endif


                    {{-- Dynamic Title --}}
                    <h4>
                        {{ $baseline->title }}
                    </h4>


                    {{-- Dynamic Description --}}
                    <p>
                        {{ $baseline->description }}
                    </p>

                </div>

                @empty

                <div class="text-center w-100">

                    <p>
                        No compliance information available.
                    </p>

                </div>

                @endforelse

            </div>

        </div>
    </section>
</main>
@endsection