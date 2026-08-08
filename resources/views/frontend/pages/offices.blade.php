@extends('layouts.frontend.app')

@push('styles')
    <style>
        .main-menu ul li a {
            font-size: 17px !important;
        }
    </style>

<style>
.office-hero {
    position: relative;
    padding: 160px 0 100px;
    background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
    color: #fff;
    text-align: center;
}
.office-hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: #fff;
}
.office-hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.8);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

.intro-section {
    padding: 80px 0 40px;
    text-align: center;
}
.intro-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #0F2044;
    margin-bottom: 20px;
}
.intro-desc {
    font-size: 1.1rem;
    color: #4B5F70;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.6;
}

.grid-section {
    padding: 40px 0 100px;
    background: #F6FAFA;
}
.office-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.office-card {
    background: #fff;
    border-radius: 12px;
    padding: 40px 30px;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    border-bottom: 4px solid transparent;
}
.office-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(14, 155, 155, 0.1);
    border-bottom-color: #0E9B9B;
}

.office-card-flag {
    font-size: 3rem;
    margin-bottom: 15px;
    display: inline-block;
}
.office-card-city {
    font-size: 1.8rem;
    font-weight: 900;
    color: #0F2044;
    margin-bottom: 5px;
}
.office-card-type {
    font-size: 1rem;
    font-weight: 700;
    color: #0E9B9B;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.office-card-desc {
    font-size: 1rem;
    color: #4B5F70;
    line-height: 1.6;
    margin-bottom: 20px;
}
.office-card-contact {
    margin-bottom: 20px;
    padding: 15px;
    background: #F6FAFA;
    border-radius: 8px;
}
.office-card-contact p {
    margin: 0 0 5px;
    font-size: 0.95rem;
    color: #0F2044;
    font-weight: 500;
}
.office-card-contact p:last-child {
    margin-bottom: 0;
}
.office-card-seo {
    font-size: 0.85rem;
    color: #9AA9B5;
    font-style: italic;
}

.coverage-section {
    padding: 100px 0;
    background: #0F2044;
    color: #fff;
}
.coverage-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 15px;
    text-align: center;
}
.coverage-subtitle {
    font-size: 1.2rem;
    color: #0E9B9B;
    margin-bottom: 50px;
    text-align: center;
}
.coverage-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    text-align: center;
}
.coverage-item {
    background: rgba(255,255,255,0.05);
    padding: 20px 15px;
    border-radius: 8px;
    transition: background 0.3s ease;
}
.coverage-item:hover {
    background: rgba(14, 155, 155, 0.2);
}
.coverage-city {
    font-size: 1.1rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 5px;
}
.coverage-state {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.7);
}

@media (max-width: 991px) {
    .office-grid { grid-template-columns: repeat(2, 1fr); }
    .coverage-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 767px) {
    .office-grid { grid-template-columns: 1fr; }
    .coverage-grid { grid-template-columns: repeat(2, 1fr); }
}
</style>
@endpush

@section('content')
    <!-- main-area -->
    <main>
        <!-- Hero Section -->
        <section class="office-hero">
            <div class="container">
                <h1 class="office-hero-title">Hospital MEP Contractor<br>Hyderabad & Across India</h1>
                <p class="office-hero-subtitle">Headquartered in Hyderabad with offices in Bengaluru, Dubai and Saudi — delivering hospital MEP execution across India and the Gulf. London and Munich upcoming.</p>
            </div>
        </section>

        <!-- Intro Section -->
        <section class="intro-section">
            <div class="container">
                <h2 class="intro-title">Our Offices</h2>
                <p class="intro-desc">Pan-India delivery. International presence.<br>We mobilise to any hospital project in India within 48 hours. Our Dubai and Saudi offices provide on-the-ground support for GCC projects.</p>
            </div>
        </section>

        <!-- Grid Section -->
        <section class="grid-section">
            <div class="container">
                <div class="office-grid">
                    <!-- Hyderabad -->
                    <div class="office-card wow fadeInUp" data-wow-delay="0.1s">
                        <div class="office-card-flag">🇮🇳</div>
                        <div class="office-card-city">Hyderabad</div>
                        <div class="office-card-type">Telangana, India — Corporate HQ</div>
                        <div class="office-card-desc">Engineering, fabrication, project management and delivery. All four MEP disciplines designed and executed from Hyderabad.</div>
                        <div class="office-card-contact">
                            <p><i class="fa-solid fa-location-dot"></i> N Square, Hitec City, Plot No 34B<br>Opp. N Convention, Hyderabad – 500081</p>
                            <p><i class="fa-solid fa-phone"></i> +91-73307 56745</p>
                            <p><i class="fa-solid fa-envelope"></i> info@roydonmep.com</p>
                        </div>
                        <div class="office-card-seo">Hospital MEP contractor Hyderabad · Medical gas contractor Telangana · Hospital HVAC contractor Hyderabad · NABH hospital MEP Hyderabad</div>
                    </div>
                    
                    <!-- Bengaluru -->
                    <div class="office-card wow fadeInUp" data-wow-delay="0.2s">
                        <div class="office-card-flag">🇮🇳</div>
                        <div class="office-card-city">Bengaluru</div>
                        <div class="office-card-type">Karnataka, India — Branch Office</div>
                        <div class="office-card-desc">Project management and commissioning for South India — Karnataka, Tamil Nadu, Kerala and Andhra Pradesh hospital projects.</div>
                        <div class="office-card-contact">
                            <p><i class="fa-solid fa-location-dot"></i> Bengaluru, Karnataka</p>
                            <p><i class="fa-solid fa-envelope"></i> bangalore@roydonmep.com</p>
                        </div>
                        <div class="office-card-seo">Hospital MEP contractor Bangalore · Healthcare MEP company Bengaluru · Hospital electrical contractor Karnataka</div>
                    </div>
                    
                    <!-- Dubai -->
                    <div class="office-card wow fadeInUp" data-wow-delay="0.3s">
                        <div class="office-card-flag">🇦🇪</div>
                        <div class="office-card-city">Dubai</div>
                        <div class="office-card-type">UAE — Development Studio</div>
                        <div class="office-card-desc">Middle-East operations for hospital and healthcare infrastructure across UAE, Oman and GCC. DEWA-compliant electrical and MEP execution.</div>
                        <div class="office-card-contact">
                            <p><i class="fa-solid fa-location-dot"></i> Dubai, United Arab Emirates</p>
                            <p><i class="fa-solid fa-envelope"></i> dubai@roydonmep.com</p>
                        </div>
                        <div class="office-card-seo">Hospital MEP contractor Dubai · Healthcare MEP contractor UAE · Medical gas contractor UAE</div>
                    </div>
                    
                    <!-- Riyadh -->
                    <div class="office-card wow fadeInUp" data-wow-delay="0.4s">
                        <div class="office-card-flag">🇸🇦</div>
                        <div class="office-card-city">Riyadh</div>
                        <div class="office-card-type">Saudi Arabia — Regional Coordination</div>
                        <div class="office-card-desc">Saudi Vision 2030 healthcare infrastructure — hospitals, clinics and medical cities across the Kingdom.</div>
                        <div class="office-card-contact">
                            <p><i class="fa-solid fa-location-dot"></i> Riyadh, Saudi Arabia</p>
                            <p><i class="fa-solid fa-envelope"></i> saudi@roydonmep.com</p>
                        </div>
                        <div class="office-card-seo">Hospital MEP contractor Saudi Arabia · Healthcare MEP contractor Riyadh · Medical gas contractor KSA</div>
                    </div>
                    
                    <!-- London -->
                    <div class="office-card wow fadeInUp" data-wow-delay="0.5s">
                        <div class="office-card-flag">🇬🇧</div>
                        <div class="office-card-city">London</div>
                        <div class="office-card-type">United Kingdom — Upcoming 2026</div>
                        <div class="office-card-desc">UK advisory, technical consultancy and project management. HTM 02-01 MGPS, HTM 03-01 HVAC and healthcare electrical for NHS and private hospital projects.</div>
                        <div class="office-card-contact">
                            <p><i class="fa-solid fa-location-dot"></i> London, United Kingdom</p>
                            <p><i class="fa-solid fa-envelope"></i> london@roydonmep.com</p>
                        </div>
                        <div class="office-card-seo">Hospital MEP consultant UK · HTM 02-01 MGPS contractor · Healthcare MEP contractor London</div>
                    </div>
                    
                    <!-- Munich -->
                    <div class="office-card wow fadeInUp" data-wow-delay="0.6s">
                        <div class="office-card-flag">🇩🇪</div>
                        <div class="office-card-city">Munich</div>
                        <div class="office-card-type">Germany — Upcoming 2026</div>
                        <div class="office-card-desc">European coordination, engineering partnerships and liaison for German and European hospital clients.</div>
                        <div class="office-card-contact">
                            <p><i class="fa-solid fa-location-dot"></i> Munich, Germany</p>
                            <p><i class="fa-solid fa-envelope"></i> munich@roydonmep.com</p>
                        </div>
                        <div class="office-card-seo">Hospital MEP contractor Germany · Healthcare MEP consultant Europe</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Coverage Section -->
        <section class="coverage-section">
            <div class="container">
                <h2 class="coverage-title">Pan-India Coverage</h2>
                <p class="coverage-subtitle">We deliver hospital MEP anywhere in India</p>
                <div class="coverage-grid">
                    <div class="coverage-item">
                        <div class="coverage-city">Hyderabad</div>
                        <div class="coverage-state">Telangana</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Bengaluru</div>
                        <div class="coverage-state">Karnataka</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Chennai</div>
                        <div class="coverage-state">Tamil Nadu</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Mumbai</div>
                        <div class="coverage-state">Maharashtra</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Delhi</div>
                        <div class="coverage-state">NCR</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Pune</div>
                        <div class="coverage-state">Maharashtra</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Visakhapatnam</div>
                        <div class="coverage-state">AP</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Vijayawada</div>
                        <div class="coverage-state">AP</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Kochi</div>
                        <div class="coverage-state">Kerala</div>
                    </div>
                    <div class="coverage-item">
                        <div class="coverage-city">Ahmedabad</div>
                        <div class="coverage-state">Gujarat</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- main-area-end -->
@endsection
