<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
{
    $user = $request->user();
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
            // dd($profilePicture);
            $profilePicturePath = $profilePicture->store('profile_pictures', 'public');

            // Delete old profile picture if exists
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
        $requests = \App\Models\Request::where('user_id', $userId)->orderBy('created_at', 'desc')->get(); // Menggunakan model Request secara langsung
        return view('pages.viewprofile', compact('user', 'requests'));
    }
}
