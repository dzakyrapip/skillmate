<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
        {{ session('error') }}
    </div>
    @endif

    <section class="border-b pb-6 mb-6">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-4">Skillmate Ditandai</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse ($bookmarkedUsers as $user)
            <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-300 transition flex flex-col">
                <img src="{{ $user->profile_img ? asset('storage/'.$user->profile_img) : 'https://i.pravatar.cc/150?u='.$user->id }}"
                    alt="User" class="w-full h-40 object-cover rounded-xl">
                <h3 class="mt-4 text-lg font-semibold text-gray-800" title="{{ $user->name }}">{{ Str::limit($user->name, 14) }}</h3>
                <p class="text-sm text-gray-600 mt-2 line-clamp-2" title="{{ $user->bio }}">{{ Str::limit($user->bio, 25) }}</p>

                <div class="flex flex-wrap gap-2 mt-2 mb-6">
                    @php
                    $displayTags = is_string($user->tags)
                    ? (json_decode($user->tags, true) ?? array_map('trim', explode(',', $user->tags)))
                    : ($user->tags ?? []);
                    @endphp
                    @foreach($displayTags as $tag)
                    <span class="text-xs bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">#{{ $tag }}</span>
                    @endforeach
                </div>

                <div class="mt-auto flex gap-2">
                    {{-- Connect Button --}}
                    <a href="{{ $user->instagram_link ? (str_starts_with($user->instagram_link, 'http') ? $user->instagram_link : 'https://instagram.com/' . ltrim($user->instagram_link, '@')) : '#' }}"
                        target="_blank"
                        class="flex-1 flex items-center justify-center gap-2 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition group">
                        Connect
                    </a>

                    @if (auth()->user()->hasBookmarked($user->id))
                    <form action="{{ route('bookmark.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v16l9-5 9 5V5a2 2 0 00-2-2H5z" />
                            </svg>
                        </button>
                    </form>
                    @else
                    <form action="{{ route('bookmark.store', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-3 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
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
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3a2 2 0 00-2 2v16l9-5 9 5V5a2 2 0 00-2-2H5z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada Skillmate</h3>
                    <p class="text-gray-500 mb-4">Sepertinya kamu belum menandai seorangpun.</p>
                    <a href="{{ route('find.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Explore Skillmate
                    </a>
                </div>
            </div>
            @endforelse
        </div>
    </section>

    <section class="bg-gray-50 rounded-xl p-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Skillmate</h3>
                <p class="text-sm text-gray-600">Jumlah Skillmate ditandai</p>
            </div>
            <div class="text-right">
                <div class="text-2xl font-bold text-indigo-600">{{ $bookmarkedUsers->count() }}</div>
                <div class="text-sm text-gray-500">Total Skillmate</div>
            </div>
        </div>
    </section>
</x-app-layout>