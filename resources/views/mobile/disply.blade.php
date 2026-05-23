<!DOCTYPE html>
<html lang="en" class="h-full bg-white text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Elite Digital Storefront</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            50: '#F4F6FA',
                            800: '#14213D',
                            900: '#0A1224',
                        },
                        gold: {
                            500: '#FCA311',
                            600: '#E08E0B',
                        },
                        platinum: '#E5E5E5'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Smooth Global Fade-in Transitions */
        .reveal-blur {
            animation: blurReveal 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes blurReveal {
            from {
                filter: blur(12px);
                opacity: 0;
            }
            to {
                filter: blur(0);
                opacity: 1;
            }
        }

        /* Premium Staggered Entrance Animations */
        .animate-fade-in-up {
            opacity: 0;
            transform: translateY(24px);
            animation: fadeInUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-75 { animation-delay: 75ms; }
        .delay-100 { animation-delay: 100ms; }
        .delay-150 { animation-delay: 150ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-250 { animation-delay: 250ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-350 { animation-delay: 350ms; }
        .delay-400 { animation-delay: 400ms; }

        /* Glassmorphic Navbar Scroll Bindings */
        .navbar-floating {
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .navbar-floating.scrolled {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            box-shadow: 0 20px 40px -15px rgba(20, 33, 61, 0.05);
            border-color: rgba(20, 33, 61, 0.05);
        }

        /* Deluxe 3D Tilt Card */
        .tilt-card {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease;
        }

        /* Hover Reveal Actions */
        .btn-reveal {
            transform: translateY(10px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .premium-card:hover .btn-reveal {
            transform: translateY(0);
            opacity: 1;
        }

        /* Wishlist Floating Heart animations */
        .wishlist-btn {
            border: 1px solid #E5E5E5;
            background: #FFFFFF;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px -4px rgba(20, 33, 61, 0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .wishlist-btn:hover {
            border-color: #FCA311;
            background: rgba(252, 163, 17, 0.04);
            transform: scale(1.08);
        }

        .wishlist-btn.active {
            background: #14213D;
            border-color: #14213D;
        }

        .wishlist-btn.active i {
            color: #FCA311 !important;
            animation: heartPop 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Wave pulse voice UI */
        .pulse-wave {
            animation: pulseWave 1.5s infinite ease-in-out;
        }

        @keyframes pulseWave {
            0%, 100% {
                transform: scale(1);
                opacity: 0.25;
            }
            50% {
                transform: scale(1.15);
                opacity: 0.65;
            }
        }

        /* Skeleton styling */
        .skeleton-bar {
            background: linear-gradient(90deg, #F4F6FA 25%, #E5E5E5 50%, #F4F6FA 75%);
            background-size: 200% 100%;
            animation: loadingSkeleton 1.5s infinite;
        }

        @keyframes loadingSkeleton {
            from {
                background-position: 200% 0;
            }
            to {
                background-position: -200% 0;
            }
        }
    </style>
</head>

<body class="h-full font-sans antialiased bg-white reveal-blur">

    <!-- Global Fullscreen Skeleton Screen Loader overlay -->
    <div id="globalLoader" class="fixed inset-0 z-[9999] bg-white flex flex-col justify-center items-center transition-all duration-700">
        <div class="flex flex-col items-center max-w-md w-full px-6">
            <div class="w-14 h-14 rounded-[20px] bg-navy-800 flex items-center justify-center shadow-xl border border-white/10 animate-bounce">
                <i class="fas fa-layer-group text-2xl text-gold-500"></i>
            </div>
            <h2 class="text-xl font-bold font-outfit text-navy-800 tracking-tight mt-6 uppercase">Phone<span class="text-gold-500">Hub</span></h2>
            <p class="text-[9px] text-slate-400 font-bold tracking-widest uppercase mt-1">Funded Startup Showcase</p>
            <div class="w-full bg-slate-100 h-1 rounded-full overflow-hidden mt-8 border border-slate-200/50">
                <div class="bg-gold-500 h-full w-2/3 rounded-full animate-pulse"></div>
            </div>
        </div>
    </div>

    <div class="min-h-screen flex flex-col pb-24 md:pb-20">
        <!-- Luxury Floating Glassmorphic Navbar -->
        <header id="navbar" class="navbar-floating fixed top-0 left-0 right-0 z-50 px-6 py-5 border-b border-transparent bg-white/70 backdrop-blur-xl">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <!-- Brand logo -->
                <a href="/display" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 rounded-2xl bg-navy-800 flex items-center justify-center shadow-lg shadow-navy-800/10 border border-white/10 transition group-hover:scale-105">
                        <i class="fas fa-layer-group text-lg text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-xl font-black font-outfit tracking-tight text-navy-800 uppercase block group-hover:text-gold-500 transition">
                            Phone<span class="text-gold-500">Hub</span>
                        </span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-widest uppercase block">Catalog Suite</span>
                    </div>
                </a>

                <!-- Nav list items -->
                <div class="hidden md:flex items-center gap-8 text-xs font-bold text-navy-800 uppercase tracking-widest">
                    <a href="/display" class="relative hover:text-gold-500 transition py-2 group">
                        Store
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/wishlist" class="relative hover:text-gold-500 transition py-2 group">
                        Favorites
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/myorders" class="relative hover:text-gold-500 transition py-2 group">
                        My Orders
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>

                <!-- Icons bar navigation details -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Wishlist -->
                    <a href="/wishlist" class="hidden md:flex w-11 h-11 rounded-2xl bg-slate-50 hover:bg-slate-100 border border-platinum items-center justify-center text-navy-800 shadow-sm transition">
                        <i class="fas fa-heart text-[14px] text-gold-500 animate-pulse"></i>
                    </a>
                    <!-- Cart -->
                    <a href="/cart" class="hidden md:flex relative w-11 h-11 rounded-2xl bg-navy-800 hover:bg-gold-500 text-white hover:text-navy-800 items-center justify-center shadow-lg transition duration-300">
                        <i class="fas fa-shopping-bag text-[13px]"></i>
                        <span id="cartBadge" class="absolute -top-1.5 -right-1.5 bg-gold-500 text-navy-800 text-[9px] font-black px-2.5 py-0.5 rounded-full border-2 border-white shadow-md transition duration-300">
                            {{ $cartCount }}
                        </span>
                    </a>
                    <!-- Admin Control -->
                    @if(Auth::user()->role == 'admin')
                        <a href="/admin" class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl sm:rounded-2xl bg-white hover:bg-navy-800 text-navy-800 hover:text-white border border-navy-800 flex items-center justify-center transition" title="Admin Control Suite">
                            <i class="fas fa-sliders text-xs sm:text-sm"></i>
                        </a>
                    @else
                        <button onclick="showAdminAccessWarning()" class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl sm:rounded-2xl bg-white hover:bg-navy-800 text-navy-800 hover:text-white border border-navy-800 flex items-center justify-center transition" title="Admin Control Suite">
                            <i class="fas fa-sliders text-xs sm:text-sm"></i>
                        </button>
                    @endif
                    <!-- Sign Out -->
                    <a href="/logout" class="hidden md:flex w-11 h-11 rounded-2xl bg-rose-50 hover:bg-rose-100 border border-rose-100 items-center justify-center text-rose-600 transition" title="Sign Out">
                        <i class="fas fa-sign-out-alt text-sm"></i>
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Layout Flow (Flipkart Ease & Apple Polish) -->
        <main class="max-w-7xl w-full mx-auto px-4 sm:px-6 mt-20 pt-6 flex-grow" id="storeGrid">

            <!-- 1. Search Bar Section (Large, Immediate, Always Visible) -->
            <div class="relative z-40 max-w-2xl mx-auto mb-6 animate-fade-in-up" id="searchContainer">
                <div class="bg-white border border-slate-200 p-2.5 sm:p-3 rounded-2xl shadow-sm flex items-center gap-2.5 focus-within:border-navy-800 focus-within:ring-2 focus-within:ring-navy-800/5 transition duration-200">
                    <span class="text-slate-400 pl-1.5">
                        <i class="fas fa-search text-xs sm:text-sm"></i>
                    </span>
                    <input type="text" id="searchInput" placeholder="Search devices by name, brand, or specs..."
                        class="w-full bg-transparent text-xs sm:text-sm text-navy-800 placeholder-slate-400 focus:outline-none py-0.5">
                    
                    <!-- Voice Mic Action -->
                    <button type="button" id="voiceSearchBtn" class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-550 hover:text-gold-500 hover:bg-slate-100 transition shadow-inner" title="Voice Search">
                        <i class="fas fa-microphone text-[10px] sm:text-xs"></i>
                    </button>
                </div>

                <!-- Search Suggestions dropdown -->
                <div id="searchSuggestions" class="hidden absolute top-full left-0 right-0 mt-2 bg-white border border-slate-200 rounded-2xl shadow-xl overflow-hidden z-[100] transition duration-200">
                    <div class="p-2.5 text-[9px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">Live Search Suggestions</div>
                    <div id="suggestionsList" class="divide-y divide-slate-100 max-h-[300px] overflow-y-auto">
                        <!-- suggestions dynamically generated in JS -->
                    </div>
                </div>
            </div>

            <!-- 2. Minimalist Category Filter Pills (Swipeable Row) -->
            <div class="mb-6 flex overflow-x-auto no-scrollbar gap-2 py-1.5 px-1 md:flex-wrap md:justify-center md:overflow-x-visible animate-fade-in-up delay-75">
                @php
                    $currentCatId = request()->route('id');
                @endphp
                
                <!-- All category button -->
                <a href="/display"
                   class="inline-flex items-center px-4 py-2 rounded-full text-[11px] font-bold border transition duration-200 shrink-0 {{ is_null($currentCatId) ? 'bg-navy-800 text-white border-navy-800 shadow-sm' : 'bg-white hover:bg-slate-50 text-slate-600 border-slate-200' }}">
                    <span>All Devices</span>
                </a>

                <!-- Loop categories -->
                @foreach($categories as $cat)
                    <a href="/category/{{ $cat->id }}"
                       class="inline-flex items-center px-4 py-2 rounded-full text-[11px] font-bold border transition duration-200 shrink-0 {{ $currentCatId == $cat->id ? 'bg-navy-800 text-white border-navy-800 shadow-sm' : 'bg-white hover:bg-slate-50 text-slate-600 border-slate-200' }}">
                        <span>{{ $cat->name }}</span>
                    </a>
                @endforeach
            </div>

            <!-- 3. Dynamic Promo Carousel Banner -->
            <div class="relative mb-8 rounded-3xl overflow-hidden border border-slate-200 shadow-sm group animate-fade-in-up delay-100 h-44 sm:h-60">
                <!-- Slides Container -->
                <div class="relative w-full h-full flex transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)]" id="carouselSlides">
                    
                    <!-- Slide 1: Flagship Phones -->
                    <div class="w-full h-full shrink-0 relative bg-gradient-to-r from-navy-800 to-navy-900 text-white p-6 sm:p-10 flex items-center justify-between overflow-hidden">
                        <div class="absolute right-0 top-0 bottom-0 w-1/2 bg-[radial-gradient(circle_at_right,_var(--tw-gradient-stops))] from-gold-500/10 to-transparent pointer-events-none"></div>
                        <div class="relative z-10 max-w-[60%] sm:max-w-[50%]">
                            <span class="inline-flex px-2 py-0.5 rounded bg-gold-500 text-navy-800 text-[8px] font-black uppercase tracking-wider mb-2">
                                Special Upgrade Season
                            </span>
                            <h3 class="text-base sm:text-2xl font-black font-outfit tracking-tight leading-tight">
                                Flagship Upgrades Made Easy
                            </h3>
                            <p class="text-slate-350 text-[9px] sm:text-xs font-light mt-1.5 leading-relaxed hidden sm:block">
                                Get flat 10% instant discount up to ₹5,000 on select card transactions. Apply promo code <strong class="text-gold-500">PHONE10</strong>.
                            </p>
                            <p class="text-slate-350 text-[8px] mt-1 sm:hidden">Code: <strong>PHONE10</strong> | 10% Off</p>
                        </div>
                        <div class="w-[35%] sm:w-[30%] h-full flex items-center justify-center relative shrink-0">
                            <!-- Premium phone illustration/graphic -->
                            <div class="absolute w-24 h-24 sm:w-40 sm:h-40 bg-gold-500/10 rounded-full blur-2xl"></div>
                            <i class="fas fa-mobile-alt text-5xl sm:text-8xl text-gold-500 drop-shadow-[0_10px_20px_rgba(252,163,17,0.3)] animate-pulse"></i>
                        </div>
                    </div>

                    <!-- Slide 2: Audio & Acoustics -->
                    <div class="w-full h-full shrink-0 relative bg-gradient-to-r from-slate-900 to-black text-white p-6 sm:p-10 flex items-center justify-between overflow-hidden">
                        <div class="absolute right-0 top-0 bottom-0 w-1/2 bg-[radial-gradient(circle_at_right,_var(--tw-gradient-stops))] from-indigo-500/15 to-transparent pointer-events-none"></div>
                        <div class="relative z-10 max-w-[60%] sm:max-w-[50%]">
                            <span class="inline-flex px-2 py-0.5 rounded bg-indigo-500 text-white text-[8px] font-black uppercase tracking-wider mb-2">
                                Studio Acoustics
                            </span>
                            <h3 class="text-base sm:text-2xl font-black font-outfit tracking-tight leading-tight">
                                Silence the Noise.
                            </h3>
                            <p class="text-slate-350 text-[9px] sm:text-xs font-light mt-1.5 leading-relaxed hidden sm:block">
                                Immerse yourself in pure high-fidelity sound. Explore active noise cancellation audio gears from ₹1,499.
                            </p>
                            <p class="text-slate-350 text-[8px] mt-1 sm:hidden">Premium ANC gears from ₹1,499</p>
                        </div>
                        <div class="w-[35%] sm:w-[30%] h-full flex items-center justify-center relative shrink-0">
                            <div class="absolute w-24 h-24 sm:w-40 sm:h-40 bg-indigo-500/10 rounded-full blur-2xl"></div>
                            <i class="fas fa-headphones text-5xl sm:text-8xl text-indigo-400 drop-shadow-[0_10px_20px_rgba(129,140,248,0.3)]"></i>
                        </div>
                    </div>

                    <!-- Slide 3: Next Gen Laptops -->
                    <div class="w-full h-full shrink-0 relative bg-gradient-to-r from-navy-800 via-indigo-950 to-navy-900 text-white p-6 sm:p-10 flex items-center justify-between overflow-hidden">
                        <div class="absolute right-0 top-0 bottom-0 w-1/2 bg-[radial-gradient(circle_at_right,_var(--tw-gradient-stops))] from-amber-500/15 to-transparent pointer-events-none"></div>
                        <div class="relative z-10 max-w-[60%] sm:max-w-[50%]">
                            <span class="inline-flex px-2 py-0.5 rounded bg-amber-500 text-navy-900 text-[8px] font-black uppercase tracking-wider mb-2">
                                Pro Performance
                            </span>
                            <h3 class="text-base sm:text-2xl font-black font-outfit tracking-tight leading-tight">
                                Warp Speed Workflows
                            </h3>
                            <p class="text-slate-350 text-[9px] sm:text-xs font-light mt-1.5 leading-relaxed hidden sm:block">
                                Powered by cutting edge silicon processors. Experience zero lag, all-day battery life, and liquid retina screens.
                            </p>
                            <p class="text-slate-350 text-[8px] mt-1 sm:hidden">Up to 24 hours battery life</p>
                        </div>
                        <div class="w-[35%] sm:w-[30%] h-full flex items-center justify-center relative shrink-0">
                            <div class="absolute w-24 h-24 sm:w-40 sm:h-40 bg-amber-500/10 rounded-full blur-2xl"></div>
                            <i class="fas fa-laptop text-5xl sm:text-8xl text-amber-400 drop-shadow-[0_10px_20px_rgba(251,191,36,0.3)]"></i>
                        </div>
                    </div>

                </div>

                <!-- Slide Navigation Dots -->
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5 z-20">
                    <button class="w-1.5 h-1.5 rounded-full bg-white transition-all duration-300" onclick="goToSlide(0)" id="dot-0"></button>
                    <button class="w-1.5 h-1.5 rounded-full bg-white/40 transition-all duration-300" onclick="goToSlide(1)" id="dot-1"></button>
                    <button class="w-1.5 h-1.5 rounded-full bg-white/40 transition-all duration-300" onclick="goToSlide(2)" id="dot-2"></button>
                </div>
            </div>

            <!-- Premium Grid (Flipkart-style 2-column mobile responsive) -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6" id="productContainer">
                @forelse ($product as $products)
                    <!-- Deluxe Product Card -->
                    <div class="premium-card animate-fade-in-up rounded-2xl border border-slate-150 overflow-hidden flex flex-col h-full bg-white relative transition-all duration-350 hover:shadow-md hover:-translate-y-1"
                        style="animation-delay: {{ ($loop->index * 60) + 300 }}ms;"
                        data-name="{{ strtolower($products->name) }}" data-brand="{{ strtolower($products->brand) }}">

                        <!-- Wishlist button floating heart -->
                        <div class="absolute top-3 right-3 z-20">
                            <form action="/addwishlist/{{ $products->id }}" method="POST" onsubmit="addWishlistAjax(this, event)">
                                @csrf
                                <button type="submit" class="wishlist-btn" style="width: 36px; height: 36px;">
                                    <i class="fa-regular fa-heart text-xs"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Large Centered Image Section -->
                        <a href="/productdetails/{{ $products->id }}" class="flex items-center justify-center h-40 sm:h-48 relative overflow-hidden bg-slate-50/50 block group">
                            @if($products->image && (str_starts_with($products->image, 'http') || file_exists(public_path('uploads/' . $products->image))))
                                <img src="{{ str_starts_with($products->image, 'http') ? $products->image : asset('uploads/' . $products->image) }}" alt="{{ $products->name }}"
                                    class="object-contain w-full h-full drop-shadow-[0_10px_20px_rgba(20,33,61,0.06)] group-hover:scale-105 transition duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]">
                            @else
                                <div class="w-12 h-12 rounded-xl bg-white border border-platinum flex items-center justify-center text-slate-300 shadow-inner group-hover:text-gold-500 transition duration-300">
                                    <i class="fas fa-mobile-alt text-xl"></i>
                                </div>
                            @endif
                        </a>

                        <!-- Info details Body -->
                        <div class="p-3.5 sm:p-5 flex-grow flex flex-col justify-between bg-white">
                            <div>
                                <!-- Brand Name & Ratings Badge -->
                                <div class="flex items-center justify-between gap-1 mb-1">
                                    <span class="text-[8px] sm:text-[9px] font-black text-slate-400 uppercase tracking-widest block truncate">
                                        {{ $products->brand }}
                                    </span>
                                    <span class="inline-flex items-center gap-0.5 px-1 sm:px-1.5 py-0.5 rounded bg-emerald-600 text-white text-[8px] sm:text-[9px] font-bold leading-none shrink-0 shadow-sm shadow-emerald-600/10">
                                        4.5 <i class="fas fa-star text-[6px] sm:text-[7px]"></i>
                                    </span>
                                </div>
                                <!-- Product Name -->
                                <a href="/productdetails/{{ $products->id }}" class="text-xs sm:text-sm font-bold text-navy-800 tracking-tight font-outfit hover:text-navy-900 transition duration-200 block line-clamp-2 min-h-[2rem]">
                                    {{ $products->name }}
                                </a>
                            </div>

                            <!-- Flipkart-Style Pricing with original strikethrough & Assured Badge -->
                            <div class="mt-3 pt-2.5 border-t border-slate-50 flex flex-col gap-1">
                                @php
                                    $fakeOriginalPrice = $products->price * 1.08;
                                    $discountPercent = 7;
                                @endphp
                                <div class="flex items-baseline gap-1 sm:gap-1.5 flex-wrap">
                                    <span class="text-xs sm:text-base font-black text-navy-800 font-outfit">
                                        ₹{{ number_format($products->price, 0) }}
                                    </span>
                                    <span class="text-[9px] sm:text-[10px] text-slate-400 line-through">
                                        ₹{{ number_format($fakeOriginalPrice, 0) }}
                                    </span>
                                    <span class="text-[9px] sm:text-[10px] text-emerald-600 font-bold">
                                        {{ $discountPercent }}% off
                                    </span>
                                </div>
                                <div class="flex items-center gap-1.5 justify-between">
                                    <span class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded bg-blue-50 text-[7px] font-bold text-blue-650 border border-blue-100 uppercase tracking-wider scale-95 origin-left select-none">
                                        <i class="fas fa-certificate text-gold-500 text-[8px]"></i> Hub Assured
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Deluxe Actions bar -->
                        <div class="px-3.5 pb-3.5 sm:px-5 sm:pb-5 pt-0 bg-white flex gap-1.5 sm:gap-2">
                            <!-- Add to Cart Form with Ajax action -->
                            <form action="/addtocart/{{ $products->id }}" method="POST" onsubmit="addToCartAjax(this, event, '{{ $products->id }}', '{{ $products->image }}')">
                                @csrf
                                <button type="submit"
                                    class="w-8 h-8 sm:w-10 sm:h-10 inline-flex items-center justify-center rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-navy-800 transition duration-200" title="Add to Cart">
                                    <i class="fas fa-shopping-bag text-[10px] sm:text-xs"></i>
                                </button>
                            </form>
                            <!-- Buy Now Form -->
                            @if($products->stock > 0)

<form action="/addtocart/{{ $products->id }}?redirect=checkout"
      method="POST"
      class="flex-grow">

    @csrf

    <button type="submit"

        class="w-full inline-flex items-center
        justify-center gap-1.5
        py-2 px-3 sm:py-2.5 sm:px-4
        text-[10px] sm:text-xs
        font-bold rounded-xl
        bg-navy-800 hover:bg-black
        text-white transition duration-200">

        Buy Now

    </button>

</form>

@else

<button disabled

    class="w-full inline-flex items-center
    justify-center gap-1.5
    py-2 px-3 sm:py-2.5 sm:px-4
    text-[10px] sm:text-xs
    font-bold rounded-xl
    bg-red-500 text-white
    cursor-not-allowed">

    Out Of Stock

</button>

@endif
                        </div>

                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full py-20 px-6 text-center bg-white rounded-3xl border border-platinum shadow-sm">
                        <div class="max-w-sm mx-auto flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-350 mb-4 border border-platinum shadow-inner">
                                <i class="fas fa-mobile-alt text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-navy-800 font-outfit">No products currently seeded</h4>
                            <p class="text-xs text-slate-500 mt-2 mb-8">Run database seeders to populate this catalog list view.</p>
                            <a href="{{ url('addproduct') }}"
                                class="inline-flex items-center gap-2 bg-navy-800 hover:bg-gold-500 text-white hover:text-navy-800 text-xs font-bold py-3.5 px-8 rounded-2xl transition duration-300 shadow-md">
                                <i class="fas fa-plus"></i> Add Product Manual
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Minimal Premium Footer -->
            <footer class="mt-20 border-t border-slate-200 py-8 text-center text-slate-400 text-xs">
                <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4 px-2">
                    <p>&copy; {{ date('Y') }} PhoneHub. Designed for premium high-performance e-commerce experiences.</p>
                    <div class="flex items-center gap-4">
                        <a href="/display" class="hover:text-navy-800 transition">Store</a>
                        <a href="/wishlist" class="hover:text-navy-800 transition">Wishlist</a>
                        <a href="/myorders" class="hover:text-navy-800 transition">Orders</a>
                    </div>
                </div>
            </footer>

        </main>
    </div>

    <!-- Floating Glassmorphic Mobile Bottom Tab Bar -->
    <div class="fixed bottom-4 left-4 right-4 z-50 md:hidden animate-fade-in-up delay-400">
        <div id="mobileBottomBar" style="transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease;">
            <div class="bg-white/95 backdrop-blur-xl border border-slate-200/80 rounded-2xl shadow-2xl p-2.5 flex justify-around items-center">
                <!-- Store -->
                <a href="/display" class="flex flex-col items-center gap-0.5 {{ request()->is('display') ? 'text-gold-500 font-bold' : 'text-slate-400' }} transition">
                    <i class="fas fa-store text-base"></i>
                    <span class="text-[8px] uppercase tracking-wider">Store</span>
                </a>
                <!-- Favorites -->
                <a href="/wishlist" class="flex flex-col items-center gap-0.5 {{ request()->is('wishlist') ? 'text-gold-500 font-bold' : 'text-slate-400' }} transition">
                    <i class="fas fa-heart text-base"></i>
                    <span class="text-[8px] uppercase tracking-wider">Wishlist</span>
                </a>
                <!-- Cart -->
                <a href="/cart" class="relative flex flex-col items-center gap-0.5 {{ request()->is('cart') ? 'text-gold-500 font-bold' : 'text-slate-400' }} transition">
                    <i class="fas fa-shopping-bag text-base"></i>
                    @if($cartCount > 0)
                        <span class="absolute -top-1.5 -right-2 bg-gold-500 text-navy-800 text-[8px] font-black px-1.5 py-0.5 rounded-full border border-white">
                            {{ $cartCount }}
                        </span>
                    @endif
                    <span class="text-[8px] uppercase tracking-wider">Cart</span>
                </a>
                <!-- My Orders -->
                <a href="/myorders" class="flex flex-col items-center gap-0.5 {{ request()->is('myorders') ? 'text-gold-500 font-bold' : 'text-slate-400' }} transition">
                    <i class="fas fa-receipt text-base"></i>
                    <span class="text-[8px] uppercase tracking-wider">Orders</span>
                </a>
                <!-- Logout -->
                <a href="/logout" class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-rose-600 transition">
                    <i class="fas fa-sign-out-alt text-base"></i>
                    <span class="text-[8px] uppercase tracking-wider">Logout</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Speech Voice recognition modal container -->
    <div id="voiceSearchModal" class="hidden fixed inset-0 z-[999] bg-navy-900/60 backdrop-blur-md flex items-center justify-center px-6">
        <div class="bg-white border border-platinum rounded-[32px] p-8 max-w-xs w-full flex flex-col items-center text-center shadow-2xl animate-bounce">
            <div class="w-16 h-16 rounded-full bg-navy-800 text-white border border-white/10 flex items-center justify-center shadow-lg relative">
                <i class="fas fa-microphone text-xl text-gold-500"></i>
                <span class="absolute inset-0 rounded-full border border-gold-500/30 pulse-wave"></span>
            </div>
            <h4 class="text-base font-black font-outfit text-navy-800 mt-6 uppercase">Listening...</h4>
            <p class="text-xs text-slate-400 mt-2 leading-relaxed">Speak a product brand, model name, or specification to search the showcase catalog.</p>
            <button type="button" id="closeVoiceBtn" class="mt-6 text-xs font-bold text-slate-400 hover:text-navy-800 transition">Cancel</button>
        </div>
    </div>

    <!-- WebSockets Client & Dynamic Functions script -->
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script>
        // Global Loader fade out
        window.addEventListener('load', () => {
            const loader = document.getElementById('globalLoader');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.pointerEvents = 'none';
                setTimeout(() => loader.remove(), 750);
            }
        });

        // Sticky header and Mobile bar hiding on scroll
        let lastScrollY = window.scrollY;
        window.addEventListener('scroll', () => {
            const header = document.getElementById('navbar');
            const mobileBar = document.getElementById('mobileBottomBar');
            const currentScrollY = window.scrollY;

            // Header sticky state
            if (currentScrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            // Mobile Bar hide on scroll down, show on scroll up
            if (mobileBar) {
                if (currentScrollY > lastScrollY && currentScrollY > 80) {
                    mobileBar.style.transform = 'translateY(100px)';
                    mobileBar.style.opacity = '0';
                } else {
                    mobileBar.style.transform = 'translateY(0)';
                    mobileBar.style.opacity = '1';
                }
            }

            lastScrollY = currentScrollY;
        });

        // Admin Access Warning
        function showAdminAccessWarning() {
            Swal.fire({
                title: 'Admin Access Required',
                text: 'You are currently logged in as a Customer. Please sign out and switch to your administrator credentials to access the admin suite.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#14213D',
                cancelButtonColor: '#E5E5E5',
                confirmButtonText: 'Sign Out & Switch',
                cancelButtonText: 'Keep Browsing',
                background: '#FFFFFF',
                color: '#14213D',
                customClass: {
                    popup: 'border border-platinum rounded-[24px] shadow-2xl p-6',
                    confirmButton: 'rounded-xl px-5 py-3 font-bold text-xs text-white uppercase tracking-wider',
                    cancelButton: 'rounded-xl px-5 py-3 font-bold text-xs text-slate-500 uppercase tracking-wider'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        }

        // Preload products for suggestions dropdown
        const productsList = [
            @foreach($product as $p)
            {
                id: "{{ $p->id }}",
                name: "{{ addslashes($p->name) }}",
                brand: "{{ addslashes($p->brand) }}",
                price: "{{ $p->price }}",
                image: "{{ $p->image }}",
                ram: "{{ $p->ram }}",
                storage: "{{ $p->storage }}"
            },
            @endforeach
        ];

        // Suggestion Dropdown filter
        const searchInput = document.getElementById('searchInput');
        const suggestionsPanel = document.getElementById('searchSuggestions');
        const suggestionsList = document.getElementById('suggestionsList');

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            if (!query) {
                suggestionsPanel.classList.add('hidden');
                return;
            }

            const matches = productsList.filter(p => 
                p.name.toLowerCase().includes(query) || 
                p.brand.toLowerCase().includes(query) ||
                p.ram.toLowerCase().includes(query) ||
                p.storage.toLowerCase().includes(query)
            );

            suggestionsList.innerHTML = '';
            if (matches.length === 0) {
                suggestionsList.innerHTML = `<div class="p-6 text-center text-xs text-slate-400">No matching premium devices found</div>`;
            } else {
                matches.slice(0, 6).forEach(p => {
                    const imgUrl = (p.image.startsWith('http')) ? p.image : `/uploads/${p.image}`;
                    const row = document.createElement('a');
                    row.href = `/productdetails/${p.id}`;
                    row.className = 'flex items-center gap-4 p-4 hover:bg-slate-50 transition duration-150 block';
                    row.innerHTML = `
                        <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center p-1 overflow-hidden">
                            <img src="${imgUrl}" class="object-contain max-h-full max-w-full">
                        </div>
                        <div class="flex-grow">
                            <h5 class="text-xs font-bold text-navy-800 font-outfit">${p.name}</h5>
                            <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">${p.brand} • ${p.ram} / ${p.storage}</span>
                        </div>
                        <span class="text-xs font-black text-navy-800 font-outfit">₹${Number(p.price).toLocaleString('en-IN')}</span>
                    `;
                    suggestionsList.appendChild(row);
                });
            }
            suggestionsPanel.classList.remove('hidden');
        });

        // Hide suggestions on outside click
        document.addEventListener('click', (e) => {
            if (!document.getElementById('searchContainer').contains(e.target)) {
                suggestionsPanel.classList.add('hidden');
            }
        });

        // Web Speech API Voice Search
        const voiceBtn = document.getElementById('voiceSearchBtn');
        const voiceModal = document.getElementById('voiceSearchModal');
        const closeVoiceBtn = document.getElementById('closeVoiceBtn');

        if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;
            recognition.lang = 'en-US';

            voiceBtn.addEventListener('click', () => {
                voiceModal.classList.remove('hidden');
                recognition.start();
            });

            recognition.onresult = (event) => {
                const speechResult = event.results[0][0].transcript;
                searchInput.value = speechResult;
                searchInput.dispatchEvent(new Event('input'));
                voiceModal.classList.add('hidden');
            };

            recognition.onerror = () => {
                voiceModal.classList.add('hidden');
            };

            recognition.onend = () => {
                voiceModal.classList.add('hidden');
            };

            closeVoiceBtn.addEventListener('click', () => {
                recognition.abort();
                voiceModal.classList.add('hidden');
            });
        } else {
            voiceBtn.style.display = 'none';
        }

        // Ajax Cart additions
        function addToCartAjax(formElement, event, productId, imageUrl) {
            event.preventDefault();
            
            const cartBadge = document.getElementById('cartBadge');
            if (cartBadge) {
                const count = parseInt(cartBadge.innerText) || 0;
                cartBadge.innerText = count + 1;
            }
            
            const formData = new FormData(formElement);
            fetch(formElement.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(() => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Device Added to Cart',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: '#FFFFFF',
                    color: '#14213D',
                    iconColor: '#FCA311',
                    customClass: {
                        popup: 'rounded-2xl border border-platinum shadow-xl'
                    }
                });
            });
        }

        // Ajax Wishlist toggles
        function addWishlistAjax(formElement, event) {
            event.preventDefault();
            const btn = formElement.querySelector('button');
            btn.classList.toggle('active');
            const icon = btn.querySelector('i');
            icon.classList.toggle('fa-regular');
            icon.classList.toggle('fa-solid');
            
            const formData = new FormData(formElement);
            fetch(formElement.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(() => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: btn.classList.contains('active') ? 'Saved to Favorites' : 'Removed from Favorites',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: '#FFFFFF',
                    color: '#14213D',
                    iconColor: '#FCA311',
                    customClass: {
                        popup: 'rounded-2xl border border-platinum shadow-xl'
                    }
                });
            });
        }

        // Checkout SweetAlert prompt
        function buyNow(productName, price) {
            Swal.fire({
                title: 'Confirm Purchase',
                text: `Register order for ${productName} (M.R.P. ₹${Number(price).toLocaleString('en-IN')})?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#14213D',
                cancelButtonColor: '#E5E5E5',
                confirmButtonText: 'Confirm Buy Now',
                cancelButtonText: 'Cancel',
                background: '#FFFFFF',
                color: '#14213D',
                iconColor: '#FCA311',
                customClass: {
                    popup: 'border border-platinum rounded-[32px] shadow-2xl p-8',
                    confirmButton: 'rounded-2xl px-6 py-3.5 font-bold text-xs text-white uppercase tracking-wider',
                    cancelButton: 'rounded-2xl px-6 py-3.5 font-bold text-xs text-slate-500 uppercase tracking-wider'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Registered Successfully!',
                        text: 'We are processing your order parameters now.',
                        background: '#FFFFFF',
                        color: '#14213D',
                        confirmButtonColor: '#14213D',
                        customClass: {
                            popup: 'border border-platinum rounded-[32px] shadow-2xl p-8',
                            confirmButton: 'rounded-2xl px-6 py-3.5 font-bold text-xs text-white'
                        }
                    });
                }
            });
        }

        // WebSockets live announcements
        const socket = io('http://localhost:4000');

        socket.on('product-added', (data) => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: `Showcase Update: ${data.name}`,
                text: `${data.brand} is now available in display catalog!`,
                showConfirmButton: false,
                timer: 4500,
                timerProgressBar: true,
                background: '#14213D',
                color: '#FFFFFF',
                iconColor: '#FCA311',
                customClass: {
                    popup: 'border border-gold-500/20 rounded-2xl shadow-xl'
                }
            });
            setTimeout(() => window.location.reload(), 3000);
        });

        // Dynamic Carousel Banner Auto-Slide Logic
        let currentSlide = 0;
        const totalSlides = 3;
        const slidesContainer = document.getElementById('carouselSlides');
        const dots = [
            document.getElementById('dot-0'),
            document.getElementById('dot-1'),
            document.getElementById('dot-2')
        ];

        function updateCarousel() {
            if (slidesContainer) {
                slidesContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                dots.forEach((dot, idx) => {
                    if (dot) {
                        if (idx === currentSlide) {
                            dot.classList.remove('bg-white/40');
                            dot.classList.add('bg-white', 'w-3', 'sm:w-4');
                        } else {
                            dot.classList.remove('bg-white', 'w-3', 'sm:w-4');
                            dot.classList.add('bg-white/40');
                        }
                    }
                });
            }
        }

        function goToSlide(slideIdx) {
            currentSlide = slideIdx;
            updateCarousel();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }

        // Initialize Carousel auto-slide every 4 seconds
        let autoSlideInterval = setInterval(nextSlide, 4000);

        // Reset timer on manual dot interaction
        dots.forEach((dot) => {
            if (dot) {
                dot.addEventListener('click', () => {
                    clearInterval(autoSlideInterval);
                    autoSlideInterval = setInterval(nextSlide, 4000);
                });
            }
        });

        // Trigger initial update
        updateCarousel();
    </script>
</body>

</html>