<?php

use App\Models\ServiceSubcategory;
use Database\Seeders\ServiceSubcategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
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
