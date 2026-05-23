<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Shopping Cart</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(229, 229, 229, 0.8);
        }
    </style>
</head>

<body class="h-full font-sans antialiased bg-slate-50/60 pb-24 md:pb-8">

    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <header class="glass-panel sticky top-0 z-50 px-6 py-4 shadow-sm">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <a href="/display" class="flex items-center gap-3.5 group">
                    <div class="w-10 h-10 rounded-xl bg-navy-800 flex items-center justify-center border border-white/10 shadow-md">
                        <i class="fas fa-layer-group text-sm text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-base font-bold font-outfit text-navy-800 tracking-tight block">PhoneHub</span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-wider uppercase block">Checkout Review</span>
                    </div>
                </a>
                <a href="{{ url('/display') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-navy-800 text-xs font-bold py-2.5 px-4 rounded-xl border border-slate-200 transition">
                    <i class="fas fa-store text-[10px]"></i> Keep Shopping
                </a>
            </div>
        </header>

        <main class="max-w-6xl w-full mx-auto px-6 mt-8 flex-grow">
            @php
                $grandTotal = 0;
                $totalOriginal = 0;
                $itemsCount = 0;
            @endphp

            @if(count($cart) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    
                    <!-- Left: Cart Items List -->
                    <div class="lg:col-span-2 space-y-4">
                        @foreach($cart as $item)
                            @php
                                $total = $item->price * $item->quantity;
                                $grandTotal += $total;
                                $fakeOrigItemPrice = $item->price * 1.08;
                                $totalOriginal += ($fakeOrigItemPrice * $item->quantity);
                                $itemsCount += $item->quantity;
                            @endphp

                            <!-- Card Item -->
                            <div class="bg-white rounded-2xl border border-slate-200/80 p-4 sm:p-5 flex gap-4 transition duration-300 hover:shadow-sm">
                                <!-- Image box -->
                                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center p-2 shrink-0">
                                    @if($item->image && (str_starts_with($item->image, 'http') || file_exists(public_path('uploads/' . $item->image))))
                                        <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('uploads/' . $item->image) }}" alt="{{ $item->name }}" class="object-contain max-h-full max-w-full">
                                    @else
                                        <i class="fas fa-mobile-alt text-2xl text-slate-350"></i>
                                    @endif
                                </div>

                                <!-- details info -->
                                <div class="flex-grow flex flex-col justify-between min-w-0">
                                    <div>
                                        <!-- Brand and rating row -->
                                        <div class="flex items-center justify-between gap-2 mb-0.5">
                                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest block truncate">
                                                {{ $item->brand ?? 'Premium Device' }}
                                            </span>
                                            <span class="inline-flex items-center gap-0.5 px-1 py-0.5 rounded bg-emerald-600 text-white text-[8px] font-bold leading-none shrink-0">
                                                4.5 <i class="fas fa-star text-[6px]"></i>
                                            </span>
                                        </div>

                                        <!-- Title -->
                                        <h3 class="text-sm sm:text-base font-bold text-navy-800 tracking-tight font-outfit truncate">
                                            {{ $item->name }}
                                        </h3>
                                        <p class="text-[10px] text-slate-400 font-light mt-0.5">Seller: PhoneHub Assured</p>
                                    </div>

                                    <!-- Price breakdown & actions -->
                                    <div class="flex flex-wrap items-end justify-between gap-3 mt-3">
                                        <!-- Pricing -->
                                        <div>
                                            <div class="flex items-baseline gap-1.5">
                                                <span class="text-sm sm:text-base font-black text-navy-800 font-outfit">
                                                    ₹{{ number_format($item->price, 0) }}
                                                </span>
                                                <span class="text-[10px] sm:text-xs text-slate-400 line-through">
                                                    ₹{{ number_format($fakeOrigItemPrice, 0) }}
                                                </span>
                                                <span class="text-[10px] sm:text-xs text-emerald-600 font-bold">
                                                    7% off
                                                </span>
                                            </div>
                                            <span class="text-[9px] text-emerald-600 font-bold block mt-0.5">
                                                Delivery by Tomorrow, Sun | Free
                                            </span>
                                        </div>

                                        <!-- Quantity and trash controls -->
                                        <div class="flex items-center gap-3">
                                            <div class="inline-flex items-center border border-slate-200 bg-slate-50/50 rounded-xl p-1 gap-1">
                                                <a href="/decreaseqty/{{ $item->id }}" class="inline-flex items-center justify-center w-6 h-6 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold transition shadow-sm">
                                                    -
                                                </a>
                                                <span class="text-xs font-bold text-navy-800 font-outfit w-5 text-center">
                                                    {{ $item->quantity }}
                                                </span>
                                                <a href="/increaseqty/{{ $item->id }}" class="inline-flex items-center justify-center w-6 h-6 rounded-lg bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold transition shadow-sm">
                                                    +
                                                </a>
                                            </div>

                                            <a href="/cartremove/{{ $item->id }}" class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-100 flex items-center justify-center transition" title="Remove Item">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right: Sticky Price Details Sidebar -->
                    <div class="space-y-4 lg:sticky lg:top-24">
                        <div class="bg-white rounded-2xl border border-slate-200/80 p-5">
                            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-wider pb-3 border-b border-slate-100">
                                Price Details
                            </h2>

                            <div class="divide-y divide-slate-100 text-xs text-slate-650 mt-4 space-y-3">
                                <div class="flex justify-between items-center pb-3">
                                    <span>Price ({{ $itemsCount }} {{ $itemsCount > 1 ? 'items' : 'item' }})</span>
                                    <span class="font-bold text-navy-800">₹{{ number_format($totalOriginal, 0) }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3">
                                    <span>Discount</span>
                                    <span class="font-bold text-emerald-600">-₹{{ number_format($totalOriginal - $grandTotal, 0) }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3">
                                    <span>Delivery Charges</span>
                                    <span class="font-bold text-emerald-600">FREE</span>
                                </div>
                                <div class="flex justify-between items-center pt-3 text-sm font-black text-navy-800 font-outfit">
                                    <span>Total Amount</span>
                                    <span class="text-lg">₹{{ number_format($grandTotal, 0) }}</span>
                                </div>
                            </div>

                            <div class="mt-4 p-3 rounded-xl bg-emerald-50 border border-emerald-100 text-[10px] sm:text-xs text-emerald-700 font-semibold text-center uppercase tracking-wide">
                                You will save ₹{{ number_format($totalOriginal - $grandTotal, 0) }} on this order!
                            </div>

                            <div class="mt-6">
                                <a href="/checkout" class="w-full inline-flex items-center justify-center gap-2 bg-navy-800 hover:bg-black text-white text-xs font-black py-4 px-6 rounded-xl uppercase tracking-wider transition shadow-lg">
                                    <i class="fas fa-credit-card"></i> Place Order
                                </a>
                            </div>
                        </div>

                        <!-- Security promise notice badge -->
                        <div class="flex items-center gap-3 px-3 py-1.5 text-[10px] text-slate-400">
                            <i class="fas fa-shield-alt text-base"></i>
                            <span>Safe and Secure Payments. Easy returns. 100% Authentic products.</span>
                        </div>
                    </div>

                </div>
            @else
                <!-- Empty State -->
                <div class="max-w-md mx-auto py-20 px-6 text-center bg-white rounded-3xl border border-slate-200/80 shadow-sm mt-8">
                    <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-350 mb-4 border border-slate-200/50 mx-auto">
                        <i class="fas fa-shopping-bag text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-navy-800 font-outfit">Your cart is empty</h4>
                    <p class="text-xs text-slate-500 mt-2 mb-8">Add high-end devices from the catalog room to get started.</p>
                    <a href="/display" class="inline-flex items-center gap-2 bg-navy-800 hover:bg-black text-white text-xs font-bold py-3.5 px-8 rounded-xl transition shadow-md">
                        Browse Store Catalog
                    </a>
                </div>
            @endif
        </main>
    </div>

    <!-- Floating Glassmorphic Mobile Bottom Tab Bar -->
    <div class="fixed bottom-4 left-4 right-4 z-50 md:hidden">
        <div class="bg-white/95 backdrop-blur-xl border border-slate-200/80 rounded-2xl shadow-2xl p-2.5 flex justify-around items-center">
            <!-- Store -->
            <a href="/display" class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-store text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Store</span>
            </a>
            <!-- Favorites -->
            <a href="/wishlist" class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-heart text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Wishlist</span>
            </a>
            <!-- Cart -->
            <a href="/cart" class="relative flex flex-col items-center gap-0.5 text-gold-500 font-bold transition">
                <i class="fas fa-shopping-bag text-base"></i>
                @if($itemsCount > 0)
                    <span class="absolute -top-1.5 -right-2 bg-gold-500 text-navy-800 text-[8px] font-black px-1.5 py-0.5 rounded-full border border-white">
                        {{ $itemsCount }}
                    </span>
                @endif
                <span class="text-[8px] uppercase tracking-wider">Cart</span>
            </a>
            <!-- My Orders -->
            <a href="/myorders" class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
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

</body>

</html>