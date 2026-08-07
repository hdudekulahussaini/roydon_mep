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
    }
}
