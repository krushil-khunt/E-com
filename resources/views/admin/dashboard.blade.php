<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Admin Dashboard</title>

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
                    <a href="/admin" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl transition duration-200 font-bold text-xs uppercase tracking-wider bg-navy-800 text-gold-500 border border-navy-800 shadow-md shadow-navy-800/10">
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
        <main class="flex-grow p-6 md:p-10 overflow-y-auto">
            <!-- Alert success -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700">
                    <i class="fas fa-check-circle text-lg"></i>
                    <span class="text-sm font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Header -->
            <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-black text-navy-800 font-outfit tracking-tight uppercase">👨‍💼 Analytics Dashboard</h2>
                    <p class="text-xs text-slate-450 mt-1">Real-time overview of your mobile storefront performance</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/exportpdf"
                        class="inline-flex items-center gap-2 bg-rose-655 bg-red-600 hover:bg-red-750 text-white text-xs font-bold py-3 px-5 rounded-2xl shadow-md transition duration-200">
                        <i class="fas fa-file-pdf"></i> Export Orders PDF
                    </a>
                </div>
            </header>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Products Metric -->
                <div class="bg-white rounded-3xl p-6 border border-platinum shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Products</span>
                        <h3 class="text-3xl font-extrabold font-outfit text-navy-800 mt-1.5">{{ $products }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-platinum flex items-center justify-center text-navy-800">
                        <i class="fas fa-mobile-alt text-lg text-gold-500"></i>
                    </div>
                </div>

                <!-- Orders Metric -->
                <div class="bg-white rounded-3xl p-6 border border-platinum shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Orders</span>
                        <h3 class="text-3xl font-extrabold font-outfit text-navy-800 mt-1.5">{{ $orders }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-platinum flex items-center justify-center text-navy-800">
                        <i class="fas fa-shopping-bag text-lg text-gold-500"></i>
                    </div>
                </div>

                <!-- Revenue Metric -->
                <div class="bg-white rounded-3xl p-6 border border-platinum shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Revenue</span>
                        <h3 class="text-3xl font-extrabold font-outfit text-navy-800 mt-1.5">₹{{ number_format($revenue) }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-platinum flex items-center justify-center text-navy-800">
                        <i class="fas fa-indian-rupee-sign text-md text-gold-500"></i>
                    </div>
                </div>

                <!-- Users Metric -->
                <div class="bg-white rounded-3xl p-6 border border-platinum shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Users</span>
                        <h3 class="text-3xl font-extrabold font-outfit text-navy-800 mt-1.5">{{ $users }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-platinum flex items-center justify-center text-navy-800">
                        <i class="fas fa-users text-lg text-gold-500"></i>
                    </div>
                </div>
            </div>

            <!-- Charts Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Revenue Trend Card -->
                <div class="lg:col-span-2 bg-white rounded-[32px] p-6 border border-platinum shadow-sm flex flex-col justify-between">
                    <div class="mb-4">
                        <h4 class="text-xs font-bold text-navy-800 uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-chart-line text-gold-500"></i> Revenue Trend Line
                        </h4>
                    </div>
                    <div class="w-full relative h-[280px]">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- Demographic Bar Charts -->
                <div class="bg-white rounded-[32px] p-6 border border-platinum shadow-sm flex flex-col gap-6">
                    <div>
                        <div class="mb-2">
                            <h4 class="text-xs font-bold text-navy-800 uppercase tracking-wider flex items-center gap-2">
                                <i class="fas fa-chart-bar text-gold-500"></i> Catalog Analytics
                            </h4>
                        </div>
                        <div class="w-full relative h-[140px]">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4">
                        <div class="mb-2">
                            <h4 class="text-xs font-bold text-navy-800 uppercase tracking-wider flex items-center gap-2">
                                <i class="fas fa-chart-pie text-gold-500"></i> Sales Analytics
                            </h4>
                        </div>
                        <div class="w-full relative h-[140px]">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ChartJS, SocketIO, SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

    <!-- Chart Configuration script -->
    <script>
        // Setup Chart Defaults for Light Theme
        Chart.defaults.color = '#94a3b8';
        Chart.defaults.borderColor = 'rgba(20, 33, 61, 0.04)';

        // 1. myChart Setup
        const ctxMyChart = document.getElementById('myChart');
        new Chart(ctxMyChart, {
            type: 'bar',
            data: {
                labels: ['Products', 'Orders', 'Users'],
                datasets: [{
                    label: 'Count',
                    data: [{{ $products }}, {{ $orders }}, {{ $users }}],
                    backgroundColor: [
                        '#14213D',
                        '#FCA311',
                        '#E5E5E5'
                    ],
                    borderWidth: 0,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // 2. salesChart Setup
        const ctxSales = document.getElementById('salesChart');
        new Chart(ctxSales, {
            type: 'bar',
            data: {
                labels: ['Products', 'Orders', 'Users'],
                datasets: [{
                    label: 'Analytics',
                    data: [{{ $products }}, {{ $orders }}, {{ $users }}],
                    backgroundColor: '#14213D',
                    borderWidth: 0,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // 3. revenueChart Setup
        const ctxRevenue = document.getElementById('revenueChart');
        new Chart(ctxRevenue, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue (₹)',
                    data: [12000, 19000, 30000, 25000, 40000, 50000],
                    borderColor: '#14213D',
                    backgroundColor: 'rgba(20, 33, 61, 0.03)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

    <!-- Socket.io WebSockets -->
    <script>
        const socket = io('http://localhost:4000');

        socket.on('order-received', (data) => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '🛒 New Order Received',
                text: 'A new order transaction has been registered in the database.',
                showConfirmButton: false,
                timer: 4500,
                timerProgressBar: true,
                background: '#FFFFFF',
                color: '#14213D',
                iconColor: '#FCA311',
                customClass: {
                    popup: 'border border-platinum rounded-2xl shadow-xl'
                }
            });
        });
    </script>
</body>

</html>