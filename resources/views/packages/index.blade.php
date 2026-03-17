<x-app-layout>
    <x-slot:title>Membership Packages</x-slot:title>
    <x-slot name="header">
        Gym Packages
    </x-slot>

    <div class="flex justify-between items-center mb-8">
        <p class="text-text-muted">Manage your membership plans and pricing.</p>
        <a href="{{ route('packages.create') }}" class="btn-premium">
            Add New Package
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 glass-card border-accent/30 text-accent animate-fade-in text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($packages as $package)
            <div class="glass-card overflow-hidden flex flex-col">
                <div class="p-8 border-b border-glass-border">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold uppercase tracking-tight text-accent">{{ $package->name }}</h3>
                        <span class="text-xs bg-accent/10 text-accent px-2 py-1 rounded font-bold uppercase">{{ $package->duration_days }} Days</span>
                    </div>
                    <div class="flex items-baseline gap-1 mt-4">
                        <span class="text-3xl font-black text-main">${{ number_format($package->price, 0) }}</span>
                        <span class="text-text-muted text-sm font-medium">/ duration</span>
                    </div>
                </div>
                
                <div class="p-8 flex-1">
                    <ul class="space-y-4">
                        @foreach($package->features ?? [] as $feature)
                            <li class="flex items-center gap-3 text-sm">
                                <svg class="text-accent" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="p-4 bg-glass border-t border-glass-border flex gap-2">
                    <a href="{{ route('packages.edit', $package) }}" class="flex-1 text-center py-2 text-sm font-bold uppercase tracking-widest text-text-muted hover:text-main transition-colors">Edit</a>
                    <form action="{{ route('packages.destroy', $package) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-center py-2 text-sm font-bold uppercase tracking-widest text-red-500/70 hover:text-red-500 transition-colors" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 glass-card flex flex-col items-center justify-center text-text-muted">
                <svg class="mb-4 opacity-20" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                <p class="text-lg">No gym packages available yet.</p>
                <a href="{{ route('packages.create') }}" class="mt-4 text-accent font-bold hover:underline">Create your first package</a>
            </div>
        @endforelse
    </div>
</x-app-layout>
