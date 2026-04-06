<x-guest-layout title="Daftar Operator Lapangan">
    <div class="max-w-md mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-black tracking-tighter text-main mb-2 uppercase italic">REGISTRASI <span class="text-accent">OPERATOR</span></h2>
            <p class="text-text-muted text-[10px] font-bold uppercase tracking-widest mt-1 opacity-70">Mulai pengumpulan data digital hari ini</p>
        </div>

        <div class="glass-card p-10 border-accent/20">
            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf

                <!-- Name -->
                <div class="group">
                    <label for="name" class="text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2 block group-focus-within:text-accent transition-colors">Nama Lengkap</label>
                    <input id="name" class="premium-input px-0 bg-transparent border-0 border-b border-glass-border rounded-none focus:ring-0 focus:border-accent transition-all" type="text" name="name" :value="old('name')" required autofocus placeholder="Masukkan nama lengkap" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-[10px] uppercase font-bold text-red-400" />
                </div>

                <!-- Email -->
                <div class="group">
                    <label for="email" class="text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2 block group-focus-within:text-accent transition-colors">Email Kerja</label>
                    <input id="email" class="premium-input px-0 bg-transparent border-0 border-b border-glass-border rounded-none focus:ring-0 focus:border-accent transition-all" type="email" name="email" :value="old('email')" required placeholder="email@contoh.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] uppercase font-bold text-red-400" />
                </div>

                <!-- Password -->
                <div class="group">
                    <label for="password" class="text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2 block group-focus-within:text-accent transition-colors">Password</label>
                    <input id="password" class="premium-input px-0 bg-transparent border-0 border-b border-glass-border rounded-none focus:ring-0 focus:border-accent transition-all" type="password" name="password" required placeholder="Min 8 karakter" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] uppercase font-bold text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div class="group">
                    <label for="password_confirmation" class="text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2 block group-focus-within:text-accent transition-colors">Konfirmasi Password</label>
                    <input id="password_confirmation" class="premium-input px-0 bg-transparent border-0 border-b border-glass-border rounded-none focus:ring-0 focus:border-accent transition-all" type="password" name="password_confirmation" required placeholder="Re-type password" />
                </div>

                <div class="pt-8 border-t border-glass-border">
                    <button type="submit" class="btn-premium w-full py-4 text-[10px] font-black tracking-[0.2em] shadow-xl shadow-accent/20">
                        CONFIRM REGISTRATION
                    </button>
                    
                    <div class="mt-8 text-center">
                        <a class="text-[10px] font-bold text-text-muted hover:text-accent uppercase tracking-widest transition-colors" href="{{ route('login') }}">
                            Sudah punya akun? <span class="text-accent underline underline-offset-4 decoration-accent/30">Login di sini</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
