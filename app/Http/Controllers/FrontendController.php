<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\PremiumStat;
use App\Models\CivilService;
use App\Models\HospitalSpecialisation;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsItem;
use App\Models\Project;
use App\Models\Faq;
use App\Models\ComplianceStandard;
use App\Models\StandardsPageSetting;
use App\Models\StandardsBaselineItem;
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
        $banner = HomeBanner::latest()->first();
        $stats = PremiumStat::all();
        $civilServices = CivilService::all();
        $specialisations = HospitalSpecialisation::all();
        $whyChooseUs = WhyChooseUs::first();
        $whyChooseUsItems = WhyChooseUsItem::all();
        $projects = Project::latest()->get();
        $faqs = Faq::all();
        return view('frontend.pages.index', compact('banner', 'stats', 'civilServices', 'specialisations', 'whyChooseUs', 'whyChooseUsItems', 'projects', 'faqs'));
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
        $projects = Project::latest()->get();
        return view('frontend.pages.projects', compact('projects'));
    }

    public function standards(): View
    {
        $settings = StandardsPageSetting::first();
        $baselineItems = StandardsBaselineItem::all();
        $standards = ComplianceStandard::all();
        return view('frontend.pages.standards', compact('settings', 'baselineItems', 'standards'));
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
