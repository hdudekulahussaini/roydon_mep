@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/nabh_compliance_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">100% Audit Clearance · As-Built CAD · Validation</div>
                        <h1 class="spec-hero-title">NABH Compliance</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content Section -->
        <section class="spec-content-area">
            <div class="container">
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-lg-8 pr-lg-5 mb-50">
                        <img src="{{ asset('assets/img/specialisation/nabh_compliance_hero.webp') }}" alt="NABH Compliance Engineering" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">NABH Compliance — full audit preparation, MEP system validation, DOP reports, air exchange verification, water testing documentation, as-built drawing sets, pre-inspection audit support.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Air Quality</div>
                                <div class="vl">Validated air exchange rates, pressure differentials & HEPA DOP reports</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">MGPS</div>
                                <div class="vl">Gas purity test reports, pressure decay records & alarm validation</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Safety</div>
                                <div class="vl">Fire NOC documentation, NBC 2016 compliance & emergency power records</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Documentation</div>
                                <div class="vl">Complete as-built drawings, SOPs, O&M manuals & warranty certificates</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">NABH Compliance</span><span class="spec-tag">Audit Clearance</span><span class="spec-tag">DOP Validation</span><span class="spec-tag">As-Built Drawings</span>
                        </div>
                    </div>
                    
                    <!-- Right Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-cta">
                            <h3>Need specialist MEP for your hospital area?</h3>
                            <p>Tell us the clinical area and we'll outline our approach and timeline.</p>
                            <a href="{{ route('contact') }}" class="btn-w">Discuss Your Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
