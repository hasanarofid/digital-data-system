<x-app-layout>
    <x-slot:title>Add New Member</x-slot:title>
    <x-slot name="header">
        Add New Member
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('members.store') }}" method="POST">
                @csrf
                
                <div class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Full Name</label>
                            <input type="text" name="name" class="premium-input" placeholder="John Doe" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Email Address</label>
                            <input type="email" name="email" class="premium-input" placeholder="john@example.com" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Phone Number</label>
                            <input type="text" name="phone" class="premium-input" placeholder="+62...">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Membership Start Date</label>
                            <input type="date" name="start_date" class="premium-input" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="border-t border-glass-border pt-8">
                        <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-4">Select Membership Plan</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($packages as $package)
                                <label class="cursor-pointer">
                                    <input type="radio" name="package_id" value="{{ $package->id }}" class="hidden peer" required>
                                    <div class="p-4 glass-card border-glass-border peer-checked:border-accent peer-checked:bg-accent/5 transition-all">
                                        <div class="font-bold text-main uppercase text-xs tracking-tight">{{ $package->name }}</div>
                                        <div class="text-xl font-black mt-1">${{ number_format($package->price, 0) }}</div>
                                        <div class="text-[10px] text-text-muted mt-2 uppercase tracking-widest">{{ $package->duration_days }} Days</div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-6 border-t border-glass-border flex gap-4">
                        <button type="submit" class="btn-premium flex-1">Register Member</button>
                        <a href="{{ route('members.index') }}" class="flex-1 text-center py-3 text-xs font-bold uppercase tracking-widest text-text-muted hover:text-main border border-glass-border rounded-lg transition-all">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
