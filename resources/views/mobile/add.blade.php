<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-800">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub | Add New Device</title>
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
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }
        .glass-card {
            background: #ffffff;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="h-full font-sans antialiased bg-slate-50/50">

    <div class="min-h-screen flex flex-col pb-12">
        <!-- Top Navigation -->
        <header class="glass-panel sticky top-0 z-50 px-6 py-4 shadow-sm">
            <div class="max-w-4xl mx-auto flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#14213D] flex items-center justify-center shadow-md">
                        <i class="fas fa-plus text-base text-[#FCA311]"></i>
                    </div>
                    <div>
                        <h1 class="text-base font-bold font-outfit text-slate-900 tracking-tight">
                            Add Device
                        </h1>
                        <p class="text-[9px] text-[#FCA311] font-bold tracking-wide uppercase">New Catalog Entry</p>
                    </div>
                </div>
                <a href="{{ url('display') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-slate-700 text-xs font-semibold py-2.5 px-4 rounded-xl border border-slate-200 shadow-sm transition">
                    <i class="fas fa-arrow-left text-[10px]"></i> Back to Catalog
                </a>
            </div>
        </header>

        <main class="max-w-4xl w-full mx-auto px-6 mt-8 flex-grow">
            <!-- Alert success if stored in session -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700">
                    <i class="fas fa-check-circle text-lg"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700">
                    <div class="flex items-center gap-3 mb-2 font-semibold">
                        <i class="fas fa-exclamation-circle text-lg text-rose-600"></i>
                        <span class="text-sm">Please correct the following errors:</span>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1 pl-6 text-rose-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form card -->
            <div class="glass-card rounded-3xl p-6 sm:p-8">
                <form action="{{ url('adddata') }}" method="post" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Side: Basic Info -->
                        <div class="space-y-5">
                            <!-- Name -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Device Name</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="fas fa-mobile-screen-button text-sm"></i>
                                    </span>
                                    <input type="text" name="name" placeholder="e.g. iPhone 15 Pro Max" required class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 shadow-sm">
                                </div>
                            </div>

                            <!-- Brand -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Brand</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                        <i class="fas fa-copyright text-sm"></i>
                                    </span>
                                    <input type="text" name="brand" placeholder="e.g. Apple" required class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 shadow-sm">
                                </div>
                            </div>

                            <!-- Price -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Price (INR)</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 font-bold text-xs">
                                        ₹
                                    </span>
                                    <input type="number" name="price" placeholder="e.g. 139900" required class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 shadow-sm">
                                </div>
                            </div>

                            <!-- Hardware Specs Grid -->
                            <div class="grid grid-cols-2 gap-4">
                                <!-- RAM -->
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">RAM (GB)</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                            <i class="fas fa-microchip text-sm"></i>
                                        </span>
                                        <input type="text" name="ram" placeholder="e.g. 8 GB" required class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 shadow-sm">
                                    </div>
                                </div>

                                <!-- Storage -->
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Storage (ROM)</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                            <i class="fas fa-hdd text-sm"></i>
                                        </span>
                                        <input type="text" name="storage" placeholder="e.g. 256 GB" required class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 pl-10 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 shadow-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Device Category</label>
                                <select name="category_id" class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-3 text-xs text-slate-800 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition shadow-sm">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">

    <label class="form-label">

        Stock Quantity

    </label>

    <input type="number"
           name="stock"
           class="form-control">

</div>
                        </div>

                        <!-- Right Side: Media & Details -->
                        <div class="space-y-5 flex flex-col justify-between">
                            <!-- Description -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Description</label>
                                <textarea name="description" placeholder="Provide details about camera specs, processor, display size, battery life, etc..." required rows="4" class="w-full bg-slate-50/50 border border-slate-200 rounded-xl py-2.5 px-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition duration-200 resize-none shadow-sm"></textarea>
                            </div>

                            <!-- Image Upload Box -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Device Image</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                                    <!-- Selector -->
                                    <div class="relative group">
                                        <input type="file" name="image" id="imageInput" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <div class="border-2 border-dashed border-slate-200 group-hover:border-indigo-500 bg-slate-50/50 rounded-xl p-4 text-center transition duration-200 flex flex-col items-center justify-center">
                                            <i class="fas fa-cloud-arrow-up text-2xl text-slate-400 group-hover:text-indigo-500 transition mb-2"></i>
                                            <span class="text-xs font-semibold text-slate-600 group-hover:text-slate-800">Choose File</span>
                                            <span class="text-[9px] text-slate-400 mt-1">PNG, JPG, WEBP</span>
                                        </div>
                                    </div>

                                    <!-- Preview Display -->
                                    <div id="imagePreviewContainer" class="w-full h-28 rounded-xl bg-slate-50 border border-slate-250 flex items-center justify-center text-slate-400 p-2 overflow-hidden shadow-inner">
                                        <div id="previewFallback" class="text-center">
                                            <i class="fas fa-image text-xl mb-1"></i>
                                            <p class="text-[9px]">No preview available</p>
                                        </div>
                                        <img id="imagePreview" src="#" alt="Preview" class="hidden object-contain max-h-full max-w-full rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit / Form Action Button -->
                    <div class="pt-4 border-t border-slate-100 flex justify-end">
                        <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-[#14213D] hover:bg-black text-white hover:text-[#FCA311] text-xs font-bold py-3.5 px-8 rounded-xl transition duration-200 shadow-sm uppercase tracking-wider">
                            <i class="fas fa-check"></i> Add Product to Catalog
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>

    <!-- Socket.io -->
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script>
        const socket = io('http://localhost:4000');
        
        socket.emit('message', 'Hello Krushil');

        socket.on('message', (data) => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: 'Broadcast Message',
                text: data,
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
                background: '#ffffff',
                color: '#1e293b',
                iconColor: '#6366f1',
                customClass: {
                    popup: 'border border-slate-200 rounded-xl shadow-xl'
                }
            });
        });

        // Image Preview Handler
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const previewFallback = document.getElementById('previewFallback');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    previewFallback.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.classList.add('hidden');
                previewFallback.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>