<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilService;
use App\Models\Enquiry;
use App\Models\OfficeLocation;
use App\Models\Project;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'projects' => Project::count(),
            'services' => CivilService::count(),
            'enquiries' => Enquiry::count(),
            'new_enquiries' => Enquiry::where('created_at', '>=', now()->subDays(7))->count(),
            'completed_projects' => Project::where('result', 'completed')->count(),
            'locations' => OfficeLocation::count(),
        ];

        $recentEnquiries = Enquiry::latest()->limit(5)->get();

        return view('backend.pages.dashboard', compact('stats', 'recentEnquiries'));
    }
}
