<x-app-layout>
    <x-slot:title>Class Schedule</x-slot:title>
    <x-slot name="header">
        Class Schedule
    </x-slot>

    <div class="flex justify-between items-center mb-8 text-text-muted">
        <p>Book your spot in our professional fitness classes.</p>
        <a href="{{ route('gym-classes.create') }}" class="btn-premium">
            Schedule New Class
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 glass-card border-accent/30 text-accent animate-fade-in text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div x-data="{ activeTab: '{{ now()->format('l') }}' }" class="space-y-8">
        <!-- Day Tabs -->
        <div class="flex flex-wrap gap-2 pb-4 border-b border-glass-border">
            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                <button 
                    @click="activeTab = '{{ $day }}'"
                    :class="activeTab === '{{ $day }}' ? 'bg-accent text-dark' : 'bg-glass text-text-muted hover:text-main'"
                    class="px-4 py-2 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all"
                >
                    {{ substr($day, 0, 3) }}
                </button>
            @endforeach
        </div>

        <!-- Class Cards -->
        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
            <div x-show="activeTab === '{{ $day }}'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in">
                @php $dayClasses = $classes->where('day_of_week', $day); @endphp
                
                @forelse($dayClasses as $class)
                    <div class="glass-card p-6 group relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-accent/5 -rotate-45 translate-x-12 -translate-y-12"></div>
                        
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-accent/10 rounded-lg text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-main">
                                    {{ date('H:i', strtotime($class->start_time)) }} - {{ date('H:i', strtotime($class->end_time)) }}
                                </span>
                            </div>
                            <span class="px-2 py-1 bg-glass text-text-muted text-[8px] font-black rounded border border-glass-border uppercase tracking-widest">
                                {{ $class->capacity }} Max
                            </span>
                        </div>

                        <h4 class="text-xl font-black text-main mb-2 group-hover:text-accent transition-colors tracking-tight">{{ $class->name }}</h4>
                        
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-8 h-8 rounded-full bg-accent/20 flex items-center justify-center text-[10px] font-black text-accent uppercase border border-accent/30">
                                {{ substr($class->trainer->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="text-[10px] font-bold text-main leading-tight">{{ $class->trainer->name }}</div>
                                <div class="text-[8px] text-text-muted uppercase tracking-widest">{{ $class->trainer->specialty }}</div>
                            </div>
                        </div>
                        
                        <div class="pt-6 border-t border-glass-border flex gap-2">
                            @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                                <a href="{{ route('gym-classes.edit', $class) }}" class="flex-1 py-2.5 bg-glass hover:bg-accent/10 text-text-muted hover:text-accent text-[9px] font-black uppercase tracking-widest rounded-lg transition-all text-center flex items-center justify-center gap-2 border border-glass-border hover:border-accent/30">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    Edit
                                </a>
                                <form action="{{ route('gym-classes.destroy', $class) }}" method="POST" class="flex-1" onsubmit="return confirm('Remove this class from schedule?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full py-2.5 bg-glass hover:bg-red-500/10 text-text-muted hover:text-red-500 text-[9px] font-black uppercase tracking-widest rounded-lg transition-all flex items-center justify-center gap-2 border border-glass-border hover:border-red-500/30">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        Delete
                                    </button>
                                </form>
                            @elseif(auth()->user()->isMember())
                                <form action="{{ route('member.bookings.store') }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="gym_class_id" value="{{ $class->id }}">
                                    <button type="submit" class="w-full py-2.5 bg-accent hover:bg-accent/80 text-dark text-[9px] font-black uppercase tracking-widest rounded-lg transition-all flex items-center justify-center gap-2 shadow-[0_4px_15px_rgba(0,242,255,0.2)]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"></path></svg>
                                        Reserve Spot
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-12 glass-card flex flex-col items-center justify-center text-center">
                        <div class="w-16 h-16 bg-glass rounded-full flex items-center justify-center mb-4 text-text-muted/30">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <h4 class="text-sm font-bold text-main mb-1">No Classes Scheduled</h4>
                        <p class="text-xs text-text-muted">Take a break or schedule a new class for this day.</p>
                    </div>
                @endforelse
            </div>
        @endforeach
    </div>

    <!-- Interactivity Script -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>
