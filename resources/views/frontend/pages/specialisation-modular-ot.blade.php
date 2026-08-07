@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/modular_ot_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">HPL / Stainless Panels · LAF Ceilings · Hermetic Doors</div>
                        <h1 class="spec-hero-title">Modular & Prefabricated OT</h1>
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
                        <img src="{{ asset('assets/img/specialisation/modular_ot_hero.webp') }}" alt="Modular & Prefabricated OT MEP" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">Modular & Prefabricated OT — antibacterial HPL or SS wall paneling, ceiling pendant structural suspensions, integrated laminar airflow plenum with HEPA filters, hermetic sliding doors, surgical control panels.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Wall System</div>
                                <div class="vl">Antibacterial seamless HPL / Stainless Steel wall paneling</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Ceiling</div>
                                <div class="vl">Laminar airflow ceiling plenum with HEPA terminal filtration</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Pendants</div>
                                <div class="vl">Heavy-duty structural ceiling anchors for surgical & anesthesia pendants</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Doors</div>
                                <div class="vl">Hermetically sealed automatic sliding doors for pressure retention</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">Modular OT</span><span class="spec-tag">Prefabricated OT</span><span class="spec-tag">LAF Plenum</span><span class="spec-tag">Hermetic Doors</span>
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
