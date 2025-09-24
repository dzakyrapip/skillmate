@props(['mobile' => false])

@if($mobile)
    <!-- Mobile Sidebar Menu -->
    <div class="p-6 text-2xl font-bold text-indigo-600">Skillmate</div>
    <nav class="mt-6 space-y-1">
        <a href="/dashboard" class="block py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Dashboard</a>
        <a href="/find" class="block py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Temukan Skillmate</a>
        <a href="/marker" class="block py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Marker</a>
        <a href="/request" class="block py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Buat Request</a>
    </nav>
@else
    <!-- Desktop Sidebar Menu -->
    <div class="p-6 text-2xl font-bold text-indigo-600">Skillmate</div>
    <nav class="mt-6 space-y-1">
        <a href="/dashboard" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Dashboard</a>
        <a href="/find" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Temukan Skillmate</a>
        <a href="/marker" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Marker</a>
        <a href="/request" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Buat Request</a>
    </nav>
@endif

@auth
<div class="p-6 flex items-center gap-3 bg-indigo-600 rounded-t-xl mt-auto">
    <img src="{{ Auth::user()->profile_img ? asset('storage/' . Auth::user()->profile_img) : 'https://i.pravatar.cc/150?u=' . Auth::user()->id }}"
         alt="Profile" class="w-12 h-12 rounded-full border-4 border-indigo-200 shadow object-cover">
    <div>
        <p class="font-semibold text-gray-200">{{ Str::limit(Auth::user()->name, 14) }}</p>
        <a href="{{ route('accdet') }}" class="text-sm text-gray-200 hover:underline">Detail Akun</a>
    </div>
</div>
@endauth
