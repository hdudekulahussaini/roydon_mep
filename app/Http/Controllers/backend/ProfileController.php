<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the admin profile page.
     */
    public function show(): View
    {
        // Simple profile view – you can extend with more details later.
        return view('backend.pages.profile.index');
    }
}
