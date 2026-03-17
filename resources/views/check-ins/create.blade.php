<x-app-layout>
    <x-slot:title>Log Presence</x-slot:title>
    <x-slot name="header">
        Manual Check-in
    </x-slot>

    <div class="max-w-xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('check-ins.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Select Member</label>
                        <select name="user_id" class="premium-input" required>
                            <option value="">Choose a member</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }} (#{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }})</option>
                            @endforeach
                        </select>
                        <p class="mt-2 text-[10px] text-text-muted uppercase tracking-widest">Only active members are listed.</p>
                    </div>

                    <div class="pt-6 border-t border-glass-border">
                        <button type="submit" class="btn-premium w-full py-4 text-sm">Verify & Check-in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
