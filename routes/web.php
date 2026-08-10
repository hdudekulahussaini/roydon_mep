<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CivilServiceController;
use App\Http\Controllers\backend\FaqController;
use App\Http\Controllers\backend\HomeBannerController;
use App\Http\Controllers\backend\HospitalSpecialisationController;
use App\Http\Controllers\backend\PremiumStatController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\ServiceSubcategoryController;
use App\Http\Controllers\backend\SpecialisationSubcategoryController;
use App\Http\Controllers\backend\WhyChooseUsController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\StandardsPageController;
use App\Http\Controllers\Backend\StorySectionController;
use App\Http\Controllers\Backend\CompanyValueController;
use App\Http\Controllers\Backend\MetricController;
use App\Http\Controllers\Backend\OfficeLocationController;
use App\Http\Controllers\Backend\CoverageController;
use App\Http\Controllers\Backend\ProjectProcessController;
use App\Http\Controllers\Backend\WorkController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\backend\ContactSettingController;
use App\Http\Controllers\backend\StandardController;
use App\Http\Controllers\backend\StandardSectionController;
use App\Http\Controllers\backend\StandardBannerController;
use App\Http\Controllers\backend\BaselineController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return auth()->check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('home-banners', HomeBannerController::class)->except('show');
        Route::resource('premium-stats', PremiumStatController::class)->except('show');
        Route::resource('civil-services', CivilServiceController::class)->except('show');
        Route::resource('hospital-specialisations', HospitalSpecialisationController::class)->except('show');
        Route::resource('projects', ProjectController::class)->except('show');
        Route::resource('faqs', FaqController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('service-subcategories', ServiceSubcategoryController::class)->except('show');
        Route::resource('specialisation-subcategories', SpecialisationSubcategoryController::class)->except('show');
        Route::resource('standard-sections', StandardSectionController::class)->except(['show']);
        Route::resource('standards', StandardController::class)->except(['show']);
        Route::resource('standard-banners', StandardBannerController::class)->except(['show']);
        Route::resource('baselines', BaselineController::class)->except(['show']);
        // Route::resource('compliance-standards', ComplianceStandardController::class)->except('show');

        Route::get('why-choose-us', [WhyChooseUsController::class, 'index'])->name('why-choose-us.index');
        Route::get('why-choose-us/edit', [WhyChooseUsController::class, 'editSection'])->name('why-choose-us.edit-section');
        Route::put('why-choose-us/update', [WhyChooseUsController::class, 'updateSection'])->name('why-choose-us.update-section');

        Route::get('why-choose-us-items/create', [WhyChooseUsController::class, 'createItem'])->name('why-choose-us-items.create');
        Route::post('why-choose-us-items', [WhyChooseUsController::class, 'storeItem'])->name('why-choose-us-items.store');
        Route::get('why-choose-us-items/{item}/edit', [WhyChooseUsController::class, 'editItem'])->name('why-choose-us-items.edit');
        Route::put('why-choose-us-items/{item}', [WhyChooseUsController::class, 'updateItem'])->name('why-choose-us-items.update');
        Route::delete('why-choose-us-items/{item}', [WhyChooseUsController::class, 'destroyItem'])->name('why-choose-us-items.destroy');

        Route::get('standards-page', [StandardsPageController::class, 'index'])->name('standards-page.index');
        Route::get('standards-page/edit', [StandardsPageController::class, 'editSettings'])->name('standards-page.edit-settings');
        Route::put('standards-page/update', [StandardsPageController::class, 'updateSettings'])->name('standards-page.update-settings');

        Route::get('standards-baseline-items/create', [StandardsPageController::class, 'createBaseline'])->name('standards-baseline-items.create');
        Route::post('standards-baseline-items', [StandardsPageController::class, 'storeBaseline'])->name('standards-baseline-items.store');
        Route::get('standards-baseline-items/{standardsBaselineItem}/edit', [StandardsPageController::class, 'editBaseline'])->name('standards-baseline-items.edit');
        Route::put('standards-baseline-items/{standardsBaselineItem}', [StandardsPageController::class, 'updateBaseline'])->name('standards-baseline-items.update');
        Route::delete('standards-baseline-items/{standardsBaselineItem}', [StandardsPageController::class, 'destroyBaseline'])->name('standards-baseline-items.destroy');

        Route::get('compliance-standards/create', [StandardsPageController::class, 'createStandard'])->name('compliance-standards.create');
        Route::post('compliance-standards', [StandardsPageController::class, 'storeStandard'])->name('compliance-standards.store');
        Route::get('compliance-standards/{standard}/edit', [StandardsPageController::class, 'editStandard'])->name('compliance-standards.edit');
        Route::put('compliance-standards/{standard}', [StandardsPageController::class, 'updateStandard'])->name('compliance-standards.update');
        Route::delete('compliance-standards/{standard}', [StandardsPageController::class, 'destroyStandard'])->name('compliance-standards.destroy');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('story-sections', StorySectionController::class)->except(['show']);
        Route::resource('company-values', CompanyValueController::class)->except(['show']);
        Route::resource('metrics', MetricController::class)->except(['show']);
        Route::resource('office-locations', OfficeLocationController::class)->except(['show']);
        Route::resource('coverages', CoverageController::class)->except(['show']);
        Route::resource('project-processes', ProjectProcessController::class)->except(['show']);
        Route::resource('works', WorkController::class)->except(['show']);
        Route::resource('enquiries', EnquiryController::class)->except(['create', 'store']);
        Route::resource('contact-settings', ContactSettingController::class)->only(['index', 'edit', 'update']);
    });
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/standards', 'standards')->name('standards');
    Route::get('/process', 'process')->name('process');
    Route::get('/offices', 'offices')->name('offices');

    // Services Routes
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/hospital-hvac-systems', 'serviceShow')->defaults('slug', 'hospital-hvac-systems')->name('hvac');
        Route::get('/medical-gas-pipeline', 'serviceShow')->defaults('slug', 'medical-gas-pipeline-mgps')->name('medical-gas');
        Route::get('/hospital-electrical-systems', 'serviceShow')->defaults('slug', 'hospital-electrical-systems')->name('electrical');
        Route::get('/plumbing-and-sanitation', 'serviceShow')->defaults('slug', 'plumbing-sanitation')->name('plumbing');
        Route::get('/fire-fighting-and-life-safety', 'serviceShow')->defaults('slug', 'fire-fighting-life-safety')->name('fire-fighting');
        Route::get('/turnkey-hospital-mep', 'serviceShow')->defaults('slug', 'turnkey-hospital-mep')->name('turnkey');
        Route::get('/civil-works', 'serviceShow')->defaults('slug', 'civil-works')->name('civil-works');
        Route::get('/{slug}', 'serviceShow')->name('show');
    });

    // Specialisation Routes
    Route::prefix('specialisations')->name('specialisations.')->group(function () {
        Route::get('/operation-theatre-mep', 'specialisationShow')->defaults('slug', 'operation-theatre-ot-mep')->name('ot-mep');
        Route::get('/icu-mep', 'specialisationShow')->defaults('slug', 'icu-nicu-ccu-mep')->name('icu-mep');
        Route::get('/cath-lab-mep', 'specialisationShow')->defaults('slug', 'cath-lab-mep-works')->name('cath-lab');
        Route::get('/clean-room-mep', 'specialisationShow')->defaults('slug', 'clean-room-mep')->name('clean-room');
        Route::get('/diagnostic-centre-mep', 'specialisationShow')->defaults('slug', 'diagnostic-centre-mep')->name('diagnostic');
        Route::get('/cssd-sterile-services', 'specialisationShow')->defaults('slug', 'cssd-sterile-services')->name('cssd');
        Route::get('/modular-ot', 'specialisationShow')->defaults('slug', 'modular-prefabricated-ot')->name('modular-ot');
        Route::get('/nabh-compliance', 'specialisationShow')->defaults('slug', 'nabh-compliance-mep')->name('nabh');
        Route::get('/{slug}', 'specialisationShow')->name('show');
    });
});

// Public endpoint for contact form submissions
Route::post('/enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
