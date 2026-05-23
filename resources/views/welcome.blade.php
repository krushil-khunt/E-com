<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop - Premium Storefront</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;700;850&display=swap" rel="stylesheet">
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

<body class="bg-gradient-to-tr from-slate-50 via-slate-100 to-indigo-50/50 min-h-screen text-slate-800 flex flex-col justify-between">

    <!-- Header Navigation -->
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-violet-600 flex items-center justify-center shadow-md shadow-indigo-500/10">
                <i class="fas fa-mobile-alt text-white text-lg"></i>
            </div>
            <div>
                <span class="font-outfit font-extrabold text-slate-900 text-base tracking-wider uppercase leading-none block">Mobile Shop</span>
                <span class="text-[9px] text-indigo-500 font-semibold tracking-widest uppercase block">Storefront</span>
            </div>
        </div>

        <nav class="flex items-center gap-4">
            @auth
                <a href="{{ url('/display') }}" class="inline-flex items-center gap-2 bg-indigo-650 hover:bg-indigo-600 text-white text-xs font-bold py-2.5 px-5 rounded-xl transition duration-200 shadow-md">
                    <i class="fas fa-store"></i> Go to Shop
                </a>
            @else
                <a href="{{ route('login') }}" class="text-slate-550 hover:text-slate-800 text-xs font-semibold px-3 py-2 transition">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 bg-white hover:bg-slate-50 text-slate-700 text-xs font-bold py-2.5 px-4 rounded-xl border border-slate-200 shadow-sm transition duration-200">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    </header>

    <!-- Main Hero Section -->
    <main class="w-full max-w-7xl mx-auto px-6 py-12 flex-grow flex flex-col justify-center items-center text-center">
        <div class="max-w-3xl">
            <!-- Accent Badge -->
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-500/10 text-indigo-600 border border-indigo-500/20 mb-6 uppercase tracking-wider">
                <i class="fas fa-star text-[10px]"></i> Premium Mobile Store
            </span>

            <!-- Hero Title -->
            <h1 class="text-4xl sm:text-6xl font-black font-outfit text-slate-900 leading-tight tracking-tight">
                Discover the Next Generation of <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-violet-600">Mobile Innovation</span>
            </h1>

            <!-- Hero Subtitle -->
            <p class="text-slate-550 text-sm sm:text-lg mt-6 leading-relaxed max-w-xl mx-auto">
                Explore an exclusive, curated catalog of premium smartphones with state-of-the-art specs, beautiful displays, and performance built for tomorrow.
            </p>

            <!-- CTA Actions -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                @auth
                    <a href="{{ url('/display') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-550 text-white text-sm font-bold py-3.5 px-8 rounded-2xl transition duration-250 shadow-md shadow-indigo-500/10 w-full sm:w-auto">
                        Browse Devices <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-550 text-white text-sm font-bold py-3.5 px-8 rounded-2xl transition duration-250 shadow-md shadow-indigo-500/10 w-full sm:w-auto">
                        Sign In & Shop <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 bg-white hover:bg-slate-50 text-slate-700 text-sm font-bold py-3.5 px-8 rounded-2xl border border-slate-200 shadow-sm transition duration-250 w-full sm:w-auto">
                        Create Account
                    </a>
                @endif
            </div>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 w-full max-w-4xl mt-20">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 text-left shadow-sm hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4 border border-indigo-100">
                    <i class="fas fa-truck text-base"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm font-outfit">Free Delivery</h4>
                <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Enjoy zero-cost shipping on every order, dispatched safely with real-time tracking.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 text-left shadow-sm hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4 border border-purple-100">
                    <i class="fas fa-shield-alt text-base"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm font-outfit">Secured Payments</h4>
                <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Your transaction integrity and personal details are encrypted and protected at checkout.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 text-left shadow-sm hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 border border-emerald-100">
                    <i class="fas fa-rotate-left text-base"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm font-outfit">Easy Return</h4>
                <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">Shop with peace of mind. Return products within 7 days with our hassle-free process.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-7xl mx-auto px-6 py-6 border-t border-slate-200 text-center text-xs text-slate-400 flex flex-col sm:flex-row justify-between items-center gap-3">
        <span>&copy; 2026 Mobile Shop Inc. All rights reserved.</span>
        <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }} &nbsp;|&nbsp; PHP v{{ PHP_VERSION }}</span>
    </footer>

</body>

</html>
