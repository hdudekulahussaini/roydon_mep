@extends('layouts.frontend.app')

@section('title', 'Cath Lab MEP Works | Roydon MEP Contracting')
@section('meta_description', 'Cath Lab MEP — radiation-shielded service penetrations, dedicated UPS, isolated IT system, precision chilled water cooling for imaging, medical gas, radiation-safe cable routing.')
@section('meta_keywords', 'Cath Lab MEP, Radiation Shielding MEP, Hospital Cath Lab Contractors, Precision Cooling Cath Lab, Isolated Power Cath Lab')

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/cath_lab_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">Radiation-Shielded · Isolated Power</div>
                        <h1 class="spec-hero-title">Cath Lab MEP Works</h1>
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
                        <img src="{{ asset('assets/img/specialisation/cath_lab_hero.webp') }}" alt="Cath Lab MEP Works" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">Cath lab MEP — radiation-shielded service penetrations, dedicated UPS, isolated IT system, precision chilled water cooling for imaging, medical gas, radiation-safe cable routing through shielded walls.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Shielding</div>
                                <div class="vl">Radiation-shielded MEP penetrations coordinated with physicist</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Power</div>
                                <div class="vl">Isolated IT system, UPS, dedicated circuits for imaging</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Cooling</div>
                                <div class="vl">Precision chilled water for C-arm and imaging heat rejection</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">MGPS</div>
                                <div class="vl">O₂, vacuum and medical air at procedural position</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">Cath Lab MEP</span>
                            <span class="spec-tag">Radiation Shield</span>
                            <span class="spec-tag">Isolated Power</span>
                            <span class="spec-tag">Precision Cooling</span>
                        </div>
                        
                        <div class="spec-seo">
                            SEO: cath lab MEP works · cath lab HVAC contractor · cath lab electrical systems
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
