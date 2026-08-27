<?php

use App\Models\PremiumStat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can create premium stat without description', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.premium-stats.store'), [
        'count' => '150+',
        'title' => 'Healthcare Projects',
        'description' => null,
    ]);

    $response->assertRedirect(route('admin.premium-stats.index'));
    $this->assertDatabaseHas('premium_stats', [
        'count' => '150+',
        'title' => 'Healthcare Projects',
        'description' => null,
    ]);
});

test('admin can update premium stat to have empty description', function () {
    $user = User::factory()->create();
    $stat = PremiumStat::create([
        'count' => '50+',
        'title' => 'Cleanrooms',
        'description' => 'Initial description',
    ]);

    $response = $this->actingAs($user)->put(route('admin.premium-stats.update', $stat), [
        'count' => '50+',
        'title' => 'Cleanrooms Updated',
        'description' => '',
    ]);

    $response->assertRedirect(route('admin.premium-stats.index'));
    expect($stat->fresh()->description)->toBeNull();
});
