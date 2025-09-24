<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();

        if (isset($data['tags'])) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        }

        if ($request->hasFile('profile_img')) {
            if ($user->profile_img && Storage::disk('public')->exists($user->profile_img)) {
                Storage::disk('public')->delete($user->profile_img);
            }

            $path = $request->file('profile_img')->store('profile_img', 'public');
            $data['profile_img'] = $path;
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('accdet')->with('status', 'Profile updated!');
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

    public function show()
    {
        $user = Auth::user();

        return view('accdet', [
            'title' => 'Detail Akun',
            'user' => $user,
        ]);
    }
}
