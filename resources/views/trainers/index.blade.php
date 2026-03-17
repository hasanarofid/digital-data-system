<x-app-layout>
    <x-slot:title>Manage Trainers</x-slot:title>
    <x-slot name="header">
        Our Trainers
    </x-slot>

    <div class="flex justify-between items-center mb-8 text-text-muted">
        <p>Expert coaches and personal trainers.</p>
        <a href="{{ route('trainers.create') }}" class="btn-premium">
            Add New Trainer
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 glass-card border-accent/30 text-accent animate-fade-in text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($trainers as $trainer)
            <div class="glass-card overflow-hidden">
                <div class="relative h-48 bg-glass overflow-hidden">
                    @if($trainer->image_url)
                        <img src="{{ $trainer->image_url }}" alt="{{ $trainer->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-accent/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                    @endif
                    <div class="absolute bottom-4 left-4">
                        <span class="px-2 py-1 bg-accent text-dark text-[10px] font-black uppercase tracking-tighter rounded">{{ $trainer->specialty }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-main mb-2">{{ $trainer->name }}</h3>
                    <p class="text-sm text-text-muted line-clamp-2 mb-6">{{ $trainer->bio }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('trainers.edit', $trainer) }}" class="flex-1 py-2 bg-glass hover:bg-accent/10 text-text-muted hover:text-accent text-[10px] font-black uppercase tracking-widest rounded transition-all text-center flex items-center justify-center gap-1 border border-transparent hover:border-accent/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            Edit
                        </a>
                        <form action="{{ route('trainers.destroy', $trainer) }}" method="POST" class="flex-1" onsubmit="return confirm('Remove trainer and all associated data?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full py-2 bg-glass hover:bg-red-500/10 text-text-muted hover:text-red-500 text-[10px] font-black uppercase tracking-widest rounded transition-all flex items-center justify-center gap-1 border border-transparent hover:border-red-500/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 glass-card flex flex-col items-center justify-center text-text-muted">
                <p>No trainers added yet.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
