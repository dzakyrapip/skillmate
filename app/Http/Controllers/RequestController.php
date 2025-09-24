<?php

namespace App\Http\Controllers;

use App\Models\Request as UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $requests = UserRequest::where('user_id', Auth::id())->latest()->get();

        return view('request', [
            'title' => 'Buat Request',
            'requests' => $requests,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'tags' => 'required|string',
        ]);

        $tagsArray = array_map('trim', explode(',', $request->tags));

        UserRequest::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'tags' => $tagsArray,
            'instagram' => Auth::user()->instagram_link ?? null,
        ]);

        return redirect()->route('request.index')
            ->with('success', 'Request created successfully.');
    }


    public function destroy(UserRequest $request)
    {
        if ($request->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->delete();
        return redirect()->route('request.index')->with('success', 'Request deleted successfully.');
    }
}
