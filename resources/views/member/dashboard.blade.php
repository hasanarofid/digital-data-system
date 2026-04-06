<x-app-layout>
    <x-slot name="header">
        Dashboard Operator
    </x-slot>

    <div class="space-y-10">
        <!-- Welcoming & Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="lg:col-span-2 glass-card p-10 flex flex-col justify-center relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-black text-main uppercase italic mb-2">Halo, {{ auth()->user()->name }}!</h2>
                    <p class="text-text-muted text-sm max-w-md leading-relaxed">Selamat datang kembali di Digital Data System. Terus kumpulkan data lapangan dengan akurat dan profesional.</p>
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('digital-data.create') }}" class="px-6 py-3 bg-accent text-bg text-[10px] font-black uppercase tracking-widest rounded-xl hover:scale-105 active:scale-95 transition-all shadow-lg shadow-accent/20">Tambah Data Baru</a>
                    </div>
                </div>
                <div class="absolute -right-10 -bottom-10 opacity-5">
                    <svg class="w-64 h-64 text-accent" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
                </div>
            </div>

            <div class="glass-card p-8 flex flex-col justify-center border-l-4 border-accent">
                <p class="text-[10px] text-text-muted uppercase font-black tracking-widest mb-1">Total Data Dikirim</p>
                <h3 class="text-4xl font-black text-main">{{ $stats['total'] }}</h3>
            </div>

            <div class="glass-card p-8 flex flex-col justify-center border-l-4 border-yellow-500">
                <p class="text-[10px] text-text-muted uppercase font-black tracking-widest mb-1">Menunggu Review</p>
                <h3 class="text-4xl font-black text-main">{{ $stats['pending'] }}</h3>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="space-y-6">
            <div class="flex justify-between items-end">
                <h3 class="text-sm font-black text-main uppercase tracking-widest italic">Aktivitas Terakhir</h3>
                <a href="{{ route('digital-data.index') }}" class="text-[10px] text-accent font-black uppercase tracking-widest hover:underline">Lihat Semua</a>
            </div>

            <div class="glass-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-glass text-text-muted text-[10px] uppercase tracking-widest font-bold">
                                <th class="px-6 py-4">Thumbnail</th>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4">Program</th>
                                <th class="px-6 py-4">Nama</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-glass-border">
                            @forelse($recentData as $item)
                                <tr class="hover:bg-glass transition-colors">
                                    <td class="px-6 py-4 text-xs">
                                        @if($item->ktp_photo)
                                            <div class="w-8 h-8 rounded-lg overflow-hidden border border-glass-border">
                                                <img src="{{ Storage::url($item->ktp_photo) }}" alt="KTP" class="w-full h-full object-cover">
                                            </div>
                                        @else
                                            <div class="w-8 h-8 rounded-lg bg-glass border border-glass-border flex items-center justify-center">
                                                <span class="text-[8px] text-text-muted">N/A</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-xs">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-xs font-bold text-accent">{{ $item->program->name }}</td>
                                    <td class="px-6 py-4 text-xs font-bold">{{ $item->name }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('digital-data.show', $item) }}" class="text-accent hover:underline text-[10px] font-bold uppercase">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-text-muted italic text-xs">Belum ada aktivitas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
