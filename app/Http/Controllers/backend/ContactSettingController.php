<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index()
    {
        $setting = ContactSetting::first();

        return view('backend.pages.contact-settings.index', compact('setting'));
    }

    public function edit(ContactSetting $contact_setting)
    {
        return view('backend.pages.contact-settings.edit', ['setting' => $contact_setting]);
    }

    public function update(Request $request, ContactSetting $contact_setting): RedirectResponse
    {
        $data = $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'response_time' => 'nullable|string',
            'process' => 'nullable|string',
            'metrics_json' => 'nullable|string',
        ]);

        $metrics = [];
        if (! empty($data['metrics_json'])) {
            $decoded = json_decode($data['metrics_json'], true);
            if (is_array($decoded)) {
                $metrics = $decoded;
            }
        }

        $contact_setting->update([
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'address' => $data['address'] ?? null,
            'response_time' => $data['response_time'] ?? null,
            'process' => $data['process'] ?? null,
            'metrics' => $metrics,
        ]);

        flash()->success('Contact settings updated.');
        return redirect()->route('admin.contact-settings.index');
    }
}
