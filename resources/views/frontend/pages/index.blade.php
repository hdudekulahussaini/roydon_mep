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
        @if ($services && $services->isNotEmpty())
        <section class="services-area p-relative fix">
            <div class="container-box pt-50 pb-50" style="background-color: #004250;">
                <div class="animations-01"><img src="{{ asset('frontend/assets/img/bg/an-img-02.webp') }}"
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
                        @foreach ($services->take(6) as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services-box wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="services-content">
                                    @if ($service->banner_image)
                                    <div class="img-custom-anim-left wow fadeInLeft services-icon">
                                        <img src="{{ Storage::url($service->banner_image) }}"
                                            alt="{{ $service->title }}">
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="icon-box">
                                                <div class="icon">
                                                    <div>
                                                        @php $icon = is_array($service->offerings_icon) ? ($service->offerings_icon[0] ?? 'fa-light fa-hospital') : 'fa-light fa-hospital'; @endphp
                                                        <i class="{{ $icon }}" style="font-size: 45px; color: #0E9B9B;"></i>
                                                    </div>
                                                </div>
                                                <div class="heading">
                                                    <h3><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></h3>
                                                </div>
                                            </div>
                                            <p>{{ Str::limit($service->description, 120) }}</p>
                                            <div class="sbtn mt-20">
                                                <a href="{{ route('services.show', $service->slug) }}" class="chevron-button">Read More <i class="fa-light fa-bolt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
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
        @endif
        <!-- faq-area-end -->

        <!-- contact-area -->
        <section class="contact-bg p-relative" id="contact">
            <div class="container-box pt-120 pb-120"
                style="background-image: url({{ asset('frontend/assets/img/bg/contact-bg.webp') }}); background-repeat: no-repeat; background-size: cover;">
                <div class="container booking-area">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-12">
                        </div>
                        <div class="col-lg-6 col-md-12 p-relative">
                            <!-- booking-area -->
                            <div class="p-relative">
                                <div class="container">


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