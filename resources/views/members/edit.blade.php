<x-app-layout>
    <x-slot:title>Edit Member</x-slot:title>
    <x-slot name="header">
        Edit Member: {{ $member->name }}
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('members.update', $member) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $member->name) }}" class="premium-input" required>
                        @error('name') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $member->email) }}" class="premium-input" required>
                        @error('email') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $member->phone) }}" class="premium-input">
                        @error('phone') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Membership Package</label>
                        <select name="package_id" class="premium-input appearance-none bg-glass cursor-pointer" required>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}" class="bg-bg-dark" {{ old('package_id', $member->membership?->package_id) == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }} ({{ $package->duration_days }} Days - ${{ number_format($package->price, 2) }})
                                </option>
                            @endforeach
                        </select>
                        @error('package_id') <p class="text-red-500 text-[10px] mt-1 uppercase font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-text-muted mb-2">Status</label>
                        <select name="status" class="premium-input appearance-none bg-glass cursor-pointer" required>
                            <option value="1" class="bg-bg-dark" {{ old('status', $member->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" class="bg-bg-dark" {{ old('status', $member->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="pt-6 border-t border-glass-border flex justify-end gap-4">
                    <a href="{{ route('members.index') }}" class="nav-link py-2 px-6">Cancel</a>
                    <button type="submit" class="btn-premium py-2 px-8 text-[10px] tracking-widest">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
