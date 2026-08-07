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
        @else
            <section id="home" class="slider-area fix p-relative">
                <div class="slider-active2 pl-50 pr-50">
                    <div class="single-slider slider-bg d-flex align-items-center img"
                        style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url({{ asset('assets/img/slider/hospital_mep_hero.webp') }}); background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="row ">

                                <div class="col-lg-7 col-md-12">
                                    <div class="slider-content s-slider-content mt-80">
                                        <h2 class="">Hospital Civil & <span>MEP</span> Turnkey Contractors</h2>
                                        <p data-animation="fadeInUp" data-delay=".4s">End-to-end Civil & MEP contracting for
                                            hospitals & healthcare facilities — All civil works, OT HVAC, ICU systems,
                                            Medical Gas Pipelines, Electrical, Plumbing and Fire Fighting with BIM and NABH
                                            compliant. Zero defect handovers.</p>
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
                            <div class="iso-badge-wrapper text-center">
                                <img src="{{ asset('assets/img/ISO_certificates/ISO_9001-2015_QMS.png') }}" alt="ISO 9001-2015 QMS"
                                    class="iso-cert-img mb-10">
                                <span class="iso-cert-name">ISO 9001:2015<br>QMS</span>
                            </div>
                            <div class="iso-badge-wrapper text-center">
                                <img src="{{ asset('assets/img/ISO_certificates/ISO_14001-2015_EMS.png') }}" alt="ISO 14001-2015 EMS"
                                    class="iso-cert-img iso-cert-middle mb-10">
                                <span class="iso-cert-name">ISO 14001:2015<br>EMS</span>
                            </div>
                            <div class="iso-badge-wrapper text-center">
                                <img src="{{ asset('assets/img/ISO_certificates/ISO_45001-2018_OHSMS.png') }}" alt="ISO 45001-2018 OHSMS"
                                    class="iso-cert-img mb-10">
                                <span class="iso-cert-name">ISO 45001:2018<br>OHSMS</span>
                            </div>
                        </div>

                        <div class="hero-marquee-container" data-animation="fadeInUp" data-delay=".6s"
                            style="position: absolute; bottom: 40px; left: 0; width: 100%; z-index: 9;">
                            <div class="hero-tags">
                                <span class="hero-tag"><i class="fa-light fa-fan"></i> OT HVAC Systems</span>
                                <span class="hero-tag"><i class="fa-light fa-lungs"></i> Medical Gas (MGPS)</span>
                                <span class="hero-tag"><i class="fa-light fa-heart-pulse"></i> ICU MEP Execution</span>
                                <span class="hero-tag"><i class="fa-light fa-sparkles"></i> Clean Room Contractor</span>
                                <span class="hero-tag"><i class="fa-light fa-certificate"></i> NABH Compliant</span>
                                <span class="hero-tag"><i class="fa-light fa-x-ray"></i> Cath Lab MEP</span>
                                <!-- Duplicate for seamless scroll -->
                                <span class="hero-tag"><i class="fa-light fa-fan"></i> OT HVAC Systems</span>
                                <span class="hero-tag"><i class="fa-light fa-lungs"></i> Medical Gas (MGPS)</span>
                                <span class="hero-tag"><i class="fa-light fa-heart-pulse"></i> ICU MEP Execution</span>
                                <span class="hero-tag"><i class="fa-light fa-sparkles"></i> Clean Room Contractor</span>
                                <span class="hero-tag"><i class="fa-light fa-certificate"></i> NABH Compliant</span>
                                <span class="hero-tag"><i class="fa-light fa-x-ray"></i> Cath Lab MEP</span>
                            </div>
                        </div>
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


        <!-- about-area -->
        <!-- <section class="about-area about-p p-relative pt-120 pb-120">
            <div class="animations-02"><img src="img/bg/an-img-01.webp"
                    alt="Roydon MEP - Turnkey MEP Contractors in Hyderabad"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay=".4s">

                            <div class="about-experience-badge">
                                <h2>15+</h2>
                                <span>Years of<br>Experience</span>
                            </div>
                            <div class="about-image-grid img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                                <img src="img/bg/hvac_service.webp"
                                    alt="Hospital HVAC Contractors Hyderabad by Roydon MEP">
                                <img src="img/bg/mgps_service.webp"
                                    alt="Medical Gas Pipeline Installation by Hospital MEP Contractors">
                                <img src="img/bg/electrical_service.webp"
                                    alt="Hospital Electrical Engineering Services and Turnkey Solutions">
                                <img src="img/bg/turnkey_service.webp"
                                    alt="Turnkey MEP Solutions for Healthcare and Commercial Buildings">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="about-content pl-10 s-about-content wow fadeInLeft animated" data-delay=".4s">
                            <div class="section-title">
                                <div class="sub-title">
                                    <i class="fa-light fa-bolt"></i> About Us <i class="fa-light fa-bolt"></i>
                                </div>
                                <h2 class="">
                                    Trusted <span>Healthcare MEP</span> <span>Execution</span> Specialists
                                </h2>

                            </div>
                            <p>We are a team of MEP experts dedicated to providing high-quality execution for hospitals,
                                ensuring NABH compliance and zero defect handovers.</p>
                            <div class="about-count">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="about-outer">
                                            <div class="icon">
                                                <i class="fa-light fa-fan" style="font-size: 45px; color: #0E9B9B;"></i>
                                            </div>
                                            <div class="text">
                                                <h3>Hospital HVAC</h3>
                                                <p>Specialized OT, ICU, and clean room air conditioning installations.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="about-outer">
                                            <div class="icon">
                                                <i class="fa-light fa-lungs"
                                                    style="font-size: 45px; color: #0E9B9B;"></i>
                                            </div>
                                            <div class="text">
                                                <h3>MGPS Solutions</h3>
                                                <p>Reliable Medical Gas Pipeline Systems and manifold room setups.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-30">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="about.html" class="btn ss-btn smoth-scroll mr-15">Read More <i
                                                class="fa-light fa-bolt"></i></a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="h-phone">
                                            <div class="icon"><i class="fa-light fa-phone-volume"
                                                    style="font-size: 40px; color: #0E9B9B;"></i></div>
                                            <div class="text">
                                                Call
                                                <span><a href="tel:+917330756745"
                                                        style="color: inherit;">+91-7330756745</a></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section> -->
        <!-- about-area-end -->

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
        @endif
        <!-- hospital-specialisations-area-end -->

        <!-- why-hoose-us-area -->
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
                                <div class="col-lg-4"> <a href="contact.html" class="btn">Contact Us <i
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
        <!-- why-hoose-us-area-end -->

        <!-- brand-area -->
        <!-- <section class="brand-area p-relative fix">
            <div class="container pt-60 pb-120" style="border-top:1px solid #0000004d;">
                <div class="row brand-active">
                    <div class="col-xl-2">
                        <div class="single-brand img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                            <img src="img/brand/client-01.png" alt="Roydon MEP Client - Trusted Hospital Building Services Contractors">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                            <img src="img/brand/client-02.png" alt="Roydon MEP Client - Trusted Hospital Building Services Contractors">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                            <img src="img/brand/client-03.png" alt="Roydon MEP Client - Trusted Hospital Building Services Contractors">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                            <img src="img/brand/client-04.png" alt="Roydon MEP Client - Trusted Hospital Building Services Contractors">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                            <img src="img/brand/client-05.png" alt="Roydon MEP Client - Trusted Hospital Building Services Contractors">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand img-custom-anim-left wow fadeInLeft" data-delay=".1s">
                            <img src="img/brand/client-03.png" alt="Roydon MEP Client - Trusted Hospital Building Services Contractors">
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- brand-area-end -->





        <!-- projects-area -->
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
        <!-- projects-area-end -->
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
        <!-- faq-area -->



        <!-- contact-area -->
        <section class="contact-bg p-relative">
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
                                    <form action="#" class="contact-form pl-50">
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
                                                    <input type="text" id="qname" name="qname" placeholder="Your Name *"
                                                        required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qorg" name="qorg"
                                                        placeholder="Hospital / Organisation *" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="email" id="qemail" name="qemail"
                                                        placeholder="Email Address *" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="tel" id="qphone" name="qphone"
                                                        placeholder="Phone / WhatsApp *" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qcity" name="qcity"
                                                        placeholder="Project City *" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <input type="text" id="qbeds" name="qbeds"
                                                        placeholder="Bed Count (approx)">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <div class="select">
                                                        <select name="qscope" id="qscope">
                                                            <option value="">Project Type</option>
                                                            <option value="New Hospital — Full MEP">New Hospital — Full
                                                                MEP</option>
                                                            <option value="Hospital Retrofit / Upgrade">Hospital
                                                                Retrofit / Upgrade</option>
                                                            <option value="OT / ICU / Clean Room MEP">OT / ICU / Clean
                                                                Room MEP</option>
                                                            <option value="Medical Gas Pipeline (MGPS) Only">Medical Gas
                                                                Pipeline (MGPS) Only</option>
                                                            <option value="HVAC Systems Only">HVAC Systems Only</option>
                                                            <option value="Electrical Systems Only">Electrical Systems
                                                                Only</option>
                                                            <option value="Plumbing & Fire Fighting Only">Plumbing &
                                                                Fire Fighting Only</option>
                                                            <option value="NABH Compliance Project">NABH Compliance
                                                                Project</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <div class="select">
                                                        <select name="qtl" id="qtl">
                                                            <option value="">Expected Programme</option>
                                                            <option value="Urgent">Urgent — Under 3 months</option>
                                                            <option value="3–6 months">3–6 months</option>
                                                            <option value="6–12 months">6–12 months</option>
                                                            <option value="12–24 months">12–24 months</option>
                                                            <option value="Planning stage">Planning stage — TBC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="contact-field p-relative c-name mb-30">
                                                    <div class="select-2">
                                                        <textarea name="qdet" id="qdet" cols="30" rows="10"
                                                            placeholder="Project Details & Requirements"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="slider-btn">
                                                    <button class="btn ss-btn" data-animation="fadeInRight"
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