<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="max-w-4xl mx-auto">
        <div class="flex items-center gap-6 pb-8 mb-10">
            @if($user->profile_img)
            <img src="{{ asset('storage/' . $user->profile_img) }}"
                alt="Profile Picture"
                class="w-28 h-28 rounded-full border-4 border-indigo-200 shadow object-cover">
            @else
            <img src="https://i.pravatar.cc/150?u={{ $user->id }}"
                alt="Profile Picture"
                class="w-28 h-28 rounded-full border-4 border-indigo-200 shadow">
            @endif
            <div>
                <h2 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600 text-lg">{{ '@' . $user->nickname }}</p>
                <span class="text-sm text-indigo-600">Joined {{ $user->created_at->format('d F Y') }}</span>
            </div>
        </div>
        <div class="space-y-8 bg-indigo-50 p-8 rounded-xl shadow-sm">
            <div class="flex justify-between">
                <h3 class="font-medium text-gray-500">Nomor</h3>
                <p class="text-gray-800">{{ "+" . $user->instagram_link ?? '-' }}</p>
            </div>
            <div class="flex justify-between">
                <h3 class="font-medium text-gray-500">Skills</h3>
                <div class="flex gap-2 flex-wrap max-w-md justify-end">
                    @if ($user->tags)
                    @foreach ($user->tags as $tag)
                    <span class="px-3 py-1 text-xs bg-indigo-100 text-indigo-600 rounded-full">#{{ $tag }}</span>
                    @endforeach
                    @else
                    <span class="text-gray-400">No skills yet</span>
                    @endif
                </div>
            </div>
            <div class="flex justify-between">
                <h3 class="font-medium text-gray-500">Bio</h3>
                <p class="text-gray-800 max-w-md text-right">{{ $user->bio ?? 'Belum ada bio.' }}</p>
            </div>
        </div>
        <div class="flex justify-end mt-10 gap-3">
            <a href="{{ route('profile.edit') }}"
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Edit Profil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        </div>
    </section>
</x-app-layout>