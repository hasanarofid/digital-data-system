<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Digital Data | Modern Field Data Collection</title>
    
    <!-- SEO -->
    <meta name="description" content="Digitalisasi pengumpulan data lapangan dengan presisi. Cepat, akurat, dan terintegrasi.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/premium.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Outfit', sans-serif; background-color: #0c0c0e; color: #f0f0f5; }
        .hero-glow {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 100vh;
            background: radial-gradient(circle at 50% 30%, rgba(0, 242, 255, 0.15) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
        .text-gradient {
            background: linear-gradient(to right, #00f2ff, #7000ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">
    <div class="hero-glow"></div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 px-6 lg:px-14 py-8 flex justify-between items-center bg-transparent backdrop-blur-md border-b border-glass-border">
        <h1 class="text-2xl font-black tracking-tighter text-accent italic">DIGITAL<span class="text-main">DATA</span></h1>
        
        <div class="flex items-center gap-8">
            <div class="hidden md:flex gap-10 text-[10px] font-black uppercase tracking-[0.2em] text-text-muted">
                <a href="#features" class="hover:text-accent transition-colors">Fitur Utama</a>
                <a href="#programs" class="hover:text-accent transition-colors">Program</a>
                <a href="https://hasanarofid.site" target="_blank" class="hover:text-accent transition-colors">Developer</a>
            </div>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-premium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-main hover:text-accent transition-colors">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-48 pb-32 px-6 lg:px-14 overflow-hidden">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-accent/10 border border-accent/20 rounded-full mb-8">
                    <span class="w-2 h-2 bg-accent rounded-full animate-ping"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-accent">Sistem Terintegrasi v1.0</span>
                </div>
                <h2 class="text-6xl lg:text-8xl font-black tracking-tighter text-main mb-8 leading-[0.9]">
                    MODERNISASI<br><span class="text-gradient italic">DATA LAPANGAN</span>
                </h2>
                <p class="text-lg lg:text-xl text-text-muted mb-12 max-w-xl leading-relaxed font-light">
                    Transformasi pengumpulan data manual menjadi sistem digital yang cerdas. Monitoring real-time, visualisasi data, dan pelacakan program bantuan dalam satu platform.
                </p>
                <div class="flex flex-wrap gap-6">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-premium px-10 py-5 text-xs">Akses Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-premium px-10 py-5 text-xs">Mulai Sekarang</a>
                    @endauth
                </div>
            </div>
            
            <div class="relative lg:h-[600px] flex items-center justify-center">
                <div class="absolute inset-0 bg-accent/5 rounded-full blur-3xl"></div>
                <div class="glass-card p-12 w-full max-w-xl border-accent/20 rotate-3 transform-gpu hover:rotate-0 transition-all duration-700">
                    <div class="space-y-8">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-sm font-bold text-accent uppercase tracking-widest">Live Data Feed</h4>
                            <span class="text-[9px] px-2 py-1 bg-green-500/20 text-green-500 rounded-full font-bold animate-pulse">AKTIF</span>
                        </div>
                        @foreach(['Data KTP Terverifikasi', 'Input Lokasi Geospasial', 'Cloud Integration'] as $metric)
                        <div class="space-y-3">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-black uppercase tracking-widest text-text-muted italic">{{ $metric }}</span>
                                <span class="text-accent font-black">9{{ rand(4,9) }}%</span>
                            </div>
                            <div class="h-1 w-full bg-glass rounded-full overflow-hidden">
                                <div class="h-full bg-accent" style="width: 9{{ rand(4,9) }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="px-6 lg:px-14 py-32 bg-glass border-t border-glass-border">
        <div class="max-w-[1280px] mx-auto">
            <div class="mb-24 text-center max-w-2xl mx-auto">
                <h3 class="text-[10px] font-black uppercase tracking-[0.5em] text-accent mb-6">Program Pelacakan</h3>
                <h2 class="text-4xl lg:text-6xl font-black tracking-tighter text-main uppercase italic">PROGRAM UNGGULAN</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($programs as $program)
                    <div class="glass-card p-10 flex flex-col hover:border-accent/40 transition-all group">
                        <h4 class="text-2xl font-black text-main mb-4 uppercase tracking-tight group-hover:text-accent transition-colors">{{ $program->name }}</h4>
                        <p class="text-text-muted text-sm leading-relaxed mb-8 flex-grow">
                            {{ $program->description }}
                        </p>
                        <div class="pt-6 border-t border-glass-border">
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-accent">Monitoring Aktif &rarr;</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="max-w-[1280px] mx-auto px-6 lg:px-14 py-24 border-t border-glass-border">
        <div class="flex flex-col md:flex-row justify-between items-center gap-16">
            <h1 class="text-3xl font-black tracking-tighter text-accent italic">DIGITAL<span class="text-main">DATA</span></h1>
            
            <div class="flex flex-wrap justify-center gap-12 text-[10px] font-black uppercase tracking-[0.3em] text-text-muted">
                <p>Digital Data Field Collection System</p>
                <a href="https://hasanarofid.site" target="_blank" class="hover:text-accent transition-colors">Developer Profile</a>
            </div>

            <div class="flex flex-col items-center md:items-end gap-2 text-right">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text-muted/60">&copy; 2026 DIGITAL DATA SYSTEM</p>
                <p class="text-[9px] font-bold text-accent/40 uppercase tracking-widest">Powered by <a href="https://hasanarofid.site" class="hover:underline">hasanarofid.site</a></p>
            </div>
        </div>
    </footer>
</body>
</html>
