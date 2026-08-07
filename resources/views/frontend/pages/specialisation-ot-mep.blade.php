@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/ot_mep_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">Laminar Airflow · HEPA H14 · Isolated IT Power</div>
                        <h1 class="spec-hero-title">Operation Theatre (OT) MEP</h1>
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
                        <img src="{{ asset('assets/img/specialisation/ot_mep_hero.webp') }}" alt="Operation Theatre OT MEP Works" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">Operation Theatre (OT) MEP — laminar airflow ceiling plenums, HEPA H14 filtration, positive pressure control (+15 Pa), isolated IT power system with insulation monitoring, medical gas pendant drops, surgical lighting integration, scrub station plumbing.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">HVAC</div>
                                <div class="vl">Laminar flow plenum & HEPA H14 filters ensuring sterile surgical canopy</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Power</div>
                                <div class="vl">Isolated IT power supply with insulation monitoring & zero break UPS</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">MGPS</div>
                                <div class="vl">Ceiling pendant gas drops for anesthesia, oxygen & high-flow vacuum</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Plumbing</div>
                                <div class="vl">Hands-free sensor scrub sinks & thermostatic mixing valves</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">OT MEP Works</span><span class="spec-tag">Laminar Flow</span><span class="spec-tag">Isolated Power</span><span class="spec-tag">HEPA H14</span>
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
