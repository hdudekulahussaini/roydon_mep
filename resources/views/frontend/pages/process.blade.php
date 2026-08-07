@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="pl-50 pr-50">
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(15, 32, 68, 0.7), rgba(15, 32, 68, 0.7)), url({{ asset('assets/img/bg/turnkey_service.webp') }}); background-size: cover; background-position: center; border-radius: 15px; margin-top: 20px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2 style="color: #ffffff; font-size: 48px; font-weight: 700; text-transform: capitalize; margin-bottom: 15px;">Execution Process</h2>
                                    <div class="breadcrumb-wrap">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #E0F4F4; font-weight: 500;">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #0E9B9B; font-weight: 700;">Process</li>
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
                        <h2 style="font-size: 36px; font-weight: 800; color: #0F2044; margin-bottom: 15px;">6-Stage Engineering Methodology</h2>
                        <p style="font-size: 16px; color: #4B5F70;">A structured, data-driven approach ensuring zero defect handovers and full NABH audit compliance.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 35px 25px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <span style="font-size: 14px; font-weight: 800; color: #0E9B9B; text-transform: uppercase; letter-spacing: 1px;">Stage 01</span>
                            <h3 style="font-size: 20px; font-weight: 700; color: #0F2044; margin: 10px 0 15px;">Detailed Design & Heat Load Calculations</h3>
                            <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">Evaluating CFM requirements, air exchange rates per hour (ACPH), room pressure cascades, and power distribution grids.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 35px 25px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <span style="font-size: 14px; font-weight: 800; color: #0E9B9B; text-transform: uppercase; letter-spacing: 1px;">Stage 02</span>
                            <h3 style="font-size: 20px; font-weight: 700; color: #0F2044; margin: 10px 0 15px;">3D BIM Clash Detection</h3>
                            <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">Building 100% digital twins of HVAC ductwork, MGPS copper lines, electrical cable trays, and plumbing lines to eliminate site conflicts.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 35px 25px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <span style="font-size: 14px; font-weight: 800; color: #0E9B9B; text-transform: uppercase; letter-spacing: 1px;">Stage 03</span>
                            <h3 style="font-size: 20px; font-weight: 700; color: #0F2044; margin: 10px 0 15px;">Quality Material Procurement</h3>
                            <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">Procuring certified medical-grade equipment (AHUs, chillers, degreased copper, HEPA filters, isolation transformers) directly from tier-1 OEMs.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 35px 25px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <span style="font-size: 14px; font-weight: 800; color: #0E9B9B; text-transform: uppercase; letter-spacing: 1px;">Stage 04</span>
                            <h3 style="font-size: 20px; font-weight: 700; color: #0F2044; margin: 10px 0 15px;">Precision On-Site Execution</h3>
                            <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">Supervised installation led by project managers adhering strictly to IS codes, NFPA guidelines, and cleanroom protocols.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 35px 25px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <span style="font-size: 14px; font-weight: 800; color: #0E9B9B; text-transform: uppercase; letter-spacing: 1px;">Stage 05</span>
                            <h3 style="font-size: 20px; font-weight: 700; color: #0F2044; margin: 10px 0 15px;">Testing, Balancing & DOP Validation</h3>
                            <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">Conducting air balancing, pressure decay tests, DOP HEPA filter integrity tests, and gas purity checks.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-30">
                        <div style="background: #ffffff; padding: 35px 25px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <span style="font-size: 14px; font-weight: 800; color: #0E9B9B; text-transform: uppercase; letter-spacing: 1px;">Stage 06</span>
                            <h3 style="font-size: 20px; font-weight: 700; color: #0F2044; margin: 10px 0 15px;">Audit Sign-off & Handover</h3>
                            <p style="color: #4B5F70; font-size: 14px; line-height: 1.7; margin: 0;">Handing over comprehensive documentation, as-built CAD files, O&M manuals, and clearing NABH accreditation seamlessly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
