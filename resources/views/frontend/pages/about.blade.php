@extends('layouts.frontend.app')


@push('styles')
<style>
.about-hero {
    position: relative;
    padding: 160px 0 100px;
    background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
    color: #fff;
    text-align: center;
}
.about-hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: #fff;
}
.about-hero-title em {
    color: #0E9B9B;
    font-style: normal;
}
.about-hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.8);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

.story-section {
    padding: 100px 0;
    background: #fff;
}
.story-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #0F2044;
    margin-bottom: 30px;
}
.story-title span {
    color: #0E9B9B;
}
.story-content {
    font-size: 1.05rem;
    color: #4B5F70;
    line-height: 1.8;
}
.story-content p {
    margin-bottom: 20px;
}
.story-img-wrapper {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,0.1);
}
.story-img-wrapper img {
    width: 100%;
    height: auto;
    display: block;
}

.values-section {
    padding: 100px 0;
    background: #F6FAFA;
}
.values-header {
    text-align: center;
    margin-bottom: 60px;
}
.values-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #0F2044;
    margin-bottom: 15px;
}
.values-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.value-card {
    background: #fff;
    padding: 50px 30px;
    border-radius: 12px;
    text-align: center;
    transition: all 0.4s ease;
    border-bottom: 4px solid transparent;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}
.value-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(14, 155, 155, 0.1);
    border-bottom-color: #0E9B9B;
}
.value-icon {
    font-size: 3.5rem;
    color: #0E9B9B;
    margin-bottom: 25px;
}
.value-title {
    font-size: 1.4rem;
    font-weight: 800;
    color: #0F2044;
    margin-bottom: 15px;
}
.value-desc {
    font-size: 1rem;
    color: #4B5F70;
    line-height: 1.6;
}

.metrics-section {
    padding: 80px 0;
    background: #0F2044;
    color: #fff;
}
.metrics-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    text-align: center;
}
.metric-number {
    font-size: 3.5rem;
    font-weight: 900;
    color: #0E9B9B;
    margin-bottom: 10px;
}
.metric-label {
    font-size: 1.1rem;
    font-weight: 600;
    color: rgba(255,255,255,0.9);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cta-section {
    padding: 100px 0;
    text-align: center;
    background: #fff;
}
.cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #0F2044;
    margin-bottom: 25px;
}
.cta-desc {
    font-size: 1.1rem;
    color: #4B5F70;
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}
.btn-primary-custom {
    display: inline-block;
    padding: 15px 40px;
    background: #0E9B9B;
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    border-radius: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}
.btn-primary-custom:hover {
    background: #086b6b;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(14, 155, 155, 0.3);
}

@media (max-width: 991px) {
    .values-grid { grid-template-columns: repeat(2, 1fr); }
    .metrics-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
    .values-grid { grid-template-columns: 1fr; }
    .metrics-grid { grid-template-columns: 1fr; }
    .story-title { font-size: 1.8rem; }
    .about-hero-title { font-size: 2.5rem; }
}
</style>
@endpush

@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="about-hero">
            <div class="container">
                <h1 class="about-hero-title">About <em>Roydon MEP</em> - Top Hospitality & Healthcare Contractors</h1>
                <p class="about-hero-subtitle">Engineering the infrastructure of modern healthcare and luxury hospitality. We deliver zero-defect, high-velocity MEP solutions for India's largest hospitals, five star hotels, and luxury resorts.</p>
            </div>
        </section>

        <!-- Our Story Section -->
        <section class="story-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="story-content">
                            <h2 class="story-title">Pioneering <span>Precision Engineering</span> Across India</h2>
                            <p>Founded with a vision to revolutionize specialty contracting, Roydon MEP Contracting Pvt Ltd has emerged as a trusted single-point EPC partner for critical healthcare facilities and high-end commercial spaces.</p>
                            <p>From initial 3D BIM design coordination to final NABH & ISO validated handovers, our multidisciplinary team of engineers, project managers, and certified technicians brings deep domain expertise to complex engineering challenges.</p>
                            <p>We combine international technical standards (ASHRAE, NFPA, HTM 02-01, NBC) with rigorous site execution to deliver projects on time, within budget, and built for decades of reliable performance.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="story-img-wrapper">
                            <img src="{{ asset('assets/img/about.webp') }}" alt="Roydon MEP Project Team Engineering Execution">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Values Section -->
        <section class="values-section">
            <div class="container">
                <div class="values-header">
                    <h2 class="values-title">Driven by Quality & Integrity</h2>
                </div>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon"><i class="fa-light fa-shield-check"></i></div>
                        <h3 class="value-title">Compliance First</h3>
                        <p class="value-desc">Every system is engineered to pass NABH, NABL, and international audit standards seamlessly on the first attempt.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon"><i class="fa-light fa-cubes"></i></div>
                        <h3 class="value-title">BIM Coordination</h3>
                        <p class="value-desc">100% clash-free 3D BIM modeling ensures efficient installation and eliminates costly site rework.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon"><i class="fa-light fa-award"></i></div>
                        <h3 class="value-title">Zero-Defect Quality</h3>
                        <p class="value-desc">Rigorous multi-tier quality checks at every phase result in flawless commissioning and handover.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Metrics Section -->
        <section class="metrics-section">
            <div class="container">
                <div class="metrics-grid">
                    <div class="metric-item">
                        <div class="metric-number">8+</div>
                        <div class="metric-label">Completed Projects</div>
                    </div>
                    <div class="metric-item">
                        <div class="metric-number">3.4M+</div>
                        <div class="metric-label">Sq.Ft Engineered</div>
                    </div>
                    <div class="metric-item">
                        <div class="metric-number">100%</div>
                        <div class="metric-label">On-Time Handovers</div>
                    </div>
                    <div class="metric-item">
                        <div class="metric-number">24/7</div>
                        <div class="metric-label">Technical Support</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <h2 class="cta-title">Ready to Build With Confidence?</h2>
                <p class="cta-desc">Partner with the MEP contractor that understands clinical excellence. Let's discuss your project scope and timelines.</p>
                <a href="{{ route('contact') }}" class="btn-primary-custom">Contact Our Team</a>
            </div>
        </section>
    </main>
@endsection
