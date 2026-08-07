@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="pl-50 pr-50">
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(15, 32, 68, 0.7), rgba(15, 32, 68, 0.7)), url({{ asset('assets/img/bg/contact-bg.webp') }}); background-size: cover; background-position: center; border-radius: 15px; margin-top: 20px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2 style="color: #ffffff; font-size: 48px; font-weight: 700; text-transform: capitalize; margin-bottom: 15px;">Our Offices</h2>
                                    <div class="breadcrumb-wrap">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #E0F4F4; font-weight: 500;">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #0E9B9B; font-weight: 700;">Offices</li>
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

        <section class="pt-100 pb-100">
            <div class="container">
                <div class="row justify-content-center text-center mb-50">
                    <div class="col-lg-8">
                        <h2 style="font-size: 36px; font-weight: 800; color: #0F2044; margin-bottom: 15px;">Regional Office Network</h2>
                        <p style="font-size: 16px; color: #4B5F70;">Serving healthcare leaders and project developers across Telangana, Andhra Pradesh, Karnataka, and Tamil Nadu.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 40px 30px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%;">
                            <div style="width: 60px; height: 60px; background: rgba(14, 155, 155, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                                <i class="fa-solid fa-building-user" style="color: #0E9B9B; font-size: 28px;"></i>
                            </div>
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;">Head Office — Hyderabad</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin-bottom: 20px;">N Square, Hitec City, Plot 34B,<br>Hyderabad, Telangana, 500081</p>
                            <p style="color: #0F2044; font-weight: 600; font-size: 15px; margin-bottom: 5px;"><i class="fa-solid fa-phone" style="color: #0E9B9B; margin-right: 8px;"></i> +91-7330756745</p>
                            <p style="color: #0F2044; font-weight: 600; font-size: 15px; margin: 0;"><i class="fa-solid fa-envelope" style="color: #0E9B9B; margin-right: 8px;"></i> info@roydonmep.com</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 40px 30px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%;">
                            <div style="width: 60px; height: 60px; background: rgba(14, 155, 155, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                                <i class="fa-solid fa-location-dot" style="color: #0E9B9B; font-size: 28px;"></i>
                            </div>
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;">Bengaluru Regional Office</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin-bottom: 20px;">Indiranagar 100 Feet Road,<br>Bengaluru, Karnataka, 560038</p>
                            <p style="color: #0F2044; font-weight: 600; font-size: 15px; margin-bottom: 5px;"><i class="fa-solid fa-phone" style="color: #0E9B9B; margin-right: 8px;"></i> +91-7330756745</p>
                            <p style="color: #0F2044; font-weight: 600; font-size: 15px; margin: 0;"><i class="fa-solid fa-envelope" style="color: #0E9B9B; margin-right: 8px;"></i> blr@roydonmep.com</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 40px 30px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%;">
                            <div style="width: 60px; height: 60px; background: rgba(14, 155, 155, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                                <i class="fa-solid fa-map-location-dot" style="color: #0E9B9B; font-size: 28px;"></i>
                            </div>
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;">Chennai Project Office</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin-bottom: 20px;">Anna Salai, Guindy,<br>Chennai, Tamil Nadu, 600032</p>
                            <p style="color: #0F2044; font-weight: 600; font-size: 15px; margin-bottom: 5px;"><i class="fa-solid fa-phone" style="color: #0E9B9B; margin-right: 8px;"></i> +91-7330756745</p>
                            <p style="color: #0F2044; font-weight: 600; font-size: 15px; margin: 0;"><i class="fa-solid fa-envelope" style="color: #0E9B9B; margin-right: 8px;"></i> chennai@roydonmep.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
