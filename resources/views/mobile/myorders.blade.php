<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | My Orders</title>
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
            <div class="max-w-5xl mx-auto flex justify-between items-center">
                <div class="flex items-center gap-3.5 group">
                    <div class="w-10 h-10 rounded-xl bg-navy-800 flex items-center justify-center border border-white/10 shadow-md">
                        <i class="fas fa-box text-sm text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-base font-bold font-outfit text-navy-800 tracking-tight block">PhoneHub</span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-wider uppercase block">Order History</span>
                    </div>
                </div>
                <a href="{{ url('/display') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-navy-800 text-xs font-bold py-2.5 px-4 rounded-xl border border-slate-200 shadow-sm transition">
                    <i class="fas fa-store text-[10px]"></i> Storefront Catalog
                </a>
            </div>
        </header>

        <main class="max-w-5xl w-full mx-auto px-6 mt-8 flex-grow">
            <!-- Orders Card Wrapper -->
            <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-[10px] font-bold uppercase tracking-wider">
                                <th class="py-4 px-6">Order ID</th>
                                <th class="py-4 px-6">Recipient Name</th>
                                <th class="py-4 px-6">Phone</th>
                                <th class="py-4 px-6">Total Amount</th>
                                <th class="py-4 px-6">Fulfillment Status</th>
                                <th class="py-4 px-6 text-right">Order Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($orders as $order)
                                <tr class="hover:bg-slate-50/50 transition duration-150">
                                    <!-- Order ID -->
                                    <td class="py-4 px-6 text-xs font-semibold text-slate-400 font-outfit">
                                        #{{ $order->id }}
                                    </td>
                                    
                                    <!-- Name -->
                                    <td class="py-4 px-6 text-sm font-semibold text-navy-800 font-outfit">
                                        {{ $order->name }}
                                    </td>

                                    <!-- Phone -->
                                    <td class="py-4 px-6 text-xs font-medium text-slate-500">
                                        {{ $order->phone }}
                                    </td>

                                    <!-- Total -->
                                    <td class="py-4 px-6 text-sm font-bold text-navy-800 font-outfit">
                                        ₹{{ number_format($order->total) }}
                                    </td>

                                    <!-- Status -->
                                    <td class="py-4 px-6">
                                        @if($order->status == 'Pending')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200/80">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Pending
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200/80">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Delivered
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Date -->
                                    <td class="py-4 px-6 text-right text-xs font-medium text-slate-450">
                                        {{ $order->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-16 px-6 text-center">
                                        <div class="max-w-xs mx-auto flex flex-col items-center">
                                            <div class="w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center text-slate-350 mb-4 border border-slate-200">
                                                <i class="fas fa-boxes-stacked text-xl"></i>
                                            </div>
                                            <h4 class="text-base font-bold text-navy-800 font-outfit">No Orders Found</h4>
                                            <p class="text-xs text-slate-500 mt-2">When you place orders, they will show up here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
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
            <a href="/wishlist" class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-heart text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Wishlist</span>
            </a>
            <!-- Cart -->
            <a href="/cart" class="relative flex flex-col items-center gap-0.5 text-slate-400 hover:text-navy-800 transition">
                <i class="fas fa-shopping-bag text-base"></i>
                <span class="text-[8px] uppercase tracking-wider">Cart</span>
            </a>
            <!-- My Orders -->
            <a href="/myorders" class="flex flex-col items-center gap-0.5 text-gold-500 font-bold transition">
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