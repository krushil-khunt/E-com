<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Premium Mobile Shop</title>
    
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
            background-color: #0A0F1D;
        }
        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }
        .glass-panel {
            background: rgba(20, 33, 61, 0.4);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(252, 163, 17, 0.15);
        }
        .gold-glow {
            text-shadow: 0 0 10px rgba(252, 163, 17, 0.3);
        }
    </style>
</head>

<body class="min-h-screen text-slate-100 flex items-center justify-center p-4 sm:p-6 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-[#14213D] via-[#0A0F1D] to-[#05070c]">

    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="flex items-center justify-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-xl bg-[#FCA311] flex items-center justify-center shadow-lg shadow-[#FCA311]/10">
                <i class="fas fa-credit-card text-[#14213D] text-base"></i>
            </div>
            <div>
                <span class="font-outfit font-extrabold text-white text-base tracking-wider uppercase leading-none block">Mobile Hub</span>
                <span class="text-[9px] text-[#FCA311] font-semibold tracking-widest uppercase block">Checkout Billing</span>
            </div>
        </div>

        <!-- Glassmorphic Billing Card -->
        <div class="glass-panel p-6 sm:p-8 rounded-3xl shadow-2xl relative overflow-hidden">
            <!-- Decorative light source -->
            <div class="absolute -right-10 -top-10 w-24 h-24 bg-[#FCA311]/5 rounded-full blur-xl pointer-events-none"></div>

            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-white font-outfit tracking-wide">💳 Place Your Order</h2>
                <p class="text-[11px] text-slate-400 mt-1">Provide details to finalize fulfillment details</p>
            </div>

            <!-- Form -->
            <form method="POST" action="/placeorder" class="space-y-4">
                @csrf

                <!-- Name Input -->
                <div>
                    <label class="block text-xs font-semibold text-slate-350 mb-1.5">Full Name</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 group-focus-within:text-[#FCA311] transition duration-200">
                            <i class="fas fa-user text-[11px]"></i>
                        </span>
                        <input type="text" name="name" required
                               class="w-full bg-[#14213D]/30 border border-slate-700/80 rounded-xl py-2.5 pl-10 pr-4 text-xs text-white placeholder-slate-500 focus:bg-[#14213D]/50 focus:border-[#FCA311] focus:ring-1 focus:ring-[#FCA311]/25 outline-none transition shadow-inner"
                               placeholder="Enter your billing name">
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label class="block text-xs font-semibold text-slate-350 mb-1.5">Email Address</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 group-focus-within:text-[#FCA311] transition duration-200">
                            <i class="fas fa-envelope text-[11px]"></i>
                        </span>
                        <input type="email" name="email" required
                               class="w-full bg-[#14213D]/30 border border-slate-700/80 rounded-xl py-2.5 pl-10 pr-4 text-xs text-white placeholder-slate-500 focus:bg-[#14213D]/50 focus:border-[#FCA311] focus:ring-1 focus:ring-[#FCA311]/25 outline-none transition shadow-inner"
                               placeholder="Enter your email address">
                    </div>
                </div>

                <!-- Phone Input -->
                <div>
                    <label class="block text-xs font-semibold text-slate-350 mb-1.5">Phone Number</label>
                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 group-focus-within:text-[#FCA311] transition duration-200">
                            <i class="fas fa-phone text-[11px]"></i>
                        </span>
                        <input type="text" name="phone" required
                               class="w-full bg-[#14213D]/30 border border-slate-700/80 rounded-xl py-2.5 pl-10 pr-4 text-xs text-white placeholder-slate-500 focus:bg-[#14213D]/50 focus:border-[#FCA311] focus:ring-1 focus:ring-[#FCA311]/25 outline-none transition shadow-inner"
                               placeholder="Enter your phone number">
                    </div>
                </div>

                <!-- Address Input -->
                <div>
                    <label class="block text-xs font-semibold text-slate-350 mb-1.5">Delivery Address</label>
                    <div class="relative group">
                        <textarea name="address" required rows="2"
                                  class="w-full bg-[#14213D]/30 border border-slate-700/80 rounded-xl py-2.5 px-4 text-xs text-white placeholder-slate-500 focus:bg-[#14213D]/50 focus:border-[#FCA311] focus:ring-1 focus:ring-[#FCA311]/25 outline-none transition shadow-inner resize-none"
                                  placeholder="Enter complete shipping details"></textarea>
                    </div>
                </div>

                <!-- Total (Readonly) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-350 mb-1.5">Total Amount</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-[#FCA311] font-bold text-xs gold-glow">
                            ₹
                        </span>
                        <input type="text" name="total" value="{{ $total }}" readonly
                               class="w-full bg-[#14213D]/50 border border-slate-700/50 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-200 font-bold outline-none cursor-not-allowed select-none">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-[#FCA311] hover:bg-[#eb9203] text-[#14213D] text-xs font-black py-3.5 rounded-xl transition duration-300 shadow-md shadow-[#FCA311]/10 hover:shadow-lg uppercase tracking-wider mt-6">
                    Confirm Order & Pay
                </button>
            </form>

            <div class="text-center mt-6 pt-4 border-t border-slate-800">
                <p class="text-xs">
                    <a href="/cart" class="text-slate-400 hover:text-[#FCA311] font-semibold transition duration-200">
                        <i class="fas fa-arrow-left text-[10px]"></i> Return to Cart
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>