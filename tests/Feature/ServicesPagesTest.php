<?php

use App\Models\ServiceSubcategory;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ServiceSubcategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(CategorySeeder::class);
    $this->seed(ServiceSubcategorySeeder::class);
});

test('all legacy services routes return successful response and use the reusable template', function () {
    $routes = [
        'services.hvac',
        'services.medical-gas',
        'services.electrical',
        'services.plumbing',
        'services.fire-fighting',
        'services.turnkey',
        'services.civil-works',
    ];

    foreach ($routes as $routeName) {
        $response = $this->get(route($routeName));

        $response->assertStatus(200);
        $response->assertViewIs('frontend.pages.service');
    }
});

test('invalid service slug returns 404', function () {
    $response = $this->get('/services/non-existent-service');
    $response->assertStatus(404);
});

test('newly created service resolves dynamically via wildcard route', function () {
    $newService = ServiceSubcategory::create([
        'category_id' => 1,
        'title' => 'Hospital Solar Power',
        'slug' => 'hospital-solar-power',
        'heading' => 'Healthcare Solar Systems',
        'description' => 'Reliable medical solar systems.',
        'status' => true,
    ]);

    $response = $this->get('/services/hospital-solar-power');

    $response->assertStatus(200);
    $response->assertViewIs('frontend.pages.service');
    $response->assertSee('Hospital Solar Power');
});

test('service page renders dynamic offerings heading and description', function () {
    $service = ServiceSubcategory::create([
        'category_id' => 1,
        'title' => 'Hospital HVAC',
        'slug' => 'hospital-hvac-systems-test',
        'heading' => 'Advanced Hospital HVAC',
        'description' => 'Detailed description of HVAC.',
        'home_description' => 'Short HVAC for home page.',
        'offerings_heading' => 'Key HVAC Capabilities',
        'offerings_main_description' => 'We deliver specialized AHU and Chiller solutions.',
        'status' => true,
    ]);

    $response = $this->get('/services/hospital-hvac-systems-test');

    $response->assertStatus(200);
    $response->assertSee('Key HVAC Capabilities');
    $response->assertSee('We deliver specialized AHU and Chiller solutions.');
});

test('home page renders home_description for service cards', function () {
    $service = ServiceSubcategory::first();
    $service->update([
        'home_description' => 'Unique home card summary description text',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Unique home card summary description text');
});
