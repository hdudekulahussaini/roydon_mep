<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'projects' => 0,
            'services' => 0,
            'enquiries' => 0,
            'new_enquiries' => 0,
            'completed_projects' => 0,
            'locations' => 0,
        ];

        $recentEnquiries = collect();

        return view('backend.pages.dashboard', compact(
            'stats',
            'recentEnquiries'
        ));
    }
}