<x-app-layout>
    <x-slot:title>My Bookings</x-slot:title>

    <x-slot name="header">
        <h2 class="font-black text-xl text-main leading-tight tracking-tight">
            MY <span class="text-accent">BOOKINGS</span>
        </h2>
    </x-slot>

    <div class="space-y-8 animate-fade-in text-main">
        @if(session('success'))
            <div class="glass-card p-4 border-l-4 border-l-emerald-500 bg-emerald-500/10 text-emerald-500 text-xs font-bold uppercase tracking-widest">
                {{ session('success') }}
            </div>
        @endif

        <div class="glass-card overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-glass-border">
                            <th class="p-6 text-[10px] font-black uppercase tracking-widest text-text-muted">Class Name</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-widest text-text-muted">Trainer</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-widest text-text-muted">Schedule</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-widest text-text-muted">Status</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-widest text-text-muted">Date Booked</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-glass-border">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-glass/5 transition-colors">
                                <td class="p-6">
                                    <div class="text-sm font-black text-main uppercase">{{ $booking->gymClass->name }}</div>
                                    <div class="text-[10px] text-text-muted font-bold uppercase tracking-tighter">{{ $booking->gymClass->category ?? 'Fitness' }}</div>
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-accent/20 flex items-center justify-center text-accent text-[10px] font-black">
                                            {{ substr($booking->gymClass->trainer->name, 0, 1) }}
                                        </div>
                                        <div class="text-xs font-bold text-main">{{ $booking->gymClass->trainer->name }}</div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="text-xs font-bold text-main italic">{{ $booking->gymClass->day_of_week }}</div>
                                    <div class="text-[10px] text-text-muted font-bold uppercase">{{ \Carbon\Carbon::parse($booking->gymClass->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->gymClass->end_time)->format('H:i') }}</div>
                                </td>
                                <td class="p-6">
                                    <span class="px-2 py-1 rounded bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 text-[8px] font-black uppercase tracking-widest">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td class="p-6 text-[10px] font-bold text-text-muted uppercase">
                                    {{ $booking->created_at->format('M d, Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-20 text-center">
                                    <div class="text-text-muted text-xs font-bold uppercase tracking-[0.2em]">No bookings found.</div>
                                    <a href="{{ route('member.dashboard') }}" class="mt-4 inline-block text-accent text-[10px] font-black uppercase hover:underline">Book your first session</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($bookings->hasPages())
                <div class="p-6 border-t border-glass-border">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
