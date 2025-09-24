<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="w-full bg-white border border-gray-200 p-8 rounded-2xl shadow-sm">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Buat Request Baru</h2>
        <form action="{{ route('request.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="mb-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" id="title" name="title" placeholder="Dicari seorang Presiden" class="mt-2 block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-2">
                <label for="subtitle" class="block text-sm font-medium text-gray-700">Sub Judul / Deskripsi</label>
                <textarea id="subtitle" name="subtitle" placeholder="Wajib bisa mengurus negara dengan baik" rows="3" class="mt-2 block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
            </div>
            <div class="mb-2">
                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                <input type="text" id="tags" name="tags" placeholder="Pisahkan dengan koma, contoh: Guitar,Singer,Collab" class="mt-2 block w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="text-sm text-gray-500 mt-1">Gunakan koma (,) untuk memisahkan setiap skill.</p>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Buat Request
                </button>
            </div>
        </form>
    </section>

    <section class="mt-8">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Request Kamu</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($requests as $req)
            <div class="bg-white border border-gray-200 p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-300 transition flex flex-col">
                <h3 class="text-lg font-semibold text-gray-800" title="{{ $req->title }}">{{ Str::limit($req->title, 18) }}</h3>
                <p class="mt-2 text-sm text-gray-600" title="{{ $req->subtitle }}">{{ Str::limit($req->subtitle, 25) }}</p>
                <div class="flex flex-wrap gap-2 mt-4 mb-4">
                    @php
                    $displayTags = is_string($req->tags)
                    ? (json_decode($req->tags, true) ?? array_map('trim', explode(',', $req->tags)))
                    : ($req->tags ?? []);
                    @endphp
                    @foreach($displayTags as $tag)
                    <span class="text-xs bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">#{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="mt-auto flex gap-2">
                    <form action="{{ route('request.destroy', $req->id) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            
            @endforeach
        </div>
    </section>
</x-app-layout>