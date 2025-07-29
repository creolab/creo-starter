<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    /**
     * Redirect the user to the Google OAuth provider.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->getId())->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/dashboard');
            } else {
                // Check if user with same email exists
                $existingUser = User::where('email', $user->getEmail())->first();

                if ($existingUser) {
                    // Update existing user with social login info
                    $existingUser->update([
                        'google_id' => $user->getId(),
                    ]);

                    Auth::login($existingUser);
                    return redirect()->intended('/dashboard');
                } else {
                    // Create new user
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'google_id' => $user->getId(),
                        'password' => Hash::make(Str::random(24)),
                        'email_verified_at' => now(),
                    ]);

                    Auth::login($newUser);
                    return redirect()->intended('/dashboard');
                }
            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Google login failed. Please try again.']);
        }
    }

    /**
     * Redirect the user to the Facebook OAuth provider.
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->getId())->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/dashboard');
            } else {
                // Check if user with same email exists
                $existingUser = User::where('email', $user->getEmail())->first();

                if ($existingUser) {
                    // Update existing user with social login info
                    $existingUser->update([
                        'facebook_id' => $user->getId(),
                    ]);

                    Auth::login($existingUser);
                    return redirect()->intended('/dashboard');
                } else {
                    // Create new user
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'facebook_id' => $user->getId(),
                        'password' => Hash::make(Str::random(24)),
                        'email_verified_at' => now(),
                    ]);

                    Auth::login($newUser);
                    return redirect()->intended('/dashboard');
                }
            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Facebook login failed. Please try again.']);
        }
    }

    /**
     * Redirect the user to the GitHub OAuth provider.
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();

            $finduser = User::where('github_id', $user->getId())->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/dashboard');
            } else {
                // Check if user with same email exists
                $existingUser = User::where('email', $user->getEmail())->first();

                if ($existingUser) {
                    // Update existing user with social login info
                    $existingUser->update([
                        'github_id' => $user->getId(),
                    ]);

                    Auth::login($existingUser);
                    return redirect()->intended('/dashboard');
                } else {
                    // Create new user
                    $newUser = User::create([
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'github_id' => $user->getId(),
                        'password' => Hash::make(Str::random(24)),
                        'email_verified_at' => now(),
                    ]);

                    Auth::login($newUser);
                    return redirect()->intended('/dashboard');
                }
            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'GitHub login failed. Please try again.']);
        }
    }
}
