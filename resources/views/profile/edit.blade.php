<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya — Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Lora:ital,wght@0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'], serif: ['Lora', 'serif'] },
                    colors: {
                        green: { DEFAULT: '#2D7D52', mid: '#4A9B6F', soft: '#E8F5EE' },
                        brand: { text: '#1E2A1E', muted: '#6B7B6B', border: '#E2EBE2', bg: '#FAFAF8' },
                    }
                }
            }
        }
    </script>
    <style>
        .step-inactive { display: none; }
        .mode-view .edit-only { display: none; }
        .mode-edit .view-only { display: none; }
        /* Tombol back hanya muncul di view mode */
        .mode-edit .back-btn { display: none; }
    </style>
</head>
<body class="bg-brand-bg text-brand-text font-sans min-h-screen py-10 px-4 mode-view" id="mainBody">

    <div class="max-w-3xl mx-auto">
        {{-- Top Navigation --}}
        <div class="flex justify-between items-center mb-6">
            {{-- Tombol Back --}}
          <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-selaras-green transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            Kembali
        </a>
            <div class="edit-only"></div> {{-- Spacer saat edit mode agar button edit tetap di kanan --}}
        </div>

        {{-- Header --}}
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="font-serif text-3xl font-semibold text-brand-text">Profil Ta'aruf</h1>
                <p class="text-brand-muted text-xs mt-2 uppercase tracking-[2px]">Kelola informasi publik kamu</p>
            </div>
            <button onclick="toggleMode()" id="toggleBtn" class="bg-white border border-brand-border px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-brand-bg transition-all shadow-sm active:scale-95">
                <span class="view-only text-green">Edit Profil</span>
                <span class="edit-only text-red-500">Batal Edit</span>
            </button>
        </div>

        <div class="bg-white rounded-[32px] border border-brand-border shadow-sm overflow-hidden">
            {{-- Progress Bar (Hanya muncul saat edit) --}}
            <div class="edit-only bg-green-soft/30 px-8 py-4 border-b border-brand-border flex justify-between items-center">
                <div class="flex gap-2">
                    <div id="dot-1" class="w-8 h-2 rounded-full bg-green transition-all"></div>
                    <div id="dot-2" class="w-8 h-2 rounded-full bg-brand-border transition-all"></div>
                    <div id="dot-3" class="w-8 h-2 rounded-full bg-brand-border transition-all"></div>
                </div>
                <span id="step-label" class="text-[10px] font-bold text-green uppercase tracking-widest">Identitas Diri</span>
            </div>

            <form method="POST" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                {{-- Profile Info --}}
                <div class="flex items-center gap-6 mb-8 pb-8 border-b border-brand-border/50">
                    <div class="w-20 h-20 bg-green-soft rounded-[24px] flex items-center justify-center text-green relative group overflow-hidden">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <label class="edit-only absolute inset-0 bg-black/40 flex items-center justify-center cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <input type="file" name="foto_profil" class="hidden">
                        </label>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">{{ auth()->user()->name }}</h2>
                        <p class="text-brand-muted text-sm">{{ $profile->kota_domisili }}, {{ $profile->alamat_domisili }}</p>
                    </div>
                </div>

                {{-- STEP 1: Identitas & Fisik --}}
                <div id="step-1" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider text-green">Jenis Kelamin</label>
                            <div class="view-only text-sm font-medium">{{ ucfirst($profile->jenis_kelamin) }}</div>
                            <select name="jenis_kelamin" class="edit-only w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                                <option value="laki-laki" {{ $profile->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ $profile->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold uppercase tracking-wider text-green">Domisili</label>
                            <div class="view-only text-sm font-medium">{{ $profile->kota_domisili }}, {{ $profile->alamat_domisili }}</div>
                            <div class="edit-only grid grid-cols-2 gap-2">
                                <input type="text" name="alamat_domisili" value="{{ $profile->alamat_domisili }}" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                                <input name="kota_domisili" value="{{ $profile->kota_domisili }}" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 bg-brand-bg/50 p-4 rounded-2xl">
                        <div class="text-center md:text-left">
                            <label class="block text-[10px] font-bold uppercase text-brand-muted mb-1">Tinggi</label>
                            <span class="view-only text-sm font-bold">{{ $profile->tinggi_badan }} cm</span>
                            <input name="tinggi_badan" type="number" value="{{ $profile->tinggi_badan }}" class="edit-only w-full bg-white border border-brand-border p-2 rounded-lg text-sm text-center">
                        </div>
                        <div class="text-center md:text-left">
                            <label class="block text-[10px] font-bold uppercase text-brand-muted mb-1">Berat</label>
                            <span class="view-only text-sm font-bold">{{ $profile->berat_badan }} kg</span>
                            <input name="berat_badan" type="number" value="{{ $profile->berat_badan }}" class="edit-only w-full bg-white border border-brand-border p-2 rounded-lg text-sm text-center">
                        </div>
                        <div class="text-center md:text-left">
                            <label class="block text-[10px] font-bold uppercase text-brand-muted mb-1">Suku</label>
                            <span class="view-only text-sm font-bold">{{ $profile->suku }}</span>
                            <input name="suku" value="{{ $profile->suku }}" class="edit-only w-full bg-white border border-brand-border p-2 rounded-lg text-sm text-center">
                        </div>
                        <div class="text-center md:text-left">
                            <label class="block text-[10px] font-bold uppercase text-brand-muted mb-1">Kulit</label>
                            <span class="view-only text-sm font-bold">{{ $profile->warna_kulit }}</span>
                            <input name="warna_kulit" value="{{ $profile->warna_kulit }}" class="edit-only w-full bg-white border border-brand-border p-2 rounded-lg text-sm text-center">
                        </div>
                    </div>
                </div>

                {{-- STEP 2: Deskripsi --}}
                <div id="step-2" class="step-inactive mode-view:block space-y-6 mt-6">
                     <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-green">Tentang Saya</label>
                        <p class="view-only text-sm leading-relaxed text-brand-muted italic">"{{ $profile->deskripsi_diri }}"</p>
                        <textarea name="deskripsi_diri" class="edit-only w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-32">{{ $profile->deskripsi_diri }}</textarea>
                    </div>
                </div>

                {{-- STEP 3: Visi & Misi --}}
                <div id="step-3" class="step-inactive mode-view:block space-y-6 mt-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-green">Kriteria Pasangan</label>
                        <p class="view-only text-sm leading-relaxed">{{ $profile->kriteria_pasangan }}</p>
                        <textarea name="kriteria_pasangan" class="edit-only w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-32">{{ $profile->kriteria_pasangan }}</textarea>
                    </div>
                </div>

                {{-- Navigasi Edit --}}
                <div class="edit-only mt-10 flex gap-4 border-t border-brand-border pt-8">
                    <button type="button" id="prevBtn" class="hidden flex-1 border border-brand-border text-brand-muted py-4 rounded-full font-bold text-xs uppercase tracking-widest transition-all hover:bg-brand-bg">Kembali</button>
                    <button type="button" id="nextBtn" class="flex-[2] bg-green text-white py-4 rounded-full font-bold text-xs uppercase tracking-widest shadow-lg shadow-green/20">Lanjut</button>
                    <button type="submit" id="submitBtn" class="hidden flex-[2] bg-green text-white py-4 rounded-full font-bold text-xs uppercase tracking-widest shadow-lg shadow-green/20">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleMode() {
            const body = document.getElementById('mainBody');
            body.classList.toggle('mode-view');
            body.classList.toggle('mode-edit');
            
            if(body.classList.contains('mode-edit')) {
                currentStep = 1;
                updateSteps();
            } else {
                document.querySelectorAll('[id^="step-"]').forEach(s => s.classList.remove('step-inactive'));
            }
        }

        let currentStep = 1;
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');
        const label = document.getElementById('step-label');

        function updateSteps() {
            if(document.getElementById('mainBody').classList.contains('mode-view')) return;

            document.querySelectorAll('[id^="step-"]').forEach(s => s.classList.add('step-inactive'));
            document.getElementById(`step-${currentStep}`).classList.remove('step-inactive');
            
            document.querySelectorAll('[id^="dot-"]').forEach((d, i) => {
                d.classList.toggle('bg-green', i < currentStep);
                d.classList.toggle('bg-brand-border', i >= currentStep);
            });

            prevBtn.classList.toggle('hidden', currentStep === 1);
            if(currentStep === 3) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
                label.innerText = 'Visi & Kriteria';
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
                label.innerText = currentStep === 1 ? 'Identitas Diri' : 'Kepribadian';
            }
        }

        nextBtn.onclick = () => { currentStep++; updateSteps(); };
        prevBtn.onclick = () => { currentStep--; updateSteps(); };
        
        document.querySelectorAll('[id^="step-"]').forEach(s => s.classList.remove('step-inactive'));
    </script>
</body>
</html>