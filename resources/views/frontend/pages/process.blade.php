@extends('layouts.frontend.app')

@push('styles')
<style>
    .main-menu ul li a {
        font-size: 17px !important;
    }
</style>

<style>
    .process-hero {
        position: relative;
        padding: 160px 0 100px;
        background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
        color: #fff;
        text-align: center;
    }

    .process-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: #fff;
    }

    .process-hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .timeline-section {
        padding: 100px 0;
        background: #F6FAFA;
        position: relative;
        overflow: hidden;
    }

    .timeline-container {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
    }

    .timeline-container::after {
        content: '';
        position: absolute;
        width: 4px;
        background-color: #0E9B9B;
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -2px;
        border-radius: 4px;
    }

    .timeline-item {
        padding: 10px 40px;
        position: relative;
        background-color: inherit;
        width: 50%;
        margin-bottom: 60px;
    }

    .timeline-item.left {
        left: 0;
    }

    .timeline-item.right {
        left: 50%;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        right: -10px;
        background-color: #fff;
        border: 4px solid #0E9B9B;
        top: 30px;
        border-radius: 50%;
        z-index: 1;
    }

    .timeline-item.right::after {
        left: -10px;
    }

    .timeline-content {
        padding: 40px;
        background-color: white;
        position: relative;
        border-radius: 12px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        border-top: 5px solid #0E9B9B;
        transition: transform 0.3s ease;
    }

    .timeline-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(14, 155, 155, 0.1);
    }

    .tl-num {
        position: absolute;
        top: -20px;
        right: 30px;
        font-size: 4rem;
        font-weight: 900;
        color: rgba(14, 155, 155, 0.1);
        line-height: 1;
    }

    .timeline-item.right .tl-num {
        right: auto;
        left: 30px;
    }

    .tl-icon {
        font-size: 2.5rem;
        color: #0E9B9B;
        margin-bottom: 20px;
    }

    .tl-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .tl-desc {
        font-size: 1.05rem;
        color: #4B5F70;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .tl-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .tl-list li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 12px;
        font-size: 0.95rem;
        color: #0F2044;
        font-weight: 500;
    }

    .tl-list li::before {
        content: '\f00c';
        font-family: "Font Awesome 6 Pro", "Font Awesome 5 Pro", "FontAwesome";
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #0E9B9B;
    }

    @media screen and (max-width: 767px) {
        .timeline-container::after {
            left: 31px;
        }

        .timeline-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
        }

        .timeline-item.right {
            left: 0%;
        }

        .timeline-item.left::after,
        .timeline-item.right::after {
            left: 21px;
        }

        .tl-num {
            right: 20px !important;
            left: auto !important;
        }
    }
</style>


<style>
    .work-section {
        padding: 100px 0;
        background: #fff;
        text-align: center;
    }

    .work-section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: #0F2044;
        margin-bottom: 10px;
    }

    .work-section-subtitle {
        font-size: 1.1rem;
        color: #0E9B9B;
        margin-bottom: 50px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .work-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .work-item {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .work-item img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        display: block;
        transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    .work-item:hover img {
        transform: scale(1.1);
    }

    .work-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(15, 32, 68, 0.9), transparent);
        padding: 30px 20px 20px;
        text-align: left;
        transition: background 0.4s ease;
    }

    .work-item:hover .work-overlay {
        background: linear-gradient(to top, rgba(14, 155, 155, 0.95), rgba(15, 32, 68, 0.4));
    }

    .work-title {
        color: #fff;
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 5px;
        transform: translateY(10px);
        transition: transform 0.4s ease;
    }

    .work-item:hover .work-title {
        transform: translateY(0);
    }

    .work-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.4s ease;
    }

    .work-item:hover .work-subtitle {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 991px) {
        .work-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767px) {
        .work-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- main-area -->
<main>
    <!-- Hero Section -->
    <section class="process-hero">
        <div class="container">
            <h1 class="process-hero-title">The Roydon MEP Process</h1>
            <p class="process-hero-subtitle">From brief to clinical handover — one team, five stages. The engineers who design the systems are on site when they are commissioned.</p>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="container">

            <div class="timeline-container">

                @forelse ($processes as $process)

                @php
                $index = $loop->iteration;
                $side = $loop->even ? 'right' : 'left';
                $animation = $loop->even ? 'fadeInRight' : 'fadeInLeft';

                $features = is_array($process->features)
                ? $process->features
                : json_decode($process->features, true);
                @endphp

                <div class="timeline-item {{ $side }} wow {{ $animation }}"
                    data-wow-delay="0.2s">

                    <div class="timeline-content">

                        {{-- Stage Number --}}
                        <div class="tl-num">
                            {{ str_pad($index, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        {{-- Icon --}}
                        <div class="tl-icon">
                            <i class="{{ $process->icon }}"></i>
                        </div>

                        {{-- Title --}}
                        <h3 class="tl-title">
                            {{ $process->small_title }}:
                            {{ $process->title }}
                        </h3>

                        {{-- Description --}}
                        <p class="tl-desc">
                            {{ $process->description }}
                        </p>

                        {{-- Features --}}
                        @if (!empty($features))

                        <ul class="tl-list">

                            @foreach ($features as $feature)

                            <li>
                                {{ $feature }}
                            </li>

                            @endforeach

                        </ul>

                        @endif

                    </div>

                </div>

                @empty

                <div class="text-center py-5">

                    <p class="text-muted mb-0">
                        No process stages available.
                    </p>

                </div>

                @endforelse

            </div>

        </div>
    </section>

    <!-- Our Work Section -->
    <section class="work-section">
        <div class="container-fluid px-lg-5">
            <h2 class="work-section-title">Our Work, On Site</h2>
            <div class="work-section-subtitle">What our process looks like</div>

            <div class="work-grid">

                @forelse ($works as $work)

                <div
                    class="work-item wow fadeInUp"
                    data-wow-delay="{{ number_format($loop->iteration * 0.1, 1) }}s">

                    <img
                        src="{{ asset('storage/' . $work->image) }}"
                        alt="{{ $work->title }}">

                    <div class="work-overlay">

                        <div class="work-subtitle">
                            {{ $work->subtitle }}
                        </div>

                        <div class="work-title">
                            {{ $work->title }}
                        </div>

                    </div>

                </div>

                @empty

                <div class="text-center w-100 py-5">
                    <p class="text-muted mb-0">
                        No works available.
                    </p>
                </div>

                @endforelse

            </div>
        </div>
    </section>

</main>
@endsection