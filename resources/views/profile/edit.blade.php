<x-app-layout>
    <x-slot:title>{{ $title ?? 'Edit Profil' }}</x-slot:title>

    <section class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow">

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Profile Image -->
            <div class="mb-5">
                <label for="profile_img" class="block text-sm font-medium text-gray-700">Foto profil</label>
                <input type="file" name="profile_img" id="profile_img"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm 
                  focus:border-indigo-500 focus:ring-indigo-500"
                    accept="image/*">
                @if ($user->profile_img)
                <p class="text-sm text-gray-500 mt-1">Foto profil saat ini:</p>
                <img src="{{ asset('storage/' . $user->profile_img) }}" alt="Profile Image"
                    class="w-20 h-20 rounded-full mt-2 border">
                @endif
                @error('profile_img')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Name -->
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Instagram -->
            <div class="mb-5">
                <label for="instagram" class="block text-sm font-medium text-gray-700">Whatsapp</label>
                <input type="text" name="instagram_link" id="instagram"
                    value="{{ old('instagram_link', $user->instagram_link) }}"
                    placeholder="contoh: 6281234567890"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm 
              focus:border-indigo-500 focus:ring-indigo-500">
                <p class="text-sm text-gray-500 mt-1">Masukkan nomor Whatsapp kamu</p>
                @error('instagram')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Skills -->
            <div class="mb-5">
                <label for="tags" class="block text-sm font-medium text-gray-700">Tag skills</label>
                <input type="text" name="tags" id="tags"
                    value="{{ old('tags', $user->tags ? implode(',', $user->tags) : '') }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Pisahkan dengan koma, contoh: Guitar,Singer,Collab">
                <p class="text-sm text-gray-500 mt-1">Gunakan koma (,) untuk memisahkan setiap skill.</p>
                @error('tags')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bio -->
            <div class="mb-5">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" id="bio" rows="4"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Ceritakan sedikit tentang dirimu...">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('accdet') }}"
                    class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </section>
</x-app-layout>