<x-app-layout>
    <x-slot name="header">
        Program Tracking
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-12 animate-fade-in pb-20">
        <!-- Dashboard Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-4">
            <div>
                <h2 class="text-3xl font-black text-main uppercase italic tracking-tight">Program Tracking</h2>
                <p class="text-text-muted uppercase text-[10px] font-bold tracking-[0.2em] mt-2">Pelacakan Peserta & Penerima Bantuan</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="glass-card px-4 py-2 flex items-center gap-3">
                    <div class="w-2 h-2 bg-accent rounded-full animate-pulse"></div>
                    <span class="text-[10px] font-black text-accent uppercase tracking-widest">Real-time Data Monitoring</span>
                </div>
            </div>
        </div>

        @foreach($programs as $program)
        @php
            $accents = [
                ['bg' => 'from-cyan-500/10 to-blue-500/5', 'text' => 'text-cyan-400', 'border' => 'border-cyan-500/20', 'glow' => 'rgba(6, 182, 212, 0.4)'],
                ['bg' => 'from-purple-500/10 to-indigo-500/5', 'text' => 'text-purple-400', 'border' => 'border-purple-500/20', 'glow' => 'rgba(168, 85, 247, 0.4)'],
                ['bg' => 'from-rose-500/10 to-orange-500/5', 'text' => 'text-rose-400', 'border' => 'border-rose-500/20', 'glow' => 'rgba(244, 63, 94, 0.4)']
            ];
            $theme = $accents[$loop->index % count($accents)];
        @endphp
        <div class="glass-card p-8 md:p-12 group hover:border-accent/40 transition-all duration-700 overflow-hidden relative border-l-4 {{ $theme['border'] }}">
            <!-- Dynamic Background Gradient -->
            <div class="absolute inset-0 bg-gradient-to-br {{ $theme['bg'] }} opacity-30 group-hover:opacity-50 transition-opacity"></div>
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-accent/5 rounded-full blur-3xl group-hover:bg-accent/15 transition-all duration-700"></div>
            
            <div class="relative z-10">
                <!-- Program Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-20">
                    <div class="inline-flex items-center gap-4 bg-glass border border-glass-border px-6 py-2.5 rounded-2xl shadow-sm">
                        <span class="text-[10px] font-black {{ $theme['text'] }} uppercase tracking-[0.3em]">PROGRAM #{{ $loop->iteration }}</span>
                        <div class="w-1.5 h-1.5 bg-accent rounded-full animate-ping"></div>
                    </div>
                    <h3 class="text-2xl font-black text-main uppercase italic tracking-tight">{{ $program->name }}</h3>
                </div>

                <!-- Timeline Visualization -->
                <div class="relative px-8 mb-20">
                    <!-- Progress Line (Dashed Base) -->
                    <div class="absolute top-6 left-16 right-16 h-0.5 border-t-2 border-dashed border-glass-border"></div>
                    <!-- Active Progress Line (Gradient) -->
                    <div class="absolute top-6 left-16 right-16 h-0.5 bg-gradient-to-r from-blue-500 to-emerald-500 transition-all duration-1000 origin-left" style="transform: scaleX({{ $program->participants_count > 0 ? ($program->recipients_count > 0 ? 1 : 0.5) : 0 }})"></div>

                    <div class="flex justify-between items-start relative z-10">
                        <!-- Node 1: Participants (Blue Theme) -->
                        <div class="flex flex-col items-center text-center w-48">
                            <div class="w-12 h-12 {{ $program->participants_count > 0 ? 'bg-blue-500 shadow-[0_0_25px_rgba(59,130,246,0.5)]' : 'bg-glass' }} rounded-full flex items-center justify-center border-4 border-bg transition-all duration-700 group-hover:scale-110">
                                @if($program->participants_count > 0)
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                @else
                                    <div class="w-2.5 h-2.5 bg-text-muted rounded-full"></div>
                                @endif
                            </div>
                            <div class="mt-6 bg-glass/40 backdrop-blur-sm p-4 rounded-2xl border border-glass-border w-full group-hover:border-blue-500/30 transition-colors">
                                <p class="text-[9px] font-black text-blue-400 uppercase tracking-[0.2em] mb-2">Registration Stage</p>
                                <h4 class="text-3xl font-black text-main leading-none mb-1">{{ number_format($program->participants_count) }}</h4>
                                <p class="text-[10px] text-text-muted font-bold uppercase tracking-widest">Total Participants</p>
                            </div>
                        </div>

                        <!-- Node 2: Aid Recipients (Green Theme) -->
                        <div class="flex flex-col items-center text-center w-48">
                            <div class="w-12 h-12 {{ $program->recipients_count > 0 ? 'bg-emerald-500 shadow-[0_0_25px_rgba(16,185,129,0.5)]' : 'bg-glass' }} rounded-full flex items-center justify-center border-4 border-bg transition-all duration-700 group-hover:scale-110">
                                @if($program->recipients_count > 0)
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                    <svg class="w-6 h-6 text-text-muted opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @endif
                            </div>
                            <div class="mt-6 bg-glass/40 backdrop-blur-sm p-4 rounded-2xl border border-glass-border w-full group-hover:border-emerald-500/30 transition-colors">
                                <p class="text-[9px] font-black text-emerald-400 uppercase tracking-[0.2em] mb-2">Distribution Stage</p>
                                <h4 class="text-3xl font-black text-main leading-none mb-1">{{ number_format($program->recipients_count) }}</h4>
                                <p class="text-[10px] text-text-muted font-bold uppercase tracking-widest">Aid Recipients</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Summary Banner -->
                <div class="relative overflow-hidden group/banner">
                    <div class="flex items-center justify-between p-6 bg-glass border border-glass-border rounded-2xl group-hover:border-accent/30 transition-all duration-500">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-accent/10 rounded-xl flex items-center justify-center text-accent">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-main uppercase tracking-[0.2em]">Verified Tracking Protocol</p>
                                <p class="text-[8px] text-text-muted font-bold uppercase">System integrity check passed</p>
                            </div>
                        </div>
                        <div class="text-right">
                            @php $percentage = $program->participants_count > 0 ? round(($program->recipients_count / $program->participants_count) * 100) : 0; @endphp
                            <p class="text-2xl font-black text-main leading-none">{{ $percentage }}%</p>
                            <p class="text-[8px] text-accent font-black uppercase tracking-widest">Completion</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</x-app-layout>
