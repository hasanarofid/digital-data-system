<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Titan Gym Evolution | Premium Fitness Management</title>
    
    <!-- SEO -->
    <meta name="description" content="Experience elite fitness management with Titan Gym. Precision coaching, modern facilities, and a dynamic fitness community.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .hero-glow {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 100vh;
            background: radial-gradient(circle at 50% 30%, var(--accent-glow) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">
    <div class="hero-glow"></div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 px-6 lg:px-14 py-8 flex justify-between items-center bg-transparent backdrop-blur-md border-b border-glass-border">
        <h1 class="text-2xl font-black tracking-tighter text-accent italic">TITAN<span class="text-main">GYM</span></h1>
        
        <div class="flex items-center gap-8">
            <div class="hidden md:flex gap-10 text-[10px] font-black uppercase tracking-[0.2em] text-text-muted">
                <a href="#stats" class="hover:text-accent transition-colors">Performance</a>
                <a href="#packages" class="hover:text-accent transition-colors">Memberships</a>
                <a href="#trainers" class="hover:text-accent transition-colors">Elite Team</a>
            </div>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-premium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-main hover:text-accent transition-colors">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-premium">Join Elite</a>
                        @endif
                    @endauth
                @endif
                
                <button id="lp-theme-toggle" class="p-2 bg-glass border border-glass-border rounded-lg text-main hover:border-accent/40 transition-all">
                    <svg id="sun-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    <svg id="moon-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-48 pb-32 px-6 lg:px-14 overflow-hidden">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-accent/10 border border-accent/20 rounded-full mb-8">
                    <span class="w-2 h-2 bg-accent rounded-full animate-ping"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-accent">Now accepting new members</span>
                </div>
                <h2 class="text-6xl lg:text-9xl font-black tracking-tighter text-main mb-8 leading-[0.9]">
                    EVOLVE<br><span class="text-accent italic">BEYOND</span><br>LIMITS
                </h2>
                <p class="text-lg lg:text-xl text-text-muted mb-12 max-w-xl leading-relaxed font-light">
                    The ultra-premium gym ecosystem designed for those who demand excellence. Adaptive training, real-time analytics, and an elite community.
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="{{ route('register') }}" class="btn-premium px-10 py-5 text-xs">Start Your Evolution</a>
                    <a href="#packages" class="px-10 py-5 bg-glass border border-glass-border text-main text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:border-accent/30 transition-all flex items-center gap-3 group">
                        Explore Packages
                        <svg class="group-hover:translate-x-1 transition-transform" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
            
            <div class="relative lg:h-[700px] flex items-center justify-center">
                <div class="absolute inset-0 bg-accent/5 rounded-full blur-3xl"></div>
                <!-- Large Abstract Visual (Glass Card) -->
                <div class="glass-card p-12 w-full max-w-xl border-accent/20 rotate-3 transform-gpu hover:rotate-0 transition-all duration-700">
                    <div class="space-y-8">
                        @foreach(['Bio-Metrics', 'Neural-Sync', 'Peak-Load'] as $metric)
                        <div class="space-y-3">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-black uppercase tracking-widest text-text-muted italic">{{ $metric }}</span>
                                <span class="text-accent font-black">9{{ rand(4,9) }}%</span>
                            </div>
                            <div class="h-1.5 w-full bg-glass rounded-full overflow-hidden">
                                <div class="h-full bg-accent animate-pulse" style="width: 9{{ rand(4,9) }}%"></div>
                            </div>
                        </div>
                        @endforeach
                        <div class="pt-8 border-t border-glass-border flex justify-between">
                            <div>
                                <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Status</p>
                                <p class="text-sm font-black text-main uppercase">System Operational</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Tier</p>
                                <p class="text-sm font-black text-accent uppercase italic">Titan Elite</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="px-6 lg:px-14 py-32 bg-glass">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-16">
            <div class="text-center group">
                <h3 class="text-6xl lg:text-8xl font-black text-main mb-4 group-hover:text-accent transition-colors">{{ $stats['members'] }}+</h3>
                <p class="text-[11px] font-black uppercase tracking-[0.4em] text-text-muted">Active Evolutionary</p>
            </div>
            <div class="text-center group">
                <h3 class="text-6xl lg:text-8xl font-black text-main mb-4 group-hover:text-accent transition-colors">{{ $stats['classes'] }}</h3>
                <p class="text-[11px] font-black uppercase tracking-[0.4em] text-text-muted">High-Intensity Labs</p>
            </div>
            <div class="text-center group">
                <h3 class="text-6xl lg:text-8xl font-black text-main mb-4 group-hover:text-accent transition-colors">{{ $stats['trainers'] }}</h3>
                <p class="text-[11px] font-black uppercase tracking-[0.4em] text-text-muted">Elite Architects</p>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="px-6 lg:px-14 py-32">
        <div class="max-w-[1280px] mx-auto">
            <div class="mb-24 text-center max-w-2xl mx-auto">
                <h3 class="text-[10px] font-black uppercase tracking-[0.5em] text-accent mb-6">Choose Your path</h3>
                <h2 class="text-4xl lg:text-6xl font-black tracking-tighter text-main uppercase">Membership <span class="italic text-accent">Tiers</span></h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($packages as $package)
                    @php $isElite = str_contains(strtolower($package->name), 'elite') || str_contains(strtolower($package->name), 'pro'); @endphp
                    <div class="glass-card p-10 flex flex-col {{ $isElite ? 'border-accent/40 shadow-[0_30px_100px_rgba(0,242,255,0.1)] scale-105 relative z-10' : '' }}">
                        @if($isElite)
                            <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-accent text-dark text-[10px] font-black uppercase tracking-[0.2em] rounded-full">Most Evolutionary</div>
                        @endif
                        <h4 class="text-2xl font-black text-main mb-2 uppercase tracking-tight">{{ $package->name }}</h4>
                        <div class="flex items-baseline gap-1 mb-8">
                            <span class="text-4xl font-black text-main italic">${{ number_format($package->price, 0) }}</span>
                            <span class="text-text-muted text-xs uppercase font-bold tracking-widest">/ Month</span>
                        </div>
                        
                        <p class="text-text-muted text-sm leading-relaxed mb-10 pb-10 border-b border-glass-border font-medium">
                            {{ $package->description ?? 'Full access to our elite facilities and personalized tracking systems.' }}
                        </p>

                        <ul class="space-y-4 mb-12 flex-grow">
                            <li class="flex items-center gap-3 text-xs font-bold text-main">
                                <svg class="text-accent" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                24/7 Biometric Access
                            </li>
                            <li class="flex items-center gap-3 text-xs font-bold text-main">
                                <svg class="text-accent" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                Advanced AI Tracking
                            </li>
                            <li class="flex items-center gap-3 text-xs font-bold text-main opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                Recovery Lounge
                            </li>
                        </ul>

                        <a href="{{ route('register', ['package' => $package->id]) }}" class="{{ $isElite ? 'btn-premium py-4' : 'px-8 py-4 bg-glass border border-glass-border text-main text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:border-accent/40 transition-all text-center' }}">
                            Initialize Plan
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Trainers Showcase -->
    <section id="trainers" class="max-w-[1280px] mx-auto px-6 lg:px-14 py-32 overflow-hidden border-t border-glass-border">
        <div class="flex flex-col md:flex-row justify-between items-end mb-24 gap-8">
            <div class="max-w-xl">
                <h3 class="text-[10px] font-black uppercase tracking-[0.5em] text-accent mb-6 text-center md:text-left">Architects of Change</h3>
                <h2 class="text-4xl lg:text-7xl font-black tracking-tighter text-main mb-6 uppercase leading-none">Elite <span class="text-accent">Coaching</span></h2>
                <p class="text-text-muted text-lg leading-relaxed font-light">Precision guidance from world-class experts dedicated to your physical evolution.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            @foreach($trainers as $trainer)
                <div class="group relative aspect-[3/4] rounded-[2rem] overflow-hidden bg-glass border border-glass-border hover:border-accent/40 transition-all duration-700 hover:-translate-y-4">
                    <div class="absolute inset-0 bg-accent/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    <div class="absolute inset-x-0 bottom-0 p-10 z-10 bg-gradient-to-t from-dark/95 via-dark/70 to-transparent">
                        <span class="text-accent text-[9px] font-black uppercase tracking-[0.4em] mb-3 block italic">{{ $trainer->specialty }}</span>
                        <h4 class="text-3xl font-black text-white tracking-tighter uppercase leading-none">{{ $trainer->name }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="max-w-[1280px] mx-auto px-6 lg:px-14 py-24 border-t border-glass-border">
        <div class="flex flex-col md:flex-row justify-between items-center gap-16">
            <h1 class="text-3xl font-black tracking-tighter text-accent italic">TITAN<span class="text-main">GYM</span></h1>
            
            <div class="flex flex-wrap justify-center gap-12 text-[10px] font-black uppercase tracking-[0.3em] text-text-muted">
                <a href="#" class="hover:text-accent transition-colors">Neural Policy</a>
                <a href="#" class="hover:text-accent transition-colors">Term of Ops</a>
                <a href="#" class="hover:text-accent transition-colors">Evolution Support</a>
            </div>

            <div class="flex flex-col items-center md:items-end gap-2 text-right">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-text-muted/60">&copy; 2026 TITAN GYM EVOLUTION</p>
                <p class="text-[9px] font-bold text-accent/40 uppercase tracking-widest">Protocol v4.0.1</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('lp-theme-toggle');
            const sun = document.getElementById('sun-icon');
            const moon = document.getElementById('moon-icon');
            
            const updateUI = (theme) => {
                document.documentElement.setAttribute('data-theme', theme);
                if (theme === 'light') {
                    sun.classList.remove('hidden');
                    moon.classList.add('hidden');
                } else {
                    sun.classList.add('hidden');
                    moon.classList.remove('hidden');
                }
            };

            let currentTheme = localStorage.getItem('theme') || 'dark';
            updateUI(currentTheme);

            btn.addEventListener('click', () => {
                currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
                localStorage.setItem('theme', currentTheme);
                updateUI(currentTheme);
            });
        });
    </script>
</body>
</html>
