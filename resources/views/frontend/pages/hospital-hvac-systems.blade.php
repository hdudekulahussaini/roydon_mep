@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="pl-50 pr-50 ">
            @if($service->banner_image)
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(15, 32, 68, 0.7), rgba(15, 32, 68, 0.7)), url({{ Storage::url($service->banner_image) }}); background-size: cover; background-position: center; border-radius: 15px; margin-top: 20px;">
            @else
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(15, 32, 68, 0.7), rgba(15, 32, 68, 0.7)); background-size: cover; background-position: center; border-radius: 15px; margin-top: 20px;">
            @endif
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2 style="color: #ffffff; font-size: 48px; font-weight: 700; text-transform: capitalize; margin-bottom: 15px;">{{ $service->title }}</h2>
                                    <div class="breadcrumb-wrap">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #E0F4F4; font-weight: 500;">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#" style="color: #E0F4F4; font-weight: 500;">Services</a></li>
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #0E9B9B; font-weight: 700;">{{ $service->title }}</li>
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
        
        <!-- service-details-area -->
        <div class="about-area5 about-p p-relative">
            <div class="container pt-100 pb-90">
                <div class="row">
                    <!-- #right side (Sidebar) -->
                    <div class="col-sm-12 col-md-12 col-lg-4 order-1">
                        <aside class="sidebar services-sidebar">
                            <!-- Category Widget -->
                            <div class="sidebar-widget categories" style="background: #F6FAFA; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                                <div class="widget-content">
                                    <h2 class="widget-title" style="color: #0F2044; border-bottom: 2px solid #0E9B9B; padding-bottom: 15px; margin-bottom: 20px; font-size: 24px;"> Our Services </h2>
                                    <!-- Services Category -->
                                    <ul class="services-categories" style="list-style: none; padding: 0; margin: 0;">
                                        <li class="active" style="margin-bottom: 12px;"><a href="{{ route('services.hvac') }}" style="color: #0E9B9B; font-weight: 700; display: block; padding: 10px 15px; background: #fff; border-radius: 6px; border-left: 4px solid #0E9B9B; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">Hospital HVAC Systems </a></li>
                                        <li style="margin-bottom: 12px;"><a href="{{ route('services.medical-gas') }}" style="color: #4B5F70; font-weight: 500; display: block; padding: 10px 15px; transition: all 0.3s;">Medical Gas Pipeline (MGPS) </a></li>
                                        <li style="margin-bottom: 12px;"><a href="{{ route('services.electrical') }}" style="color: #4B5F70; font-weight: 500; display: block; padding: 10px 15px; transition: all 0.3s;">Hospital Electrical Systems </a></li>
                                        <li style="margin-bottom: 12px;"><a href="{{ route('services.plumbing') }}" style="color: #4B5F70; font-weight: 500; display: block; padding: 10px 15px; transition: all 0.3s;">Plumbing & Sanitation </a></li>
                                        <li style="margin-bottom: 12px;"><a href="{{ route('services.fire-fighting') }}" style="color: #4B5F70; font-weight: 500; display: block; padding: 10px 15px; transition: all 0.3s;">Fire Fighting & Life Safety </a></li>
                                        <li style="margin-bottom: 12px;"><a href="{{ route('services.turnkey') }}" style="color: #4B5F70; font-weight: 500; display: block; padding: 10px 15px; transition: all 0.3s;">Turnkey Hospital MEP </a></li>
                                        <li style="margin-bottom: 12px;"><a href="{{ route('services.civil-works') }}" style="color: #4B5F70; font-weight: 500; display: block; padding: 10px 15px; transition: all 0.3s;">Civil Works </a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Service Contact-->
                            <div class="service-detail-contact wow fadeInUp animated" data-wow-delay="0.2s" style="background: linear-gradient(135deg, #0E9B9B 0%, #0B7878 100%); padding: 40px 30px; border-radius: 12px; color: #fff; text-align: center; margin-top: 40px; box-shadow: 0 10px 30px rgba(14,155,155,0.2);">
                                <div style="font-size: 40px; margin-bottom: 15px; color: rgba(255,255,255,0.8);"><i class="fa-light fa-headset"></i></div>
                                <h3 class="h3-title" style="color: #fff; font-size: 24px; margin-bottom: 15px; font-weight: 700;">{!! $service->cta_title !!}</h3>
                                <p style="color: #E0F4F4; margin-bottom: 25px; font-size: 15px; line-height: 1.6;">{{ $service->cta_description }}</p>
                                <a href="tel:+917330756745" title="Call now" style="display: inline-block; background: #fff; color: #0E9B9B; padding: 12px 25px; border-radius: 50px; font-weight: 700; font-size: 16px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);"> +91-7330756745</a>
                            </div>
                        </aside>
                    </div>
                    <!-- #right side end -->

                    <!-- Content -->
                    <div class="col-lg-8 col-md-12 col-sm-12 order-2">
                        <div class="service-detail pl-30 pr-20">
                            <div class="content-box">
                                <div style="display: inline-block; font-size: 11px; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: #0E9B9B; background: rgba(14,155,155,0.1); padding: 6px 16px; border-radius: 50px; margin-bottom: 15px;">Specialized Execution</div>
                                <h2 style="color: #0F2044; font-size: 38px; font-weight: 700; margin-bottom: 25px; line-height: 1.2;"> {{ $service->heading }} </h2>
                                <p style="color: #4B5F70; font-size: 16px; line-height: 1.8; margin-bottom: 35px;">
                                    {{ $service->description }}
                                </p>

                                @if($service->images && is_array($service->images) && count($service->images) > 0)
                                <!-- Two Column -->
                                <div class="two-column" style="margin-bottom: 45px;">
                                    <div class="row">
                                        <div class="image-column col-xl-6 col-lg-12 col-md-12 mb-30">
                                            <figure class="image img-custom-anim-left wow fadeInLeft" data-delay=".1s" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin: 0;">
                                                <img src="{{ Storage::url($service->images[0]) }}" alt="{{ $service->title }}" style="width: 100%; height: 280px; object-fit: cover; transition: transform 0.5s;">
                                            </figure>
                                        </div>
                                        @if(isset($service->images[1]))
                                        <div class="text-column col-xl-6 col-lg-12 col-md-12 mb-30">
                                            <figure class="image img-custom-anim-right wow fadeInRight" data-delay=".2s" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin: 0;">
                                                <img src="{{ Storage::url($service->images[1]) }}" alt="{{ $service->title }}" style="width: 100%; height: 280px; object-fit: cover; transition: transform 0.5s;">
                                            </figure>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                <h3 style="color: #0F2044; font-size: 28px; font-weight: 700; margin-bottom: 25px;">Key Offerings in {{ $service->title }}</h3>
                                <p style="color: #4B5F70; font-size: 16px; line-height: 1.8; margin-bottom: 30px;">
                                    Our hospital HVAC capabilities are vast and uncompromising. We handle complex pressure cascades for critical care and high-efficiency filtration systems.
                                </p>
                                
                                <div class="row mb-40">
                                    @if($service->offerings_title && is_array($service->offerings_title))
                                        @foreach($service->offerings_title as $index => $offeringTitle)
                                            <div class="col-lg-6 col-md-6">
                                                <div style="background: #fff; border: 1px solid #D5E5E5; padding: 25px; border-radius: 10px; margin-bottom: 20px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.03); height: 100%;">
                                                    <div style="width: 50px; height: 50px; background: #E0F4F4; color: #0E9B9B; font-size: 24px; display: flex; align-items: center; justify-content: center; border-radius: 8px; margin-bottom: 15px;"><i class="{{ $service->offerings_icon[$index] }}"></i></div>
                                                    <h4 style="color: #0F2044; font-size: 18px; font-weight: 700; margin-bottom: 10px;">{{ $offeringTitle }}</h4>
                                                    <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">{{ $service->offerings_description[$index] }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="wow fadeInUp animated" data-wow-delay="0.3s" style="background: #F6FAFA; border-left: 5px solid #0E9B9B; padding: 30px; border-radius: 0 10px 10px 0; margin-bottom: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.04);">
                                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                        <i class="fa-solid fa-shield-check" style="color: #0E9B9B; font-size: 28px;"></i>
                                        <h4 style="color: #0F2044; margin: 0; font-size: 22px; font-weight: 700;">{{ $service->compliance_title }}</h4>
                                    </div>
                                    <p style="color: #4B5F70; margin: 0; line-height: 1.8; font-size: 15px;">
                                        {{ $service->compliance_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- service-details-area-end -->
    </main>
@endsection
