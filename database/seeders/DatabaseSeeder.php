<?php

namespace Database\Seeders;

use App\Models\User;
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

        if (!User::where('email', 'admin@roydonmep.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@roydonmep.com',
                'password' => 'password',
            ]);
        }

        if (\App\Models\PremiumStat::count() === 0) {
            \App\Models\PremiumStat::create([
                'icon' => 'fa-light fa-building',
                'count' => '8+',
                'title' => 'Projects',
                'description' => 'Delivered 2018–2026',
            ]);

            \App\Models\PremiumStat::create([
                'icon' => 'fa-light fa-clock',
                'count' => '0',
                'title' => 'Missed Handovers',
                'description' => 'On schedule. On spec. Every time.',
            ]);

            \App\Models\PremiumStat::create([
                'icon' => 'fa-light fa-chart-area',
                'count' => '3.4M',
                'title' => 'Sq.Ft Engineered',
                'description' => 'Healthcare & Commercial',
            ]);

            \App\Models\PremiumStat::create([
                'icon' => 'fa-light fa-headset',
                'count' => '24/7',
                'title' => 'Warranty Response',
                'description' => 'Our team, our number.',
            ]);
        }

        if (\App\Models\CivilService::count() === 0) {
            \App\Models\CivilService::create([
                'title' => 'Structural & RCC Works',
                'description' => 'Foundations, columns, beams, slabs and RCC framework engineered for hospital loads, vibration control and future vertical expansion.',
                'icon' => 'fa-light fa-building-columns',
            ]);

            \App\Models\CivilService::create([
                'title' => 'Hospital Building Construction',
                'description' => 'Full shell & core construction — masonry, blockwork, plastering and structural finishing for new hospital buildings and additions.',
                'icon' => 'fa-light fa-hospital',
            ]);

            \App\Models\CivilService::create([
                'title' => 'Interior Fit-Out & Finishes',
                'description' => 'Hospital-grade flooring, false ceilings, wall finishes and partitions — seamless, cleanable surfaces built for infection control.',
                'icon' => 'fa-light fa-palette',
            ]);

            \App\Models\CivilService::create([
                'title' => 'Site Development & Earthwork',
                'description' => 'Excavation, grading, site levelling and external development works, sequenced to keep MEP and structural trades on schedule.',
                'icon' => 'fa-light fa-road-barrier',
            ]);

            \App\Models\CivilService::create([
                'title' => 'Waterproofing & Insulation',
                'description' => 'Terrace, basement and wet-area waterproofing, thermal insulation and expansion joint treatment to prevent long-term structural issues.',
                'icon' => 'fa-light fa-droplet',
            ]);

            \App\Models\CivilService::create([
                'title' => 'Turnkey Civil & Structural',
                'description' => 'Single-point civil contracting from design coordination to handover — integrated with our MEP scope for true turnkey delivery.',
                'icon' => 'fa-light fa-helmet-safety',
            ]);
        }

        if (\App\Models\HospitalSpecialisation::count() === 0) {
            \App\Models\HospitalSpecialisation::create([
                'title' => 'Operation Theatre',
                'description' => 'Laminar airflow, HEPA H14, isolated power, NABH validated commissioning.',
                'icon' => 'fa-light fa-microscope',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'ICU & NICU',
                'description' => 'Bed-head units, MGPS outlets, UPS-backed power, HEPA H13 HVAC.',
                'icon' => 'fa-light fa-hospital-user',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'Cath Lab',
                'description' => 'Radiation-shielded penetrations, isolated power, precision cooling.',
                'icon' => 'fa-light fa-heart-pulse',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'Clean Rooms',
                'description' => 'ISO Class 5–8 validated ACH, pressure differentials, HEPA H14.',
                'icon' => 'fa-light fa-broom',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'Diagnostic Centres',
                'description' => 'MRI/CT cooling, quench pipe, EMF shielding, UPS conditioning.',
                'icon' => 'fa-light fa-telescope',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'CSSD',
                'description' => 'Steam supply, 93°C HWS, validated HVAC, sterile drainage.',
                'icon' => 'fa-light fa-vial',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'Modular OT',
                'description' => 'Prefab OT MEP, factory-coordinated, NABH-ready in 8–12 weeks.',
                'icon' => 'fa-light fa-industry',
            ]);

            \App\Models\HospitalSpecialisation::create([
                'title' => 'NABH Projects',
                'description' => 'Entry & Full Accreditation, pre-assessment audit support.',
                'icon' => 'fa-light fa-shield-check',
            ]);
        }
        if (\App\Models\CompanyValue::count() === 0) {

            \App\Models\CompanyValue::create([
                'title' => 'Clinical Precision',
                'description' => 'Systems designed for infection control, patient safety and NABH/NABL compliance.',
                'status' => true,
            ]);

            \App\Models\CompanyValue::create([
                'title' => 'Execution Velocity',
                'description' => 'Rigorous planning and coordinated execution help deliver projects ahead of schedule.',
                'status' => true,
            ]);

            \App\Models\CompanyValue::create([
                'title' => 'Single-Point Accountability',
                'description' => 'HVAC, MGPS, electrical and fire-fighting systems managed under one roof.',
                'status' => true,
            ]);
        }
        if (\App\Models\Metric::count() === 0) {

            \App\Models\Metric::create([
                'number' => '900+',
                'label' => 'Hospital Beds Delivered',
                'status' => true,
            ]);

            \App\Models\Metric::create([
                'number' => '800k',
                'label' => 'Sq.Ft Executed',
                'status' => true,
            ]);

            \App\Models\Metric::create([
                'number' => '70',
                'label' => 'Days to Handover',
                'status' => true,
            ]);

            \App\Models\Metric::create([
                'number' => '0',
                'label' => 'Defects at Commissioning',
                'status' => true,
            ]);
        }
        if (\App\Models\OfficeLocation::count() === 0) {

            \App\Models\OfficeLocation::create([
                'flag' => '🇮🇳',
                'city' => 'Hyderabad',
                'type' => 'Telangana, India — Corporate HQ',
                'description' => 'Engineering, fabrication, project management and delivery. All four MEP disciplines designed and executed from Hyderabad.',
                'address' => "N Square, Hitec City, Plot No 34B\nOpp. N Convention, Hyderabad – 500081",
                'phone' => '+91-73307 56745',
                'email' => 'info@roydonmep.com',
                'seo' => 'Hospital MEP contractor Hyderabad · Medical gas contractor Telangana · Hospital HVAC contractor Hyderabad · NABH hospital MEP Hyderabad',
                'status' => true,
                'sort_order' => 1,
            ]);

            \App\Models\OfficeLocation::create([
                'flag' => '🇮🇳',
                'city' => 'Bengaluru',
                'type' => 'Karnataka, India — Branch Office',
                'description' => 'Project management and commissioning for South India — Karnataka, Tamil Nadu, Kerala and Andhra Pradesh hospital projects.',
                'address' => 'Bengaluru, Karnataka',
                'phone' => null,
                'email' => 'bangalore@roydonmep.com',
                'seo' => 'Hospital MEP contractor Bangalore · Healthcare MEP company Bengaluru · Hospital electrical contractor Karnataka',
                'status' => true,
                'sort_order' => 2,
            ]);

            \App\Models\OfficeLocation::create([
                'flag' => '🇦🇪',
                'city' => 'Dubai',
                'type' => 'UAE — Development Studio',
                'description' => 'Middle-East operations for hospital and healthcare infrastructure across UAE, Oman and GCC. DEWA-compliant electrical and MEP execution.',
                'address' => 'Dubai, United Arab Emirates',
                'phone' => null,
                'email' => 'dubai@roydonmep.com',
                'seo' => 'Hospital MEP contractor Dubai · Healthcare MEP contractor UAE · Medical gas contractor UAE',
                'status' => true,
                'sort_order' => 3,
            ]);

            \App\Models\OfficeLocation::create([
                'flag' => '🇸🇦',
                'city' => 'Riyadh',
                'type' => 'Saudi Arabia — Regional Coordination',
                'description' => 'Saudi Vision 2030 healthcare infrastructure — hospitals, clinics and medical cities across the Kingdom.',
                'address' => 'Riyadh, Saudi Arabia',
                'phone' => null,
                'email' => 'saudi@roydonmep.com',
                'seo' => 'Hospital MEP contractor Saudi Arabia · Healthcare MEP contractor Riyadh · Medical gas contractor KSA',
                'status' => true,
                'sort_order' => 4,
            ]);

            \App\Models\OfficeLocation::create([
                'flag' => '🇬🇧',
                'city' => 'London',
                'type' => 'United Kingdom — Upcoming 2026',
                'description' => 'UK advisory, technical consultancy and project management. HTM 02-01 MGPS, HTM 03-01 HVAC and healthcare electrical for NHS and private hospital projects.',
                'address' => 'London, United Kingdom',
                'phone' => null,
                'email' => 'london@roydonmep.com',
                'seo' => 'Hospital MEP consultant UK · HTM 02-01 MGPS contractor · Healthcare MEP contractor London',
                'status' => true,
                'sort_order' => 5,
            ]);

            \App\Models\OfficeLocation::create([
                'flag' => '🇩🇪',
                'city' => 'Munich',
                'type' => 'Germany — Upcoming 2026',
                'description' => 'European coordination, engineering partnerships and liaison for German and European hospital clients.',
                'address' => 'Munich, Germany',
                'phone' => null,
                'email' => 'munich@roydonmep.com',
                'seo' => 'Hospital MEP contractor Germany · Healthcare MEP consultant Europe',
                'status' => true,
                'sort_order' => 6,
            ]);
        }
        if (\App\Models\Coverage::count() === 0) {

            \App\Models\Coverage::create([
                'city' => 'Hyderabad',
                'state' => 'Telangana',
                'status' => true,
                'sort_order' => 1,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Bengaluru',
                'state' => 'Karnataka',
                'status' => true,
                'sort_order' => 2,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Chennai',
                'state' => 'Tamil Nadu',
                'status' => true,
                'sort_order' => 3,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'status' => true,
                'sort_order' => 4,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Delhi',
                'state' => 'NCR',
                'status' => true,
                'sort_order' => 5,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Pune',
                'state' => 'Maharashtra',
                'status' => true,
                'sort_order' => 6,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Visakhapatnam',
                'state' => 'AP',
                'status' => true,
                'sort_order' => 7,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Vijayawada',
                'state' => 'AP',
                'status' => true,
                'sort_order' => 8,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Kochi',
                'state' => 'Kerala',
                'status' => true,
                'sort_order' => 9,
            ]);

            \App\Models\Coverage::create([
                'city' => 'Ahmedabad',
                'state' => 'Gujarat',
                'status' => true,
                'sort_order' => 10,
            ]);
        }
        if (\App\Models\ProjectProcess::count() === 0) {

            \App\Models\ProjectProcess::create([
                'icon' => 'fa-light fa-clipboard-list-check',

                'title' => 'Brief & Scope Definition',

                'description' => 'Clinical brief, bed count, NABH targets and programme agreed in writing before design begins. MEP scope and design standards confirmed with a dedicated project manager assigned as the single point of contact.',

                'small_title' => 'Stage One',

                'features' => [
                    'Clinical brief review with medical planning team',
                    'MEP scope — discipline by discipline',
                    'Standards and NABH alignment confirmed',
                    'Programme milestones agreed',
                    'Preliminary MEP cost plan produced',
                    'Project manager assigned',
                ],

                'sort_order' => 1,
            ]);


            \App\Models\ProjectProcess::create([
                'icon' => 'fa-light fa-ruler-combined',

                'title' => 'Engineering Design & Coordination',

                'description' => 'Detailed engineering design covering load calculations, equipment schedules, duct and pipe sizing, electrical SLDs and medical gas layouts. 3D coordination helps eliminate clashes before fabrication.',

                'small_title' => 'Stage Two',

                'features' => [
                    'HVAC load calculations and equipment schedules',
                    'MGPS pipeline design, sizing and pressure drops',
                    'Electrical SLD, panel schedules and cable sizing',
                    'Plumbing and fire protection design',
                    '3D coordination and clash avoidance',
                    'Design review with facilities and IPC teams',
                ],

                'sort_order' => 2,
            ]);


            \App\Models\ProjectProcess::create([
                'icon' => 'fa-light fa-person-construction',

                'title' => 'Site Execution & Installation',

                'description' => 'Fabrication and installation managed by experienced engineers and coordinated with the structural and civil programme. Daily reporting and inspection procedures maintain quality throughout execution.',

                'small_title' => 'Stage Three',

                'features' => [
                    'Ductwork fabrication and installation',
                    'Medical gas pipeline installation and purging',
                    'HT/LT electrical installation',
                    'Plumbing and fire protection installation',
                    'Daily site reports and progress tracking',
                    'ITP compliance at every stage',
                ],

                'sort_order' => 3,
            ]);


            \App\Models\ProjectProcess::create([
                'icon' => 'fa-light fa-shield-check',

                'title' => 'Commissioning & Clinical Validation',

                'description' => 'Every system is tested against defined clinical and engineering criteria before handover. Testing and validation results are documented in a complete commissioning package.',

                'small_title' => 'Stage Four',

                'features' => [
                    'HVAC air balancing — volume and pressure',
                    'OT pressure cascade and particle count',
                    'MGPS pressure, flow and purity testing',
                    'Electrical insulation and earth continuity',
                    'Fire system functional testing',
                    'Complete commissioning documentation',
                ],

                'sort_order' => 4,
            ]);


            \App\Models\ProjectProcess::create([
                'icon' => 'fa-light fa-file-certificate',

                'title' => 'Handover & 24/7 Warranty',

                'description' => 'Complete clinical handover with O&M manuals, coordinated as-built drawings, equipment registers and required documentation. Post-handover support provides direct access to the engineering team.',

                'small_title' => 'Stage Five',

                'features' => [
                    'O&M manuals — all disciplines',
                    'Coordinated as-built MEP drawings',
                    'Equipment warranty register',
                    'NABH documentation support',
                    'Staff training on MEP systems',
                    '24/7 warranty support',
                ],

                'sort_order' => 5,
            ]);
        }
        if (\App\Models\Work::count() === 0) {

            \App\Models\Work::create([
                'image' => 'assets/img/projects/site_execution.webp',
                'subtitle' => 'Hospital MEP execution',
                'title' => 'Site Execution',
                'sort_order' => 1,
                'status' => true,
            ]);

            \App\Models\Work::create([
                'image' => 'assets/img/projects/mechanical_works.webp',
                'subtitle' => 'HVAC ductwork',
                'title' => 'Mechanical Works',
                'sort_order' => 2,
                'status' => true,
            ]);

            \App\Models\Work::create([
                'image' => 'assets/img/projects/electrical_works.webp',
                'subtitle' => 'Electrical',
                'title' => 'Electrical Works',
                'sort_order' => 3,
                'status' => true,
            ]);

            \App\Models\Work::create([
                'image' => 'assets/img/projects/plumbing_works.webp',
                'subtitle' => 'Plumbing',
                'title' => 'Plumbing Works',
                'sort_order' => 4,
                'status' => true,
            ]);
        }
    }
}
