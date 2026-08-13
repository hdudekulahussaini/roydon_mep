<?php

use App\Mail\EnquiryAdminNotification;
use App\Mail\EnquiryUserConfirmation;
use App\Models\Enquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

it('sends only the admin notification to the admin email and only the user confirmation to the submitted email', function () {
    Mail::fake();

    $payload = [
        'name' => 'Test User',
        'organisation' => 'Test Hospital',
        'email' => 'user@example.com',
        'phone' => '1234567890',
        'city' => 'Hyderabad',
        'bed_count' => '50',
        'project_type' => 'New Hospital — Full MEP',
        'expected_programme' => '3–6 months',
        'details' => 'Test details',
        'budget_range' => '₹10-20 Cr',
        'referral_source' => 'Google',
    ];

    $response = $this->post(route('enquiries.store'), $payload, ['Referer' => route('home')]);

    $response->assertRedirect();

    Mail::assertSent(EnquiryAdminNotification::class, function ($mail) {
        return $mail->hasTo('dharishbandi@gmail.com');
    });

    Mail::assertSent(EnquiryUserConfirmation::class, function ($mail) {
        return $mail->hasTo('user@example.com');
    });

    Mail::assertNotSent(EnquiryUserConfirmation::class, function ($mail) {
        return $mail->hasTo('sreedhar@roydonmep.com');
    });

    Mail::assertNotSent(EnquiryAdminNotification::class, function ($mail) {
        return $mail->hasTo('user@example.com');
    });

    expect(Enquiry::where('email', 'user@example.com')->exists())->toBeTrue();
});
