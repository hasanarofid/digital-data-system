<x-app-layout>
    <x-slot:title>Add New Class</x-slot:title>
    <x-slot name="header">
        Schedule New Class
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('gym-classes.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Class Name</label>
                        <input type="text" name="name" class="premium-input" placeholder="e.g. HIIT Morning" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Trainer</label>
                        <select name="trainer_id" class="premium-input" required>
                            <option value="">Select a coach</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }} ({{ $trainer->specialty }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Day of Week</label>
                            <select name="day_of_week" class="premium-input" required>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Capacity</label>
                            <input type="number" name="capacity" class="premium-input" value="20" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Start Time</label>
                            <input type="time" name="start_time" class="premium-input" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">End Time</label>
                            <input type="time" name="end_time" class="premium-input" required>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-glass-border flex gap-4">
                        <button type="submit" class="btn-premium flex-1">Schedule Class</button>
                        <a href="{{ route('gym-classes.index') }}" class="flex-1 text-center py-3 text-xs font-bold uppercase tracking-widest text-text-muted hover:text-main border border-glass-border rounded-lg transition-all">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
