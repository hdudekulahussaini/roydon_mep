<?php

use App\Models\SpecialisationSubcategory;
use Database\Seeders\SpecialisationSubcategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(SpecialisationSubcategorySeeder::class);
});

test('all legacy specialisation routes return successful response and use the reusable template', function () {
    $routes = [
        'specialisations.ot-mep',
        'specialisations.icu-mep',
        'specialisations.cath-lab',
        'specialisations.clean-room',
        'specialisations.diagnostic',
        'specialisations.cssd',
        'specialisations.modular-ot',
        'specialisations.nabh',
    ];

    foreach ($routes as $routeName) {
        $response = $this->get(route($routeName));

        $response->assertStatus(200);
        $response->assertViewIs('frontend.pages.specialisation');
    }
});

test('invalid specialisation slug returns 404', function () {
    $response = $this->get('/specialisations/non-existent-slug');
    $response->assertStatus(404);
});

test('newly created specialisation resolves dynamically via wildcard route', function () {
    $newSpecialisation = SpecialisationSubcategory::create([
        'category_id' => 2,
        'title' => 'Hospital HVAC',
        'slug' => 'hospital-hvac',
        'description' => 'Hospital HVAC solutions',
        'status' => true,
    ]);

    $response = $this->get('/specialisations/hospital-hvac');

    $response->assertStatus(200);
    $response->assertViewIs('frontend.pages.specialisation');
    $response->assertSee('Hospital HVAC');
});
