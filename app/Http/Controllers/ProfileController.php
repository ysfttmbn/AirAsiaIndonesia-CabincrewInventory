<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PersonalDetailsSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $user->load('personalDetailsSize'); // Ensure personalDetailsSize is loaded
        $requests = \App\Models\Request::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        return view('pages.profile', [
            'user' => $user,
            'requests' => $requests,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $profilePicturePath = $profilePicture->store('profile_pictures', 'public');

            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $profilePicturePath;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile has been successfully updated');
    }

    /**
     * Update the user's personal size details.
     */
    public function updateSize(Request $request, $userId = null): RedirectResponse
{
    $user = $userId ? User::findOrFail($userId) : $request->user();

    $request->validate([
        'female_cabin_shoes' => 'nullable|integer',
        'female_ground_shoes' => 'nullable|integer',
        'female_red_skirt' => 'nullable|string',
        'female_red_blazer' => 'nullable|string',
        'compression_top' => 'nullable|string',
        'male_black_pants' => 'nullable|integer',
        'male_shoes' => 'nullable|integer',
        'male_black_blazer' => 'nullable|integer',
    ]);

    $personalDetails = PersonalDetailsSize::updateOrCreate(
        ['user_id' => $user->id],
        $request->only([
            'female_cabin_shoes',
            'female_ground_shoes',
            'female_red_skirt',
            'female_red_blazer',
            'compression_top',
            'male_black_pants',
            'male_shoes',
            'male_black_blazer',
        ])
    );

    return Redirect::route('profile.edit', ['userId' => $user->id])->with('status', 'Personal size details have been successfully updated');
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showProfile($userId)
    {
        $user = User::findOrFail($userId);
        $requests = \App\Models\Request::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        return view('pages.viewprofile', compact('user', 'requests'));
    }
}
