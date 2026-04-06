<x-app-layout>
    <x-slot name="header">
        Review Semua Data Masuk
    </x-slot>

    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-glass text-text-muted text-[10px] uppercase tracking-widest font-bold">
                        <th class="px-6 py-4">Thumbnail</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Operator</th>
                        <th class="px-6 py-4">Program</th>
                        <th class="px-6 py-4">Nama / Kontak</th>
                        <th class="px-6 py-4">Wilayah / Pekerjaan</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-glass-border">
                    @forelse($data as $item)
                        <tr class="hover:bg-glass transition-colors">
                            <td class="px-6 py-4">
                                @if($item->ktp_photo)
                                    <div class="w-10 h-10 rounded-lg overflow-hidden border border-glass-border">
                                        <img src="{{ Storage::url($item->ktp_photo) }}" alt="KTP" class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-glass border border-glass-border flex items-center justify-center">
                                        <span class="text-[8px] text-text-muted">N/A</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs whitespace-nowrap">{{ $item->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 text-xs font-medium text-text-muted">{{ $item->user->name }}</td>
                            <td class="px-6 py-4 text-xs font-bold text-accent">{{ $item->program->name }}</td>
                            <td class="px-6 py-4 text-xs">
                                <p class="font-bold">{{ $item->name }}</p>
                                <p class="text-[10px] text-text-muted">{{ $item->phone_number }}</p>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <p>{{ $item->region }}</p>
                                <p class="text-[10px] text-text-muted">{{ $item->occupation }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('digital-data.show', $item) }}" class="text-accent text-[9px] font-black uppercase tracking-widest hover:underline">Detail</a>
                                    
                                    @if($item->status === 'pending')
                                        <form action="{{ route('admin.data.update-status', $item) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="verified">
                                            <button type="submit" class="bg-green-500/10 text-green-500 px-2 py-1 rounded text-[8px] font-black uppercase tracking-widest hover:bg-green-500 hover:text-bg transition-all">Verifikasi</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.data.update-status', $item) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="pending">
                                            <button type="submit" class="bg-yellow-500/10 text-yellow-500 px-2 py-1 rounded text-[8px] font-black uppercase tracking-widest hover:bg-yellow-500 hover:text-bg transition-all">Batalkan</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-text-muted italic text-sm">
                                Belum ada data masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($data->hasPages())
            <div class="p-4 bg-glass border-t border-glass-border">
                {{ $data->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
