@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="pl-50 pr-50">
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(15, 32, 68, 0.7), rgba(15, 32, 68, 0.7)), url({{ asset('assets/img/standards.webp') }}); background-size: cover; background-position: center; border-radius: 15px; margin-top: 20px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2 style="color: #ffffff; font-size: 48px; font-weight: 700; text-transform: capitalize; margin-bottom: 15px;">Engineering Standards</h2>
                                    <div class="breadcrumb-wrap">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #E0F4F4; font-weight: 500;">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #0E9B9B; font-weight: 700;">Standards</li>
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
                        <h2 style="font-size: 36px; font-weight: 800; color: #0F2044; margin-bottom: 15px;">International Compliance Standards</h2>
                        <p style="font-size: 16px; color: #4B5F70;">Every engineering system designed and installed by Roydon MEP meets or exceeds global healthcare standards.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-30">
                        <div style="background: #ffffff; padding: 35px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;"><i class="fa-solid fa-fan" style="color: #0E9B9B; margin-right: 10px;"></i> HVAC — ASHRAE 170 & NABH</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin: 0;">Prescribing minimum air exchange rates (ACPH > 20 for OT), positive pressure maintenance (+15 Pa), HEPA H14 filtration (99.995% efficiency down to 0.3 microns), and humidity control (45%-55% RH) to eliminate surgical site infections.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-30">
                        <div style="background: #ffffff; padding: 35px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;"><i class="fa-solid fa-lungs" style="color: #0E9B9B; margin-right: 10px;"></i> MGPS — HTM 02-01 & ISO 7396-1</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin: 0;">Governing pipeline sizing, degreased medical copper tubing, auto-manifold changeover systems, master digital alarm panels, and gas purity testing protocols for uninterrupted life support delivery.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-30">
                        <div style="background: #ffffff; padding: 35px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;"><i class="fa-solid fa-bolt" style="color: #0E9B9B; margin-right: 10px;"></i> Electrical — IS 732 & IEC 60364-7-710</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin: 0;">Specialized electrical safety for Group 2 medical locations (OT, ICU, Cath Lab) utilizing ungrounded IT power systems, isolation transformers, and insulation monitoring to guarantee patient protection against leakage currents.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-30">
                        <div style="background: #ffffff; padding: 35px; border-radius: 12px; border: 1px solid #E0F4F4; box-shadow: 0 5px 20px rgba(0,0,0,0.03); height: 100%;">
                            <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;"><i class="fa-solid fa-shield-halved" style="color: #0E9B9B; margin-right: 10px;"></i> Fire & Life Safety — NBC 2016 Part 4 & NFPA 101</h3>
                            <p style="color: #4B5F70; font-size: 15px; line-height: 1.7; margin: 0;">Comprehensive compartmentation, clean agent FM200 fire suppression in server/plant rooms, addressable smoke detection, pressurized escape stairwells, and emergency power integration.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
