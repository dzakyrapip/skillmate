<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skillmate - Login</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-700 via-purple-700 to-pink-600">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-indigo-600">Welcome Back, Skillmate</h1>
            <p class="mt-2 text-sm text-gray-500">Login to continue your journey</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
            @csrf

            <!-- Nickname -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M16 12H8m8-4H8m8 8H8m2 4h4a2 2 0 002-2V6a2 2 0 00-2-2H10a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
                <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}" required autofocus
                    placeholder="Nickname"
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">
                @error('nickname')
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
                    class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition">

                <!-- Toggle show/hide -->
                <button type="button" onclick="togglePassword()"
                    class="absolute inset-y-0 right-0 flex items-center mr-3 text-gray-400 hover:text-gray-600">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>

                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded-lg font-semibold transition shadow">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">Register</a>
        </p>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7
                0.58-1.849 1.648-3.462 3.042-4.623M9.88 9.88a3 3 0 104.24 4.24" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 12a3 3 0 01-3 3m0-6a3 3 0 013 3m6.364 6.364L4.636 4.636" />`;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
</body>

</html>