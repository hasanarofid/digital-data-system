<x-app-layout>
    <x-slot:title>Member Dashboard</x-slot:title>

    <x-slot name="header">
        <h2 class="font-black text-xl text-main leading-tight tracking-tight">
            MY <span class="text-accent">TITAN</span> PORTAL
        </h2>
    </x-slot>

    <div class="space-y-8 animate-fade-in text-main">
        <!-- Session Alerts -->
        @if(session('success'))
            <div class="glass-card p-4 border-l-4 border-l-emerald-500 bg-emerald-500/10 text-emerald-500 text-xs font-bold uppercase tracking-widest animate-fade-in">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="glass-card p-4 border-l-4 border-l-rose-500 bg-rose-500/10 text-rose-500 text-xs font-bold uppercase tracking-widest animate-fade-in">
                {{ session('error') }}
            </div>
        @endif

        <!-- Top Stats Bar -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Membership Status -->
            <div class="glass-card p-6 border-l-4 border-l-accent">
                <div class="text-[10px] font-black uppercase tracking-widest text-text-muted mb-2">Membership Status</div>
                <div class="flex items-center justify-between">
                    <div class="text-2xl font-black text-main">{{ strtoupper($membership?->status ?? 'Inactive') }}</div>
                    <div class="px-2 py-1 rounded bg-accent/10 border border-accent/20 text-accent text-[8px] font-black uppercase tracking-tighter">
                       {{ $membership?->package->name ?? 'Basic' }}
                    </div>
                </div>
            </div>

            <!-- Days Left -->
            <div class="glass-card p-6">
                <div class="text-[10px] font-black uppercase tracking-widest text-text-muted mb-2">Days Remaining</div>
                <div class="text-2xl font-black text-main">
                    @if($membership && $membership->end_date)
                        {{ floor(now()->diffInDays(\Carbon\Carbon::parse($membership->end_date), false)) }} Days
                    @else
                        0 Days
                    @endif
                </div>
            </div>

            <!-- Upcoming Sessions -->
            <div class="glass-card p-6">
                <div class="text-[10px] font-black uppercase tracking-widest text-text-muted mb-2">Total Bookings</div>
                <div class="text-2xl font-black text-main">{{ $myBookings->count() }}</div>
            </div>

            <!-- Daily Tip -->
            <div class="glass-card p-6 bg-accent/5">
                <div class="text-[10px] font-black uppercase tracking-widest text-accent mb-2">Titan Tip</div>
                <p class="text-[10px] font-bold text-main leading-relaxed italic">"Consistency beats intensity. Stay focused on your goals."</p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Upcoming Classes -->
            <div class="lg:col-span-2 space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-black uppercase tracking-[0.2em] text-main">AVAILABLE SESSIONS</h3>
                    <a href="{{ route('gym-classes.index') }}" class="text-[10px] font-black text-accent hover:underline uppercase tracking-widest">View All</a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($activeClasses as $class)
                        <div class="glass-card overflow-hidden group hover:border-accent/30 transition-all duration-300">
                            <div class="relative h-32 bg-background-alt overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent z-10"></div>
                                <div class="absolute bottom-4 left-4 z-20">
                                    <span class="px-2 py-1 bg-accent/20 border border-accent/30 backdrop-blur-md rounded text-accent text-[8px] font-black uppercase tracking-tighter mb-2 inline-block">
                                        {{ $class->category ?? 'Fitness' }}
                                    </span>
                                    <h4 class="text-sm font-black text-main uppercase tracking-tight">{{ $class->name }}</h4>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-[10px] text-text-muted mb-4 space-x-4">
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> {{ \Carbon\Carbon::parse($class->start_time)->format('H:i') }}</span>
                                    <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Room A</span>
                                </div>
                                <form action="{{ route('member.bookings.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="gym_class_id" value="{{ $class->id }}">
                                    <button type="submit" class="w-full py-3 bg-accent text-dark hover:bg-accent-light transition-all text-[10px] font-black tracking-[0.1em] uppercase rounded-lg shadow-[0_4px_15px_rgba(0,242,255,0.2)] hover:shadow-[0_8px_25px_rgba(0,242,255,0.4)] transform hover:-translate-y-0.5">
                                        BOOK SESSION
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 glass-card p-10 text-center">
                            <p class="text-text-muted text-xs font-bold uppercase tracking-widest">No classes scheduled today.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- My Recent Activity -->
            <div class="space-y-6">
                <h3 class="text-sm font-black uppercase tracking-[0.2em] text-main">RECENT ACTIVITY</h3>
                <div class="glass-card p-6">
                    <div class="flow-root">
                        <ul role="list" class="-mb-8">
                            @forelse($myBookings as $booking)
                                <li>
                                    <div class="relative pb-8">
                                        @if (!$loop->last)
                                            <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-glass-border" aria-hidden="true"></span>
                                        @endif
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-8 w-8 rounded-full bg-accent/20 flex items-center justify-center ring-4 ring-background">
                                                   <svg class="h-4 w-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </span>
                                            </div>
                                            <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                <div>
                                                    <p class="text-xs font-bold text-main">Attended <span class="text-accent">{{ $booking->gymClass->name }}</span></p>
                                                </div>
                                                <div class="whitespace-nowrap text-right text-[10px] font-bold text-text-muted uppercase">
                                                    {{ $booking->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <p class="text-center text-text-muted text-[10px] font-bold uppercase tracking-widest py-10">No recent activity.</p>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Profile Overview Card -->
                <div class="glass-card p-6 overflow-hidden relative">
                     <div class="absolute top-0 right-0 p-2">
                        <a href="{{ route('profile.edit') }}" class="text-text-muted hover:text-accent transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </a>
                    </div>
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-accent/20 flex items-center justify-center text-accent font-black text-xl">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-sm font-black text-main uppercase tracking-tight">{{ $user->name }}</div>
                            <div class="text-[10px] font-bold text-text-muted uppercase">Titan Member ID: #T-{{ $user->id }}</div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest border-b border-glass-border pb-2">
                            <span class="text-text-muted">Account Type</span>
                            <span class="text-main">Premium Tier</span>
                        </div>
                        <div class="flex justify-between text-[10px] font-bold uppercase tracking-widest border-b border-glass-border pb-2">
                             <span class="text-text-muted">Join Date</span>
                             <span class="text-main">{{ $user->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
