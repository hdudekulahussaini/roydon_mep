@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/cssd_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">Three-Zone Zoning · Pure Steam · RO Supply</div>
                        <h1 class="spec-hero-title">CSSD & Sterile Services</h1>
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
                        <img src="{{ asset('assets/img/specialisation/cssd_hero.webp') }}" alt="CSSD & Sterile Services MEP" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">CSSD MEP — three-zone workflow (Dirty / Clean / Sterile), pure steam lines for autoclaves, RO water loop, dedicated exhaust for washer-disinfectors, compressed air and differential pressure zoning.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Zoning</div>
                                <div class="vl">Strict dirty-to-clean pressure cascades between zones</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Steam & RO</div>
                                <div class="vl">Pure steam boiler piping and RO water loop for autoclaves</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Exhaust</div>
                                <div class="vl">High-capacity heat and moisture extraction from washers</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Air Quality</div>
                                <div class="vl">Filtered air supply maintaining sterility in packing zone</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">CSSD MEP</span><span class="spec-tag">Sterile Services</span><span class="spec-tag">Pure Steam</span><span class="spec-tag">RO Loop</span>
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
