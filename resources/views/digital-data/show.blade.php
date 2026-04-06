<x-app-layout>
    <x-slot name="header">
        Detail Data: {{ $item->name }}
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="glass-card p-10">
                <div class="flex justify-between items-start mb-10 border-b border-glass-border pb-6">
                    <div>
                        <h3 class="text-2xl font-black text-main uppercase italic">{{ $item->name }}</h3>
                        <p class="text-xs text-accent font-bold uppercase tracking-widest mt-1">{{ $item->program->name }}</p>
                    </div>
                    <span class="px-3 py-1 rounded text-[10px] font-bold uppercase {{ $item->status == 'pending' ? 'bg-yellow-500/20 text-yellow-500' : 'bg-green-500/20 text-green-500' }}">
                        {{ $item->status }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Nomor Telepon</p>
                            <p class="text-sm font-bold text-main">{{ $item->phone_number }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Wilayah</p>
                            <p class="text-sm font-bold text-main">{{ $item->region }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Pekerjaan</p>
                            <p class="text-sm font-bold text-main">{{ $item->occupation }}</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Tanggal Submit</p>
                            <p class="text-sm font-bold text-main">{{ $item->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-1">Aktivitas/Keterangan</p>
                            <p class="text-xs leading-relaxed text-text-muted">{{ $item->activity }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('digital-data.index') }}" class="px-8 py-4 bg-glass border border-glass-border text-main text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:border-accent/40 transition-all">Kembali ke Daftar</a>
            </div>
        </div>

        <div>
            <div class="glass-card p-6">
                <h4 class="text-[10px] text-text-muted uppercase font-bold tracking-widest mb-4">Lampiran Foto KTP</h4>
                @if($item->ktp_photo)
                    <div class="rounded-xl overflow-hidden border border-glass-border">
                        <img src="{{ Storage::url($item->ktp_photo) }}" alt="Foto KTP" class="w-full h-auto">
                    </div>
                    <a href="{{ Storage::url($item->ktp_photo) }}" target="_blank" class="block text-center mt-4 text-[10px] font-black text-accent uppercase tracking-widest hover:underline">Lihat Gambar Penuh</a>
                @else
                    <div class="aspect-video bg-glass flex items-center justify-center rounded-xl border border-dashed border-glass-border">
                        <p class="text-[10px] text-text-muted uppercase font-bold">Tidak ada foto</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
