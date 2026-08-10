<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(): View
    {
        $enquiries = Enquiry::latest()->paginate(20);
        $selected = request()->query('selected');
        $selectedEnquiry = $selected ? Enquiry::find($selected) : ($enquiries->first() ?? null);

        return view('backend.pages.enquiries.index', compact('enquiries', 'selectedEnquiry'));
    }

    public function create(): View
    {
        return view('frontend.pages.contact');
    }

    public function store(EnquiryRequest $request): RedirectResponse
    {
        $enquiry = Enquiry::create($request->validated());

        // Send admin notification
        $adminEmail = \App\Models\ContactSetting::first()?->email ?? 'dharishbandi@gmail.com';
        \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\EnquiryAdminNotification($enquiry));

        // Send user confirmation
        if ($enquiry->email) {
            \Illuminate\Support\Facades\Mail::to($enquiry->email)->send(new \App\Mail\EnquiryUserConfirmation($enquiry));
        }

        // Redirect back to the page the form was on (home or contact), with anchor
        $url = strtok(url()->previous(), '#');
        return redirect()->to($url . '#contact')->with('success', 'Thank you — your enquiry has been received. We will get back to you shortly.');
    }

    public function show(Enquiry $enquiry): View
    {
        return view('backend.pages.enquiries.show', compact('enquiry'));
    }

    public function edit(Enquiry $enquiry): View
    {
        return view('backend.pages.enquiries.edit', compact('enquiry'));
    }

    public function update(EnquiryRequest $request, Enquiry $enquiry): RedirectResponse
    {
        $enquiry->update($request->validated());

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry updated.');
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry removed.');
    }
}
