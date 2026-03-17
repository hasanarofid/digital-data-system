<x-app-layout>
    <x-slot:title>Presence History</x-slot:title>
    <x-slot name="header">
        Attendance Logs
    </x-slot>

    <div class="flex justify-between items-center mb-8 text-text-muted">
        <p>Recent member check-ins and attendance history.</p>
        <a href="{{ route('check-ins.create') }}" class="btn-premium">
            Manual Check-in
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 glass-card border-accent/30 text-accent animate-fade-in text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-card overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-glass-border bg-glass">
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Member</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Check-in Time</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-glass-border">
                @forelse($checkins as $checkin)
                    <tr class="hover:bg-glass transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-main">{{ $checkin->user->name }}</div>
                            <div class="text-[10px] text-text-muted uppercase tracking-widest">{{ $checkin->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-text-muted font-medium">
                            {{ $checkin->checked_at->format('M d, Y - H:i:s') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider bg-accent/10 text-accent">Verified</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-20 text-center text-text-muted italic">No recent check-ins.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
