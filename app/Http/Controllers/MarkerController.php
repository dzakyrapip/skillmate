<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkerController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();

        $bookmarkedUsers = $currentUser->bookmarks()
            ->with('bookmarkedUser')
            ->where('type', 'skillmate')
            ->get()
            ->map(function ($bookmark) {
                return $bookmark->bookmarkedUser;
            });

        return view('marker', [
            'title' => 'Marker',
            'bookmarkedUsers' => $bookmarkedUsers,
        ]);
    }

    public function store($userId)
    {
        Bookmark::firstOrCreate([
            'user_id' => Auth::id(),
            'bookmarked_user_id' => $userId,
            'type' => 'skillmate',
        ]);

        return back()->with('success', 'User bookmarked!');
    }


    public function destroy($userId, Request $request)
    {
        Bookmark::where('user_id', Auth::id())
            ->where('bookmarked_user_id', $userId)
            ->where('type', $request->type ?? 'skillmate')
            ->delete();

        return back()->with('success', 'Bookmark removed');
    }
}
