<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSkillMate;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function store(UserSkillMate $user)
    {
        $currentUser = Auth::user();

        if (!$currentUser->hasBookmarked($user->id)) {
            $currentUser->bookmarks()->create([
                'bookmarked_user_id' => $user->id,
                'type' => 'skillmate',
            ]);
        }

        return back();
    }

    public function destroy(UserSkillMate $user)
    {
        $currentUser = Auth::user();

        $currentUser->bookmarks()
            ->where('bookmarked_user_id', $user->id)
            ->where('type', 'skillmate')
            ->delete();

        return back();
    }

    public function index()
    {
        $currentUser = Auth::user();

        $bookmarkedUsers = UserSkillMate::whereIn(
            'id',
            $currentUser->bookmarks()->pluck('bookmarked_user_id')
        )->get();

        return view('marker', [
            'title' => 'Your Marked Skillmates',
            'bookmarkedUsers' => $bookmarkedUsers,
        ]);
    }
}