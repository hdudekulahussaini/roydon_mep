<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\PremiumStat;
use App\Models\CivilService;
use App\Models\HospitalSpecialisation;
use Illuminate\Contracts\View\View;
use App\Models\StorySection;
use App\Models\CompanyValue;
use App\Models\Metric;
use App\Models\OfficeLocation;
use App\Models\Coverage;
use App\Models\ProjectProcess;
use App\Models\Work;

class FrontendController extends Controller
{
    public function index(): View
    {
        $banner = \Illuminate\Support\Facades\Schema::hasTable('home_banners')
            ? HomeBanner::latest()->first()
            : null;

        $stats = \Illuminate\Support\Facades\Schema::hasTable('premium_stats')
            ? PremiumStat::all()
            : collect();

        $civilServices = \Illuminate\Support\Facades\Schema::hasTable('civil_services')
            ? CivilService::all()
            : collect();

        $specialisations = \Illuminate\Support\Facades\Schema::hasTable('hospital_specialisations')
            ? HospitalSpecialisation::all()
            : collect();

        return view('frontend.pages.index', compact('banner', 'stats', 'civilServices', 'specialisations'));
    }

    public function about(): View
    {
        $storySection = StorySection::where('status', true)
            ->latest()
            ->first();
        $companyValues = CompanyValue::where('status', true)
            ->latest()
            ->get();
        $metrics = Metric::where('status', true)
            ->latest()
            ->get();
        return view('frontend.pages.about', compact('storySection', 'companyValues', 'metrics'));
    }

    public function contact(): View
    {
        return view('frontend.pages.contact');
    }

    public function projects(): View
    {
        return view('frontend.pages.projects');
    }

    public function standards(): View
    {
        return view('frontend.pages.standards');
    }

    public function process(): View
    {
        $processes = ProjectProcess::orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $works = Work::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        return view('frontend.pages.process', compact('processes', 'works'));
    }

    public function offices(): View
    {
        $officeLocations = OfficeLocation::where('status', true)
            ->orderBy('sort_order')
            ->latest('id')
            ->get();
        $coverages = Coverage::where('status', true)
            ->orderBy('sort_order')
            ->latest('id')
            ->get();
        return view(
            'frontend.pages.offices',
            compact('officeLocations', 'coverages')
        );
    }

    // Services
    public function hospitalHvacSystems(): View
    {
        return view('frontend.pages.hospital-hvac-systems');
    }

    public function medicalGasPipeline(): View
    {
        return view('frontend.pages.medical-gas-pipeline');
    }

    public function hospitalElectricalSystems(): View
    {
        return view('frontend.pages.hospital-electrical-systems');
    }

    public function plumbingAndSanitation(): View
    {
        return view('frontend.pages.plumbing-and-sanitation');
    }

    public function fireFightingAndLifeSafety(): View
    {
        return view('frontend.pages.fire-fighting-and-life-safety');
    }

    public function turnkeyHospitalMep(): View
    {
        return view('frontend.pages.turnkey-hospital-mep');
    }

    public function civilWorks(): View
    {
        return view('frontend.pages.civil-works');
    }

    // Specialisations
    public function specialisationOtMep(): View
    {
        return view('frontend.pages.specialisation-ot-mep');
    }

    public function specialisationIcuMep(): View
    {
        return view('frontend.pages.specialisation-icu-mep');
    }

    public function specialisationCathLab(): View
    {
        return view('frontend.pages.specialisation-cath-lab');
    }

    public function specialisationCleanRoom(): View
    {
        return view('frontend.pages.specialisation-clean-room');
    }

    public function specialisationDiagnostic(): View
    {
        return view('frontend.pages.specialisation-diagnostic');
    }

    public function specialisationCssd(): View
    {
        return view('frontend.pages.specialisation-cssd');
    }

    public function specialisationModularOt(): View
    {
        return view('frontend.pages.specialisation-modular-ot');
    }

    public function specialisationNabh(): View
    {
        return view('frontend.pages.specialisation-nabh');
    }
}
