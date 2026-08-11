<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Mail\EnquiryAdminNotification;
use App\Mail\EnquiryUserConfirmation;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(): View
    {
        $enquiries = Enquiry::query()->latest('created_at')->paginate(20);
        $selected = request()->query('selected');
        $selectedEnquiry = $selected ? Enquiry::query()->find($selected) : ($enquiries->first() ?? null);

        return view('backend.pages.enquiries.index', compact('enquiries', 'selectedEnquiry'));
    }

    public function store(EnquiryRequest $request): RedirectResponse
    {
        $enquiry = Enquiry::create($request->validated());

        $adminEmail = 'dharishbandi@gmail.com';

        Mail::to($adminEmail)
            ->send(new EnquiryAdminNotification($enquiry));

        if ($enquiry->email && strcasecmp($enquiry->email, $adminEmail) !== 0) {
            Mail::to($enquiry->email)
                ->send(new EnquiryUserConfirmation($enquiry));
        }

        $url = strtok(url()->previous(), '#');
        flash()->success('Thank you — your enquiry has been received. We will get back to you shortly.');

        return redirect()->to($url.'#contact');
    }

    public function show(Enquiry $enquiry): View
    {
        return view('backend.pages.enquiries.show', compact('enquiry'));
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        $enquiry->deleteOrFail();

        flash()->success('Enquiry removed.');

        return redirect()->route('admin.enquiries.index');
    }
}