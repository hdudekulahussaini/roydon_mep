<?php

namespace Database\Seeders;

use App\Models\ComplianceStandard;
use App\Models\ContactSetting;
use App\Models\Faq;
use App\Models\HospitalSpecialisation;
use App\Models\Project;
use App\Models\StandardsBaselineItem;
use App\Models\StandardsPageSetting;
use App\Models\User;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (! User::where('email', 'admin@roydonmep.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@roydonmep.com',
                'password' => 'password',
            ]);
        }

        if (HospitalSpecialisation::count() === 0) {
            HospitalSpecialisation::create([
                'title' => 'Operation Theatre',
                'description' => 'Laminar airflow, HEPA H14, isolated power, NABH validated commissioning.',
                'icon' => 'fa-light fa-microscope',
            ]);
            HospitalSpecialisation::create([
                'title' => 'ICU & NICU',
                'description' => 'Bed-head units, MGPS outlets, UPS-backed power, HEPA H13 HVAC.',
                'icon' => 'fa-light fa-hospital-user',
            ]);
            HospitalSpecialisation::create([
                'title' => 'Cath Lab',
                'description' => 'Radiation-shielded penetrations, isolated power, precision cooling.',
                'icon' => 'fa-light fa-heart-pulse',
            ]);
            HospitalSpecialisation::create([
                'title' => 'Clean Rooms',
                'description' => 'ISO Class 5–8 validated ACH, pressure differentials, HEPA H14.',
                'icon' => 'fa-light fa-broom',
            ]);
            HospitalSpecialisation::create([
                'title' => 'Diagnostic Centres',
                'description' => 'MRI/CT cooling, quench pipe, EMF shielding, UPS conditioning.',
                'icon' => 'fa-light fa-telescope',
            ]);
            HospitalSpecialisation::create([
                'title' => 'CSSD',
                'description' => 'Steam supply, 93°C HWS, validated HVAC, sterile drainage.',
                'icon' => 'fa-light fa-vial',
            ]);
            HospitalSpecialisation::create([
                'title' => 'Modular OT',
                'description' => 'Prefab OT MEP, factory-coordinated, NABH-ready in 8–12 weeks.',
                'icon' => 'fa-light fa-industry',
            ]);
            HospitalSpecialisation::create([
                'title' => 'NABH Projects',
                'description' => 'Entry & Full Accreditation, pre-assessment audit support.',
                'icon' => 'fa-light fa-shield-check',
            ]);
        }

        if (WhyChooseUs::count() === 0) {
            WhyChooseUs::create([
                'sub_title' => 'Why Choose Us',
                'title' => 'Why Roydon MEP Contracting',
                'description' => 'We design and execute to NABH and international standards from day one, ensuring your healthcare facility is fully compliant and safe.',
                'image' => 'assets/img/bg/electrical_service.webp',
            ]);
        }

        if (WhyChooseUsItem::count() === 0) {
            WhyChooseUsItem::create([
                'title' => 'One-Time Completion',
                'description' => 'Single-agency accountability from civil works through MEP handover. No multi-vendor coordination, no finger-pointing.',
            ]);
            WhyChooseUsItem::create([
                'title' => 'In-House Workforce',
                'description' => 'Direct-employed execution teams, not subcontracted labour. Full control over quality and timelines.',
            ]);
            WhyChooseUsItem::create([
                'title' => 'In-House Design + BIM',
                'description' => 'Integrated design capability via SUVIH Engineering, backed by BIM-driven coordination — eliminating design-to-execution handoff loss and clash rework.',
            ]);
            WhyChooseUsItem::create([
                'title' => 'Hospital-Only Expertise',
                'description' => 'Purpose-built for healthcare: NABH, NFPA, ASHRAE 170, HTM 02-01 compliance, medical gas systems, OT/ICU-grade HVAC.',
            ]);
            WhyChooseUsItem::create([
                'title' => 'Zero-Defects Track Record',
                'description' => 'Proven on Neelima Hospitals: 1,300 beds, 800,000 sq ft, delivered in 70 days, zero defects at handover.',
            ]);
            WhyChooseUsItem::create([
                'title' => 'ISO-Certified Quality Systems',
                'description' => 'Process discipline backed by certification, not just claimed.',
            ]);
        }

        if (Project::count() === 0) {
            Project::create([
                'title' => 'Neelima Hospitals, Hyderabad',
                'image' => 'assets/img/projects/neelima_hospital.webp',
                'type' => 'Multispeciality',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => '900',
                'scale' => '500,000 sq ft',
                'scope' => 'Full MEP — No sub-bids',
                'location' => 'Hyderabad, Telangana',
                'programme' => '70 Days',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'Trust Multispeciality Hospitals, Kakinada',
                'image' => 'assets/img/projects/trust_hospital.webp',
                'type' => 'Multispeciality',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => '250',
                'scale' => '220,000 sq ft',
                'scope' => 'Full MEP — No sub-bids',
                'location' => 'Kakinada, Andhra Pradesh',
                'programme' => '4 Months',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'Landmark Multi-Speciality Hospital, Hyderabad',
                'image' => 'assets/img/projects/landmark_hospital.webp',
                'type' => 'Multispeciality',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => '200',
                'scale' => '170,000 sq ft',
                'scope' => 'Full MEP — No sub-bids',
                'location' => 'Hyderabad, Telangana',
                'programme' => '5 Months',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'Hope Hospital, Bengaluru',
                'image' => 'assets/img/projects/hope_hospital.webp',
                'type' => 'Multispeciality',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => '60',
                'scale' => '70,000 sq ft',
                'scope' => 'Full MEP — No sub-bids',
                'location' => 'Bengaluru, Karnataka',
                'programme' => '5 Months',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'Corporate Office, Hyderabad',
                'image' => 'assets/img/projects/corporate_office.webp',
                'type' => 'Commercial',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => 'N/A',
                'scale' => '100,000 sq ft',
                'scope' => 'Electrical & HVAC',
                'location' => 'Hyderabad, Telangana',
                'programme' => '6 Months',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'Hotel Project, Bengaluru',
                'image' => 'assets/img/projects/hotel_project.webp',
                'type' => 'Hospitality',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => 'N/A',
                'scale' => '150,000 sq ft',
                'scope' => 'Full MEP',
                'location' => 'Bengaluru, Karnataka',
                'programme' => '8 Months',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'N Square Building, Hyderabad',
                'image' => 'assets/img/projects/n_square_building.webp',
                'type' => 'Commercial',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => 'N/A',
                'scale' => '120,000 sq ft',
                'scope' => 'Plumbing & Fire',
                'location' => 'Hyderabad, Telangana',
                'programme' => '5 Months',
                'result' => 'Zero defect handover',
            ]);
            Project::create([
                'title' => 'Fire Fighting System, Pan-India',
                'image' => 'assets/img/projects/fire_fighting_system.webp',
                'type' => 'Life Safety',
                'tags' => 'HVAC, MGPS, Electrical, Fire, Plumbing',
                'beds' => 'N/A',
                'scale' => 'Various',
                'scope' => 'Fire Fighting',
                'location' => 'Pan-India',
                'programme' => 'Ongoing',
                'result' => 'Compliance certified',
            ]);
        }

        if (Faq::count() === 0) {
            Faq::create([
                'question' => 'What does "Hospital Civil & MEP Turnkey Contracting" mean?',
                'answer' => 'It means Roydon handles everything from civil works to full MEP installation — electrical, HVAC, medical gas, fire fighting, plumbing, and ELV systems — under one contract, with one team accountable for the entire build, not a patchwork of subcontractors.',
            ]);
            Faq::create([
                'question' => 'Do you only work on hospital projects, or general commercial buildings too?',
                'answer' => 'Roydon specializes exclusively in healthcare facilities. This focus means our teams work to hospital-specific standards (NABH, NFPA, ASHRAE 170, HTM 02-01) as a default, not as an add-on — something general contractors typically can\'t match.',
            ]);
            Faq::create([
                'question' => 'Do you handle design in-house?',
                'answer' => 'Design is handled in-house through ROYDON\'s own engineering design capability, coordinated with BIM. This keeps design and execution in the same ecosystem, eliminating the handoff losses and clash conflicts common when design and execution are separate vendors.',
            ]);
            Faq::create([
                'question' => 'What is your track record on project delivery timelines?',
                'answer' => 'Our flagship project, Neelima Hospitals — 1,300 beds across 800,000 sq ft — was delivered in 70 days with zero defects at handover. Fast-track delivery is a core capability, not an exception.',
            ]);
            Faq::create([
                'question' => 'What does "zero-defects handover" actually mean in practice?',
                'answer' => 'It means the facility is commissioned and ready for clinical use without a punch-list of corrections after handover — critical for hospitals where operational downtime has real cost and patient-safety implications.',
            ]);
            Faq::create([
                'question' => 'Do you use your own workforce, or subcontracted labour?',
                'answer' => 'Roydon uses a directly-employed, in-house execution workforce rather than third-party labour contractors. This gives us direct control over quality, schedule, and site discipline.',
            ]);
            Faq::create([
                'question' => 'Are you ISO certified?',
                'answer' => 'Yes — our quality management processes are ISO-certified, not just internally claimed.',
            ]);
            Faq::create([
                'question' => 'What MEP disciplines are covered under one contract?',
                'answer' => 'Civil Works, Electrical, HVAC, Medical Gas, Fire Fighting, Plumbing & Fire Sanitation, Public Health, and ELV/Low Current systems — all under a single scope and single point of accountability.',
            ]);
            Faq::create([
                'question' => 'Can you handle live/operational hospital fit-outs, or only greenfield builds?',
                'answer' => 'Both. We\'ve delivered greenfield turnkey builds as well as fit-outs and phased upgrades within operational or near-operational hospital environments, where sequencing and infection-control protocols are critical.',
            ]);
            Faq::create([
                'question' => 'How do you ensure compliance with medical gas and OT/ICU HVAC standards?',
                'answer' => 'These are core specializations, not general capabilities we\'ve added on — our teams are built around NABH/NFPA/ASHRAE 170/HTM 02-01 compliance from design through commissioning.',
            ]);
        }

        if (ComplianceStandard::count() === 0) {
            // Category: Healthcare
            ComplianceStandard::create([
                'category' => 'healthcare',
                'icon' => 'fa-light fa-shield-check',
                'abbr' => 'NABH',
                'title' => 'National Accreditation Board for Hospitals & Healthcare Providers',
                'description' => 'All MEP systems designed to support NABH Entry Level and Full Accreditation — environment of care, infection control, patient safety, facility management. Documentation in NABH-ready format from handover.',
                'applied_to' => 'All hospital projects',
            ]);
            ComplianceStandard::create([
                'category' => 'healthcare',
                'icon' => 'fa-light fa-flask',
                'abbr' => 'NABL',
                'title' => 'National Accreditation Board for Testing & Calibration Laboratories',
                'description' => 'MEP for NABL-accredited labs — temperature-controlled storage, validated HVAC, electrical conditioning and clean water supply to ISO 15189 facility requirements.',
                'applied_to' => 'Laboratories, diagnostic centres',
            ]);
            ComplianceStandard::create([
                'category' => 'healthcare',
                'icon' => 'fa-light fa-fan',
                'abbr' => 'ASHRAE 170',
                'title' => 'Ventilation of Health Care Facilities',
                'description' => 'Primary standard for healthcare HVAC — ACH rates, pressure relationships, temperature, humidity and filtration for every clinical area from OT to ward. Applied to all our HVAC designs as standard.',
                'applied_to' => 'All HVAC systems',
            ]);

            // Category: Fire & Safety
            ComplianceStandard::create([
                'category' => 'fire-safety',
                'icon' => 'fa-light fa-notes-medical',
                'abbr' => 'NFPA 99',
                'title' => 'Health Care Facilities Code',
                'description' => 'Comprehensive standard for health care facility systems — medical gas, electrical, HVAC and fire protection. Referenced for all MGPS and electrical system design, installation and testing.',
                'applied_to' => 'MGPS, electrical, HVAC',
            ]);
            ComplianceStandard::create([
                'category' => 'fire-safety',
                'icon' => 'fa-light fa-shower',
                'abbr' => 'NFPA 13',
                'title' => 'Standard for Installation of Sprinkler Systems',
                'description' => 'Automatic sprinkler system design for hospitals — OH2 hazard classification, 5 mm/min density, 216 m² design area, hydraulic calculation methodology.',
                'applied_to' => 'Sprinkler systems',
            ]);
            ComplianceStandard::create([
                'category' => 'fire-safety',
                'icon' => 'fa-light fa-person-running-fast',
                'abbr' => 'NFPA 101',
                'title' => 'Life Safety Code',
                'description' => 'Egress design, occupancy loads, travel distances, refuge area sizing, compartmentation for hospital occupancies including the specific healthcare occupancy chapter.',
                'applied_to' => 'Fire egress, life safety',
            ]);
            ComplianceStandard::create([
                'category' => 'fire-safety',
                'icon' => 'fa-light fa-building-shield',
                'abbr' => 'NBC 2016',
                'title' => 'National Building Code of India',
                'description' => 'Parts 4 (Fire), 8 (MEP) and 9 (Plumbing) of NBC 2016 — the baseline for all Indian hospital MEP works. Fire protection, ventilation, electrical and sanitation requirements.',
                'applied_to' => 'All disciplines',
            ]);
            ComplianceStandard::create([
                'category' => 'fire-safety',
                'icon' => 'fa-light fa-bell-on',
                'abbr' => 'IS 2189',
                'title' => 'Fire Detection & Alarm Systems',
                'description' => 'Indian standard for fire detection and alarm systems — addressable systems, detector spacing, zone layouts, alarm verification and panel specifications for hospital occupancies.',
                'applied_to' => 'Fire alarm systems',
            ]);
            ComplianceStandard::create([
                'category' => 'fire-safety',
                'icon' => 'fa-light fa-fire-extinguisher',
                'abbr' => 'IS 3844',
                'title' => 'Internal Fire Hydrant Systems',
                'description' => 'Wet riser, landing valve, hose reel and hydrant system design — flow rates, pipe sizing, pump capacity and testing for healthcare occupancies.',
                'applied_to' => 'Fire hydrant systems',
            ]);

            // Category: Medical Gas & Electrical
            ComplianceStandard::create([
                'category' => 'gas-electrical',
                'icon' => 'fa-light fa-lungs',
                'abbr' => 'HTM 02-01',
                'title' => 'Medical Gas Pipeline Systems',
                'description' => 'UK Health Technical Memorandum — the most comprehensive MGPS design, installation and testing standard. Used as the benchmark for all our MGPS installations globally.',
                'applied_to' => 'All MGPS installations',
            ]);
            ComplianceStandard::create([
                'category' => 'gas-electrical',
                'icon' => 'fa-light fa-plug',
                'abbr' => 'IS 732 / IEC 60364-7-710',
                'title' => 'Electrical Installation in Medical Locations',
                'description' => 'Isolated power systems (IT), equipotential bonding in OTs and ICUs, insulation monitoring, special socket requirements for OTs and cardiac care areas.',
                'applied_to' => 'OT, Cath Lab, ICU power',
            ]);
            ComplianceStandard::create([
                'category' => 'gas-electrical',
                'icon' => 'fa-light fa-bolt',
                'abbr' => 'IS 3043 / SMACNA / CEA',
                'title' => 'Earthing, Ductwork & HT Standards',
                'description' => 'IS 3043 for TN-S earthing and lightning protection. SMACNA for GI ductwork construction. CEA regulations for HT electrical installations above 1 kV.',
                'applied_to' => 'Earthing, HVAC, HT electrical',
            ]);
        }

        if (StandardsPageSetting::count() === 0) {
            StandardsPageSetting::create([
                'hero_title' => 'Certifications, Standards<br><em>& Compliance</em>',
                'hero_subtitle' => 'We engineer to the standards that govern hospital operation in India and internationally — not as a checkbox, but as a baseline for every design decision.',
                'banner_image' => 'assets/img/standards.webp',
            ]);
        }

        if (StandardsBaselineItem::count() === 0) {
            StandardsBaselineItem::create([
                'icon' => '🛡️',
                'title' => 'NABH Ready',
                'description' => 'All documentation in NABH-ready format from handover',
            ]);
            StandardsBaselineItem::create([
                'icon' => '🔥',
                'title' => 'Fire NOC Support',
                'description' => 'As-built drawings and inspection support for fire authority',
            ]);
            StandardsBaselineItem::create([
                'icon' => '⚡',
                'title' => 'Electrical Safety',
                'description' => 'CEA-compliant HT/LT installations with full test reports',
            ]);
            StandardsBaselineItem::create([
                'icon' => '🌡️',
                'title' => 'HVAC Commissioning',
                'description' => 'Air balance reports, particle counts, pressure certificates',
            ]);
        }

        // Ensure a default contact settings row exists
        if (! ContactSetting::count()) {
            ContactSetting::create([
                'phone' => '+91-73307 56745',
                'email' => 'info@roydonmep.com',
                'address' => 'N Square, Hitec City, Plot 34B, Hyderabad – 500081',
                'response_time' => 'Within 1 Business Day',
                'process' => "We review your project requirements carefully\nWe contact you within one business day\nWe arrange a site visit or video call\nWe provide a detailed technical proposal and commercial offer",
                'metrics' => [
                    ['label' => 'Hospital Projects', 'value' => '8+'],
                    ['label' => 'Missed Handovers', 'value' => '0'],
                    ['label' => 'Warranty Response', 'value' => '24/7'],
                    ['label' => 'Zero Defect Rate', 'value' => '100%'],
                ],
            ]);
        }
    }
}
