<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Manage Products</title>

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
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-full font-sans antialiased bg-slate-50">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-platinum p-6 flex flex-col justify-between hidden md:flex">
            <div>
                <!-- Brand Logo -->
                <div class="flex items-center gap-3 mb-10 px-2">
                    <div
                        class="w-11 h-11 rounded-2xl bg-navy-800 flex items-center justify-center shadow-lg border border-white/10">
                        <i class="fas fa-layer-group text-lg text-gold-500"></i>
                    </div>
                    <div>
                        <span class="text-lg font-black font-outfit tracking-tight text-navy-800 uppercase block">
                            Phone<span class="text-gold-500">Hub</span>
                        </span>
                        <span class="text-[9px] text-slate-400 font-bold tracking-widest uppercase block">Admin
                            Suite</span>
                    </div>
                </div>

                <!-- Nav Links -->
                <nav class="space-y-2">
                    <a href="/admin"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-chart-pie text-base"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/products"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider bg-navy-800 text-gold-500 border border-navy-800 shadow-md shadow-navy-800/10">
                        <i class="fas fa-boxes text-base"></i>
                        <span>Products</span>
                    </a>
                    <a href="/categories"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-tags text-base"></i>
                        <span>Categories</span>
                    </a>
                    <a href="/admin/orders"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-shopping-bag text-base"></i>
                        <span>Orders</span>
                    </a>
                    <a href="/admin/users"
                        class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-users text-base"></i>
                        <span>Users</span>
                    </a>
                    <div class="pt-4 mt-4 border-t border-slate-100">
                        <a href="/display"
                            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                            <i class="fas fa-store text-base"></i>
                            <span>View Storefront</span>
                        </a>
                    </div>
                </nav>
            </div>

            <!-- Sign Out -->
            <div class="border-t border-slate-100 pt-4">
                <a href="/logout"
                    class="flex items-center justify-between p-2 rounded-xl hover:bg-rose-50 text-slate-500 hover:text-rose-650 group transition">
                    <span class="text-xs font-bold uppercase tracking-wider">Sign Out</span>
                    <i
                        class="fas fa-sign-out-alt text-sm group-hover:translate-x-0.5 transition text-slate-400 group-hover:text-rose-500"></i>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 md:p-10 overflow-y-auto">
            <!-- Alert success -->
            @if(session('success'))
                <div
                    class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700">
                    <i class="fas fa-check-circle text-lg"></i>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Header -->
            <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-black text-navy-800 font-outfit tracking-tight uppercase">📦 Manage
                        Products Directory</h2>
                    <p class="text-xs text-slate-450 mt-1">Add, update, or remove mobile devices from the storefront
                        catalog</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/addproduct"
                        class="inline-flex items-center gap-2 bg-navy-800 hover:bg-gold-500 text-white hover:text-navy-800 text-xs font-bold py-3 px-5 rounded-2xl shadow-md transition duration-200">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                </div>
            </header>

            <!-- Table Card wrapper -->
            <div class="bg-white rounded-[32px] border border-platinum shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-platinum bg-slate-50/50 text-[10px] font-black text-slate-450 uppercase tracking-widest">
                                <th class="p-7">Thumbnail</th>
                                <th class="p-7">Product Details</th>
                                <th class="p-7">Brand</th>
                                <th class="p-7">Specs (RAM/ROM)</th>
                                <th class="p-7">Price</th>
                                <th class="p-7">Stock</th>
                                <th class="p-7 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                            @forelse($products as $item)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="p-6">
                                        <div
                                            class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center p-1 overflow-hidden">
                                            @if($item->image)
                                                <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('uploads/' . $item->image) }}"
                                                    alt="{{ $item->name }}" class="object-contain max-h-full max-w-full">
                                            @else
                                                <i class="fas fa-mobile-alt text-slate-300"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-6 font-semibold text-navy-800">
                                        <span class="text-sm block">{{ $item->name }}</span>
                                        <span
                                            class="text-[10px] text-slate-400 font-light font-sans block mt-0.5">{{ Str::limit($item->description, 50) }}</span>
                                    </td>
                                    <td class="p-6">
                                        <span
                                            class="inline-flex px-2.5 py-0.5 rounded-lg text-[9px] font-black bg-slate-100 text-slate-600 uppercase tracking-wider">
                                            {{ $item->brand }}
                                        </span>
                                    </td>
                                    <td class="p-6">
                                        <div class="flex items-center gap-1.5">
                                            <span
                                                class="px-2 py-0.5 rounded bg-slate-50 border border-slate-200/60 text-[9px] font-bold text-slate-500">{{ $item->ram }}</span>
                                            <span
                                                class="px-2 py-0.5 rounded bg-slate-50 border border-slate-200/60 text-[9px] font-bold text-slate-500">{{ $item->storage }}</span>
                                        </div>
                                    </td>
                                    <td class="p-6 font-black font-outfit text-navy-800 text-sm">
                                        ₹{{ number_format($item->price, 0) }}
                                    </td>
                                    <td class="p-6">
                                        @if($item->stock > 0)
                                            <span class="inline-flex items-center px-3 py-1 rounded-xl bg-emerald-50 text-emerald-600 text-[10px] font-bold">
                                                {{ $item->stock }} In Stock
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-xl bg-rose-50 text-rose-600 border border-rose-100 text-[10px] font-bold">
                                                Out Of Stock
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-6 text-right space-x-2 whitespace-nowrap">
                                        <a href="/updatedata/{{ $item->id }}"
                                            class="inline-flex items-center gap-1.5 bg-[#14213D] hover:bg-black text-white hover:text-[#FCA311] font-bold py-2 px-3.5 rounded-xl shadow-sm transition text-[11px] uppercase tracking-wider">
                                            <i class="fas fa-pen text-[9px]"></i> Edit
                                        </a>
                                        <button onclick="confirmDeleteProduct('{{ $item->id }}')"
                                            class="inline-flex items-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-3.5 rounded-xl shadow-sm transition text-[11px] uppercase tracking-wider">
                                            <i class="fas fa-trash text-[9px]"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-12 text-center text-slate-400">
                                        <i class="fas fa-boxes text-3xl mb-2"></i>
                                        <p class="text-xs">No products configured in catalog.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Confirm Dialog script -->
    <script>
        function confirmDeleteProduct(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This product will be permanently removed from the catalog database.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#14213D',
                cancelButtonColor: '#E5E5E5',
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                background: '#FFFFFF',
                color: '#14213D',
                customClass: {
                    popup: 'border border-platinum rounded-[24px] shadow-2xl p-6',
                    confirmButton: 'rounded-xl px-5 py-3 font-bold text-xs text-white uppercase tracking-wider',
                    cancelButton: 'rounded-xl px-5 py-3 font-bold text-xs text-slate-500 uppercase tracking-wider'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/delete/${id}`;
                }
            });
        }
    </script>
</body>

</html>