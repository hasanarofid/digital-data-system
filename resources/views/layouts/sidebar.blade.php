<aside class="sidebar flex flex-col">
    <div class="mb-10 px-4">
        <h1 class="text-2xl font-black tracking-tighter text-accent">DIGITAL<span class="text-main">DATA</span></h1>
        <p class="text-[10px] text-text-muted mt-1 uppercase tracking-widest">Field Collection System</p>
    </div>

    <nav class="flex flex-col gap-2 flex-1">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            Dashboard
        </a>

        @if(auth()->user()->isAdmin())
        <div class="mt-4 mb-2 px-4 text-[10px] uppercase tracking-widest text-text-muted font-bold">Admin Panel</div>
        <a href="{{ route('admin.list') }}" class="nav-link {{ request()->routeIs('admin.list') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-3-3.87"></path><path d="M7 21v-2a4 4 0 0 1 3-3.87"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><circle cx="19" cy="7" r="4"></circle></svg>
            Review Semua Data
        </a>
        @endif

        @if(auth()->user()->isMember())
        <div class="mt-4 mb-2 px-4 text-[10px] uppercase tracking-widest text-text-muted font-bold">Field Operator</div>
        <a href="{{ route('digital-data.create') }}" class="nav-link {{ request()->routeIs('digital-data.create') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
            Tambah Data Baru
        </a>
        <a href="{{ route('digital-data.index') }}" class="nav-link {{ request()->routeIs('digital-data.index') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            Data Saya
        </a>
        @endif

        <div class="mt-auto pt-6 space-y-4">
            <div class="px-4 py-2 border-t border-glass-border">
                <p class="text-[9px] text-text-muted uppercase tracking-widest">Developer by</p>
                <a href="https://hasanarofid.site" target="_blank" class="text-[11px] font-bold text-accent hover:underline">hasanarofid.site</a>
            </div>

            <button id="theme-toggle" class="nav-link w-full text-left">
                <svg id="sun-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                <svg id="moon-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                <span id="theme-text">Theme</span>
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-full text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    Logout
                </button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const btn = document.getElementById('theme-toggle');
                const sun = document.getElementById('sun-icon');
                const moon = document.getElementById('moon-icon');
                const text = document.getElementById('theme-text');
                
                const updateUI = (theme) => {
                    if (theme === 'light') {
                        sun.classList.remove('hidden');
                        moon.classList.add('hidden');
                        text.innerText = 'Light Mode';
                    } else {
                        sun.classList.add('hidden');
                        moon.classList.remove('hidden');
                        text.innerText = 'Dark Mode';
                    }
                };

                let currentTheme = localStorage.getItem('theme') || 'dark';
                updateUI(currentTheme);

                btn.addEventListener('click', () => {
                    currentTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', currentTheme);
                    localStorage.setItem('theme', currentTheme);
                    updateUI(currentTheme);
                });
            });
        </script>
    </nav>
</aside>
