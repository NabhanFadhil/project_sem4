<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SinergiSosial - Platform Aksi Nyata</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800 antialiased">
    
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                <span class="text-2xl">🌱</span>
                <span class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent group-hover:from-emerald-500 group-hover:to-teal-500 transition-all">
                    SinergiSosial
                </span>
            </a>
            <div class="flex items-center space-x-4">
                <span class="text-xs font-semibold bg-emerald-50 text-emerald-700 px-3 py-1.5 rounded-full border border-emerald-200">
                    Proyek Semester 4
                </span>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-8 max-w-7xl">
        @yield('content')
    </main>

    <footer class="text-center py-8 text-sm text-slate-400 mt-12 border-t border-slate-100">
        &copy; 2026 SinergiSosial. Dibuat dengan ❤️ untuk Perubahan Sosial.
    </footer>

</body>
</html>