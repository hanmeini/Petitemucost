<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    // 1. Mengarahkan user ke halaman login Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Menerima data balikan dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            if ($user) {
                Auth::login($user);

                // Arahkan berdasarkan role
                if ($user->role == 'admin') {
                    return redirect()->intended(route('admin.dashboard'));
                }
                return redirect()->intended(route('dashboard'));

            } else {
                $existingUser = User::where('email', $googleUser->getEmail())->first();

                if ($existingUser) {
                    $existingUser->update([
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                    ]);

                    Auth::login($existingUser);
                } else {
                    $newUser = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                        'password' => Hash::make(uniqid()),
                        'role' => 'client',
                    ]);

                    Auth::login($newUser);
                }

                return redirect()->intended(route('dashboard'));
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('/login')->with('error', 'Login dengan Google gagal, coba lagi.');
        }
    }
}
