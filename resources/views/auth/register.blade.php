<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Management System Registration">
    <title>Library Management System - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <!-- Header Section -->
        <div class="text-center">
            <div class="flex justify-center">
                <div class="rounded-full bg-yellow-100 p-4">
                    <i class="fas fa-book-reader text-4xl text-blue-800"></i>
                </div>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-blue-900">
                Create Account
            </h2>
            <p class="mt-2 text-sm text-blue-600">
                Join our library community today
            </p>
        </div>

        <!-- Registration Form -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-blue-800">
                    Full Name
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-blue-400"></i>
                    </div>
                    <input id="name" name="name" type="text" required
                        class="block w-full pl-10 pr-3 py-2 border border-blue-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400 yellow-glow @error('name') border-red-500 @enderror"
                        placeholder="John Doe"
                        value="{{ old('name') }}"
                        autocomplete="name">
                </div>
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-blue-800">
                    Email Address
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-blue-400"></i>
                    </div>
                    <input id="email" name="email" type="email" required
                        class="block w-full pl-10 pr-3 py-2 border border-blue-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400 yellow-glow @error('email') border-red-500 @enderror"
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
                    <input id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="new-password"
                        class="block w-full pl-10 pr-3 py-2 border border-blue-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400 yellow-glow @error('password') border-red-500 @enderror"
                        onkeyup="checkPasswordStrength(this.value)">
                </div>

                <!-- Password Strength Indicator -->
                <div class="mt-2">
                    <div class="text-sm font-medium text-blue-800">Password Strength:</div>
                    <div class="mt-1 h-2 bg-blue-100 rounded-full">
                        <div id="password-strength-meter" class="h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                    <div id="password-strength-text" class="mt-1 text-sm text-blue-600"></div>
                </div>

                <!-- Password Requirements Checklist -->
                <div class="mt-2">
                    <div class="text-sm font-medium text-blue-800">Password must contain:</div>
                    <ul class="mt-1 text-sm text-blue-600 space-y-1">
                        <li id="length-check" class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-2"></i>
                            At least 8 characters
                        </li>
                        <li id="uppercase-check" class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-2"></i>
                            At least one uppercase letter
                        </li>
                        <li id="lowercase-check" class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-2"></i>
                            At least one lowercase letter
                        </li>
                        <li id="number-check" class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-2"></i>
                            At least one number
                        </li>
                        <li id="special-check" class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-2"></i>
                            At least one special character
                        </li>
                    </ul>
                </div>

                @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-blue-800">
                    Confirm Password
                </label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-blue-400"></i>
                    </div>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="block w-full pl-10 pr-3 py-2 border border-blue-200 rounded-md focus:ring-yellow-400 focus:border-yellow-400 yellow-glow"
                        placeholder="••••••••"
                        autocomplete="new-password">
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" required
                    class="h-4 w-4 text-yellow-400 focus:ring-yellow-400 border-blue-300 rounded">
                <label for="terms" class="ml-2 block text-sm text-blue-600">
                    I agree to the <a href="#" class="text-yellow-500 hover:text-yellow-600">Terms and Conditions</a>
                </label>
            </div>

            <!-- Register Button -->
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-blue-900 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus text-blue-800 group-hover:text-blue-900"></i>
                    </span>
                    Create Account
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-blue-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-yellow-500 hover:text-yellow-600">
                    Sign in instead
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

    <script>
        function checkPasswordStrength(password) {
            // Initialize checks
            let checks = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[@$!%*?&]/.test(password)
            };

            // Update check marks
            Object.keys(checks).forEach(check => {
                const element = document.getElementById(`${check}-check`);
                const icon = element.querySelector('i');

                if (checks[check]) {
                    icon.className = 'fas fa-check-circle text-yellow-500 mr-2';
                } else {
                    icon.className = 'fas fa-times-circle text-red-500 mr-2';
                }
            });

            // Calculate strength percentage
            const strengthPercent = (Object.values(checks).filter(Boolean).length / 5) * 100;

            // Update strength meter
            const strengthMeter = document.getElementById('password-strength-meter');
            strengthMeter.style.width = `${strengthPercent}%`;

            // Update color based on strength
            if (strengthPercent <= 25) {
                strengthMeter.className = 'h-2 rounded-full transition-all duration-300 bg-red-500';
            } else if (strengthPercent <= 50) {
                strengthMeter.className = 'h-2 rounded-full transition-all duration-300 bg-yellow-500';
            } else if (strengthPercent <= 75) {
                strengthMeter.className = 'h-2 rounded-full transition-all duration-300 bg-yellow-400';
            } else {
                strengthMeter.className = 'h-2 rounded-full transition-all duration-300 bg-green-500';
            }

            // Update strength text
            const strengthText = document.getElementById('password-strength-text');
            if (strengthPercent === 100) {
                strengthText.textContent = 'Strong password';
                strengthText.className = 'mt-1 text-sm text-green-600';
            } else if (strengthPercent >= 75) {
                strengthText.textContent = 'Good password';
                strengthText.className = 'mt-1 text-sm text-yellow-600';
            } else if (strengthPercent >= 50) {
                strengthText.textContent = 'Moderate password';
                strengthText.className = 'mt-1 text-sm text-blue-600';
            } else {
                strengthText.textContent = 'Weak password';
                strengthText.className = 'mt-1 text-sm text-red-600';
            }
        }
    </script>
</body>

</html>