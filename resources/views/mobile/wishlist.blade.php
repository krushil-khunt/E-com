<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | My Wishlist</title>
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

<body class="h-full font-sans antialiased bg-slate-50/50 pb-24 md:pb-8">

    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <header class="glass-panel sticky top-0 z-50 px-6 py-4 shadow-sm">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/display" class="flex items-center gap-3.5 group">
                    <div class="w-10 h-10 rounded-xl bg-navy-800 flex items-center justify-center border border-white/10 shadow-md">
                        <i class="fas fa-layer-group text-sm text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-base font-bold font-outfit text-navy-800 tracking-tight block">PhoneHub</span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-wider uppercase block">Favorites Directory</span>
                    </div>
                </a>
                <a href="{{ url('/display') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-navy-800 text-xs font-bold py-2.5 px-4 rounded-xl border border-slate-200 shadow-sm transition">
                    <i class="fas fa-store text-[10px]"></i> Keep Shopping
                </a>
            </div>
        </header>

        <main class="max-w-7xl w-full mx-auto px-6 mt-8 flex-grow">
            <!-- Grid (2 columns on mobile, 4 on desktop) -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @forelse($wishlist as $item)
                    <!-- Wishlist Card -->
                    <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden flex flex-col h-full group hover:shadow-md transition duration-300">
                        <!-- Image Section -->
                        <div class="flex items-center justify-center h-40 sm:h-48 relative overflow-hidden bg-slate-50">
                            @if($item->image && (str_starts_with($item->image, 'http') || file_exists(public_path('uploads/' . $item->image))))
                                <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('uploads/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="object-contain w-full h-full group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-16 h-16 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400">
                                    <i class="fas fa-mobile-alt text-2xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-4 flex-grow flex flex-col justify-between border-t border-slate-100">
                            <div class="space-y-1">
                                <span class="text-[8px] font-black uppercase text-slate-450 tracking-wider">
                                    {{ $item->brand ?? 'Premium Brand' }}
                                </span>
                                <h4 class="text-xs font-bold text-navy-800 tracking-tight font-outfit line-clamp-1">
                                    {{ $item->name }}
                                </h4>
                                <span class="text-xs font-black text-navy-800 block pt-1">
                                    ₹{{ number_format($item->price, 0) }}
                                </span>
                            </div>

                            <!-- Action -->
                            <div class="mt-4 pt-4 border-t border-slate-100 flex gap-2">
                                <a href="/productdetails/{{ $item->product_id }}" class="flex-grow inline-flex items-center justify-center gap-1 bg-navy-800 hover:bg-black text-white py-2 px-3 text-[10px] font-black uppercase tracking-wider rounded-xl transition">
                                    <i class="fas fa-eye text-[9px]"></i> View Details
                                </a>
                                <a href="/removewishlist/{{ $item->id }}" class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-100 transition" title="Remove Wishlist">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full py-20 px-6 text-center bg-white rounded-3xl border border-slate-200/85 shadow-sm">
                        <div class="max-w-xs mx-auto flex flex-col items-center">
                            <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-350 mb-4 border border-slate-200">
                                <i class="fas fa-heart text-xl"></i>
                            </div>
                            <h4 class="text-base font-bold text-navy-800 font-outfit">Your Wishlist is Empty</h4>
                            <p class="text-xs text-slate-500 mt-2 mb-8">Save favorite products while browsing store catalogs.</p>
                            <a href="/display" class="inline-flex items-center gap-2 bg-navy-800 hover:bg-black text-white text-xs font-bold py-3.5 px-8 rounded-xl transition shadow-md">
                                Browse Store Catalog
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
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
            <a href="/wishlist" class="flex flex-col items-center gap-0.5 text-gold-500 font-bold transition">
                <i class="fas fa-heart text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Wishlist</span>
            </a>
            <!-- Cart -->
            <a href="/cart" class="relative flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-shopping-bag text-base"></i>
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