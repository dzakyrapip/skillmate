<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSkillMate as User;
use App\Models\Request as UsReq;
use Illuminate\Support\Facades\Auth;

class FindController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'skillmate');
        $q = $request->get('q');
        $currentUser = Auth::user();

        $currentUserTags = is_string($currentUser->tags)
            ? (json_decode($currentUser->tags, true) ?? array_filter(array_map('trim', explode(',', $currentUser->tags))))
            : ($currentUser->tags ?? []);

        $users = collect();
        $requests = collect();

        if ($type !== 'request') {
            if ($q || !empty($currentUserTags)) {
                $bookmarkedUserIds = $currentUser->bookmarks()
                    ->where('type', 'skillmate')
                    ->pluck('bookmarked_user_id')
                    ->toArray();

                $query = User::query()
                    ->where('id', '!=', $currentUser->id)
                    ->whereNotIn('id', $bookmarkedUserIds);

                if ($q) {
                    $query->where(function ($subQuery) use ($q) {
                        $subQuery->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($q) . '%'])
                                 ->orWhereRaw('LOWER(tags) LIKE ?', ['%' . strtolower($q) . '%']);
                    });
                } else {
                    $query->where(function ($subQuery) use ($currentUserTags) {
                        foreach ($currentUserTags as $tag) {
                            $subQuery->orWhereJsonContains('tags', $tag);
                        }
                    });
                }

                $users = $query->get();
            }
        } else {
            if ($q || !empty($currentUserTags)) {
                $query = UsReq::with('user')
                    ->where('user_id', '!=', $currentUser->id);

                if ($q) {
                    $query->where(function ($subQuery) use ($q) {
                        $subQuery->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($q) . '%'])
                                 ->orWhereRaw('LOWER(tags) LIKE ?', ['%' . strtolower($q) . '%']);
                    });
                } else {
                    $query->where(function ($subQuery) use ($currentUserTags) {
                        foreach ($currentUserTags as $tag) {
                            $subQuery->orWhereJsonContains('tags', $tag);
                        }
                    });
                }

                $requests = $query->latest()->get();
            }
        }

        return view('find', [
            'title' => 'Temukan Skillmate',
            'type' => $type,
            'users' => $users,
            'requests' => $requests,
            'currentUser' => $currentUser,
        ]);
    }
}
