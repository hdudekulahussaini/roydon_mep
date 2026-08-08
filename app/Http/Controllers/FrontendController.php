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
        return view('frontend.pages.about');
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
        return view('frontend.pages.process');
    }

    public function offices(): View
    {
        return view('frontend.pages.offices');
    }

    // Services
    public function hospitalHvacSystems(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'hospital-hvac-systems')->firstOrFail();
        return view('frontend.pages.hospital-hvac-systems', compact('service'));
    }

    public function medicalGasPipeline(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'medical-gas-pipeline-mgps')->firstOrFail();
        return view('frontend.pages.medical-gas-pipeline', compact('service'));
    }

    public function hospitalElectricalSystems(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'hospital-electrical-systems')->firstOrFail();
        return view('frontend.pages.hospital-electrical-systems', compact('service'));
    }

    public function plumbingAndSanitation(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'plumbing-sanitation')->firstOrFail();
        return view('frontend.pages.plumbing-and-sanitation', compact('service'));
    }

    public function fireFightingAndLifeSafety(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'fire-fighting-life-safety')->firstOrFail();
        return view('frontend.pages.fire-fighting-and-life-safety', compact('service'));
    }

    public function turnkeyHospitalMep(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'turnkey-hospital-mep')->firstOrFail();
        return view('frontend.pages.turnkey-hospital-mep', compact('service'));
    }

    public function civilWorks(): View
    {
        $service = \App\Models\ServiceSubcategory::where('slug', 'civil-works')->firstOrFail();
        return view('frontend.pages.civil-works', compact('service'));
    }

    // Specialisations
    public function specialisationOtMep(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'operation-theatre-ot-mep')->firstOrFail();
        return view('frontend.pages.specialisation-ot-mep', compact('specialisation'));
    }

    public function specialisationIcuMep(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'icu-nicu-ccu-mep')->firstOrFail();
        return view('frontend.pages.specialisation-icu-mep', compact('specialisation'));
    }

    public function specialisationCathLab(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'cath-lab-mep-works')->firstOrFail();
        return view('frontend.pages.specialisation-cath-lab', compact('specialisation'));
    }

    public function specialisationCleanRoom(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'clean-room-mep')->firstOrFail();
        return view('frontend.pages.specialisation-clean-room', compact('specialisation'));
    }

    public function specialisationDiagnostic(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'diagnostic-centre-mep')->firstOrFail();
        return view('frontend.pages.specialisation-diagnostic', compact('specialisation'));
    }

    public function specialisationCssd(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'cssd-sterile-services')->firstOrFail();
        return view('frontend.pages.specialisation-cssd', compact('specialisation'));
    }

    public function specialisationModularOt(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'modular-prefabricated-ot')->firstOrFail();
        return view('frontend.pages.specialisation-modular-ot', compact('specialisation'));
    }

    public function specialisationNabh(): View
    {
        $specialisation = \App\Models\SpecialisationSubcategory::where('slug', 'nabh-compliance-mep')->firstOrFail();
        return view('frontend.pages.specialisation-nabh', compact('specialisation'));
    }
}
