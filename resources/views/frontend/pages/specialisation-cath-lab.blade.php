@extends('layouts.frontend.app')


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
    border-radius: 4px;
}
.spec-hero-title {
    font-size: 3.2rem;
    font-weight: 800;
    color: #fff;
    margin: 0;
}

.spec-content-area {
    padding-bottom: 100px;
}
.spec-desc {
    font-size: 1.15rem;
    line-height: 1.8;
    color: #4B5F70;
    margin-bottom: 40px;
}
.spec-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
    margin-bottom: 40px;
}
.spec-item {
    background: #F6FAFA;
    padding: 25px;
    border-radius: 8px;
    border-left: 4px solid #0E9B9B;
}
.spec-item .lb {
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #0E9B9B;
    margin-bottom: 5px;
}
.spec-item .vl {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0F2044;
}

.spec-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
}
.spec-tag {
    background: rgba(14, 155, 155, 0.1);
    color: #0E9B9B;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}
.spec-seo {
    font-size: 0.85rem;
    color: #8C9BA5;
    font-style: italic;
}

.sidebar-cta {
    background: #0F2044;
    color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    text-align: center;
}
.sidebar-cta h3 {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 15px;
}
.sidebar-cta p {
    color: rgba(255,255,255,0.8);
    font-size: 0.95rem;
    margin-bottom: 25px;
}
.sidebar-cta .btn-w {
    display: inline-block;
    width: 100%;
    padding: 12px;
    background: #0E9B9B;
    color: #fff;
    font-weight: 700;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.3s ease;
}
.sidebar-cta .btn-w:hover {
    background: #086b6b;
}

@media (max-width: 767px) {
    .spec-grid { grid-template-columns: 1fr; }
    .spec-hero-title { font-size: 2.2rem; }
}
</style>
@endpush

@section('content')
    <!-- main-area -->
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
                        <img src="{{ asset('assets/img/specialisation/cath_lab_hero.webp') }}" alt="Hospital MEP Specialisation" class="img-fluid rounded mb-4 shadow" style="width: 100%; height: 350px; object-fit: cover;">
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
                            <span class="spec-tag">Cath Lab MEP</span><span class="spec-tag">Radiation Shield</span><span class="spec-tag">Isolated Power</span><span class="spec-tag">Precision Cooling</span>
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
