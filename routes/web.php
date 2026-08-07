<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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
