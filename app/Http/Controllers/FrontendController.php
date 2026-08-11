<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Baseline;
use App\Models\CivilService;
use App\Models\CompanyValue;
use App\Models\ContactSetting;
use App\Models\Coverage;
use App\Models\Faq;
use App\Models\HomeBanner;
use App\Models\HospitalSpecialisation;
use App\Models\Metric;
use App\Models\OfficeLocation;
use App\Models\PremiumStat;
use App\Models\Project;
use App\Models\ProjectProcess;
use App\Models\ServiceSubcategory;
use App\Models\SpecialisationSubcategory;
use App\Models\StandardBanner;
use App\Models\StandardSection;
use App\Models\StorySection;
use App\Models\WhyChooseUs;
use App\Models\WhyChooseUsItem;
use App\Models\Work;
use Illuminate\Contracts\View\View;

class FrontendController extends Controller
{
    // ─── Home Page ───────────────────────────────────────────────────────────

    public function index(): View
    {
        $banner           = HomeBanner::latest()->first();
        $stats            = PremiumStat::all();
        $civilServices    = CivilService::all();
        $specialisations  = HospitalSpecialisation::all();
        $whyChooseUs      = WhyChooseUs::first();
        $whyChooseUsItems = WhyChooseUsItem::all();
        $projects         = Project::latest()->get();
        $faqs             = Faq::all();

        return view('frontend.pages.index', compact(
            'banner',
            'stats',
            'civilServices',
            'specialisations',
            'whyChooseUs',
            'whyChooseUsItems',
            'projects',
            'faqs',
        ));
    }

    // ─── About Page ──────────────────────────────────────────────────────────

    public function about(): View
    {
        $banner        = Banner::where('page_name', 'about')->first();
        $storySection  = StorySection::where('status', true)->first();
        $companyValues = CompanyValue::where('status', true)->get();
        $metrics       = Metric::where('status', true)->get();

        return view('frontend.pages.about', compact(
            'banner',
            'storySection',
            'companyValues',
            'metrics',
        ));
    }

    // ─── Contact Page ─────────────────────────────────────────────────────────

    public function contact(): View
    {
        $banner         = Banner::where('page_name', 'contact')->first();
        $contactSetting = ContactSetting::first();

        return view('frontend.pages.contact', compact(
            'banner',
            'contactSetting',
        ));
    }

    // ─── Projects Page ────────────────────────────────────────────────────────

    public function projects(): View
    {
        $banner   = Banner::where('page_name', 'projects')->first();
        $projects = Project::latest()->get();

        return view('frontend.pages.projects', compact(
            'banner',
            'projects',
        ));
    }

    // ─── Standards Page ───────────────────────────────────────────────────────

    public function standards(): View
    {
        $standardSections = StandardSection::where('status', true)
            ->with(['standards' => function ($query) {
                $query->where('status', true)->orderBy('sort_order')->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $banner    = StandardBanner::where('status', true)->orderBy('sort_order')->first();
        $baselines = Baseline::where('status', true)->orderBy('sort_order')->get();

        return view('frontend.pages.standards', compact(
            'standardSections',
            'banner',
            'baselines',
        ));
    }

    // ─── Process Page ─────────────────────────────────────────────────────────

    public function process(): View
    {
        $banner    = Banner::where('page_name', 'process')->first();
        $processes = ProjectProcess::orderBy('sort_order')->orderBy('id')->get();
        $works     = Work::where('status', true)->orderBy('sort_order')->orderBy('id')->get();

        return view('frontend.pages.process', compact(
            'banner',
            'processes',
            'works',
        ));
    }

    // ─── Offices Page ─────────────────────────────────────────────────────────

    public function offices(): View
    {
        $banner          = Banner::where('page_name', 'offices')->first();
        $officeLocations = OfficeLocation::where('status', true)->orderBy('sort_order')->latest('id')->get();
        $coverages       = Coverage::where('status', true)->orderBy('sort_order')->latest('id')->get();

        return view('frontend.pages.offices', compact(
            'banner',
            'officeLocations',
            'coverages',
        ));
    }

    // ─── Service Detail Page ──────────────────────────────────────────────────

    public function serviceShow(string $slug): View
    {
        $service = ServiceSubcategory::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.service', compact('service'));
    }

    // ─── Specialisation Detail Page ───────────────────────────────────────────

    public function specialisationShow(string $slug): View
    {
        $specialisation = SpecialisationSubcategory::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.specialisation', compact('specialisation'));
    }
}
