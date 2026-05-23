<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mobile Shop</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;750;850&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }
    </style>
</head>

<body class="bg-gradient-to-tr from-slate-50 via-slate-100 to-indigo-50/50 min-h-screen text-slate-800 flex items-center justify-center p-6">

    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="flex items-center justify-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-violet-600 flex items-center justify-center shadow-md shadow-indigo-500/10">
                <i class="fas fa-mobile-alt text-white text-lg"></i>
            </div>
            <div>
                <span class="font-outfit font-extrabold text-slate-900 text-base tracking-wider uppercase leading-none block">Mobile Shop</span>
                <span class="text-[9px] text-indigo-500 font-semibold tracking-widest uppercase block">Storefront</span>
            </div>
        </div>

        <!-- Glassmorphic Login Card -->
        <div class="glass-panel p-8 rounded-3xl shadow-xl shadow-slate-100/70">
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-slate-900 font-outfit tracking-wide">Welcome Back</h2>
                <p class="text-xs text-slate-500 mt-1.5">Sign in to manage your shop profile</p>
            </div>

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="mb-4 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 text-xs">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- No account found redirection alert --}}
            @if(session('error') && str_contains(session('error'), 'account'))
                <div class="mb-4 p-4 rounded-xl bg-amber-50 border border-amber-100 text-center">
                    <h5 class="text-xs font-bold text-amber-800">⚠️ Account Not Found</h5>
                    <p class="text-[11px] text-slate-600 mt-1">
                        No registered account matches this email address.
                    </p>
                    <a href="/register" class="mt-3 inline-block bg-amber-500 hover:bg-amber-600 text-white text-[10px] font-bold py-1.5 px-4 rounded-lg transition duration-200 shadow-sm">
                        Register Account
                    </a>
                </div>

            {{-- Wrong password error --}}
            @elseif(session('error'))
                <div class="mb-4 p-3.5 rounded-xl bg-rose-50 border border-rose-100 text-center text-xs font-semibold text-rose-600">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 p-3.5 rounded-xl bg-emerald-50 border border-emerald-100 text-center text-xs font-semibold text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="/login" class="space-y-4">
                @csrf

                <!-- Email Input -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 group-focus-within:text-indigo-500 transition duration-200">
                            <i class="fas fa-envelope text-xs"></i>
                        </span>
                        <input type="email" name="email" required
                               class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition shadow-sm"
                               placeholder="Enter your email address" value="{{ old('email') }}">
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1.5">Password</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 group-focus-within:text-indigo-500 transition duration-200">
                            <i class="fas fa-lock text-xs"></i>
                        </span>
                        <input type="password" name="password" required
                               class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition shadow-sm"
                               placeholder="Enter your security password">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-550 hover:to-violet-550 text-white text-xs font-bold py-3 rounded-xl transition duration-200 shadow-md shadow-indigo-500/10 hover:shadow-lg hover:shadow-indigo-500/15 mt-6">
                    Sign In
                </button>
            </form>

            <div class="text-center mt-6 pt-4 border-t border-slate-100">
                <p class="text-xs text-slate-500">Don't have an account? 
                    <a href="/register" class="text-indigo-600 hover:text-indigo-500 font-semibold ml-1">
                        Register Here
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>