<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skillmate - Register</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-700 via-purple-700 to-pink-600">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 mt-8 mb-8">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-indigo-600">Create Your Account</h1>
            <p class="mt-2 text-sm text-gray-500">Join Skillmate and start your journey</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
            @csrf

            <!-- Full Name -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M5.121 17.804A9 9 0 1118.364 4.561a9 9 0 01-13.243 13.243z" />
                    </svg>
                </span>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    placeholder="Full Name"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nickname -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M16 12H8m8-4H8m8 8H8m2 4h4a2 2 0 002-2V6a2 2 0 00-2-2H10a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
                <input type="text" name="nickname" id="nickname" placeholder="Nickname"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border 
           @error('nickname') border-red-500 @else border-gray-300 @enderror
           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">

                @error('nickname')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M16 12H8m-2 8h12a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    placeholder="Email address"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 11c.657 0 1.29.263 1.757.732A2.492 2.492 0 0114.5 13.5V17a2.5 2.5 0 01-5 0v-3.5c0-.663.263-1.296.732-1.768A2.492 2.492 0 0112 11z" />
                        <path d="M6 10V7a6 6 0 1112 0v3" />
                    </svg>
                </span>
                <input type="password" id="password" name="password" required
                    placeholder="Password"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 11c.657 0 1.29.263 1.757.732A2.492 2.492 0 0114.5 13.5V17a2.5 2.5 0 01-5 0v-3.5c0-.663.263-1.296.732-1.768A2.492 2.492 0 0112 11z" />
                        <path d="M6 10V7a6 6 0 1112 0v3" />
                    </svg>
                </span>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    placeholder="Confirm Password"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
            </div>

            <!-- Show password checkbox -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="showPassword" onclick="togglePasswords()" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <label for="showPassword" class="text-sm text-gray-600">Show Passwords</label>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded-lg font-semibold transition shadow">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">Login</a>
        </p>
    </div>
    <script>
        function togglePasswords() {
            const password = document.getElementById("password");
            const confirm = document.getElementById("password_confirmation");
            const check = document.getElementById("showPassword");

            if (check.checked) {
                password.type = "text";
                confirm.type = "text";
            } else {
                password.type = "password";
                confirm.type = "password";
            }
        }
    </script>
</body>
</html>