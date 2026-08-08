<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\backend\HomeBannerController;
use App\Http\Controllers\backend\PremiumStatController;
use App\Http\Controllers\backend\CivilServiceController;
use App\Http\Controllers\backend\HospitalSpecialisationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\StorySectionController;
use App\Http\Controllers\Backend\CompanyValueController;
use App\Http\Controllers\Backend\MetricController;
use App\Http\Controllers\Backend\OfficeLocationController;
use App\Http\Controllers\Backend\CoverageController;
use App\Http\Controllers\Backend\ProjectProcessController;
use App\Http\Controllers\Backend\WorkController;

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
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('story-sections', StorySectionController::class)->except(['show']);
        Route::resource('company-values', CompanyValueController::class)->except(['show']);
        Route::resource('metrics', MetricController::class)->except(['show']);
        Route::resource('office-locations', OfficeLocationController::class)->except(['show']);
        Route::resource('coverages',CoverageController::class)->except(['show']);
        Route::resource('project-processes',ProjectProcessController::class)->except(['show']);
        Route::resource('works',WorkController::class)->except(['show']);
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
        Route::get('/hospital-hvac-systems', 'hospitalHvacSystems')->name('hvac');
        Route::get('/medical-gas-pipeline', 'medicalGasPipeline')->name('medical-gas');
        Route::get('/hospital-electrical-systems', 'hospitalElectricalSystems')->name('electrical');
        Route::get('/plumbing-and-sanitation', 'plumbingAndSanitation')->name('plumbing');
        Route::get('/fire-fighting-and-life-safety', 'fireFightingAndLifeSafety')->name('fire-fighting');
        Route::get('/turnkey-hospital-mep', 'turnkeyHospitalMep')->name('turnkey');
        Route::get('/civil-works', 'civilWorks')->name('civil-works');
    });

    // Specialisation Routes
    Route::prefix('specialisations')->name('specialisations.')->group(function () {
        Route::get('/operation-theatre-mep', 'specialisationOtMep')->name('ot-mep');
        Route::get('/icu-mep', 'specialisationIcuMep')->name('icu-mep');
        Route::get('/cath-lab-mep', 'specialisationCathLab')->name('cath-lab');
        Route::get('/clean-room-mep', 'specialisationCleanRoom')->name('clean-room');
        Route::get('/diagnostic-centre-mep', 'specialisationDiagnostic')->name('diagnostic');
        Route::get('/cssd-sterile-services', 'specialisationCssd')->name('cssd');
        Route::get('/modular-ot', 'specialisationModularOt')->name('modular-ot');
        Route::get('/nabh-compliance', 'specialisationNabh')->name('nabh');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
