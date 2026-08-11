<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PasswordController extends Controller
{
    /**
     * Show the admin password change form.
     */
    public function edit()
    {
        // Redirect to the profile page where the password form is displayed.
        return redirect()->route('admin.profile.show');
    }

    /**
     * Update the admin password.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $admin = auth()->user();
        $admin->password = Hash::make($request->validated()['password']);
        $admin->save();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Password updated successfully.');
    }
}
