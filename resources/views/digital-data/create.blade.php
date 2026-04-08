<x-app-layout>
    <x-slot name="header">
        Input Data Baru
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="glass-card p-8">
            <form action="{{ route('digital-data.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-xs font-black text-text-muted mb-3 uppercase tracking-[0.2em]">Program / Kegiatan</label>
                        <select name="program_id" class="premium-input text-base" required>
                            <option value="">Pilih Program</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                        @error('program_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-black text-text-muted mb-3 uppercase tracking-[0.2em]">Nama Lengkap (Sesuai KTP)</label>
                        <input type="text" name="name" class="premium-input text-base" placeholder="Masukkan nama lengkap" required>
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-black text-text-muted mb-3 uppercase tracking-[0.2em]">Nomor HP / WhatsApp</label>
                        <input type="tel" name="phone_number" class="premium-input text-base" placeholder="08xxxxxxxx" required>
                        @error('phone_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-black text-text-muted mb-3 uppercase tracking-[0.2em]">Wilayah / Regional</label>
                        <input type="text" name="region" class="premium-input text-base" placeholder="Kota / Kecamatan" required>
                        @error('region') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-black text-text-muted mb-3 uppercase tracking-[0.2em]">Pekerjaan</label>
                            <input type="text" name="occupation" class="premium-input text-base" placeholder="Buruh, PNS, dll" required>
                            @error('occupation') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-black text-text-muted mb-3 uppercase tracking-[0.2em]">Kegiatan Spesifik</label>
                            <input type="text" name="activity" class="premium-input text-base" placeholder="Pembagian Sembako" required>
                            @error('activity') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="p-8 border-2 border-dashed border-glass-border rounded-2xl bg-glass/20 flex flex-col items-center justify-center text-center transition-all hover:border-accent/40 active:scale-[0.98]">
                    <label class="w-full cursor-pointer">
                        <input type="file" name="ktp_photo" class="hidden" accept="image/*" id="ktp_input" required>
                        <div id="ktp_preview" class="mb-4 flex justify-center">
                            <div class="w-20 h-20 bg-accent/10 rounded-full flex items-center justify-center text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            </div>
                        </div>
                        <span class="text-xs font-black text-main uppercase tracking-[0.2em]">Ambil / Upload Foto KTP</span>
                        <p class="text-[10px] text-text-muted mt-2 opacity-60 uppercase font-bold tracking-widest">Klik untuk mengakses kamera</p>
                    </label>
                </div>
                @error('ktp_photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                <button type="submit" class="btn-premium w-full py-4 text-sm">
                    Simpan Data Sekarang
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('ktp_input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('ktp_preview').innerHTML = `<img src="${event.target.result}" class="h-32 w-auto rounded-lg shadow-lg">`;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
