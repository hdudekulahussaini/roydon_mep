@extends('layouts.frontend.app')

@section('content')
    <!-- main-area -->
    <main>
        <!-- slider-area -->
        @if ($banner)
            <section id="home" class="slider-area fix p-relative">

                <div class="slider-active2 pl-50 pr-50">
                    <div class="single-slider slider-bg d-flex align-items-center img"
                        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{ asset('storage/' . $banner->background_image) }}); background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="row ">
                                <div class="col-lg-7 col-md-12">
                                    <div class="slider-content s-slider-content mt-80">
                                        @php
                                            $rawTitle = e($banner->title);
                                            if (str_contains($rawTitle, '{') && str_contains($rawTitle, '}')) {
                                                $formattedTitle = preg_replace('/\{([^}]+)\}/', '<span>$1</span>', $rawTitle);
                                            } else {
                                                $formattedTitle = preg_replace('/\b(MEP)\b/i', '<span>$1</span>', $rawTitle);
                                            }
                                        @endphp
                                        <h2 class="">{!! $formattedTitle !!}</h2>
                                        <p data-animation="fadeInUp" data-delay=".4s">{{ $banner->description }}</p>
                                        <div class="slider-btn mt-50" data-animation="fadeInUp" data-delay=".4s">
                                            <a href="{{ route('services.hvac') }}" class="btn mr-15">Explore Services <i
                                                    class="fa-solid fa-arrow-right"></i></a>
                                            <a href="{{ route('projects') }}" class="btn ss-btn active"
                                                style="background: transparent; border: 2px solid #0E9B9B; color: #fff;">View
                                                Projects <i class="fa-light fa-building"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Horizontal ISO Badges right above marquee -->
                        <div class="hero-iso-badges-horizontal d-none d-lg-flex" data-animation="fadeInUp" data-delay=".5s"
                            style="position: absolute; bottom: 110px; right: 50px; z-index: 10; display: flex; gap: 20px; align-items: flex-start;">
                            @if ($banner->iso_9001_image)
                                <div class="iso-badge-wrapper text-center">
                                    <img src="{{ asset('storage/' . $banner->iso_9001_image) }}" alt="{{ $banner->iso_9001_title }}"
                                        class="iso-cert-img mb-10">
                                    <span class="iso-cert-name">{!! str_replace('|', '<br>', e($banner->iso_9001_title)) !!}</span>
                                </div>
                            @endif
                            @if ($banner->iso_14001_image)
                                <div class="iso-badge-wrapper text-center">
                                    <img src="{{ asset('storage/' . $banner->iso_14001_image) }}" alt="{{ $banner->iso_14001_title }}"
                                        class="iso-cert-img iso-cert-middle mb-10">
                                    <span class="iso-cert-name">{!! str_replace('|', '<br>', e($banner->iso_14001_title)) !!}</span>
                                </div>
                            @endif
                            @if ($banner->iso_45001_image)
                                <div class="iso-badge-wrapper text-center">
                                    <img src="{{ asset('storage/' . $banner->iso_45001_image) }}" alt="{{ $banner->iso_45001_title }}"
                                        class="iso-cert-img mb-10">
                                    <span class="iso-cert-name">{!! str_replace('|', '<br>', e($banner->iso_45001_title)) !!}</span>
                                </div>
                            @endif
                        </div>

                        @if ($banner->specializations && count($banner->specializations) > 0)
                            <div class="hero-marquee-container" data-animation="fadeInUp" data-delay=".6s"
                                style="position: absolute; bottom: 40px; left: 0; width: 100%; z-index: 9;">
                                <div class="hero-tags">
                                    {{-- Render tags twice for seamless scrolling marquee --}}
                                    @foreach (array_merge($banner->specializations, $banner->specializations) as $spec)
                                        @php
                                            $tag = strtolower($spec);
                                            $icon = 'fa-circle-check'; // Default fallback icon

                                            if (str_contains($tag, 'hvac') || str_contains($tag, 'fan')) {
                                                $icon = 'fa-fan';
                                            } elseif (str_contains($tag, 'gas') || str_contains($tag, 'mgps')) {
                                                $icon = 'fa-lungs';
                                            } elseif (str_contains($tag, 'icu') || str_contains($tag, 'heart')) {
                                                $icon = 'fa-heart-pulse';
                                            } elseif (str_contains($tag, 'clean') || str_contains($tag, 'sterile')) {
                                                $icon = 'fa-sparkles';
                                            } elseif (str_contains($tag, 'nabh') || str_contains($tag, 'compliance')) {
                                                $icon = 'fa-certificate';
                                            } elseif (str_contains($tag, 'cath') || str_contains($tag, 'x-ray')) {
                                                $icon = 'fa-x-ray';
                                            }
                                        @endphp
                                        <span class="hero-tag"><i class="fa-light {{ $icon }}"></i> {{ $spec }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
        <!-- slider-area-end -->
         
        <!-- premium-stats-area -->
        @if ($stats && $stats->isNotEmpty())
            <section class="premium-stats-area">
                <div class="container">
                    <div class="stats-wrapper">
                        <div class="row">
                            @php
                                $defaultIcons = [
                                    'fa-light fa-building',
                                    'fa-light fa-clock',
                                    'fa-light fa-chart-area',
                                    'fa-light fa-headset'
                                ];
                            @endphp

                            @foreach ($stats as $index => $stat)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="single-premium-stat wow fadeInUp" data-delay=".{{ ($index + 1) * 2 }}s">
                                        <div class="stat-icon">
                                            <i class="{{ $defaultIcons[$index] ?? 'fa-light fa-circle-check' }}"></i>
                                        </div>
                                        <div class="stat-content">
                                            <h3 class="stat-count">{{ $stat->count }}</h3>
                                            <h4 class="stat-title">{{ $stat->title }}</h4>
                                            <p class="stat-desc">{{ $stat->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- premium-stats-area-end -->

        <!-- hospital-civil-services-area -->
        @if ($civilServices && $civilServices->isNotEmpty())
            <section class="hospital-civil-services-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="civil-section-title">
                                <span class="civil-sub-heading">HOSPITAL CIVIL SERVICES</span>
                                <h2 class="civil-elegant-heading">Complete civil & structural works built for hospital-grade
                                    precision</h2>
                                <p class="civil-section-desc">From foundation to finish — structural civil works engineered
                                    and executed to hospital tolerances, coordinated with MEP from day one.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($civilServices as $index => $service)
                            <div class="col-lg-4 col-md-6">
                                <div class="civil-service-card wow fadeInUp" data-delay=".{{ ($index % 6) + 2 }}s">
                                    <div class="civil-card-header">
                                        <div class="civil-icon-wrapper icon-bg-{{ ($index % 6) + 1 }}">
                                            <i class="{{ $service->icon }}"></i>
                                        </div>
                                        <h3>{{ $service->title }}</h3>
                                    </div>
                                    <p>{{ $service->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- hospital-civil-services-area-end -->

        
        <!-- services-area -->
        <section class="services-area p-relative fix">
            <div class="container-box pt-50 pb-50" style="background-color: #004250;">
                <div class="animations-01"><img src="{{ asset('assets/img/bg/an-img-02.webp') }}"
                        alt="Roydon MEP - Turnkey MEP Contractors in Hyderabad"></div>
                <div class="container">
                    <div class="row justify-content-center mb-55">
                        <div class="col-lg-6 col-md-12">
                            <div class="section-title text-center wow fadeInDown animated" data-animation="fadeInDown"
                                data-delay=".4s">

                                <h2 class="">MEP Turnkey Contractors</h2>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="row-gap: 20px;">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ asset('assets/img/bg/hvac_service.webp') }}"
                                            alt="Hospital HVAC Contractors Hyderabad by Roydon MEP">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div><i class="fa-light fa-fan"
                                                            style="font-size: 45px; color: #0E9B9B;"></i></div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.hvac') }}">Hospital HVAC Systems</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p>OT laminar airflow, ICU pressure cascades, HEPA H14 filtration, AHU
                                                installation to ASHRAE 170 & NABH.</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.hvac') }}" class="chevron-button">Read More <i
                                                        class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ asset('assets/img/bg/mgps_service.webp') }}"
                                            alt="Medical Gas Pipeline Installation by Hospital MEP Contractors">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div><i class="fa-light fa-lungs"
                                                            style="font-size: 45px; color: #0E9B9B;"></i></div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.medical-gas') }}">Medical Gas Pipeline
                                                            (MGPS)</a></h3>
                                                </div>
                                            </div>
                                            <p>Complete MGPS — O₂, vacuum, N₂O, medical air. Tested, validated, HTM
                                                02-01 & NFPA 99 compliant.</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.medical-gas') }}" class="chevron-button">Read More <i
                                                        class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ asset('assets/img/bg/electrical_service.webp') }}"
                                            alt="Hospital Electrical Engineering Services and Turnkey Solutions">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div><i class="fa-light fa-bolt"
                                                            style="font-size: 45px; color: #0E9B9B;"></i></div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.electrical') }}">Hospital Electrical
                                                            Systems</a></h3>
                                                </div>
                                            </div>
                                            <p>HT/LT distribution, UPS, DG, isolation transformers for OT/ICU, nurse
                                                call and ELV systems.</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.electrical') }}" class="chevron-button">Read
                                                    More <i class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ asset('assets/img/bg/plumbing_service.webp') }}"
                                            alt="Hospital Plumbing Contractors for Healthcare Infrastructure">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div><i class="fa-light fa-faucet-drip"
                                                            style="font-size: 45px; color: #0E9B9B;"></i></div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.plumbing') }}">Plumbing & Sanitation</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p>Medical-grade plumbing, hot/cold water, WTP, STP, ETP, Legionella control
                                                and CSSD supply.</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.plumbing') }}" class="chevron-button">Read More
                                                    <i class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ asset('assets/img/bg/fire_service.webp') }}"
                                            alt="Hospital Fire Fighting Contractors and Fire Safety Systems">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div><i class="fa-light fa-fire-extinguisher"
                                                            style="font-size: 45px; color: #0E9B9B;"></i></div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.fire-fighting') }}">Fire Fighting &
                                                            Life Safety</a></h3>
                                                </div>
                                            </div>
                                            <p>Sprinkler, hydrant, alarm, FM200 suppression, smoke management. NBC Part
                                                4 & NFPA compliant.</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.fire-fighting') }}" class="chevron-button">Read
                                                    More <i class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ asset('assets/img/bg/turnkey_service.webp') }}"
                                            alt="Turnkey MEP Solutions for Healthcare and Commercial Buildings">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div><i class="fa-light fa-hospital"
                                                            style="font-size: 45px; color: #0E9B9B;"></i></div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.turnkey') }}">Turnkey Hospital MEP</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p>Single-point MEP contracting — design to handover. No sub-bids.
                                                NABH-ready. 24/7 warranty.</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.turnkey') }}" class="chevron-button">Read More <i
                                                        class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- services-area-end -->
        <!-- hospital-specialisations-area -->
        @if ($specialisations && $specialisations->isNotEmpty())
            <section class="hospital-specialisations-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="spec-section-title">
                                <span class="spec-sub-heading">HOSPITAL SPECIALISATIONS</span>
                                <h2 class="spec-elegant-heading">Every critical area of the modern hospital</h2>
                                <p class="spec-section-desc">OT to clean room, ICU to cath lab — each area demands
                                    specialist knowledge. We have executed them all.</p>
                            </div>
                        </div>
                    </div>
                    <div class="spec-grid-container">
                        <div class="row">
                            @foreach ($specialisations as $index => $spec)
                                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                    <div class="spec-item wow fadeInUp" data-delay=".{{ ($index % 8) + 2 }}s">
                                        <div class="spec-card-header">
                                            <i class="{{ $spec->icon }} icon-color-{{ ($index % 8) + 1 }}"></i>
                                            <h4>{{ $spec->title }}</h4>
                                        </div>
                                        <p>{{ $spec->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @else
            <!-- Fallback Static Code -->
            <section class="hospital-specialisations-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="spec-section-title">
                                <span class="spec-sub-heading">HOSPITAL SPECIALISATIONS</span>
                                <h2 class="spec-elegant-heading">Every critical area of the modern hospital</h2>
                                <p class="spec-section-desc">OT to clean room, ICU to cath lab — each area demands
                                    specialist knowledge. We have executed them all.</p>
                            </div>
                        </div>
                    </div>
                    <div class="spec-grid-container">
                        <div class="row">
                            <!-- Item 1 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".2s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-microscope icon-color-1"></i>
                                        <h4>Operation Theatre</h4>
                                    </div>
                                    <p>Laminar airflow, HEPA H14, isolated power, NABH validated commissioning.</p>
                                </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".3s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-hospital-user icon-color-2"></i>
                                        <h4>ICU & NICU</h4>
                                    </div>
                                    <p>Bed-head units, MGPS outlets, UPS-backed power, HEPA H13 HVAC.</p>
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".4s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-heart-pulse icon-color-3"></i>
                                        <h4>Cath Lab</h4>
                                    </div>
                                    <p>Radiation-shielded penetrations, isolated power, precision cooling.</p>
                                </div>
                            </div>
                            <!-- Item 4 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".5s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-broom icon-color-4"></i>
                                        <h4>Clean Rooms</h4>
                                    </div>
                                    <p>ISO Class 5–8 validated ACH, pressure differentials, HEPA H14.</p>
                                </div>
                            </div>
                            <!-- Item 5 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".6s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-telescope icon-color-5"></i>
                                        <h4>Diagnostic Centres</h4>
                                    </div>
                                    <p>MRI/CT cooling, quench pipe, EMF shielding, UPS conditioning.</p>
                                </div>
                            </div>
                            <!-- Item 6 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".7s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-vial icon-color-6"></i>
                                        <h4>CSSD</h4>
                                    </div>
                                    <p>Steam supply, 93°C HWS, validated HVAC, sterile drainage.</p>
                                </div>
                            </div>
                            <!-- Item 7 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".8s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-industry icon-color-7"></i>
                                        <h4>Modular OT</h4>
                                    </div>
                                    <p>Prefab OT MEP, factory-coordinated, NABH-ready in 8–12 weeks.</p>
                                </div>
                            </div>
                            <!-- Item 8 -->
                            <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                                <div class="spec-item wow fadeInUp" data-delay=".9s">
                                    <div class="spec-card-header">
                                        <i class="fa-light fa-shield-check icon-color-8"></i>
                                        <h4>NABH Projects</h4>
                                    </div>
                                    <p>Entry & Full Accreditation, pre-assessment audit support.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- hospital-specialisations-area-end -->


        <!-- why-hoose-us-area -->
        @if ($whyChooseUs)
            <section class="pt-120 pb-90 p-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-title mb-30 wow fadeInDown animated" data-delay=".4s">
                                <div class="sub-title">
                                    <i class="fa-light fa-bolt"></i> {{ $whyChooseUs->sub_title }} <i class="fa-light fa-bolt"></i>
                                </div>
                                <h2 class="">
                                    {!! str_replace(['Roydon MEP', 'Suvih Engineering'], ['<span>Roydon MEP</span>', '<span>Suvih Engineering</span>'], e($whyChooseUs->title)) !!}
                                </h2>
                            </div>
                            <div class="why-choose-text">
                                <div class="img-custom-anim-left wow fadeInLeft img mb-30">
                                    <img src="{{ str_contains($whyChooseUs->image, 'assets/') ? asset($whyChooseUs->image) : asset('storage/' . $whyChooseUs->image) }}"
                                        alt="{{ $whyChooseUs->title }}"
                                        style="border-radius: 15px; width: 100%; max-height: 400px; object-fit: cover; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <p>{{ $whyChooseUs->description }}</p>
                                    </div>
                                    <div class="col-lg-4"> <a href="{{ route('contact') }}" class="btn">Contact Us <i
                                                class="fa-light fa-bolt"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            @if ($whyChooseUsItems && $whyChooseUsItems->isNotEmpty())
                                <div class="row timeline">
                                    @foreach ($whyChooseUsItems as $index => $item)
                                        <div class="col-lg-12 col-md-12">
                                            <div class="services-02-item mb-20 wow fadeInDown animated" data-delay=".4s">
                                                <div class="services-02-thumb">
                                                    <span></span>
                                                </div>
                                                <div class="services-02-content">
                                                    <h3>{{ $item->title }}</h3>
                                                    <p>{{ $item->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @else
            <!-- Fallback Static Code -->
            <section class="pt-120 pb-90 p-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-title mb-30 wow fadeInDown animated" data-delay=".4s">
                                <div class="sub-title">
                                    <i class="fa-light fa-bolt"></i> Why Choose Us <i class="fa-light fa-bolt"></i>
                                </div>
                                <h2 class="">
                                    Why <span>Roydon MEP</span> Contracting
                                </h2>
                            </div>
                            <div class="why-choose-text">
                                <div class="img-custom-anim-left wow fadeInLeft img mb-30">
                                    <img src="{{ asset('assets/img/bg/electrical_service.webp') }}"
                                        alt="Hospital Electrical Engineering Services and Turnkey Solutions"
                                        style="border-radius: 15px; width: 100%; max-height: 400px; object-fit: cover; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <p>We design and execute to NABH and international standards from day one, ensuring
                                            your healthcare facility is fully compliant and safe.</p>
                                    </div>
                                    <div class="col-lg-4"> <a href="{{ route('contact') }}" class="btn">Contact Us <i
                                                class="fa-light fa-bolt"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row timeline">
                                <div class="col-lg-12 col-md-12">
                                    <div class="services-02-item mb-20 wow fadeInDown animated" data-delay=".4s">
                                        <div class="services-02-thumb">
                                            <span></span>
                                        </div>
                                        <div class="services-02-content">
                                            <h3>One-Time Completion</h3>
                                            <p>Single-agency accountability from civil works through MEP handover. No
                                                multi-vendor coordination, no finger-pointing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="services-02-item mb-20 wow fadeInDown animated" data-delay=".4s">
                                        <div class="services-02-thumb">
                                            <span></span>
                                        </div>
                                        <div class="services-02-content">
                                            <h3>In-House Workforce</h3>
                                            <p>Direct-employed execution teams, not subcontracted labour. Full control over
                                                quality and timelines.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="services-02-item mb-20  wow fadeInDown animated" data-delay=".4s">
                                        <div class="services-02-thumb">
                                            <span></span>
                                        </div>
                                        <div class="services-02-content">
                                            <h3>In-House Design + BIM</h3>
                                            <p>Integrated design capability via SUVIH Engineering, backed by BIM-driven
                                                coordination — eliminating design-to-execution handoff loss and clash
                                                rework.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="services-02-item mb-20  wow fadeInDown animated" data-delay=".4s">
                                        <div class="services-02-thumb">
                                            <span></span>
                                        </div>
                                        <div class="services-02-content">
                                            <h3>Hospital-Only Expertise</h3>
                                            <p>Purpose-built for healthcare: NABH, NFPA, ASHRAE 170, HTM 02-01 compliance,
                                                medical gas systems, OT/ICU-grade HVAC.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="services-02-item mb-20 wow fadeInDown animated" data-delay=".4s">
                                        <div class="services-02-thumb">
                                            <span></span>
                                        </div>
                                        <div class="services-02-content">
                                            <h3>Zero-Defects Track Record</h3>
                                            <p>Proven on Neelima Hospitals: 1,300 beds, 800,000 sq ft, delivered in 70 days,
                                                zero defects at handover.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="services-02-item mb-20 wow fadeInDown animated" data-delay=".4s">
                                        <div class="services-02-thumb">
                                            <span></span>
                                        </div>
                                        <div class="services-02-content">
                                            <h3>ISO-Certified Quality Systems</h3>
                                            <p>Process discipline backed by certification, not just claimed.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- why-hoose-us-area-end -->

        <!-- projects-area -->
        @if ($projects && $projects->isNotEmpty())
            <section class="projects-area pt-90 pb-90 p-relative fix" style="background-color: #f7f6fb;">
                <div class="container">
                    <div class="row justify-content-center mb-40">
                        <div class="col-lg-6 col-md-12">
                            <div class="section-title text-center wow fadeInDown animated" data-animation="fadeInDown"
                                data-delay=".4s">
                                <h2 class="">Our <span>Recent</span> Projects</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row services-active">
                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6">
                                <div class="project-card text-center mb-30"
                                    style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                    <img src="{{ str_contains($project->image, 'assets/') ? asset($project->image) : asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                        style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                    <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">{{ $project->title }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <!-- Fallback Static Code -->
            <section class="projects-area pt-90 pb-90 p-relative fix" style="background-color: #f7f6fb;">
                <div class="container">
                    <div class="row justify-content-center mb-40">
                        <div class="col-lg-6 col-md-12">
                            <div class="section-title text-center wow fadeInDown animated" data-animation="fadeInDown"
                                data-delay=".4s">
                                <h2 class="">Our <span>Recent</span> Projects</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row services-active">
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/neelima_hospital.webp') }}" alt="Neelima Hospital"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Neelima
                                    Hospital</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/landmark_hospital.webp') }}" alt="Landmark Hospital"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Landmark
                                    Hospital</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/trust_hospital.webp') }}" alt="Trust Hospital"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Trust
                                    Hospital</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/hope_hospital.webp') }}" alt="Hope Hospital"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Hope
                                    Hospital</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/corporate_office.webp') }}" alt="Corporate Office"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Corporate
                                    Office</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/n_square_building.webp') }}" alt="N Square Building"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">N Square
                                    Building</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card text-center mb-30"
                                style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                                <img src="{{ asset('assets/img/projects/hotel_project.webp') }}" alt="Hotel Project"
                                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Hotel
                                    Project</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- projects-area-end -->

        <!-- faq-area start -->
        @if ($faqs && $faqs->isNotEmpty())
            @php
                $halfCount = ceil($faqs->count() / 2);
                $leftFaqs = $faqs->take($halfCount);
                $rightFaqs = $faqs->slice($halfCount);
            @endphp
            <section class="faq pt-90 pb-90 p-relative fix">
                <div class="container">
                    <div class="row justify-content-center mb-40">
                        <div class="col-lg-8 col-md-12 text-center">
                            <div class="section-title wow fadeInDown animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <div class="sub-title"> <i class="fa-light fa-bolt"></i> frequently asked question <i class="fa-light fa-bolt"></i></div>
                                <h2 class="">Solving Your <span>Doubts,</span> <span>One</span> Question at a Time</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-6 col-md-12 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="faq-wrap pr-15">
                                <div class="accordion" id="accordionExampleLeft">
                                    @foreach ($leftFaqs as $faq)
                                        <div class="card">
                                            <div class="card-header" id="headingLeft{{ $faq->id }}">
                                                <h2 class="mb-0">
                                                    <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLeft{{ $faq->id }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseLeft{{ $faq->id }}" class="collapse" data-bs-parent="#accordionExampleLeft">
                                                <div class="card-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="col-lg-6 col-md-12 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="faq-wrap pl-15">
                                <div class="accordion" id="accordionExampleRight">
                                    @foreach ($rightFaqs as $faq)
                                        <div class="card">
                                            <div class="card-header" id="headingRight{{ $faq->id }}">
                                                <h2 class="mb-0">
                                                    <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRight{{ $faq->id }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseRight{{ $faq->id }}" class="collapse" data-bs-parent="#accordionExampleRight">
                                                <div class="card-body">
                                                    {{ $faq->answer }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <!-- Fallback Static Code -->
            <section class="faq pt-90 pb-90 p-relative fix">
                <div class="container">
                    <div class="row justify-content-center mb-40">
                        <div class="col-lg-8 col-md-12 text-center">
                            <div class="section-title wow fadeInDown animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <div class="sub-title"> <i class="fa-light fa-bolt"></i> frequently asked question <i class="fa-light fa-bolt"></i></div>
                                <h2 class="">Solving Your <span>Doubts,</span> <span>One</span> Question at a Time</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-6 col-md-12 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="faq-wrap pr-15">
                                <div class="accordion" id="accordionExampleLeft">
                                    <!-- Card 1 -->
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                                    What does "Hospital Civil & MEP Turnkey Contracting" mean?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-bs-parent="#accordionExampleLeft">
                                            <div class="card-body">
                                                It means Roydon handles everything from civil works to full MEP installation — electrical, HVAC, medical gas, fire fighting, plumbing, and ELV systems — under one contract, with one team accountable for the entire build, not a patchwork of subcontractors.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 2 -->
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                                    Do you only work on hospital projects, or general commercial buildings too?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-bs-parent="#accordionExampleLeft">
                                            <div class="card-body">
                                                Roydon specializes exclusively in healthcare facilities. This focus means our teams work to hospital-specific standards (NABH, NFPA, ASHRAE 170, HTM 02-01) as a default, not as an add-on — something general contractors typically can't match.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 3 -->
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                                    Do you handle design in-house?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-bs-parent="#accordionExampleLeft">
                                            <div class="card-body">
                                                Design is handled in-house through ROYDON's own engineering design capability, coordinated with BIM. This keeps design and execution in the same ecosystem, eliminating the handoff losses and clash conflicts common when design and execution are separate vendors.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 4 -->
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                                    What is your track record on project delivery timelines?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-bs-parent="#accordionExampleLeft">
                                            <div class="card-body">
                                                Our flagship project, Neelima Hospitals — 1,300 beds across 800,000 sq ft — was delivered in 70 days with zero defects at handover. Fast-track delivery is a core capability, not an exception.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 5 -->
                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                                    What does "zero-defects handover" actually mean in practice?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-bs-parent="#accordionExampleLeft">
                                            <div class="card-body">
                                                It means the facility is commissioned and ready for clinical use without a punch-list of corrections after handover — critical for hospitals where operational downtime has real cost and patient-safety implications.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="col-lg-6 col-md-12 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="faq-wrap pl-15">
                                <div class="accordion" id="accordionExampleRight">
                                    <!-- Card 6 -->
                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                                    Do you use your own workforce, or subcontracted labour?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseSix" class="collapse" data-bs-parent="#accordionExampleRight">
                                            <div class="card-body">
                                                Roydon uses a directly-employed, in-house execution workforce rather than third-party labour contractors. This gives us direct control over quality, schedule, and site discipline.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 7 -->
                                    <div class="card">
                                        <div class="card-header" id="headingSeven">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                                                    Are you ISO certified?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseSeven" class="collapse" data-bs-parent="#accordionExampleRight">
                                            <div class="card-body">
                                                Yes — our quality management processes are ISO-certified, not just internally claimed.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 8 -->
                                    <div class="card">
                                        <div class="card-header" id="headingEight">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                                                    What MEP disciplines are covered under one contract?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseEight" class="collapse" data-bs-parent="#accordionExampleRight">
                                            <div class="card-body">
                                                Civil Works, Electrical, HVAC, Medical Gas, Fire Fighting, Plumbing & Fire Sanitation, Public Health, and ELV/Low Current systems — all under a single scope and single point of accountability.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 9 -->
                                    <div class="card">
                                        <div class="card-header" id="headingNine">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine">
                                                    Can you handle live/operational hospital fit-outs, or only greenfield builds?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseNine" class="collapse" data-bs-parent="#accordionExampleRight">
                                            <div class="card-body">
                                                Both. We've delivered greenfield turnkey builds as well as fit-outs and phased upgrades within operational or near-operational hospital environments, where sequencing and infection-control protocols are critical.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card 10 -->
                                    <div class="card">
                                        <div class="card-header" id="headingTen">
                                            <h2 class="mb-0">
                                                <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen">
                                                    How do you ensure compliance with medical gas and OT/ICU HVAC standards?
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTen" class="collapse" data-bs-parent="#accordionExampleRight">
                                            <div class="card-body">
                                                These are core specializations, not general capabilities we've added on — our teams are built around NABH/NFPA/ASHRAE 170/HTM 02-01 compliance from design through commissioning.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- faq-area-end -->

        <!-- contact-area -->
        <section class="contact-bg p-relative" id="contact">
            <div class="container-box pt-120 pb-120"
                style="background-image: url({{ asset('assets/img/bg/contact-bg.webp') }}); background-repeat: no-repeat; background-size: cover;">
                <div class="container booking-area">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-12">
                        </div>
                        <div class="col-lg-6 col-md-12 p-relative">
                            <!-- booking-area -->
                            <div class="p-relative">
                                <div class="container">

                                    {{-- Success / Error Flash --}}
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                            <i class="fa-solid fa-circle-check me-2"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                                            Please fix the errors below.
                                            <ul class="mb-0 mt-1 ps-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    <form action="{{ route('enquiries.store') }}" method="POST" class="contact-form pl-50">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="section-title mb-50">
                                                    <div class="sub-title"><i class="fa-light fa-bolt"></i> Get a Quote
                                                        <i class="fa-light fa-bolt"></i>
                                                    </div>
                                                    <h2>
                                                        Tell us about your <span>Project</span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qname" name="name"
                                                        placeholder="Your Name *"
                                                        value="{{ old('name') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qorg" name="organisation"
                                                        placeholder="Hospital / Organisation"
                                                        value="{{ old('organisation') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="email" id="qemail" name="email"
                                                        placeholder="Email Address *"
                                                        value="{{ old('email') }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="tel" id="qphone" name="phone"
                                                        placeholder="Phone / WhatsApp"
                                                        value="{{ old('phone') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qcity" name="city"
                                                        placeholder="Project City"
                                                        value="{{ old('city') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qbeds" name="bed_count"
                                                        placeholder="Bed Count (approx)"
                                                        value="{{ old('bed_count') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <div class="select">
                                                        <select name="project_type" id="qscope">
                                                            <option value="">Project Type</option>
                                                            <option value="New Hospital — Full MEP" {{ old('project_type') == 'New Hospital — Full MEP' ? 'selected' : '' }}>New Hospital — Full MEP</option>
                                                            <option value="Hospital Retrofit / Upgrade" {{ old('project_type') == 'Hospital Retrofit / Upgrade' ? 'selected' : '' }}>Hospital Retrofit / Upgrade</option>
                                                            <option value="OT / ICU / Clean Room MEP" {{ old('project_type') == 'OT / ICU / Clean Room MEP' ? 'selected' : '' }}>OT / ICU / Clean Room MEP</option>
                                                            <option value="Medical Gas Pipeline (MGPS) Only" {{ old('project_type') == 'Medical Gas Pipeline (MGPS) Only' ? 'selected' : '' }}>Medical Gas Pipeline (MGPS) Only</option>
                                                            <option value="HVAC Systems Only" {{ old('project_type') == 'HVAC Systems Only' ? 'selected' : '' }}>HVAC Systems Only</option>
                                                            <option value="Electrical Systems Only" {{ old('project_type') == 'Electrical Systems Only' ? 'selected' : '' }}>Electrical Systems Only</option>
                                                            <option value="Plumbing &amp; Fire Fighting Only" {{ old('project_type') == 'Plumbing & Fire Fighting Only' ? 'selected' : '' }}>Plumbing &amp; Fire Fighting Only</option>
                                                            <option value="NABH Compliance Project" {{ old('project_type') == 'NABH Compliance Project' ? 'selected' : '' }}>NABH Compliance Project</option>
                                                            <option value="Other" {{ old('project_type') == 'Other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <div class="select">
                                                        <select name="expected_programme" id="qtl">
                                                            <option value="">Expected Programme</option>
                                                            <option value="Urgent" {{ old('expected_programme') == 'Urgent' ? 'selected' : '' }}>Urgent — Under 3 months</option>
                                                            <option value="3–6 months" {{ old('expected_programme') == '3–6 months' ? 'selected' : '' }}>3–6 months</option>
                                                            <option value="6–12 months" {{ old('expected_programme') == '6–12 months' ? 'selected' : '' }}>6–12 months</option>
                                                            <option value="12–24 months" {{ old('expected_programme') == '12–24 months' ? 'selected' : '' }}>12–24 months</option>
                                                            <option value="Planning stage" {{ old('expected_programme') == 'Planning stage' ? 'selected' : '' }}>Planning stage — TBC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <div class="select-2">
                                                        <textarea name="details" id="qdet" cols="30" rows="10"
                                                            placeholder="Project Details &amp; Requirements">{{ old('details') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="slider-btn">
                                                    <button type="submit" class="btn ss-btn" data-animation="fadeInRight"
                                                        data-delay=".8s"> Submit Enquiry <i
                                                            class="fa-light fa-bolt"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <!-- booking-area-end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
@endsection