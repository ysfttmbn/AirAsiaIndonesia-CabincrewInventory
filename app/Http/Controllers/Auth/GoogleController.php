<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman otentikasi Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Mendapatkan informasi pengguna dari Google.
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make(uniqid()), // Buat kata sandi acak
            ]);
        }

        // Tetapkan peran berdasarkan email
        switch ($googleUser->email) {
            case 'yosafathtambun@gmail.com':
                $user->assignRole('cabincrew');
                break;
            case 'sialica012@gmail.com':
                $user->assignRole('admin');
                break;
            case 'tiomanalu1803@gmail.com':
                $user->assignRole('management');
                break;
            default:
                $user->assignRole('cabincrew');
                break;
        }

        Auth::login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
