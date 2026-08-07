@extends('layouts.frontend.app')

@section('title', 'Modular & Prefabricated OT MEP | Roydon MEP Contracting')
@section('meta_description', 'Modular & Prefabricated OT MEP engineering — wall/ceiling panel integration, flush pendant drops, Hermetic doors, laminar flow plenums.')

@push('styles')
<style>
.spec-hero {
    position: relative;
    padding: 180px 0 100px;
    background-size: cover;
    background-position: center;
    color: #fff;
    margin-bottom: 60px;
}
.spec-hero::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(to right, rgba(15, 32, 68, 0.95), rgba(14, 155, 155, 0.7));
}
.spec-hero .container {
    position: relative;
    z-index: 2;
}
.spec-hero-subtitle {
    font-size: 1.1rem;
    color: #fff;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 15px;
    display: inline-block;
    background: rgba(255,255,255,0.1);
    padding: 5px 15px;
    border-radius: 50px;
}
.spec-hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 25px;
    color: #fff;
}
.spec-content-area {
    padding-bottom: 90px;
}
.spec-desc {
    font-size: 1.2rem;
    color: #4B5F70;
    line-height: 1.8;
    margin-bottom: 40px;
}
.spec-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 40px;
}
.spec-item {
    background: #F6FAFA;
    border-left: 4px solid #0E9B9B;
    padding: 20px 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    transition: transform 0.3s ease;
}
.spec-item:hover {
    transform: translateY(-5px);
}
.spec-item .lb {
    font-weight: 800;
    color: #0F2044;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}
.spec-item .vl {
    color: #4B5F70;
    font-size: 1rem;
    line-height: 1.6;
}
.spec-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
}
.spec-tag {
    font-size: 0.9rem;
    color: #0E9B9B;
    background: #E0F4F4;
    padding: 8px 18px;
    border-radius: 50px;
    font-weight: 700;
}
.sidebar-cta {
    background: #0F2044;
    padding: 40px;
    border-radius: 12px;
    color: #fff;
    text-align: center;
    position: sticky;
    top: 100px;
}
.sidebar-cta h3 {
    color: #fff;
    font-size: 1.8rem;
    margin-bottom: 15px;
}
.sidebar-cta p {
    color: rgba(255,255,255,0.8);
    margin-bottom: 30px;
}
.sidebar-cta .btn-w {
    background: #0E9B9B;
    color: #fff;
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 700;
    display: inline-block;
    transition: background 0.3s;
}
.sidebar-cta .btn-w:hover {
    background: #0C8888;
}
@media (max-width: 767px) {
    .spec-grid { grid-template-columns: 1fr; }
    .spec-hero-title { font-size: 2.2rem; }
}
</style>
@endpush

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="spec-hero" style="background-image: url('{{ asset('assets/img/specialisation/modular_ot_hero.webp') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="spec-hero-subtitle">Prefab Panels · Flush Services · Modular Design</div>
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
                        <img src="{{ asset('assets/img/specialisation/modular_ot_hero.webp') }}" alt="Modular OT MEP Works" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
                        <p class="spec-desc">Modular & Prefabricated OT MEP — pre-engineered wall panel integrations, stainless steel / HPL cladding, hermetically sealing sliding doors, ceiling pendant support structures, touch-screen surgeon control panels.</p>
                        
                        <div class="spec-grid">
                            <div class="spec-item">
                                <div class="lb">Cladding</div>
                                <div class="vl">Antibacterial SS/HPL wall panels with flush MEP cutouts</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Control Panel</div>
                                <div class="vl">Integrated surgeon control panel for gas, HVAC & lighting</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Pendants</div>
                                <div class="vl">Ceiling structural grid for heavy surgical & anesthesia pendants</div>
                            </div>
                            <div class="spec-item">
                                <div class="lb">Doors</div>
                                <div class="vl">Hermetically sealing automated sliding doors with air locks</div>
                            </div>
                        </div>
                        
                        <div class="spec-tags">
                            <span class="spec-tag">Modular OT</span>
                            <span class="spec-tag">HPL Wall Panels</span>
                            <span class="spec-tag">Surgeon Control Panel</span>
                            <span class="spec-tag">Hermetic Doors</span>
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
