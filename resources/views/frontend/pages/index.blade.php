@extends('layouts.frontend.app')

@section('content')
    <!-- main-area -->
    <main>
        <!-- slider-area -->
        <section id="home" class="slider-area fix p-relative">

            <div class="slider-active2 pl-50 pr-50">
                <div class="single-slider slider-bg d-flex align-items-center img"
                    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(img/slider/hospital_mep_hero.webp); background-size: cover;">
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
                                        <a href="hospital-hvac-systems.html" class="btn mr-15">Explore Services <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                        <a href="projects.html" class="btn ss-btn active"
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
                            <img src="img/ISO_certificates/ISO_9001-2015_QMS.png" alt="ISO 9001-2015 QMS"
                                class="iso-cert-img mb-10">
                            <span class="iso-cert-name">ISO 9001:2015<br>QMS</span>
                        </div>
                        <div class="iso-badge-wrapper text-center">
                            <img src="img/ISO_certificates/ISO_14001-2015_EMS.png" alt="ISO 14001-2015 EMS"
                                class="iso-cert-img iso-cert-middle mb-10">
                            <span class="iso-cert-name">ISO 14001:2015<br>EMS</span>
                        </div>
                        <div class="iso-badge-wrapper text-center">
                            <img src="img/ISO_certificates/ISO_45001-2018_OHSMS.png" alt="ISO 45001-2018 OHSMS"
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
        <!-- slider-area-end -->
        <!-- premium-stats-area -->
        <section class="premium-stats-area">
            <div class="container">
                <div class="stats-wrapper">
                    <div class="row">
                        <!-- Stat 1 -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-premium-stat wow fadeInUp" data-delay=".2s">
                                <div class="stat-icon"><i class="fa-light fa-building"></i></div>
                                <div class="stat-content">
                                    <h3 class="stat-count">8+</h3>
                                    <h4 class="stat-title">Projects</h4>
                                    <p class="stat-desc">Delivered 2018–2026</p>
                                </div>
                            </div>
                        </div>
                        <!-- Stat 2 -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-premium-stat wow fadeInUp" data-delay=".4s">
                                <div class="stat-icon"><i class="fa-light fa-clock"></i></div>
                                <div class="stat-content">
                                    <h3 class="stat-count">0</h3>
                                    <h4 class="stat-title">Missed Handovers</h4>
                                    <p class="stat-desc">On schedule. On spec. Every time.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Stat 3 -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-premium-stat wow fadeInUp" data-delay=".6s">
                                <div class="stat-icon"><i class="fa-light fa-chart-area"></i></div>
                                <div class="stat-content">
                                    <h3 class="stat-count">3.4M</h3>
                                    <h4 class="stat-title">Sq.Ft Engineered</h4>
                                    <p class="stat-desc">Healthcare & Commercial</p>
                                </div>
                            </div>
                        </div>
                        <!-- Stat 4 -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-premium-stat wow fadeInUp" data-delay=".8s">
                                <div class="stat-icon"><i class="fa-light fa-headset"></i></div>
                                <div class="stat-content">
                                    <h3 class="stat-count">24/7</h3>
                                    <h4 class="stat-title">Warranty Response</h4>
                                    <p class="stat-desc">Our team, our number.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- premium-stats-area-end -->

        <!-- hospital-civil-services-area -->
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
                    <!-- Card 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="civil-service-card wow fadeInUp" data-delay=".2s">
                            <div class="civil-card-header">
                                <div class="civil-icon-wrapper icon-bg-1">
                                    <i class="fa-light fa-building-columns"></i>
                                </div>
                                <h3>Structural & RCC Works</h3>
                            </div>
                            <p>Foundations, columns, beams, slabs and RCC framework engineered for hospital loads,
                                vibration control and future vertical expansion.</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="civil-service-card wow fadeInUp" data-delay=".3s">
                            <div class="civil-card-header">
                                <div class="civil-icon-wrapper icon-bg-2">
                                    <i class="fa-light fa-hospital"></i>
                                </div>
                                <h3>Hospital Building Construction</h3>
                            </div>
                            <p>Full shell & core construction — masonry, blockwork, plastering and structural finishing
                                for new hospital buildings and additions.</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="civil-service-card wow fadeInUp" data-delay=".4s">
                            <div class="civil-card-header">
                                <div class="civil-icon-wrapper icon-bg-3">
                                    <i class="fa-light fa-palette"></i>
                                </div>
                                <h3>Interior Fit-Out & Finishes</h3>
                            </div>
                            <p>Hospital-grade flooring, false ceilings, wall finishes and partitions — seamless,
                                cleanable surfaces built for infection control.</p>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="civil-service-card wow fadeInUp" data-delay=".5s">
                            <div class="civil-card-header">
                                <div class="civil-icon-wrapper icon-bg-4">
                                    <i class="fa-light fa-road-barrier"></i>
                                </div>
                                <h3>Site Development & Earthwork</h3>
                            </div>
                            <p>Excavation, grading, site levelling and external development works, sequenced to keep MEP
                                and structural trades on schedule.</p>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="civil-service-card wow fadeInUp" data-delay=".6s">
                            <div class="civil-card-header">
                                <div class="civil-icon-wrapper icon-bg-5">
                                    <i class="fa-light fa-droplet"></i>
                                </div>
                                <h3>Waterproofing & Insulation</h3>
                            </div>
                            <p>Terrace, basement and wet-area waterproofing, thermal insulation and expansion joint
                                treatment to prevent long-term structural issues.</p>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="civil-service-card wow fadeInUp" data-delay=".7s">
                            <div class="civil-card-header">
                                <div class="civil-icon-wrapper icon-bg-6">
                                    <i class="fa-light fa-helmet-safety"></i>
                                </div>
                                <h3>Turnkey Civil & Structural</h3>
                            </div>
                            <p>Single-point civil contracting from design coordination to handover — integrated with our
                                MEP scope for true turnkey delivery.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hospital-civil-services-area-end -->

        <!-- services-area -->
        <section class="services-area p-relative fix">
            <div class="container-box pt-50 pb-50" style="background-color: #004250;">
                <div class="animations-01"><img src="img/bg/an-img-02.webp"
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
                                        <img src="img/bg/hvac_service.webp"
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
                                                    <h3><a href="hospital-hvac-systems.html">Hospital HVAC Systems</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p>OT laminar airflow, ICU pressure cascades, HEPA H14 filtration, AHU
                                                installation to ASHRAE 170 & NABH.</p>
                                            <div class="sbtn mt-20">
                                                <a href="hospital-hvac-systems.html" class="chevron-button">Read More <i
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
                                        <img src="img/bg/mgps_service.webp"
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
                                                    <h3><a href="medical-gas-pipeline.html">Medical Gas Pipeline
                                                            (MGPS)</a></h3>
                                                </div>
                                            </div>
                                            <p>Complete MGPS — O₂, vacuum, N₂O, medical air. Tested, validated, HTM
                                                02-01 & NFPA 99 compliant.</p>
                                            <div class="sbtn mt-20">
                                                <a href="medical-gas-pipeline.html" class="chevron-button">Read More <i
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
                                        <img src="img/bg/electrical_service.webp"
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
                                                    <h3><a href="hospital-electrical-systems.html">Hospital Electrical
                                                            Systems</a></h3>
                                                </div>
                                            </div>
                                            <p>HT/LT distribution, UPS, DG, isolation transformers for OT/ICU, nurse
                                                call and ELV systems.</p>
                                            <div class="sbtn mt-20">
                                                <a href="hospital-electrical-systems.html" class="chevron-button">Read
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
                                        <img src="img/bg/plumbing_service.webp"
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
                                                    <h3><a href="plumbing-and-sanitation.html">Plumbing & Sanitation</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p>Medical-grade plumbing, hot/cold water, WTP, STP, ETP, Legionella control
                                                and CSSD supply.</p>
                                            <div class="sbtn mt-20">
                                                <a href="plumbing-and-sanitation.html" class="chevron-button">Read More
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
                                        <img src="img/bg/fire_service.webp"
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
                                                    <h3><a href="fire-fighting-and-life-safety.html">Fire Fighting &
                                                            Life Safety</a></h3>
                                                </div>
                                            </div>
                                            <p>Sprinkler, hydrant, alarm, FM200 suppression, smoke management. NBC Part
                                                4 & NFPA compliant.</p>
                                            <div class="sbtn mt-20">
                                                <a href="fire-fighting-and-life-safety.html" class="chevron-button">Read
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
                                        <img src="img/bg/turnkey_service.webp"
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
                                                    <h3><a href="turnkey-hospital-mep.html">Turnkey Hospital MEP</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <p>Single-point MEP contracting — design to handover. No sub-bids.
                                                NABH-ready. 24/7 warranty.</p>
                                            <div class="sbtn mt-20">
                                                <a href="turnkey-hospital-mep.html" class="chevron-button">Read More <i
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
                                <p>Cleanroom HVAC, radiation-shielded electrical, dedicated MGPS feeds.</p>
                            </div>
                        </div>
                        <!-- Item 4 -->
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                            <div class="spec-item wow fadeInUp" data-delay=".5s">
                                <div class="spec-card-header">
                                    <i class="fa-light fa-sparkles icon-color-4"></i>
                                    <h4>Clean Rooms</h4>
                                </div>
                                <p>ISO Class 5-8, pressure cascade control, particle counts validated to ISO 14644.</p>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                            <div class="spec-item wow fadeInUp" data-delay=".6s">
                                <div class="spec-card-header">
                                    <i class="fa-light fa-vials icon-color-5"></i>
                                    <h4>CSSD & Sterile</h4>
                                </div>
                                <p>Steam/RO supply, exhaust, dirty-clean workflow HVAC separation.</p>
                            </div>
                        </div>
                        <!-- Item 6 -->
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                            <div class="spec-item wow fadeInUp" data-delay=".7s">
                                <div class="spec-card-header">
                                    <i class="fa-light fa-x-ray icon-color-6"></i>
                                    <h4>Diagnostics</h4>
                                </div>
                                <p>CT/MRI power, chillers, radiation shielding support, humidity control.</p>
                            </div>
                        </div>
                        <!-- Item 7 -->
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                            <div class="spec-item wow fadeInUp" data-delay=".8s">
                                <div class="spec-card-header">
                                    <i class="fa-light fa-cubes icon-color-7"></i>
                                    <h4>Modular OT</h4>
                                </div>
                                <p>Hermetic doors, stainless/HPL wall panels, integrated pendant boom feeds.</p>
                            </div>
                        </div>
                        <!-- Item 8 -->
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                            <div class="spec-item wow fadeInUp" data-delay=".9s">
                                <div class="spec-card-header">
                                    <i class="fa-light fa-shield-check icon-color-8"></i>
                                    <h4>NABH Compliance</h4>
                                </div>
                                <p>All systems built, documented, and tested to meet NABH audit requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hospital-specialisations-area-end -->

        <!-- why-hoose-us-area -->
        <section class="services-02 pt-120 pb-90 p-relative fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-50 wow fadeInDown animated" data-animation="fadeInDown"
                            data-delay=".4s">
                            <div class="sub-title"> <i class="fa-light fa-bolt"></i> WHY CHOOSE ROYDON <i
                                    class="fa-light fa-bolt"></i></div>
                            <h2 class="">Engineering <span>Excellence,</span> Built for Healthcare</h2>
                            <p class="mt-20">Healthcare MEP demands precision, velocity, and strict compliance. Here is
                                why India's leading hospital developers partner with Roydon MEP Contracting.</p>
                            <div class="row mt-30">
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
                            <img src="img/projects/neelima_hospital.webp" alt="Neelima Hospital"
                                style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Neelima
                                Hospital</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card text-center mb-30"
                            style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                            <img src="img/projects/landmark_hospital.webp" alt="Landmark Hospital"
                                style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Landmark
                                Hospital</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card text-center mb-30"
                            style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                            <img src="img/projects/trust_hospital.webp" alt="Trust Hospital"
                                style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Trust
                                Hospital</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card text-center mb-30"
                            style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                            <img src="img/projects/hope_hospital.webp" alt="Hope Hospital"
                                style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Hope
                                Hospital</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card text-center mb-30"
                            style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                            <img src="img/projects/corporate_office.webp" alt="Corporate Office"
                                style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">Corporate
                                Office</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card text-center mb-30"
                            style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                            <img src="img/projects/n_square_building.webp" alt="N Square Building"
                                style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: 600; color: #004250; margin-bottom: 0;">N Square
                                Building</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card text-center mb-30"
                            style="padding: 15px; background: #fff; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin: 0 10px; transition: transform 0.3s ease;">
                            <img src="img/projects/hotel_project.webp" alt="Hotel Project"
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
                style="background-image: url(img/bg/contact-bg.webp); background-repeat: no-repeat; background-size: cover;">
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
