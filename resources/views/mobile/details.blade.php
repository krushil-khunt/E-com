<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | {{ $product->name }} Details</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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
        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(229, 229, 229, 0.8);
        }

        #magnifyContainer {
            overflow: hidden;
            position: relative;
            cursor: zoom-in;
        }

        #magnifyImage {
            transition: transform 0.15s ease-out, transform-origin 0.15s ease-out;
            transform-style: preserve-3d;
        }

        .thumb-btn {
            border: 2px solid #E5E5E5;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .thumb-btn.active {
            border-color: #FCA311;
            background: rgba(252, 163, 17, 0.05);
        }
    </style>
</head>

<body class="h-full font-sans antialiased bg-slate-50/50 pb-24 md:pb-8">

    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <header class="glass-panel sticky top-0 z-50 px-6 py-4 shadow-sm">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <a href="/display" class="flex items-center gap-3.5 group">
                    <div
                        class="w-10 h-10 rounded-xl bg-navy-800 flex items-center justify-center border border-white/10 shadow-md">
                        <i class="fas fa-layer-group text-sm text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-base font-bold font-outfit text-navy-800 tracking-tight block">PhoneHub</span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-wider uppercase block">Details
                            Room</span>
                    </div>
                </a>
                <a href="{{ url('/display') }}"
                    class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-navy-800 text-xs font-bold py-2.5 px-4 rounded-xl border border-slate-200 shadow-sm transition">
                    <i class="fas fa-arrow-left text-[10px]"></i> Back to Catalog
                </a>
            </div>
        </header>

        <main class="max-w-6xl w-full mx-auto px-6 mt-8 flex-grow">

            @if(session('success'))
                <div
                    class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700">
                    <i class="fas fa-check-circle text-lg"></i>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Details Card grid -->
            <div class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-8 md:p-10 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12">

                    <!-- Left Column: Interactive Image Gallery (Span 5) -->
                    <div class="md:col-span-5 space-y-6">
                        <!-- Main Frame -->
                        <div id="magnifyContainer"
                            class="w-full aspect-square rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center p-6 relative">
                            <div
                                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-gold-500/5 to-transparent pointer-events-none">
                            </div>

                            @if($product->image && (str_starts_with($product->image, 'http') || file_exists(public_path('uploads/' . $product->image))))
                                <img id="magnifyImage"
                                    src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('uploads/' . $product->image) }}"
                                    alt="{{ $product->name }}" class="object-contain max-h-full max-w-full drop-shadow-md">
                            @else
                                <div class="text-slate-350 text-center">
                                    <i class="fas fa-mobile-alt text-6xl"></i>
                                    <p class="text-xs text-slate-400 mt-3 font-medium">No Image Registered</p>
                                </div>
                            @endif
                        </div>

                        <!-- Angles Thumbnail triggers -->
                        <div class="flex items-center justify-center gap-3">
                            <button onclick="switchAngle('default')"
                                class="thumb-btn active w-14 h-14 rounded-xl bg-slate-50 p-1.5 flex items-center justify-center shadow-inner">
                                <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('uploads/' . $product->image) }}"
                                    class="object-contain max-h-full max-w-full">
                            </button>
                            <button onclick="switchAngle('back')"
                                class="thumb-btn w-14 h-14 rounded-xl bg-slate-50 p-1.5 flex items-center justify-center shadow-inner">
                                <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('uploads/' . $product->image) }}"
                                    class="object-contain max-h-full max-w-full scale-x-[-1]">
                            </button>
                            <button onclick="switchAngle('rotate')"
                                class="thumb-btn w-14 h-14 rounded-xl bg-slate-50 p-1.5 flex items-center justify-center shadow-inner">
                                <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('uploads/' . $product->image) }}"
                                    class="object-contain max-h-full max-w-full -rotate-12 scale-90">
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: Information, pricing and Buy CTA (Span 7) -->
                    <div class="md:col-span-7 flex flex-col justify-between">
                        <div>
                            <!-- Brand & Name -->
                            <div class="mb-4">
                                <span
                                    class="inline-flex px-2.5 py-0.5 rounded-lg text-[9px] font-black bg-navy-800 text-gold-500 uppercase tracking-widest mb-2">
                                    {{ $product->brand }}
                                </span>
                                <h1
                                    class="text-2xl sm:text-3xl font-extrabold font-outfit text-navy-800 tracking-tight leading-tight">
                                    {{ $product->name }}
                                </h1>
                            </div>

                            <!-- Rating Details & Reviews -->
                            @php
                                $totalReviews = count($reviews);
                                $avgRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 0;
                            @endphp
                            <div class="flex items-center gap-3 mb-5">
                                <span
                                    class="inline-flex items-center gap-0.5 px-1.5 py-0.5 rounded bg-emerald-600 text-white text-xs font-bold leading-none shrink-0 shadow-sm">
                                    {{ $avgRating ?: '4.5' }} <i class="fas fa-star text-[8px]"></i>
                                </span>
                                <span class="text-xs text-slate-400 font-medium">({{ $totalReviews }} Verified
                                    Reviews)</span>
                            </div>

                            <!-- Pricing -->
                            @php
                                $fakeOriginalPrice = $product->price * 1.08;
                                $discountPercent = 7;
                            @endphp
                            <div class="bg-slate-50/50 border border-slate-100 rounded-2xl p-4 my-5">
                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-wider block">Special
                                    Promo Offer Price</span>
                                <div class="flex items-baseline gap-2.5 flex-wrap mt-1">
                                    <span class="text-3xl font-black text-navy-800 font-outfit">
                                        ₹{{ number_format($product->price, 0) }}
                                    </span>
                                    <span class="text-sm text-slate-450 line-through">
                                        ₹{{ number_format($fakeOriginalPrice, 0) }}
                                    </span>
                                    <span class="text-sm text-emerald-600 font-bold">
                                        {{ $discountPercent }}% off
                                    </span>
                                </div>
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-blue-50 text-[8px] font-bold text-blue-650 border border-blue-100 uppercase tracking-wider mt-2.5">
                                    <i class="fas fa-certificate text-gold-500"></i> Hub Assured Guarantee Included
                                </span>
                            </div>

                            <!-- Available Offers section -->
                            <div class="space-y-2 mb-6">
                                <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Available
                                    Offers</h4>
                                <div class="space-y-1.5">
                                    <div class="flex items-start gap-2.5 text-xs text-slate-600">
                                        <i class="fas fa-tag text-emerald-600 mt-0.5 shrink-0"></i>
                                        <span><strong>Bank Offer:</strong> 5% Unlimited Cashback on PhoneHub Axis Bank
                                            Credit Card.</span>
                                    </div>
                                    <div class="flex items-start gap-2.5 text-xs text-slate-600">
                                        <i class="fas fa-tag text-emerald-600 mt-0.5 shrink-0"></i>
                                        <span><strong>Partner Offer:</strong> Get extra ₹2,000 exchange discount on
                                            select brand items.</span>
                                    </div>
                                    <div class="flex items-start gap-2.5 text-xs text-slate-600">
                                        <i class="fas fa-shield-alt text-emerald-600 mt-0.5 shrink-0"></i>
                                        <span><strong>Warranty:</strong> 1 Year Brand Warranty for Phone and
                                            Accessories.</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Technical Specs Accordion -->
                            <div class="border-t border-slate-100 pt-4 space-y-2">
                                <div class="border-b border-slate-100 pb-3">
                                    <button onclick="toggleAccordion('desc')"
                                        class="w-full flex justify-between items-center py-1.5 text-left focus:outline-none">
                                        <span
                                            class="text-[10px] font-bold text-navy-800 uppercase tracking-wider">Description
                                            Overview</span>
                                        <i id="icon-desc"
                                            class="fas fa-chevron-down text-slate-400 text-[10px] transition duration-200"></i>
                                    </button>
                                    <div id="content-desc"
                                        class="hidden mt-2 text-xs text-slate-500 leading-relaxed font-light">
                                        {{ $product->description ?: 'This premium device includes high-end components engineered to optimize operation speeds.' }}
                                    </div>
                                </div>

                                <div class="border-b border-slate-100 pb-3">
                                    <button onclick="toggleAccordion('specs')"
                                        class="w-full flex justify-between items-center py-1.5 text-left focus:outline-none">
                                        <span
                                            class="text-[10px] font-bold text-navy-800 uppercase tracking-wider">Technical
                                            specifications</span>
                                        <i id="icon-specs"
                                            class="fas fa-chevron-down text-slate-400 text-[10px] transition duration-200"></i>
                                    </button>
                                    <div id="content-specs" class="hidden mt-2 text-xs text-slate-600 space-y-1.5">
                                        <p><strong>Brand name:</strong> {{ $product->brand }}</p>
                                        <p><strong>RAM size:</strong> {{ $product->ram }}</p>
                                        <p><strong>Storage Space:</strong> {{ $product->storage }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Actions Block -->
                        <div class="pt-6 border-t border-slate-100 mt-6 flex flex-col sm:flex-row gap-3">
                            <form action="/addtocart/{{ $product->id }}" method="POST" class="flex-grow">
                                @csrf
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 py-4 px-6 text-xs font-black rounded-xl bg-gold-500 hover:bg-gold-600 text-navy-800 uppercase tracking-wider transition">
                                    <i class="fas fa-shopping-bag"></i> Add To Cart
                                </button>
                            </form>
                            @if($product->stock > 0)

                                <form action="/addtocart/{{ $product->id }}?redirect=checkout" method="POST"
                                    class="flex-grow">

                                    @csrf

                                    <button type="submit" class="w-full inline-flex items-center
                                        justify-center gap-2
                                        py-4 px-6
                                        text-xs font-black
                                        rounded-xl
                                        bg-navy-800 hover:bg-black
                                        text-white uppercase
                                        tracking-wider
                                        transition shadow-md">

                                        <i class="fas fa-bolt text-gold-500"></i>

                                        Buy Now

                                    </button>

                                </form>

                            @else

                                <button disabled class="w-full inline-flex items-center
                                        justify-center gap-2
                                        py-4 px-6
                                        text-xs font-black
                                        rounded-xl
                                        bg-rose-500
                                        text-white uppercase
                                        tracking-wider
                                        cursor-not-allowed">

                                    <i class="fas fa-times-circle"></i>

                                    Out Of Stock

                                </button>

                            @endif
                            @if($product->stock > 0)

                                                            <p class="text-emerald-600
                                text-xs font-semibold mt-2">

                                                                {{ $product->stock }} items available

                                                            </p>

                            @endif
                            <form action="/addwishlist/{{ $product->id }}" method="POST" class="shrink-0">
                                @csrf
                                <button type="submit"
                                    class="w-12 h-12 inline-flex items-center justify-center rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-500 hover:text-rose-500 transition">
                                    <i class="fa-regular fa-heart text-base"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Reviews and Sentiment analysis -->
                <div class="mt-16 pt-12 border-t border-slate-100 grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <!-- Progress stats (Span 4) -->
                    @php
                        $stars = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
                        foreach ($reviews as $r) {
                            $stars[$r->rating] = ($stars[$r->rating] ?? 0) + 1;
                        }
                    @endphp
                    <div class="lg:col-span-4 space-y-6">
                        <h3 class="text-base font-bold font-outfit text-navy-800 tracking-wider uppercase">⭐ Rating
                            Analytics</h3>

                        <div class="bg-slate-50/50 border border-slate-100 rounded-2xl p-5 space-y-3.5">
                            @foreach([5, 4, 3, 2, 1] as $star)
                                @php
                                    $percentage = $totalReviews > 0 ? ($stars[$star] / $totalReviews) * 100 : 0;
                                @endphp
                                <div class="flex items-center gap-3 text-xs">
                                    <span class="w-10 font-bold text-navy-800 font-outfit">{{ $star }} Star</span>
                                    <div class="flex-grow bg-slate-200/60 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-emerald-600 h-full rounded-full" style="width: {{ $percentage }}%">
                                        </div>
                                    </div>
                                    <span class="w-8 text-right text-slate-400 font-medium">{{ round($percentage) }}%</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Write Review Form -->
                        <div class="bg-white border border-slate-250/70 rounded-2xl p-5">
                            <h4 class="text-xs font-bold text-navy-800 uppercase tracking-widest mb-3">Add review</h4>
                            <form action="/addreview/{{ $product->id }}" method="POST" class="space-y-3.5">
                                @csrf
                                <div>
                                    <label
                                        class="block text-[8px] font-bold text-slate-400 uppercase tracking-wider mb-1">Select
                                        Stars</label>
                                    <select name="rating"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2 px-3 text-xs text-navy-800 focus:bg-white focus:outline-none focus:border-navy-800 transition">
                                        <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
                                        <option value="4">⭐⭐⭐⭐ (4/5)</option>
                                        <option value="3">⭐⭐⭐ (3/5)</option>
                                        <option value="2">⭐⭐ (2/5)</option>
                                        <option value="1">⭐ (1/5)</option>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-[8px] font-bold text-slate-400 uppercase tracking-wider mb-1">Your
                                        comments</label>
                                    <textarea name="review" required rows="3"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2 px-3 text-xs text-navy-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-navy-800 transition resize-none"
                                        placeholder="Write feedback here..."></textarea>
                                </div>
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-1.5 py-3 px-4 text-xs font-bold rounded-xl bg-navy-800 hover:bg-black text-white transition">
                                    Submit Review
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Reviews List (Span 8) -->
                    <div class="lg:col-span-8 space-y-4">
                        <h3 class="text-base font-bold font-outfit text-navy-800 tracking-wider uppercase mb-4">Customer
                            Reviews</h3>
                        @forelse($reviews as $review)
                            <div class="bg-white border border-slate-200/70 p-5 rounded-2xl shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="text-xs font-bold text-navy-800 font-outfit flex items-center gap-2">
                                        <i class="fas fa-user-circle text-slate-400 text-sm"></i> {{ $review->name }}
                                    </h5>
                                    <span
                                        class="inline-flex items-center gap-0.5 px-1 py-0.5 rounded bg-emerald-600 text-white text-[9px] font-bold leading-none">
                                        {{ $review->rating }} <i class="fas fa-star text-[6px]"></i>
                                    </span>
                                </div>
                                <p class="text-slate-600 text-xs leading-relaxed font-light">
                                    {{ $review->review }}
                                </p>
                            </div>
                        @empty
                            <div
                                class="py-12 text-center text-slate-400 border border-dashed border-slate-200 rounded-2xl bg-slate-50/30">
                                <i class="far fa-comments text-2xl mb-2"></i>
                                <p class="text-xs">No reviews registered yet. Be the first to share details!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            @php
                $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                    ->where('id', '!=', $product->id)
                    ->limit(4)
                    ->get();
            @endphp
            @if(count($relatedProducts) > 0)
                <div class="mt-12">
                    <h3 class="text-lg sm:text-xl font-bold font-outfit text-navy-800 tracking-tight mb-6">Related Premium
                        Devices</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 sm:gap-6">
                        @foreach($relatedProducts as $related)
                            <div
                                class="bg-white border border-slate-200/80 rounded-2xl p-4 flex flex-col justify-between group hover:shadow-md transition duration-300">
                                <a href="/productdetails/{{ $related->id }}"
                                    class="aspect-square bg-slate-50/50 rounded-xl flex items-center justify-center p-3 relative overflow-hidden block">
                                    <img src="{{ str_starts_with($related->image, 'http') ? $related->image : asset('uploads/' . $related->image) }}"
                                        class="object-contain max-h-full max-w-full group-hover:scale-105 transition duration-300">
                                </a>
                                <div class="mt-4 space-y-1.5">
                                    <div class="flex items-center justify-between gap-1">
                                        <span
                                            class="text-[8px] font-black uppercase text-slate-400 tracking-wider truncate">{{ $related->brand }}</span>
                                        <span
                                            class="inline-flex items-center gap-0.5 px-1 py-0.5 rounded bg-emerald-600 text-white text-[7px] font-bold leading-none shrink-0">
                                            4.5 <i class="fas fa-star text-[5px]"></i>
                                        </span>
                                    </div>
                                    <a href="/productdetails/{{ $related->id }}"
                                        class="text-xs font-bold text-navy-800 font-outfit block hover:text-navy-950 line-clamp-1">
                                        {{ $related->name }}
                                    </a>
                                    <span
                                        class="text-xs font-black text-navy-800 block pt-1">₹{{ number_format($related->price) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </main>
    </div>

    <!-- Floating Glassmorphic Mobile Bottom Tab Bar -->
    <div class="fixed bottom-4 left-4 right-4 z-50 md:hidden">
        <div
            class="bg-white/95 backdrop-blur-xl border border-slate-200/80 rounded-2xl shadow-2xl p-2.5 flex justify-around items-center">
            <!-- Store -->
            <a href="/display" class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-store text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Store</span>
            </a>
            <!-- Favorites -->
            <a href="/wishlist"
                class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-heart text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Wishlist</span>
            </a>
            <!-- Cart -->
            <a href="/cart"
                class="relative flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-shopping-bag text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Cart</span>
            </a>
            <!-- My Orders -->
            <a href="/myorders"
                class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
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

    <!-- Magnify & Interactive scripts -->
    <script>
        // Zoom on hover Image Magnifier tracker
        const magnifyBox = document.getElementById('magnifyContainer');
        const magnifyImg = document.getElementById('magnifyImage');

        if (magnifyBox && magnifyImg) {
            magnifyBox.addEventListener('mousemove', (e) => {
                const rect = magnifyBox.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                magnifyImg.style.transformOrigin = `${(x / rect.width) * 100}% ${(y / rect.height) * 100}%`;
                magnifyImg.style.transform = 'scale(1.75)';
            });

            magnifyBox.addEventListener('mouseleave', () => {
                magnifyImg.style.transform = 'scale(1)';
                magnifyImg.style.transformOrigin = 'center';
            });
        }

        // Multi-Angle switcher
        function switchAngle(angle) {
            document.querySelectorAll('.thumb-btn').forEach(btn => btn.classList.remove('active'));
            event.currentTarget.classList.add('active');

            if (angle === 'default') {
                magnifyImg.style.transform = 'scale(1)';
                magnifyImg.style.transformOrigin = 'center';
                magnifyImg.className = "object-contain max-h-full max-w-full drop-shadow-md";
            } else if (angle === 'back') {
                magnifyImg.className = "object-contain max-h-full max-w-full drop-shadow-md scale-x-[-1]";
            } else if (angle === 'rotate') {
                magnifyImg.className = "object-contain max-h-full max-w-full drop-shadow-md -rotate-12 scale-90";
            }
        }

        // Buy Now confirmation alert
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
                    popup: 'border border-platinum rounded-[24px] shadow-2xl p-6',
                    confirmButton: 'rounded-xl px-5 py-3 font-bold text-xs text-white uppercase tracking-wider',
                    cancelButton: 'rounded-xl px-5 py-3 font-bold text-xs text-slate-500 uppercase tracking-wider'
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
                            popup: 'border border-platinum rounded-[24px] shadow-2xl p-6',
                            confirmButton: 'rounded-xl px-5 py-3 font-bold text-xs text-white'
                        }
                    });
                }
            });
        }

        // Accordion Toggle
        function toggleAccordion(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            if (content) {
                content.classList.toggle('hidden');
            }
            if (icon) {
                icon.classList.toggle('rotate-180');
            }
        }
    </script>
</body>

</html>