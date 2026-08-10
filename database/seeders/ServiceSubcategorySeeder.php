<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ServiceSubcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $servicesCategory = Category::where('name', 'Services')->first();

        if (! $servicesCategory) {
            $this->command->warn('Category "Services" not found. Please run CategorySeeder first.');

            return;
        }

        $services = [
            [
                'title' => 'Hospital Electrical Systems',
                'heading' => 'Advanced Hospital Electrical Systems',
                'description' => 'Robust and uninterrupted electrical systems designed exclusively for hospitals. Our expertise covers HT/LT distribution, UPS systems, DG sets, and specialized isolation transformers for OTs and ICUs.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every electrical project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => ['HT/LT Distribution', 'UPS & DG Sets', 'OT/ICU Isolation Transformers', 'Nurse Call & ELV'],
                'offerings_description' => [
                    'Reliable high and low tension electrical network designs for heavy medical loads.',
                    'Seamless backup power ensuring zero downtime in critical care environments.',
                    'Patient-safe ungrounded power systems to prevent dangerous micro-shocks.',
                    'Integrated low voltage systems for efficient patient care and security.',
                ],
                'offerings_icon' => ['fa-light fa-bolt', 'fa-light fa-battery-full', 'fa-light fa-plug-circle-bolt', 'fa-light fa-walkie-talkie'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
            [
                'title' => 'Hospital HVAC Systems',
                'heading' => 'Advanced Hospital HVAC Systems',
                'description' => 'We design, install, and commission advanced HVAC systems strictly tailored to healthcare environments. Our expertise ensures precise temperature control, optimal humidity, and critical air filtration to meet ASHRAE 170 and NABH standards. From operation theatres to isolation wards, we deliver zero-defect environments that safeguard patient health and facility compliance.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every HVAC project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => ['Modular OT Laminar Airflow', 'ICU Pressure Cascades', 'AHU & Chiller Installations', 'Validation & Commissioning'],
                'offerings_description' => [
                    'Complete HEPA H14 filtration setups ensuring ultra-clean surgical environments.',
                    'Positive and negative pressure room designs for infection control and patient isolation.',
                    'Energy-efficient chilled water systems and dedicated DX units tailored to healthcare loads.',
                    'Rigorous testing including DOP tests, particle counts, and air balancing reports for audits.',
                ],
                'offerings_icon' => ['fa-light fa-fan', 'fa-light fa-lungs-virus', 'fa-light fa-snowflake', 'fa-light fa-clipboard-check'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
            [
                'title' => 'Medical Gas Pipeline (MGPS)',
                'heading' => 'Medical Gas Pipeline Systems (MGPS)',
                'description' => 'Life-critical medical gas installations designed for absolute reliability. We supply, install, and commission complete MGPS networks in full compliance with HTM 02-01 and NFPA 99 standards.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every MGPS project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => ['Manifold & Plant Rooms', 'Degreased Copper Piping', 'Master Alarm Panels', 'Bedhead Units & Outlets'],
                'offerings_description' => [
                    'Automatic changeover gas manifolds, liquid oxygen plants (VIE), and air plants.',
                    'Medical-grade seamless copper piping with silver brazing and inert gas purging.',
                    'Digital pressure monitoring and master alarm panels for real-time gas tracking.',
                    'Ergonomic bedhead trunking units and quick-connect self-sealing terminal outlets.',
                ],
                'offerings_icon' => ['fa-light fa-lungs', 'fa-light fa-pipe', 'fa-light fa-display', 'fa-light fa-bed-pulse'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
            [
                'title' => 'Plumbing & Sanitation',
                'heading' => 'Healthcare Plumbing & Sanitation',
                'description' => 'Medical-grade plumbing solutions that prioritize hygiene and infection control. We deliver comprehensive hot/cold water, WTP, STP, ETP, and specialized CSSD supply networks.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every plumbing project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => ['Medical-Grade Piping', 'WTP & STP Systems', 'Legionella Control', 'CSSD Supply Networks'],
                'offerings_description' => [
                    'Non-corrosive and hygienic plumbing networks for all clinical departments.',
                    'Advanced water treatment and sewage treatment plant installations.',
                    'Precise temperature and flow regulation to prevent waterborne pathogens.',
                    'High-temperature hot water and steam supply for reliable sterilization.',
                ],
                'offerings_icon' => ['fa-light fa-droplet', 'fa-light fa-water', 'fa-light fa-temperature-arrow-down', 'fa-light fa-sink'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
            [
                'title' => 'Fire Fighting & Life Safety',
                'heading' => 'Fire Fighting & Life Safety',
                'description' => 'Comprehensive life safety systems that protect patients and facilities. We design and install sprinkler systems, fire alarms, and smoke management in strict accordance with NBC Part 4 and NFPA.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every fire safety project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => ['Sprinkler & Hydrant Systems', 'Intelligent Fire Alarms', 'FM200 Suppression', 'Smoke Management'],
                'offerings_description' => [
                    'Extensive water-based fire suppression coverage across the entire facility.',
                    'Early detection systems seamlessly integrated with building management.',
                    'Clean agent fire suppression tailored for critical equipment and server rooms.',
                    'Engineered smoke extraction pathways for safe and rapid patient evacuation.',
                ],
                'offerings_icon' => ['fa-light fa-fire-extinguisher', 'fa-light fa-bell-on', 'fa-light fa-server', 'fa-light fa-smog'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
            [
                'title' => 'Turnkey Hospital MEP',
                'heading' => 'Turnkey Hospital MEP Solutions',
                'description' => 'End-to-end engineering, procurement, and construction (EPC) for modern healthcare projects. We act as a single-point contractor for HVAC, MGPS, Electrical, Plumbing, and Fire Fighting, delivering total synchronization and faster handovers.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every turnkey project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => ['100% 3D BIM Clash-Free', 'Faster Commissioning', 'Cost Optimization', 'Guaranteed Audit Approval'],
                'offerings_description' => [
                    'Pre-construction digital twin modeling eliminates site clashes between HVAC, MGPS, and electrical trays.',
                    'Synchronized execution reduces overall handover timeline by 20–30% compared to fragmented contracts.',
                    'Bulk procurement and unified site management result in lower overall capital expenditure.',
                    'Single-point responsibility guarantees your facility passes NABH & ISO audits cleanly.',
                ],
                'offerings_icon' => ['fa-light fa-diagram-project', 'fa-light fa-clock', 'fa-light fa-coins', 'fa-light fa-award'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
            [
                'title' => 'Civil Works',
                'heading' => 'Civil Works',
                'description' => 'At Roydon MEP, we provide comprehensive Civil Construction & Structural Engineering services tailored specifically for complex healthcare, commercial, and industrial facilities. Our civil engineering team works in total synergy with our MEP division, ensuring that structural design, load capacities, foundation planning, and architectural layouts seamlessly align with heavy MEP machinery, ducting, containment, and clinical workflow requirements.',
                'cta_title' => 'Need Healthcare MEP Experts?',
                'cta_phone' => '+91-7330756745',
                'cta_description' => 'Contact us today for a turnkey compliance-driven execution.',
                'compliance_title' => 'Compliant & Certified',
                'compliance_description' => 'Every civil project we deliver comes with comprehensive documentation, as-built drawings, and operational manuals to ensure your facility seamlessly clears all NABH and ISO accreditations on the first attempt.',
                'offerings_title' => [
                    'Healthcare Civil & Structural Execution',
                    'Architectural Finishing & Specialized Wall Systems',
                    'False Ceiling & Ceiling Service Grids',
                    'Waterproofing & Environmental Protection',
                ],
                'offerings_description' => [
                    'Full-scale RCC frame construction, heavy machinery foundations (Chillers, DG sets, Transformers), lead-lined radiation shielding walls for X-Ray/CT/MRI suites, and specialized vibration-isolated floor slabs for high-precision Cath Labs and Modular Operation Theatres.',
                    'Installation of antibacterial, seamless Coved Vinyl flooring, epoxy floorings for sterile zones, HPL / Stainless Steel wall paneling for Cleanrooms & OTs, acoustic drywall partitioning, and fire-rated glass partitions meeting NBC standards.',
                    'Heavy-duty metal ceiling suspensions capable of supporting ceiling-mounted OT pendants, surgical lights, laminar flow hoods, heavy ducting runs, and integrated cleanroom modular ceiling grids.',
                    'Advanced multi-layer waterproofing membranes for basements, plant rooms, AHU rooms, wet areas, and podium decks, ensuring zero water ingress near critical medical equipment and electrical infrastructure.',
                ],
                'offerings_icon' => ['fa-solid fa-layer-group', 'fa-solid fa-wind', 'fa-solid fa-temperature-arrow-down', 'fa-solid fa-shield-virus'],
                'offerings_sort_order' => [1, 2, 3, 4],
            ],
        ];

        foreach ($services as $service) {
            $slug = Str::slug($service['title']);
            $service['category_id'] = $servicesCategory->id;
            $service['status'] = true;

            ServiceSubcategory::updateOrCreate(
                ['slug' => $slug],
                $service
            );
        }

        $this->command->info('Seeded 7 specific services with their real extracted data.');
    }
}
