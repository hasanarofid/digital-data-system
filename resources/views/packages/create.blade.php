<x-app-layout>
    <x-slot name="header">
        Create Package
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Package Name</label>
                        <input type="text" name="name" class="premium-input" placeholder="e.g. Pro Membership" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Price ($)</label>
                            <input type="number" name="price" class="premium-input" placeholder="99" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Duration (Days)</label>
                            <input type="number" name="duration_days" class="premium-input" placeholder="30" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-widest text-text-muted mb-2">Features</label>
                        <div id="features-container" class="space-y-3">
                            <div class="flex gap-2">
                                <input type="text" name="features[]" class="premium-input" placeholder="Unlimited Gym Access">
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-500/50 hover:text-red-500 p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" onclick="addFeature()" class="mt-4 text-xs font-bold text-accent uppercase tracking-widest hover:underline">+ Add Feature</button>
                    </div>

                    <div class="pt-6 border-t border-glass-border flex gap-4">
                        <button type="submit" class="btn-premium flex-1">Save Package</button>
                        <a href="{{ route('packages.index') }}" class="flex-1 text-center py-3 text-xs font-bold uppercase tracking-widest text-text-muted hover:text-main border border-glass-border rounded-lg transition-all">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addFeature() {
            const container = document.getElementById('features-container');
            const div = document.createElement('div');
            div.className = 'flex gap-2 animate-fade-in';
            div.innerHTML = `
                <input type="text" name="features[]" class="premium-input" placeholder="New Feature">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500/50 hover:text-red-500 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                </button>
            `;
            container.appendChild(div);
        }
    </script>
</x-app-layout>
