<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="border-b pb-6 mb-8">
        <div class="flex gap-4 mb-6">
            <a href="{{ route('find.index', ['type' => 'skillmate']) }}"
                class="px-4 py-2 rounded-lg text-sm font-medium 
               {{ $type !== 'request' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Skillmate
            </a>
            <a href="{{ route('find.index', ['type' => 'request']) }}"
                class="px-4 py-2 rounded-lg text-sm font-medium 
               {{ $type === 'request' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Request
            </a>
        </div>
        <form action="{{ route('find.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <input type="hidden" name="type" value="{{ $type }}">
            <input
                type="text"
                name="q"
                placeholder="Cari berdasarkan {{ $type === 'request' ? 'request' : 'skill' }}..."
                class="flex-1 border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ request('q') }}">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-xl hover:bg-indigo-700 transition">
                <div class="flex items-center mr-2 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Cari
                </div>
            </button>
        </form>
    </section>

    @if($type !== 'request')
    <section class="pb-6">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-4">Saran Skillmates</h2>

        @php
        // Filter suggested skillmates seperti sebelumnya
        $suggested = collect();
        if($users && $currentUser) {
        $suggested = $users->filter(function($u) use ($currentUser) {
        if(!$u->tags || !$currentUser->tags) return false;

        $userTags = is_string($u->tags)
        ? (json_decode($u->tags, true) ?? array_map('trim', explode(',', $u->tags)))
        : ($u->tags ?? []);
        $currentUserTags = is_string($currentUser->tags)
        ? (json_decode($currentUser->tags, true) ?? array_map('trim', explode(',', $currentUser->tags)))
        : ($currentUser->tags ?? []);

        if(empty($userTags) || empty($currentUserTags)) return false;

        $userTagsNormalized = array_map(fn($t) => strtolower(trim($t)), $userTags);
        $currentUserTagsNormalized = array_map(fn($t) => strtolower(trim($t)), $currentUserTags);

        return count(array_intersect($currentUserTagsNormalized, $userTagsNormalized)) > 0;
        });
        }

        // Ambil maksimal 4 skillmates
        $displayUsers = $suggested->take(4);
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($displayUsers as $user)
            @php
            $displayTags = is_string($user->tags)
            ? (json_decode($user->tags, true) ?? array_map('trim', explode(',', $user->tags)))
            : ($user->tags ?? []);
            @endphp

            <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-300 transition flex flex-col">
                <img src="{{ $user->profile_img ? asset('storage/'.$user->profile_img) : 'https://i.pravatar.cc/150?u='.$user->id }}"
                    alt="User" class="w-full h-40 object-cover rounded-xl">
                <h3 class="mt-4 text-lg font-semibold text-gray-800" title="{{ $user->name }}">{{ Str::limit($user->name, 14) }}</h3>
                <p class="text-sm text-gray-600 mt-2 line-clamp-2" title="{{ $user->bio }}">{{ Str::limit($user->bio, 25) }}</p>

                <div class="flex flex-wrap gap-2 mt-2 mb-6">
                    @foreach($displayTags as $tag)
                    <span class="text-xs bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">#{{ $tag }}</span>
                    @endforeach
                </div>

                <div class="mt-auto flex gap-2">
                    <a href="{{ $user->instagram_link 
                        ? 'https://api.whatsapp.com/send?phone=' . 
                            (str_starts_with(preg_replace('/[^0-9]/', '', $user->instagram_link ), '0') 
                                ? '62' . substr(preg_replace('/[^0-9]/', '', $user->instagram_link ), 1)
                                : preg_replace('/[^0-9]/', '', $user->instagram_link )) . 
                          '&text=' . urlencode('Halo 👋, aku dari Skillmate!')
                        : '#' }}"
                        target="_blank"
                        class="flex-1 flex items-center justify-center gap-2 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition group">
                        Connect
                    </a>

                    @if(auth()->user()->hasBookmarked($user->id))
                    <form action="{{ route('bookmark.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v16l9-5 9 5V5a2 2 0 00-2-2H5z" />
                            </svg>
                        </button>
                    </form>
                    @else
                    <form action="{{ route('bookmark.store', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path d="M5 3a2 2 0 00-2 2v16l9-5 9 5V5a2 2 0 00-2-2H5z" />
                            </svg>
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-12">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg>

                    @if(empty(auth()->user()->tags))
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada Skillmates</h3>
                    <p class="text-gray-500 mb-4">Sepertinya kamu belum menambahkan tag di profilmu. Kamu bisa menambahkan tag profilmu
                        <a href="/profile/edit" class="text-indigo-600 font-semibold hover:underline">di sini.</a>
                    </p>
                    @else
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada Skillmates untukmu</h3>
                    <p class="text-gray-500 mb-4">
                        Belum ada skillmates yang cocok dengan tag profilmu.
                    </p>
                    @endif
                </div>
            </div>
            @endforelse
        </div>
    </section>
    @else
    <section class="pb-6">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-4">Saran Requests</h2>

        @php
        $displayRequests = $requests->take(3);
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($displayRequests as $req)
            @php
            $displayTags = is_string($req->tags)
            ? (json_decode($req->tags, true) ?? array_map('trim', explode(',', $req->tags)))
            : ($req->tags ?? []);
            @endphp

            <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-300 transition flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800 line-clamp-1" title="{{ $req->title }}">{{ Str::limit($req->title, 18) }}</h3>
                <p class="mt-2 text-sm text-gray-600 line-clamp-2" title="{{ $req->subtitle }}">{{ Str::limit($req->subtitle, 25) }}</p>

                <div class="flex flex-wrap gap-2 mt-4 mb-4">
                    @foreach($displayTags as $tag)
                    <span class="text-xs bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full">#{{ $tag }}</span>
                    @endforeach
                </div>

                <a href="{{ $req->user->instagram_link 
                    ? 'https://wa.me/' . ltrim(preg_replace('/[^0-9]/', '', $req->user->instagram_link), '+') . '?text=' . rawurlencode('Halo 👋, aku lihat request kamu di Skillmate: ' . $req->title) 
                    : '#' }}"
                    target="_blank"
                    class="mt-auto w-full text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                    Hubungi
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <div class="max-w-md mx-auto">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path fill-rule="evenodd" d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada Requests</h3>
                    <p class="text-gray-500 mb-4">Belum ada request dari orang lain yang bisa kamu lihat.</p>
                </div>
            </div>
            @endforelse
        </div>
    </section>
    @endif
</x-app-layout>