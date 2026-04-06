<x-app-layout>
    <x-slot name="header">
        Data Saya
    </x-slot>

    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-glass text-text-muted text-[10px] uppercase tracking-widest font-bold">
                        <th class="px-6 py-4">Thumbnail</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Program</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Wilayah</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
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
                            <td class="px-6 py-4 text-xs">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-xs font-bold text-accent">{{ $item->program->name }}</td>
                            <td class="px-6 py-4 text-xs">
                                <p class="font-bold">{{ $item->name }}</p>
                                <p class="text-[10px] text-text-muted">{{ $item->phone_number }}</p>
                            </td>
                            <td class="px-6 py-4 text-xs">{{ $item->region }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded text-[10px] font-bold uppercase {{ $item->status == 'pending' ? 'bg-yellow-500/20 text-yellow-500' : 'bg-green-500/20 text-green-500' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('digital-data.show', $item) }}" class="text-accent hover:underline text-[10px] font-bold uppercase">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-text-muted italic text-sm">
                                Belum ada data yang dikirimkan.
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
