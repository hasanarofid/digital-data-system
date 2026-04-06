<x-app-layout>
    <x-slot name="header">
        Admin Dashboard
    </x-slot>

    <div class="space-y-10">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card p-8 flex items-center gap-6 group hover:border-accent/40 transition-all">
                <div class="w-14 h-14 bg-accent/10 rounded-2xl flex items-center justify-center text-accent group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-text-muted uppercase font-black tracking-widest mb-1">Total Data</p>
                    <h3 class="text-3xl font-black text-main">{{ $totalData }}</h3>
                </div>
            </div>

            <div class="glass-card p-8 flex items-center gap-6 group hover:border-accent/40 transition-all">
                <div class="w-14 h-14 bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-text-muted uppercase font-black tracking-widest mb-1">Program</p>
                    <h3 class="text-3xl font-black text-main">{{ $totalPrograms }}</h3>
                </div>
            </div>

            <div class="glass-card p-8 flex items-center gap-6 group hover:border-accent/40 transition-all">
                <div class="w-14 h-14 bg-green-500/10 rounded-2xl flex items-center justify-center text-green-500 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-text-muted uppercase font-black tracking-widest mb-1">Terverifikasi</p>
                    <h3 class="text-3xl font-black text-main">{{ \App\Models\DigitalData::where('status', 'verified')->count() }}</h3>
                </div>
            </div>

            <div class="glass-card p-8 flex items-center gap-6 group hover:border-accent/40 transition-all">
                <div class="w-14 h-14 bg-yellow-500/10 rounded-2xl flex items-center justify-center text-yellow-500 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-text-muted uppercase font-black tracking-widest mb-1">Pending</p>
                    <h3 class="text-3xl font-black text-main">{{ \App\Models\DigitalData::where('status', 'pending')->count() }}</h3>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Chart & Program Stats -->
            <div class="lg:col-span-2 space-y-8">
                <div class="glass-card p-8">
                    <div class="flex justify-between items-center mb-8 text-nowrap">
                        <h3 class="text-xs font-black text-main uppercase tracking-widest italic">Trend Data per Program</h3>
                    </div>
                    <div class="h-[300px] relative">
                        <canvas id="programChart"></canvas>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="glass-card p-8">
                        <h3 class="text-xs font-black text-main uppercase tracking-widest italic mb-8">Status Verifikasi</h3>
                        <div class="h-[200px] relative">
                            <canvas id="statusChart"></canvas>
                        </div>
                    </div>
                    <div class="glass-card p-8 flex flex-col justify-center">
                        <h3 class="text-xs font-black text-main uppercase tracking-widest italic mb-6">Visualisasi Program</h3>
                        <div class="space-y-5">
                            @foreach($dataByProgram as $stat)
                            <div>
                                <div class="flex justify-between text-[9px] uppercase font-bold tracking-widest mb-1.5">
                                    <span class="text-text-muted transition-colors hover:text-accent cursor-default">{{ $stat->program->name }}</span>
                                    <span class="text-accent">{{ $stat->count }} Data</span>
                                </div>
                                <div class="w-full bg-glass h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-accent h-full rounded-full transition-all duration-1000" style="width: {{ ($stat->count / max($totalData, 1)) * 100 }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Recent Activity -->
            <div class="space-y-8">
                <div class="glass-card p-8">
                    <div class="flex justify-between items-end mb-6">
                        <h3 class="text-sm font-black text-main uppercase tracking-widest italic">Entri Terbaru</h3>
                        <a href="{{ route('admin.list') }}" class="text-[10px] text-accent font-black uppercase tracking-widest hover:underline">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        @foreach($recentData->take(6) as $item)
                        <div class="flex items-center gap-4 p-3 bg-glass rounded-xl border border-glass-border hover:bg-glass/60 transition-colors">
                            @if($item->ktp_photo)
                                <img src="{{ Storage::url($item->ktp_photo) }}" class="w-10 h-10 rounded-lg object-cover shadow-lg border border-glass-border">
                            @else
                                <div class="w-10 h-10 bg-glass/40 rounded-lg flex items-center justify-center text-[10px] text-text-muted italic">No Img</div>
                            @endif
                            <div class="flex-1">
                                <p class="text-[11px] font-black text-main uppercase truncate">{{ $item->name }}</p>
                                <p class="text-[9px] text-accent font-bold uppercase tracking-widest">{{ $item->program->name }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[9px] text-text-muted">{{ $item->created_at->diffForHumans() }}</p>
                                <span class="text-[8px] px-1.5 py-0.5 rounded uppercase font-black {{ $item->status == 'pending' ? 'bg-yellow-500/20 text-yellow-500' : 'bg-green-500/20 text-green-500' }}">
                                    {{ $item->status }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="glass-card p-8 bg-accent/5 overflow-hidden group">
                    <div class="flex justify-between items-start mb-10">
                        <div>
                            <h4 class="text-xl font-black text-accent uppercase italic leading-none">Cetak Laporan</h4>
                            <p class="text-[10px] text-text-muted uppercase font-bold tracking-widest mt-2">Export ke PDF / Excel</p>
                        </div>
                        <div class="w-10 h-10 bg-accent text-bg flex items-center justify-center rounded-lg shadow-lg shadow-accent/20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.report') }}" target="_blank" class="block w-full py-4 bg-accent text-center text-bg text-[10px] font-black uppercase tracking-[0.2em] rounded-xl hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl shadow-accent/20">Download Report</a>
                    <svg class="absolute -right-10 -bottom-10 w-40 h-40 text-accent/5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Program Chart (Line)
            const programCtx = document.getElementById('programChart').getContext('2d');
            const programGradient = programCtx.createLinearGradient(0, 0, 0, 300);
            programGradient.addColorStop(0, 'rgba(52, 211, 153, 0.4)');
            programGradient.addColorStop(1, 'rgba(52, 211, 153, 0.05)');

            new Chart(programCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dataByProgram->map(fn($s) => $s->program->name)) !!},
                    datasets: [{
                        label: 'Jumlah Data',
                        data: {!! json_encode($dataByProgram->map(fn($s) => $s->count)) !!},
                        borderColor: '#34d399',
                        backgroundColor: programGradient,
                        borderWidth: 4,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#34d399',
                        pointBorderColor: '#0a0a0b',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(255, 255, 255, 0.05)' },
                            ticks: { color: 'rgba(255, 255, 255, 0.4)', font: { size: 10, weight: 'bold' } }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: 'rgba(255, 255, 255, 0.4)', font: { size: 10, weight: 'bold' } }
                        }
                    }
                }
            });

            // Status Chart (Doughnut)
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Verified', 'Pending'],
                    datasets: [{
                        data: [
                            {{ \App\Models\DigitalData::where('status', 'verified')->count() }},
                            {{ \App\Models\DigitalData::where('status', 'pending')->count() }}
                        ],
                        backgroundColor: ['#10b981', '#f59e0b'],
                        borderWidth: 0,
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: 'rgba(255, 255, 255, 0.6)',
                                font: { size: 9, weight: 'bold' },
                                boxWidth: 10,
                                padding: 20
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
