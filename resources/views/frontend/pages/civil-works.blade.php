@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="pl-50 pr-50 ">
            <div class="breadcrumb-area d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(15, 32, 68, 0.7), rgba(15, 32, 68, 0.7)), url({{ asset('assets/img/bg/civil_service.webp') }}); background-size: cover; background-position: center; border-radius: 15px; margin-top: 20px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title">
                                    <h2 style="color: #ffffff; font-size: 48px; font-weight: 700; text-transform: capitalize; margin-bottom: 15px;">Civil Works</h2>
                                    <div class="breadcrumb-wrap">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb justify-content-center">
                                                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: #E0F4F4; font-weight: 500;">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#" style="color: #E0F4F4; font-weight: 500;">Services</a></li>
                                                <li class="breadcrumb-item active" aria-current="page" style="color: #0E9B9B; font-weight: 700;">Civil Works</li>
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
        <div class="about-area5 pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <!-- Right Sidebar -->
                    <div class="col-lg-4 col-md-12">
                        <aside class="service-sidebar">

                            <!-- Category Widget -->
                            <div class="widget widget_categories mb-40" style="background: #F6FAFA; padding: 35px 30px; border-radius: 12px; border: 1px solid #E0F4F4;">
                                <h3 class="widget-title" style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 25px; border-bottom: 2px solid #0E9B9B; padding-bottom: 10px; display: inline-block;">All Services</h3>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.hvac') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #ffffff; color: #0F2044; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.03);">Hospital HVAC Systems <i class="fa-solid fa-chevron-right" style="color: #0E9B9B; font-size: 13px;"></i></a></li>
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.medical-gas') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #ffffff; color: #0F2044; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.03);">Medical Gas Pipeline (MGPS) <i class="fa-solid fa-chevron-right" style="color: #0E9B9B; font-size: 13px;"></i></a></li>
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.electrical') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #ffffff; color: #0F2044; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.03);">Hospital Electrical Systems <i class="fa-solid fa-chevron-right" style="color: #0E9B9B; font-size: 13px;"></i></a></li>
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.plumbing') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #ffffff; color: #0F2044; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.03);">Plumbing & Sanitation <i class="fa-solid fa-chevron-right" style="color: #0E9B9B; font-size: 13px;"></i></a></li>
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.fire-fighting') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #ffffff; color: #0F2044; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.03);">Fire Fighting & Life Safety <i class="fa-solid fa-chevron-right" style="color: #0E9B9B; font-size: 13px;"></i></a></li>
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.turnkey') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #ffffff; color: #0F2044; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.03);">Turnkey Hospital MEP <i class="fa-solid fa-chevron-right" style="color: #0E9B9B; font-size: 13px;"></i></a></li>
                                    <li style="margin-bottom: 12px;"><a href="{{ route('services.civil-works') }}" style="display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; background: #0E9B9B; color: #ffffff; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(14, 155, 155, 0.3);">Civil Works <i class="fa-solid fa-chevron-right" style="color: #ffffff; font-size: 13px;"></i></a></li>
                                </ul>
                            </div>

                            <!-- Emergency / Contact Banner Widget -->
                            <div class="widget widget_cta text-center" style="background: linear-gradient(135deg, #0F2044 0%, #082020 100%); padding: 40px 30px; border-radius: 12px; color: #ffffff; position: relative; overflow: hidden;">
                                <div style="position: absolute; top: -20px; right: -20px; width: 100px; height: 100px; background: rgba(14, 155, 155, 0.15); border-radius: 50%;"></div>
                                <i class="fa-solid fa-headset" style="font-size: 48px; color: #0E9B9B; margin-bottom: 20px;"></i>
                                <h3 style="color: #ffffff; font-size: 22px; font-weight: 700; margin-bottom: 15px;">Need Expert Technical Advice?</h3>
                                <p style="color: #E0F4F4; font-size: 14px; margin-bottom: 25px; line-height: 1.6;">Contact our senior HVAC engineering team today for specialized design consultation or turnkey proposals.</p>
                                <a href="{{ route('contact') }}" class="btn" style="background: #0E9B9B; color: #ffffff; padding: 12px 30px; border-radius: 30px; font-weight: 600; font-size: 14px; text-transform: uppercase; display: inline-block; transition: all 0.3s ease;">Get a Quote <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
                            </div>

                        </aside>
                    </div>

                    <!-- Main Content Area -->
                    <div class="col-lg-8 col-md-12">
                        <div class="service-details-wrap" style="padding-left: 15px;">
                            
                            <!-- Featured Image -->
                            <div class="service-details-img mb-40" style="border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                                <img src="{{ asset('assets/img/bg/civil_service.webp') }}" alt="Civil Works Engineering" style="width: 100%; height: auto; display: block;">
                            </div>

                            <!-- Main Title & Intro -->
                            <div class="service-details-content mb-40">
                                <h2 style="font-size: 32px; font-weight: 700; color: #0F2044; margin-bottom: 20px;">Civil Works</h2>
                                <p style="font-size: 16px; line-height: 1.8; color: #4B5F70; margin-bottom: 20px;">
                                   At Roydon MEP, we provide comprehensive Civil Construction & Structural Engineering services tailored specifically for complex healthcare, commercial, and industrial facilities. Our civil engineering team works in total synergy with our MEP division, ensuring that structural design, load capacities, foundation planning, and architectural layouts seamlessly align with heavy MEP machinery, ducting, containment, and clinical workflow requirements.
                                </p>
                                <p style="font-size: 16px; line-height: 1.8; color: #4B5F70; margin-bottom: 30px;">
                                   By integrating Civil and MEP under one single turnkey contract, we eliminate inter-contractor friction, prevent structural clashes, reduce project execution timelines by up to 25%, and deliver zero-defect handovers engineered to international building codes and NABH healthcare guidelines.
                                </p>
                            </div>

                            <!-- Technical Features Grid -->
                            <h3 style="font-size: 24px; font-weight: 700; color: #0F2044; margin-bottom: 25px; border-left: 4px solid #0E9B9B; padding-left: 15px;">Key Scope of Civil Engineering Services</h3>
                            
                            <div class="row mb-40">
                                <div class="col-md-6 mb-30">
                                    <div style="background: #ffffff; padding: 25px; border-radius: 10px; border: 1px solid #E0F4F4; box-shadow: 0 4px 15px rgba(0,0,0,0.03); height: 100%;">
                                        <div style="width: 50px; height: 50px; background: rgba(14, 155, 155, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                            <i class="fa-solid fa-layer-group" style="color: #0E9B9B; font-size: 24px;"></i>
                                        </div>
                                        <h4 style="font-size: 18px; font-weight: 700; color: #0F2044; margin-bottom: 12px;">Healthcare Civil & Structural Execution</h4>
                                        <p style="color: #4B5F70; font-size: 14px; line-height: 1.6; margin: 0;">Full-scale RCC frame construction, heavy machinery foundations (Chillers, DG sets, Transformers), lead-lined radiation shielding walls for X-Ray/CT/MRI suites, and specialized vibration-isolated floor slabs for high-precision Cath Labs and Modular Operation Theatres.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-30">
                                    <div style="background: #ffffff; padding: 25px; border-radius: 10px; border: 1px solid #E0F4F4; box-shadow: 0 4px 15px rgba(0,0,0,0.03); height: 100%;">
                                        <div style="width: 50px; height: 50px; background: rgba(14, 155, 155, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                            <i class="fa-solid fa-wind" style="color: #0E9B9B; font-size: 24px;"></i>
                                        </div>
                                        <h4 style="font-size: 18px; font-weight: 700; color: #0F2044; margin-bottom: 12px;">Architectural Finishing & Specialized Wall Systems</h4>
                                        <p style="color: #4B5F70; font-size: 14px; line-height: 1.6; margin: 0;">Installation of antibacterial, seamless Coved Vinyl flooring, epoxy floorings for sterile zones, HPL / Stainless Steel wall paneling for Cleanrooms & OTs, acoustic drywall partitioning, and fire-rated glass partitions meeting NBC standards.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-30">
                                    <div style="background: #ffffff; padding: 25px; border-radius: 10px; border: 1px solid #E0F4F4; box-shadow: 0 4px 15px rgba(0,0,0,0.03); height: 100%;">
                                        <div style="width: 50px; height: 50px; background: rgba(14, 155, 155, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                            <i class="fa-solid fa-temperature-arrow-down" style="color: #0E9B9B; font-size: 24px;"></i>
                                        </div>
                                        <h4 style="font-size: 18px; font-weight: 700; color: #0F2044; margin-bottom: 12px;">False Ceiling & Ceiling Service Grids</h4>
                                        <p style="color: #4B5F70; font-size: 14px; line-height: 1.6; margin: 0;">Heavy-duty metal ceiling suspensions capable of supporting ceiling-mounted OT pendants, surgical lights, laminar flow hoods, heavy ducting runs, and integrated cleanroom modular ceiling grids.</p>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-30">
                                    <div style="background: #ffffff; padding: 25px; border-radius: 10px; border: 1px solid #E0F4F4; box-shadow: 0 4px 15px rgba(0,0,0,0.03); height: 100%;">
                                        <div style="width: 50px; height: 50px; background: rgba(14, 155, 155, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
                                            <i class="fa-solid fa-shield-virus" style="color: #0E9B9B; font-size: 24px;"></i>
                                        </div>
                                        <h4 style="font-size: 18px; font-weight: 700; color: #0F2044; margin-bottom: 12px;">Waterproofing & Environmental Protection</h4>
                                        <p style="color: #4B5F70; font-size: 14px; line-height: 1.6; margin: 0;">Advanced multi-layer waterproofing membranes for basements, plant rooms, AHU rooms, wet areas, and podium decks, ensuring zero water ingress near critical medical equipment and electrical infrastructure.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Standards Accordion / Highlights -->
                            <div style="background: #F6FAFA; padding: 35px; border-radius: 12px; border: 1px solid #E0F4F4; margin-bottom: 40px;">
                                <h3 style="font-size: 22px; font-weight: 700; color: #0F2044; margin-bottom: 15px;">Compliance & Technical Standards</h3>
                                <p style="color: #4B5F70; line-height: 1.7; margin-bottom: 20px; font-size: 15px;">
                                    All civil engineering, structural designs, and finishing protocols strictly conform to global healthcare engineering guidelines:
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul style="list-style: none; padding: 0; margin: 0;">
                                            <li style="margin-bottom: 10px; font-size: 15px; color: #0F2044; font-weight: 600;"><i class="fa-solid fa-circle-check" style="color: #0E9B9B; margin-right: 8px;"></i> IS 456 & IS 1893 (Structural RCC & Seismic Compliance)</li>
                                            <li style="margin-bottom: 10px; font-size: 15px; color: #0F2044; font-weight: 600;"><i class="fa-solid fa-circle-check" style="color: #0E9B9B; margin-right: 8px;"></i> National Building Code (NBC 2016 Part 4 Fire & Life Safety)</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul style="list-style: none; padding: 0; margin: 0;">
                                            <li style="margin-bottom: 10px; font-size: 15px; color: #0F2044; font-weight: 600;"><i class="fa-solid fa-circle-check" style="color: #0E9B9B; margin-right: 8px;"></i> NABH Standards for Hospital Infrastructure</li>
                                            <li style="margin-bottom: 10px; font-size: 15px; color: #0F2044; font-weight: 600;"><i class="fa-solid fa-circle-check" style="color: #0E9B9B; margin-right: 8px;"></i> AERB (Atomic Energy Regulatory Board) Radiation Shielding Standards</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Callout -->
                            <div style="border-radius: 12px; background: #ffffff; padding: 30px; border: 1px solid #E0F4F4; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <i class="fa-solid fa-shield-check" style="color: #0E9B9B; font-size: 28px;"></i>
                                    <h4 style="color: #0F2044; margin: 0; font-size: 22px; font-weight: 700;">Compliant & Certified</h4>
                                </div>
                                <p style="color: #4B5F70; margin: 0; line-height: 1.8; font-size: 15px;">
                                    Every civil project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- service-details-area-end -->
    </main>
@endsection
