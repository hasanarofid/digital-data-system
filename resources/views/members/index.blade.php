<x-app-layout>
    <x-slot:title>Manage Members</x-slot:title>
    <x-slot name="header">
        Member Directory
    </x-slot>

    <div class="flex justify-between items-center mb-8 text-text-muted">
        <p>List of all active and inactive gym members.</p>
        <a href="{{ route('members.create') }}" class="btn-premium">
            Add New Member
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 glass-card border-accent/30 text-accent animate-fade-in text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-glass-border bg-glass">
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Member</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Contact</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Current Plan</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Expiry</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted">Status</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-text-muted text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-glass-border">
                    @forelse($members as $member)
                        <tr class="hover:bg-glass transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-bold">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-main">{{ $member->name }}</div>
                                        <div class="text-xs text-text-muted">ID: #{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-main">{{ $member->email }}</div>
                                <div class="text-xs text-text-muted">{{ $member->phone ?? 'No phone' }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="font-medium text-main">{{ $member->membership->package->name ?? 'None' }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-text-muted">
                                {{ $member->membership ? $member->membership->end_date->format('M d, Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider 
                                    {{ $member->status ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }}">
                                    {{ $member->status ? 'active' : 'inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('members.edit', $member) }}" class="p-2 hover:bg-glass rounded-lg text-text-muted hover:text-accent transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>
                                    <form action="{{ route('members.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete this member?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-glass rounded-lg text-text-muted hover:text-red-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="12" x2="14" y2="17"></line></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-20 text-center text-text-muted italic">
                                No members found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
