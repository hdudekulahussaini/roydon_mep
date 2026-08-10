<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use App\Models\Faq;
use App\Models\HospitalSpecialisation;
use App\Models\Project;
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
