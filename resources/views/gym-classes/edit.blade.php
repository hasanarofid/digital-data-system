<x-app-layout>
    <x-slot:title>Edit Class</x-slot:title>
    <x-slot name="header">
        Edit Class: {{ $gymClass->name }}
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('gym-classes.update', $gymClass) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Class Name</label>
                        <input type="text" name="name" value="{{ old('name', $gymClass->name) }}" class="premium-input" required>
                        @error('name') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Description</label>
                        <textarea name="description" rows="3" class="premium-input">{{ old('description', $gymClass->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Trainer</label>
                        <select name="trainer_id" class="premium-input appearance-none bg-glass" required>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}" class="bg-bg-dark" {{ old('trainer_id', $gymClass->trainer_id) == $trainer->id ? 'selected' : '' }}>
                                    {{ $trainer->name }} ({{ $trainer->specialty }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Day of Week</label>
                        <select name="day_of_week" class="premium-input appearance-none bg-glass" required>
                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                <option value="{{ $day }}" class="bg-bg-dark" {{ old('day_of_week', $gymClass->day_of_week) == $day ? 'selected' : '' }}>{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Start Time</label>
                        <input type="time" name="start_time" value="{{ old('start_time', $gymClass->start_time) }}" class="premium-input" required>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">End Time</label>
                        <input type="time" name="end_time" value="{{ old('end_time', $gymClass->end_time) }}" class="premium-input" required>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Capacity</label>
                        <input type="number" name="capacity" value="{{ old('capacity', $gymClass->capacity) }}" class="premium-input" required min="1">
                    </div>
                </div>

                <div class="pt-6 border-t border-glass-border flex justify-end gap-4">
                    <a href="{{ route('gym-classes.index') }}" class="nav-link py-2 px-6">Cancel</a>
                    <button type="submit" class="btn-premium py-2 px-8 text-[10px] tracking-widest font-black">
                        SAVE SCHEDULE
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
