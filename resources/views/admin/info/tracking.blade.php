<x-app-layout>
    <x-slot name="header">
        Program Tracking
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8 animate-fade-in">
        <div class="glass-card p-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-4">
                <span class="bg-accent/20 text-accent text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded-full border border-accent/30">Mode Pengembangan</span>
            </div>

            <div class="flex items-center gap-6 mb-10">
                <div class="w-20 h-20 bg-accent/10 rounded-3xl flex items-center justify-center text-accent">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-main uppercase italic">Program & Aid Tracking</h2>
                    <p class="text-text-muted uppercase text-[10px] font-bold tracking-widest mt-1">Pelacakan Peserta & Distribusi Bantuan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div class="space-y-4">
                    <h4 class="text-accent text-sm font-black uppercase italic">Deskripsi Modul</h4>
                    <p class="text-sm text-text-muted leading-relaxed">
                        Modul ini memungkinkan administrator untuk mengelompokkan data berdasarkan event atau program spesifik. 
                        Sistem dapat melacak partisipasi individu dan memastikan distribusi bantuan tepat sasaran.
                    </p>
                </div>
                <div class="space-y-4">
                    <h4 class="text-accent text-sm font-black uppercase italic">Fitur Utama</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center gap-3 text-xs text-text-muted">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Event-based Data Grouping
                        </li>
                        <li class="flex items-center gap-3 text-xs text-text-muted">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Aid Recipient Management
                        </li>
                        <li class="flex items-center gap-3 text-xs text-text-muted">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Participation Timeline
                        </li>
                    </ul>
                </div>
            </div>

            <div class="p-6 bg-glass border border-glass-border rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="mt-1">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[11px] text-text-muted font-medium italic">
                        "Modul Tracking akan mencakup fitur verifikasi QR Code untuk setiap peserta program guna validasi data di lapangan secara akurat."
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
