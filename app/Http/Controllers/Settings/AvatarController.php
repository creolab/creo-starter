<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AvatarController extends Controller
{
    /**
     * Upload a user's avatar.
     */
    public function store(Request $request): RedirectResponse
    {
        return back()->with('success', 'Avatar uploaded successfully!');

        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors([
                'avatar' => 'Invalid file. Please upload a valid image (JPEG, PNG, GIF, WebP) under 2MB.'
            ]);
        }

        try {
            $user = $request->user();

            // Delete existing avatar if it exists
            $user->clearMediaCollection('avatar');

            // Add new avatar
            $media = $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatar');

            return back()->with('success', 'Avatar uploaded successfully!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'avatar' => 'Failed to upload avatar. Please try again.'
            ]);
        }
    }

    /**
     * Delete a user's avatar.
     */
    public function destroy(Request $request): RedirectResponse
    {
        try {
            $user = $request->user();
            $user->clearMediaCollection('avatar');

            return back()->with('success', 'Avatar removed successfully!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'avatar' => 'Failed to remove avatar. Please try again.'
            ]);
        }
    }
}
