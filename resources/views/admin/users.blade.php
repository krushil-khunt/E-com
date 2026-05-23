<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Manage Users</title>
    
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
                    <a href="/categories" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-tags text-base"></i>
                        <span>Categories</span>
                    </a>
                    <a href="/admin/orders" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider text-slate-500 hover:text-navy-800 hover:bg-slate-50 border border-transparent">
                        <i class="fas fa-shopping-bag text-base"></i>
                        <span>Orders</span>
                    </a>
                    <a href="/admin/users" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider bg-navy-800 text-gold-500 border border-navy-800 shadow-md shadow-navy-800/10">
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
        <main class="flex-grow p-6 md:p-10 overflow-y-auto">
            <!-- Header -->
            <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-black text-navy-800 font-outfit tracking-tight uppercase">👥 Manage Users</h2>
                    <p class="text-xs text-slate-455 mt-1">Review registered user accounts and access roles</p>
                </div>
            </header>

            <!-- Users Table Container -->
            <div class="bg-white rounded-[32px] shadow-sm border border-platinum overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-platinum text-[10px] font-black text-slate-450 uppercase tracking-widest">
                                <th class="p-6">User ID</th>
                                <th class="p-6">Name</th>
                                <th class="p-6">Email Address</th>
                                <th class="p-6">Role Profile</th>
                                <th class="p-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                            @forelse($users as $user)
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="p-6 font-semibold text-slate-400 font-outfit">
                                        #{{ $user->id }}
                                    </td>
                                    <td class="p-6 font-semibold text-navy-800 font-outfit">
                                        {{ $user->name }}
                                    </td>
                                    <td class="p-6 font-mono text-[11px] text-slate-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="p-6">
                                        @if($user->role == 'admin')
                                            <span class="inline-flex px-2.5 py-0.5 rounded-lg text-[9px] font-black bg-navy-800 text-gold-500 border border-navy-800/10 uppercase tracking-wider">
                                                Admin User
                                            </span>
                                        @else
                                            <span class="inline-flex px-2.5 py-0.5 rounded-lg text-[9px] font-black bg-slate-100 text-slate-600 uppercase tracking-wider">
                                                Customer
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-6 text-right whitespace-nowrap">
                                        @if($user->role != 'admin')
                                            <button onclick="confirmDeleteUser('{{ $user->id }}')" class="inline-flex items-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-3.5 rounded-xl shadow-sm transition text-[11px] uppercase tracking-wider">
                                                <i class="fas fa-trash text-[9px]"></i> Delete
                                            </button>
                                        @else
                                            <button disabled class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-400 font-bold py-2 px-3.5 rounded-xl cursor-not-allowed text-[11px] uppercase tracking-wider">
                                                <i class="fas fa-ban text-[9px]"></i> Protected
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-12 text-center text-slate-400">
                                        <i class="fas fa-users text-3xl mb-2"></i>
                                        <p class="text-xs">No registered users found.</p>
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
        function confirmDeleteUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This user account will be permanently deactivated and removed.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#14213D',
                cancelButtonColor: '#E5E5E5',
                confirmButtonText: 'Yes, remove user',
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
                    window.location.href = `/deleteuser/${id}`;
                }
            });
        }
    </script>
</body>

</html>