<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Management System Login">
    <title>Library Management System - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        .bg-library {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .yellow-glow:focus {
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.3);
        }
    </style>
</head>

<body class="bg-library min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="glass-effect max-w-md w-full space-y-8 p-10 rounded-xl shadow-2xl">
        <!-- Session Status -->
        @if (session('status'))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
            <p class="text-sm">{{ session('status') }}</p>
        </div>
        @endif

        <!-- Header Section -->
        <div class="text-center">
            <div class="flex justify-center">
                <div class="rounded-full bg-yellow-100 p-4">
                    <i class="fas fa-book-reader text-4xl text-blue-800"></i>
                </div>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-blue-900">
                CTU - LIBRARY SYSTEM LOGIN
            </h2>
            <p class="mt-2 text-sm text-blue-600">
                Your gateway to knowledge and discovery
            </p>
        </div>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-blue-800">
                    Email Address
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-blue-400"></i>
                    </div>
                    <input id="email" name="email" type="email" required autofocus
                        class="block w-full pl-10 pr-3 py-2 border border-blue-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400 yellow-glow"
                        placeholder="your@email.com"
                        value="{{ old('email') }}"
                        autocomplete="username">
                </div>
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-blue-800">
                    Password
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-blue-400"></i>
                    </div>
                    <input id="password" name="password" type="password" required
                        class="block w-full pl-10 pr-3 py-2 border border-blue-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400 yellow-glow"
                        placeholder="••••••••"
                        autocomplete="current-password">
                </div>
                @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 text-yellow-400 focus:ring-yellow-400 border-blue-300 rounded">
                    <label for="remember_me" class="ml-2 text-sm text-blue-600">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-yellow-500 hover:text-yellow-600">
                        Forgot password?
                    </a>
                </div>
                @endif
            </div>

            <!-- reCAPTCHA -->
            <div class="flex justify-center">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @error('g-recaptcha-response')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-blue-900 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt text-blue-800 group-hover:text-blue-900"></i>
                    </span>
                    Sign in to your account
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-blue-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-yellow-500 hover:text-yellow-600">
                    Register now
                </a>
            </p>
        </div>

        <!-- Footer -->
        <div class="mt-8 border-t border-blue-100 pt-6">
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-blue-400 hover:text-yellow-400">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-yellow-400">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-yellow-400">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <p class="mt-4 text-center text-xs text-blue-500">
                &copy; 2024 Library Management System. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>