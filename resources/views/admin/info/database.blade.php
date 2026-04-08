<x-app-layout>
    <x-slot name="header">
        Database Cloud
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8 animate-fade-in">
        <div class="glass-card p-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-4">
                <span class="bg-accent/20 text-accent text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded-full border border-accent/30">Mode Pengembangan</span>
            </div>

            <div class="flex items-center gap-6 mb-10">
                <div class="w-20 h-20 bg-accent/10 rounded-3xl flex items-center justify-center text-accent">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.791 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.791 8-4M4 7c0-2.21 3.582-4 8-4s8 1.791 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.791-8-4"></path></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-black text-main uppercase italic">Cloud Centralized Database</h2>
                    <p class="text-text-muted uppercase text-[10px] font-bold tracking-widest mt-1">Arsitektur Penyimpanan Terintegrasi</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div class="space-y-4">
                    <h4 class="text-accent text-sm font-black uppercase italic">Deskripsi Modul</h4>
                    <p class="text-sm text-text-muted leading-relaxed">
                        Sistem database berbasis cloud yang memungkinkan sinkronisasi data secara real-time dari berbagai lapangan. 
                        Data yang dikumpulkan oleh operator akan langsung terpusat untuk diolah dan divisualisasikan.
                    </p>
                </div>
                <div class="space-y-4">
                    <h4 class="text-accent text-sm font-black uppercase italic">Fitur Utama</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center gap-3 text-xs text-text-muted">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Real-time Cloud Integration
                        </li>
                        <li class="flex items-center gap-3 text-xs text-text-muted">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Multi-User Synchronization
                        </li>
                        <li class="flex items-center gap-3 text-xs text-text-muted">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Scalable Storage Architecture
                        </li>
                    </ul>
                </div>
            </div>

            <div class="p-6 bg-glass border border-glass-border rounded-2xl">
                <div class="flex items-start gap-4">
                    <div class="mt-1">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[11px] text-text-muted font-medium italic italic">
                        "Bagian ini sedang dalam pengembangan intensif untuk memastikan keamanan data pribadi dan integrasi mulus dengan Google Spreadsheet sebagai alternatif penyimpanan primer."
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
