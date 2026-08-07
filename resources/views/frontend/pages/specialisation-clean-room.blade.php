@extends('layouts.frontend.app')


@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/clean_room_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">ISO 14644 · HEPA H14 · Pressure Cascades</div>
                        <h1 class="spec-hero-title">Clean Room MEP</h1>
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
                        <img src="{{ asset('assets/img/specialisation/clean_room_hero.webp') }}" alt="Clean Room MEP Engineering" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">Clean room MEP — ISO 14644 Class 5 to 8 environments, HEPA/ULPA air handling, pressure differential control, flush wall/ceiling light integration, ESD flooring and validation testing (DOP, particle counts).</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Class</div>
                                <div class="vl">ISO Class 5 to Class 8 validated cleanrooms</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Air Handling</div>
                                <div class="vl">HEPA H14 / ULPA terminal filter modules with terminal dampers</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Controls</div>
                                <div class="vl">Differential pressure indicators and automated air balancing</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Validation</div>
                                <div class="vl">DOP testing, particle counts and air velocity profiling</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">Clean Room MEP</span><span class="spec-tag">ISO 14644</span><span class="spec-tag">HEPA H14</span><span class="spec-tag">Particle Counts</span>
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
