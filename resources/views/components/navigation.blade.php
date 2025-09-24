<!-- PC MODE -->
<div x-data="{ isOpen: false }">
    <button @click="isOpen = !isOpen"
        class="lg:hidden fixed top-4 right-4 z-50 p-2 bg-indigo-600 text-white rounded-md shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="size-6" stroke="currentColor">
            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
        </svg>
    </button>

    <div class="hidden w-64 bg-white shadow-lg lg:flex flex-col justify-between h-screen fixed">
        <div>
            <div class="p-6 text-2xl font-bold text-indigo-600">
                Skillmate
            </div>
            <nav class="mt-6 space-y-1">
                <a href="/dashboard" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg> Dashboard
                </a>
                <a href="/find" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg> Temukan Skillmate
                </a>
                <a href="/marker" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                    </svg> Marker
                </a>
                <a href="/request" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                    </svg> Buat Request
                </a>
                <a href="/special" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-indigo-500" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path d="M9.375 3a1.875 1.875 0 0 0 0 3.75h1.875v4.5H3.375A1.875 1.875 0 0 1 1.5 9.375v-.75c0-1.036.84-1.875 1.875-1.875h3.193A3.375 3.375 0 0 1 12 2.753a3.375 3.375 0 0 1 5.432 3.997h3.943c1.035 0 1.875.84 1.875 1.875v.75c0 1.036-.84 1.875-1.875 1.875H12.75v-4.5h1.875a1.875 1.875 0 1 0-1.875-1.875V6.75h-1.5V4.875C11.25 3.839 10.41 3 9.375 3ZM11.25 12.75H3v6.75a2.25 2.25 0 0 0 2.25 2.25h6v-9ZM12.75 12.75v9h6.75a2.25 2.25 0 0 0 2.25-2.25v-6.75h-9Z" />
                    </svg> Special
                </a>
            </nav>
        </div>
        @auth
        <div class="p-6 flex items-center gap-3 bg-indigo-600 rounded-t-xl"> @if(Auth::user()->profile_img)
            <img src="{{ asset('storage/' . Auth::user()->profile_img) }}" alt="Profile Picture" class="w-12 h-12 rounded-full border-4 border-indigo-200 shadow object-cover"> @else <img src="https://i.pravatar.cc/150?u={{ Auth::user()->id }}" alt="Profile Picture" class="w-12 h-12 rounded-full border-4 border-indigo-200 shadow">
            @endif
            <div>
                <p class="font-semibold text-gray-200" title="{{ Auth::user()->name }}">{{ Str::limit(Auth::user()->name, 14) }}</p> <a href="{{ route('accdet') }}" class="text-sm text-gray-200 hover:underline"> Detail Akun </a>
            </div>
        </div>
        @endauth
    </div>

    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="lg:hidden fixed inset-y-0 left-0 w-full z-40 bg-white flex flex-col justify-between shadow-lg">
        <div>
            <div class="p-6 text-2xl font-bold text-indigo-600">
                Skillmate
            </div>
            <nav class="mt-6 space-y-1">
                <a href="/dashboard" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Dashboard</a>
                <a href="/find" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Temukan Skillmate</a>
                <a href="/marker" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Marker</a>
                <a href="/request" class="flex items-center py-3 px-6 text-gray-700 hover:bg-indigo-100 hover:text-indigo-600 rounded-r-xl transition">Buat Request</a>
            </nav>
        </div>

        @auth
        <div class="p-6 flex items-center gap-3 bg-indigo-600">
            @if(Auth::user()->profile_img)
            <img src="{{ asset('storage/' . Auth::user()->profile_img) }}" class="w-12 h-12 rounded-full border-4 border-indigo-200 shadow object-cover">
            @else
            <img src="https://i.pravatar.cc/150?u={{ Auth::user()->id }}" class="w-12 h-12 rounded-full border-4 border-indigo-200 shadow">
            @endif
            <div>
                <p class="font-semibold text-gray-200">{{ Auth::user()->name }}</p>
                <a href="{{ route('accdet') }}" class="text-sm text-gray-200 hover:underline">Detail Akun</a>
            </div>
        </div>
        @endauth
    </div>
    <div
        x-show="isOpen"
        @click="isOpen = false"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-25 z-30 lg:hidden">
    </div>
</div>