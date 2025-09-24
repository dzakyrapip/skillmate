<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserSkillMate;
use App\Models\Request as UsReq;

class DashboardController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();

        // Ambil tags current user, pastikan array
        $currentUserTags = is_string($currentUser->tags)
            ? (json_decode($currentUser->tags, true) ?? array_filter(array_map('trim', explode(',', $currentUser->tags))))
            : ($currentUser->tags ?? []);

        // Jika user nggak punya tags, jangan tampilkan saran
        if (empty($currentUserTags)) {
            $allUsers = collect();
            $allRequests = collect();
        } else {
            $bookmarkedUserIds = $currentUser->bookmarks()
                ->where('type', 'skillmate')
                ->pluck('bookmarked_user_id')
                ->toArray();

            $allUsers = UserSkillMate::where('id', '!=', $currentUser->id)
                ->whereNotIn('id', $bookmarkedUserIds)
                ->where(function ($query) use ($currentUserTags) {
                    foreach ($currentUserTags as $tag) {
                        $query->orWhereRaw("LOWER(tags) LIKE ?", ['%"' . strtolower($tag) . '"%']);
                    }
                })
                ->get();

            $allRequests = UsReq::with('user')
                ->where('user_id', '!=', $currentUser->id)
                ->where(function ($query) use ($currentUserTags) {
                    foreach ($currentUserTags as $tag) {
                        $query->orWhereRaw("LOWER(tags) LIKE ?", ['%"' . strtolower($tag) . '"%']);
                    }
                })
                ->latest()
                ->get();
        }

        return view('dashboard', [
            'title' => 'Dashboard',
            'currentUser' => $currentUser,
            'users' => $allUsers,
            'requests' => $allRequests,
        ]);
    }
}
