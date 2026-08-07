@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/diagnostic_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">RF Shielding · Quench Pipes · Precision Cooling</div>
                        <h1 class="spec-hero-title">Diagnostic Centre MEP</h1>
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
                        <img src="{{ asset('assets/img/specialisation/diagnostic_hero.webp') }}" alt="Diagnostic Centre MEP" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">Diagnostic centre MEP — Faraday cage RF shielding for MRI, lead-lined walls for CT/X-Ray, quench pipe exhaust routes, dedicated precision chillers, heavy-duty electrical supply, vibration isolation.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Shielding</div>
                                <div class="vl">Faraday cage & lead wall penetrations engineered with OEM</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Quench Pipe</div>
                                <div class="vl">Cryogenic helium emergency quench pipe routing for MRI</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Power</div>
                                <div class="vl">High-kVA transformer and dedicated distribution for heavy imaging</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Cooling</div>
                                <div class="vl">Precision air conditioning & chiller loops for gradient coils</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">Diagnostic MEP</span><span class="spec-tag">MRI Shielding</span><span class="spec-tag">Quench Pipe</span><span class="spec-tag">CT Scan MEP</span>
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
