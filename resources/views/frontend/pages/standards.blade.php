@extends('layouts.frontend.app')

@push('styles')
<style>
.std-hero {
    position: relative;
    padding: 160px 0 100px;
    background: linear-gradient(135deg, #082020 0%, #0F2044 100%);
    color: #fff;
    text-align: center;
}
.std-hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: #fff;
}
.std-hero-title em {
    color: #0E9B9B;
    font-style: normal;
}
.std-hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255,255,255,0.8);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

.std-banner-section {
    padding: 60px 0;
    background: #F6FAFA;
    text-align: center;
}
.std-banner-img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.std-section {
    padding: 80px 0 40px;
}
.std-section-bg {
    background: #F6FAFA;
}
.std-section-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #0F2044;
    margin-bottom: 50px;
    text-align: center;
}
.std-section-title span {
    color: #0E9B9B;
}

.std-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.std-card {
    background: #fff;
    border: 1px solid #D5E5E5;
    border-radius: 12px;
    padding: 40px 30px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    z-index: 1;
}
.std-card-bg {
    background: #F6FAFA;
}
.std-card:hover {
    border-color: #0E9B9B;
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(14, 155, 155, 0.15);
}
.std-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: #0E9B9B;
    transform: scaleY(0);
    transform-origin: bottom;
    transition: transform 0.4s ease;
    z-index: -1;
}
.std-card:hover::before {
    transform: scaleY(1);
}

.std-card-icon {
    font-size: 3rem;
    color: #0E9B9B;
    margin-bottom: 25px;
    transition: all 0.4s ease;
}
.std-card:hover .std-card-icon {
    color: #fff;
    transform: scale(1.1) rotate(5deg);
}

.std-card-abbr {
    font-size: 1.5rem;
    font-weight: 900;
    color: #0F2044;
    margin-bottom: 5px;
    transition: color 0.4s ease;
}
.std-card:hover .std-card-abbr {
    color: #fff;
}

.std-card-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0E9B9B;
    margin-bottom: 20px;
    line-height: 1.4;
    transition: color 0.4s ease;
}
.std-card:hover .std-card-title {
    color: rgba(255,255,255,0.9);
}

.std-card-desc {
    font-size: 1rem;
    color: #4B5F70;
    line-height: 1.6;
    margin-bottom: 20px;
    transition: color 0.4s ease;
}
.std-card:hover .std-card-desc {
    color: rgba(255,255,255,0.8);
}

.std-card-applied {
    font-size: 0.9rem;
    font-weight: 700;
    color: #fff;
    background: #0F2044;
    padding: 5px 12px;
    border-radius: 4px;
    display: inline-block;
    transition: all 0.4s ease;
}
.std-card:hover .std-card-applied {
    background: #fff;
    color: #0E9B9B;
}

.baseline-section {
    padding: 80px 0;
    background: #0F2044;
    color: #fff;
}
.baseline-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 50px;
    text-align: center;
}
.baseline-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    text-align: center;
}
.baseline-item .icon {
    font-size: 3rem;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
    display: inline-block;
}
.baseline-item:hover .icon {
    transform: scale(1.2) translateY(-5px);
}
.baseline-item h4 {
    color: #0E9B9B;
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 15px;
}
.baseline-item p {
    color: rgba(255,255,255,0.8);
    font-size: 1rem;
    line-height: 1.6;
}

@media (max-width: 991px) {
    .std-grid { grid-template-columns: repeat(2, 1fr); }
    .baseline-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
    .std-grid { grid-template-columns: 1fr; }
    .baseline-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')
    <!-- main-area -->
    <main>
        <section class="std-hero">
            <div class="container">
                <h1 class="std-hero-title">Certifications, Standards<br><em>&amp; Compliance</em></h1>
                <p class="std-hero-subtitle">We engineer to the standards that govern hospital operation in India and internationally — not as a checkbox, but as a baseline for every design decision.</p>
            </div>
        </section>

        <!-- Image Banner Section -->
        <section class="std-banner-section">
            <div class="container">
                <img src="{{ asset('assets/img/standards.webp') }}" alt="Roydon MEP - Turnkey MEP Contractors in Hyderabad" class="std-banner-img">
            </div>
        </section>

        <!-- Section 1: Healthcare Accreditation -->
        <section class="std-section">
            <div class="container">
                <h2 class="std-section-title">Healthcare <span>Accreditation</span></h2>
                <div class="std-grid">
                    <div class="std-card">
                        <div class="std-card-icon"><i class="fa-light fa-shield-check"></i></div>
                        <div class="std-card-abbr">NABH</div>
                        <div class="std-card-title">National Accreditation Board for Hospitals & Healthcare Providers</div>
                        <div class="std-card-desc">All MEP systems designed to support NABH Entry Level and Full Accreditation — environment of care, infection control, patient safety, facility management. Documentation in NABH-ready format from handover.</div>
                        <div class="std-card-applied">Applied to: All hospital projects</div>
                    </div>
                    <div class="std-card">
                        <div class="std-card-icon"><i class="fa-light fa-flask"></i></div>
                        <div class="std-card-abbr">NABL</div>
                        <div class="std-card-title">National Accreditation Board for Testing & Calibration Laboratories</div>
                        <div class="std-card-desc">MEP for NABL-accredited labs — temperature-controlled storage, validated HVAC, electrical conditioning and clean water supply to ISO 15189 facility requirements.</div>
                        <div class="std-card-applied">Applied to: Laboratories, diagnostic centres</div>
                    </div>
                    <div class="std-card">
                        <div class="std-card-icon"><i class="fa-light fa-fan"></i></div>
                        <div class="std-card-abbr">ASHRAE 170</div>
                        <div class="std-card-title">Ventilation of Health Care Facilities</div>
                        <div class="std-card-desc">Primary standard for healthcare HVAC — ACH rates, pressure relationships, temperature, humidity and filtration for every clinical area from OT to ward. Applied to all our HVAC designs as standard.</div>
                        <div class="std-card-applied">Applied to: All HVAC systems</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Fire & Life Safety -->
        <section class="std-section std-section-bg">
            <div class="container">
                <h2 class="std-section-title">Fire & <span>Life Safety</span></h2>
                <div class="std-grid">
                    <div class="std-card std-card-bg">
                        <div class="std-card-icon"><i class="fa-light fa-notes-medical"></i></div>
                        <div class="std-card-abbr">NFPA 99</div>
                        <div class="std-card-title">Health Care Facilities Code</div>
                        <div class="std-card-desc">Comprehensive standard for health care facility systems — medical gas, electrical, HVAC and fire protection. Referenced for all MGPS and electrical system design, installation and testing.</div>
                        <div class="std-card-applied">Applied to: MGPS, electrical, HVAC</div>
                    </div>
                    <div class="std-card std-card-bg">
                        <div class="std-card-icon"><i class="fa-light fa-shower"></i></div>
                        <div class="std-card-abbr">NFPA 13</div>
                        <div class="std-card-title">Standard for Installation of Sprinkler Systems</div>
                        <div class="std-card-desc">Automatic sprinkler system design for hospitals — OH2 hazard classification, 5 mm/min density, 216 m² design area, hydraulic calculation methodology.</div>
                        <div class="std-card-applied">Applied to: Sprinkler systems</div>
                    </div>
                    <div class="std-card std-card-bg">
                        <div class="std-card-icon"><i class="fa-light fa-person-running-fast"></i></div>
                        <div class="std-card-abbr">NFPA 101</div>
                        <div class="std-card-title">Life Safety Code</div>
                        <div class="std-card-desc">Egress design, occupancy loads, travel distances, refuge area sizing, compartmentation for hospital occupancies including the specific healthcare occupancy chapter.</div>
                        <div class="std-card-applied">Applied to: Fire egress, life safety</div>
                    </div>
                    <div class="std-card std-card-bg">
                        <div class="std-card-icon"><i class="fa-light fa-building-shield"></i></div>
                        <div class="std-card-abbr">NBC 2016</div>
                        <div class="std-card-title">National Building Code of India</div>
                        <div class="std-card-desc">Parts 4 (Fire), 8 (MEP) and 9 (Plumbing) of NBC 2016 — the baseline for all Indian hospital MEP works. Fire protection, ventilation, electrical and sanitation requirements.</div>
                        <div class="std-card-applied">Applied to: All disciplines</div>
                    </div>
                    <div class="std-card std-card-bg">
                        <div class="std-card-icon"><i class="fa-light fa-bell-on"></i></div>
                        <div class="std-card-abbr">IS 2189</div>
                        <div class="std-card-title">Fire Detection & Alarm Systems</div>
                        <div class="std-card-desc">Indian standard for fire detection and alarm systems — addressable systems, detector spacing, zone layouts, alarm verification and panel specifications for hospital occupancies.</div>
                        <div class="std-card-applied">Applied to: Fire alarm systems</div>
                    </div>
                    <div class="std-card std-card-bg">
                        <div class="std-card-icon"><i class="fa-light fa-fire-extinguisher"></i></div>
                        <div class="std-card-abbr">IS 3844</div>
                        <div class="std-card-title">Internal Fire Hydrant Systems</div>
                        <div class="std-card-desc">Wet riser, landing valve, hose reel and hydrant system design — flow rates, pipe sizing, pump capacity and testing for healthcare occupancies.</div>
                        <div class="std-card-applied">Applied to: Fire hydrant systems</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Medical Gas & Electrical -->
        <section class="std-section">
            <div class="container">
                <h2 class="std-section-title">Medical Gas <span>& Electrical</span></h2>
                <div class="std-grid">
                    <div class="std-card">
                        <div class="std-card-icon"><i class="fa-light fa-lungs"></i></div>
                        <div class="std-card-abbr">HTM 02-01</div>
                        <div class="std-card-title">Medical Gas Pipeline Systems</div>
                        <div class="std-card-desc">UK Health Technical Memorandum — the most comprehensive MGPS design, installation and testing standard. Used as the benchmark for all our MGPS installations globally.</div>
                        <div class="std-card-applied">Applied to: All MGPS installations</div>
                    </div>
                    <div class="std-card">
                        <div class="std-card-icon"><i class="fa-light fa-plug"></i></div>
                        <div class="std-card-abbr">IS 732 / IEC 60364-7-710</div>
                        <div class="std-card-title">Electrical Installation in Medical Locations</div>
                        <div class="std-card-desc">Isolated power systems (IT), equipotential bonding in OTs and ICUs, insulation monitoring, special socket requirements for OTs and cardiac care areas.</div>
                        <div class="std-card-applied">Applied to: OT, Cath Lab, ICU power</div>
                    </div>
                    <div class="std-card">
                        <div class="std-card-icon"><i class="fa-light fa-bolt"></i></div>
                        <div class="std-card-abbr">IS 3043 / SMACNA / CEA</div>
                        <div class="std-card-title">Earthing, Ductwork & HT Standards</div>
                        <div class="std-card-desc">IS 3043 for TN-S earthing and lightning protection. SMACNA for GI ductwork construction. CEA regulations for HT electrical installations above 1 kV.</div>
                        <div class="std-card-applied">Applied to: Earthing, HVAC, HT electrical</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Section: Why Compliance Is Our Baseline -->
        <section class="baseline-section">
            <div class="container">
                <h2 class="baseline-title">Why Compliance Is Our Baseline</h2>
                <div class="baseline-grid">
                    <div class="baseline-item">
                        <div class="icon">🛡️</div>
                        <h4>NABH Ready</h4>
                        <p>All documentation in NABH-ready format from handover</p>
                    </div>
                    <div class="baseline-item">
                        <div class="icon">🔥</div>
                        <h4>Fire NOC Support</h4>
                        <p>As-built drawings and inspection support for fire authority</p>
                    </div>
                    <div class="baseline-item">
                        <div class="icon">⚡</div>
                        <h4>Electrical Safety</h4>
                        <p>CEA-compliant HT/LT installations with full test reports</p>
                    </div>
                    <div class="baseline-item">
                        <div class="icon">🌡️</div>
                        <h4>HVAC Commissioning</h4>
                        <p>Air balance reports, particle counts, pressure certificates</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
