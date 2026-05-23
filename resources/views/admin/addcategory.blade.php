<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Add Category</title>
    
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
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="h-full font-sans antialiased bg-slate-50">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-platinum p-6 flex flex-col justify-between hidden md:flex">
            <div>
                <!-- Brand Logo -->
                <div class="flex items-center gap-3 mb-10 px-2">
                    <div class="w-11 h-11 rounded-2xl bg-navy-800 flex items-center justify-center shadow-lg border border-white/10">
                        <i class="fas fa-layer-group text-lg text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-lg font-black font-outfit tracking-tight text-navy-800 uppercase block">
                            Phone<span class="text-gold-500">Hub</span>
                        </span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-widest uppercase block">Admin Suite</span>
                    </div>
                </div>

                <!-- Nav Links -->
                <nav class="space-y-2">
                    <a href="/admin" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-chart-pie text-base"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/products" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-boxes text-base"></i>
                        <span>Products</span>
                    </a>
                    <a href="/categories" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider bg-navy-800 text-gold-500 border border-navy-800 shadow-md shadow-navy-800/10">
                        <i class="fas fa-tags text-base"></i>
                        <span>Categories</span>
                    </a>
                    <a href="/admin/orders" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-shopping-bag text-base"></i>
                        <span>Orders</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-users text-base"></i>
                        <span>Users</span>
                    </a>
                    <div class="pt-4 mt-4 border-t border-slate-100">
                        <a href="/display" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                            <i class="fas fa-store text-base"></i>
                            <span>View Storefront</span>
                        </a>
                    </div>
                </nav>
            </div>

            <!-- Sign Out -->
            <div class="border-t border-slate-100 pt-4">
                <a href="/logout" class="flex items-center justify-between p-2 rounded-xl hover:bg-rose-50 text-slate-500 hover:text-rose-650 group transition">
                    <span class="text-xs font-bold uppercase tracking-wider">Sign Out</span>
                    <i class="fas fa-sign-out-alt text-sm group-hover:translate-x-0.5 transition text-slate-400 group-hover:text-rose-500"></i>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 md:p-10 overflow-y-auto flex flex-col">
            <!-- Header -->
            <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-black text-navy-800 font-outfit tracking-tight uppercase">🏷9; Add Category</h2>
                    <p class="text-xs text-slate-455 mt-1">Create a new classification tag for devices</p>
                </div>
                <a href="/categories" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-navy-800 text-xs font-bold py-2.5 px-4 rounded-xl border border-platinum shadow-sm transition">
                    <i class="fas fa-arrow-left text-[10px]"></i> Back to List
                </a>
            </header>

            <!-- Form Card -->
            <div class="bg-white rounded-[32px] border border-platinum max-w-md w-full p-6 sm:p-8 shadow-sm">
                <form action="/savecategory" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Category Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fas fa-tag text-xs"></i>
                            </span>
                            <input type="text" name="name" required placeholder="e.g. Flagship Phones"
                                   class="w-full bg-slate-50 border border-platinum rounded-xl py-3 pl-10 pr-4 text-xs text-navy-800 placeholder-slate-450 focus:bg-white focus:outline-none focus:border-navy-800 transition shadow-inner">
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                        <a href="/categories" class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-50 text-slate-500 hover:text-slate-700 text-xs font-bold py-3 px-6 rounded-xl border border-platinum transition">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 bg-navy-800 hover:bg-gold-500 text-white hover:text-navy-800 text-xs font-bold py-3 px-8 rounded-xl transition duration-300 shadow-md">
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>