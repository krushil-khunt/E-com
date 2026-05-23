<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Manage Categories</title>
    
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
                <a href="/logout" class="flex items-center justify-between p-2 rounded-xl hover:bg-rose-50 text-slate-500 hover:text-rose-655 group transition">
                    <span class="text-xs font-bold uppercase tracking-wider">Sign Out</span>
                    <i class="fas fa-sign-out-alt text-sm group-hover:translate-x-0.5 transition text-slate-400 group-hover:text-rose-500"></i>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-black text-navy-800 font-outfit tracking-tight uppercase">🏷️ Manage Categories</h2>
                    <p class="text-xs text-slate-450 mt-1">Add or review device categorization tags</p>
                </div>
                <a href="/addcategory" class="inline-flex items-center gap-2 bg-navy-800 hover:bg-gold-500 text-white hover:text-navy-800 text-xs font-bold py-3 px-5 rounded-2xl shadow-md transition duration-200">
                    <i class="fas fa-plus text-[10px]"></i> Add Category
                </a>
            </header>

            <!-- Success Alert -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 flex items-center gap-3 text-sm font-semibold">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Categories Table -->
            <div class="bg-white rounded-[32px] shadow-sm border border-platinum overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-platinum text-[10px] font-black text-slate-450 uppercase tracking-widest">
                                <th class="p-6">#</th>
                                <th class="p-6">Category Name</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                            @forelse($category as $c)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="p-6 font-semibold text-slate-400 font-outfit">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="p-6 font-bold text-navy-800 font-outfit">
                                        {{ $c->name }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-12 text-center text-slate-400">
                                        <i class="fas fa-tags text-3xl mb-2"></i>
                                        <p class="text-xs">No categories registered in catalog.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>