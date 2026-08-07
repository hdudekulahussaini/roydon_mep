@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/icu_mep_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">Isolation Rooms · Dual Gas Pendants · 100% UPS</div>
                        <h1 class="spec-hero-title">ICU, NICU & CCU MEP</h1>
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
                        <img src="{{ asset('assets/img/specialisation/icu_mep_hero.webp') }}" alt="ICU, NICU & CCU MEP Execution" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">ICU, NICU & CCU MEP — positive/negative pressure isolation rooms with anterooms, dual-source MGPS bedhead columns, 100% UPS backup with zero break time, low-noise HVAC, nurse call integration.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Isolation</div>
                                <div class="vl">Negative pressure isolation rooms for airborne infection control</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">MGPS</div>
                                <div class="vl">Dual O₂, Vacuum & Medical Air connections per bed position</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Power</div>
                                <div class="vl">Class 1 & Class 2 isolated electrical supply with 100% UPS</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">HVAC</div>
                                <div class="vl">Low-decibel laminar & filtered air supply for infant/critical care</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">ICU MEP</span><span class="spec-tag">NICU Infrastructure</span><span class="spec-tag">Isolation Rooms</span><span class="spec-tag">Zero Break UPS</span>
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
