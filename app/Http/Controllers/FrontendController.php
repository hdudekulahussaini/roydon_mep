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
        $banner = HomeBanner::query()->latest('created_at')->first(['*']);
        $stats = PremiumStat::all();
        $civilServices = CivilService::all();
        $specialisations = HospitalSpecialisation::all();
        $whyChooseUs = WhyChooseUs::query()->first(['*']);
        $whyChooseUsItems = WhyChooseUsItem::all();
        $projects = Project::query()->latest('created_at')->get(['*']);
        $faqs = Faq::all();

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
        $banner = Banner::query()->where('page_name', '=', 'about')->first(['*']);
        $storySection = StorySection::query()->where('status', '=', true)->first(['*']);
        $companyValues = CompanyValue::query()->where('status', '=', true)->get(['*']);
        $metrics = Metric::query()->where('status', '=', true)->get(['*']);

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
        $banner = Banner::query()->where('page_name', '=', 'contact')->first(['*']);
        $contactSetting = ContactSetting::query()->first(['*']);

        return view('frontend.pages.contact', compact(
            'banner',
            'contactSetting',
        ));
    }

    // ─── Projects Page ────────────────────────────────────────────────────────

    public function projects(): View
    {
        $banner = Banner::query()->where('page_name', '=', 'projects')->first(['*']);
        $projects = Project::query()->latest('created_at')->get(['*']);

        return view('frontend.pages.projects', compact(
            'banner',
            'projects',
        ));
    }

    // ─── Standards Page ───────────────────────────────────────────────────────

    public function standards(): View
    {
        $standardSections = StandardSection::query()->where('status', '=', true)
            ->with(['standards' => function ($query) {
                $query->where('status', '=', true)->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
            }])
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get(['*']);

        $banner = StandardBanner::query()->latest()->first(['*']);

        $baselines = Baseline::query()->where('status', '=', true)->orderBy('sort_order', 'asc')->get(['*']);

        return view('frontend.pages.standards', compact(
            'standardSections',
            'banner',
            'baselines',
        ));
    }

    // ─── Process Page ─────────────────────────────────────────────────────────

    public function process(): View
    {
        $banner = Banner::query()->where('page_name', '=', 'process')->first(['*']);
        $processes = ProjectProcess::query()->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get(['*']);
        $works = Work::query()->where('status', '=', true)->orderBy('sort_order', 'asc')->orderBy('id', 'asc')->get(['*']);

        return view('frontend.pages.process', compact(
            'banner',
            'processes',
            'works',
        ));
    }

    // ─── Offices Page ─────────────────────────────────────────────────────────

    public function offices(): View
    {
        $banner = Banner::query()->where('page_name', '=', 'offices')->first(['*']);
        $officeLocations = OfficeLocation::query()->where('status', '=', true)->orderBy('sort_order', 'asc')->latest('id')->get(['*']);
        $coverages = Coverage::query()->where('status', '=', true)->orderBy('sort_order', 'asc')->latest('id')->get(['*']);

        return view('frontend.pages.offices', compact(
            'banner',
            'officeLocations',
            'coverages',
        ));
    }

    // ─── Service Detail Page ──────────────────────────────────────────────────

    public function serviceShow(string $slug): View
    {
        $service = ServiceSubcategory::query()->where('slug', '=', $slug)->firstOrFail();

        return view('frontend.pages.service', compact('service'));
    }

    // ─── Specialisation Detail Page ───────────────────────────────────────────

    public function specialisationShow(string $slug): View
    {
        $specialisation = SpecialisationSubcategory::query()->where('slug', '=', $slug)->firstOrFail();

        return view('frontend.pages.specialisation', compact('specialisation'));
    }
}
