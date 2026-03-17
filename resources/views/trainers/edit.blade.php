<x-app-layout>
    <x-slot:title>Edit Trainer</x-slot:title>
    <x-slot name="header">
        Edit Trainer: {{ $trainer->name }}
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('trainers.update', $trainer) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $trainer->name) }}" class="premium-input" required>
                        @error('name') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Specialty</label>
                        <input type="text" name="specialty" value="{{ old('specialty', $trainer->specialty) }}" class="premium-input" required>
                        @error('specialty') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Biography</label>
                        <textarea name="bio" rows="4" class="premium-input">{{ old('bio', $trainer->bio) }}</textarea>
                        @error('bio') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Avatar URL (Optional)</label>
                        <input type="url" name="image_url" value="{{ old('image_url', $trainer->image_url) }}" class="premium-input">
                        @error('image_url') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-glass-border flex justify-end gap-4">
                    <a href="{{ route('trainers.index') }}" class="nav-link py-2 px-6">Cancel</a>
                    <button type="submit" class="btn-premium py-2 px-8 text-[10px] tracking-widest font-black">
                        SAVE CHANGES
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
