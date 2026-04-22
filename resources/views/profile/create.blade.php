<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengkapi CV — Selaras</title>
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
    </style>
</head>
<body class="bg-brand-bg text-brand-text font-sans min-h-screen py-10 px-4">

    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="font-serif text-3xl font-semibold text-brand-text">Buat CV Profil</h1>
            <p class="text-brand-muted text-xs mt-2 uppercase tracking-[2px]">Lengkapi data untuk keperluan ta'aruf</p>
        </div>

        <div class="bg-white rounded-[32px] border border-brand-border shadow-sm overflow-hidden">
            {{-- Progress Bar --}}
            <div class="bg-green-soft/30 px-8 py-4 border-b border-brand-border flex justify-between items-center">
                <div class="flex gap-2">
                    <div id="dot-1" class="w-8 h-2 rounded-full bg-green transition-all"></div>
                    <div id="dot-2" class="w-8 h-2 rounded-full bg-brand-border transition-all"></div>
                    <div id="dot-3" class="w-8 h-2 rounded-full bg-brand-border transition-all"></div>
                </div>
                <span id="step-label" class="text-[10px] font-bold text-green uppercase tracking-widest">Identitas Diri</span>
            </div>

            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="p-8 md:p-10">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-100 text-red-600 p-4 mb-6 rounded-2xl text-xs font-medium">
                        <ul class="list-disc ml-4">
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                {{-- SECTION 1: Identitas & Fisik --}}
                <div id="step-1" class="space-y-5">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold uppercase tracking-wider ml-1">Foto Profil</label>
                        <input type="file" name="foto_profil" required class="w-full bg-brand-bg border border-brand-border p-2.5 rounded-xl text-xs">
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold uppercase tracking-wider ml-1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" required class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                                <option value="">Pilih</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        {{-- NAH INI DIA COK YANG KETINGGALAN --}}
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold uppercase tracking-wider ml-1">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm outline-none focus:border-green">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1.5 relative">
                            <label class="text-xs font-bold uppercase tracking-wider ml-1">Provinsi</label>
                            <input type="text" id="searchProvinsi" placeholder="Cari provinsi..." class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm outline-none focus:border-green">
                            <div id="dropdownProvinsi" class="absolute z-50 w-full bg-white border border-brand-border rounded-xl mt-1 max-h-48 overflow-y-auto hidden shadow-lg"></div>
                            <input type="hidden" name="alamat_domisili" id="selectedProvinsi">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold uppercase tracking-wider ml-1">Kota Domisili</label>
                            <input name="kota_domisili" required placeholder="Contoh: Malang" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <input name="tinggi_badan" type="number" required placeholder="Tinggi (cm)" class="bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                        <input name="berat_badan" type="number" required placeholder="Berat (kg)" class="bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                        <input name="suku" required placeholder="Suku" class="bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                        <input name="warna_kulit" required placeholder="Warna Kulit" class="bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                    </div>
                </div>

                {{-- SECTION 2: Deskripsi --}}
                <div id="step-2" class="step-inactive space-y-5">
                    <textarea name="deskripsi_diri" required placeholder="Deskripsi diri (Ceritakan tentang dirimu)" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-24"></textarea>
                    <div class="grid md:grid-cols-2 gap-4">
                        <textarea name="kelebihan" required placeholder="Kelebihan kamu..." class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-20"></textarea>
                        <textarea name="kekurangan" required placeholder="Kekurangan kamu..." class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-20"></textarea>
                    </div>
                    <textarea name="hobi" required placeholder="Hobi & Kegemaran" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-20"></textarea>
                    <textarea name="organisasi" required placeholder="Pengalaman Organisasi" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-20"></textarea>
                </div>

                {{-- SECTION 3: Pernikahan --}}
                <div id="step-3" class="step-inactive space-y-5">
                    <textarea name="aktivitas_harian" required placeholder="Aktivitas Harian (Kerja/Kuliah/Kajian)" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-20"></textarea>
                    <textarea name="riwayat_penyakit" required placeholder="Riwayat Penyakit (Tulis 'Tidak ada' jika sehat)" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-20"></textarea>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <select name="status_pernikahan" required class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                            <option value="">Status Pernikahan</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Pernah Menikah">Pernah Menikah</option>
                        </select>
                        <input name="jumlah_anak" type="number" required placeholder="Jumlah Anak" class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm">
                    </div>
                    
                    <textarea name="visi_misi_pernikahan" required placeholder="Visi Misi Pernikahan kamu..." class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-24"></textarea>
                    <textarea name="kriteria_pasangan" required placeholder="Kriteria pasangan yang dicari..." class="w-full bg-brand-bg border border-brand-border p-3 rounded-xl text-sm h-24"></textarea>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="button" id="prevBtn" class="hidden flex-1 border border-brand-border text-brand-muted py-3.5 rounded-full font-bold text-xs uppercase tracking-widest">Kembali</button>
                    <button type="button" id="nextBtn" class="flex-[2] bg-green text-white py-3.5 rounded-full font-bold text-xs uppercase tracking-widest shadow-lg shadow-green/20">Lanjut</button>
                    <button type="submit" id="submitBtn" class="hidden flex-[2] bg-green text-white py-3.5 rounded-full font-bold text-xs uppercase tracking-widest shadow-lg shadow-green/20">Simpan Profil</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // JS-nya masih sama kayak tadi, tinggal lanjutin aja.
        let currentStep = 1;
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');
        const label = document.getElementById('step-label');

        function updateSteps() {
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

        nextBtn.onclick = () => { currentStep++; updateSteps(); window.scrollTo(0,0); };
        prevBtn.onclick = () => { currentStep--; updateSteps(); window.scrollTo(0,0); };

        // Logic Provinsi Lo (Tetap Aman)
        const provinsi = ["Aceh","Sumatera Utara","Sumatera Barat","Riau","Kepulauan Riau","Jambi","Sumatera Selatan","Bangka Belitung","Bengkulu","Lampung","DKI Jakarta","Jawa Barat","Jawa Tengah","DI Yogyakarta","Jawa Timur","Banten","Bali","NTB","NTT","Kalimantan Barat","Kalimantan Tengah","Kalimantan Selatan","Kalimantan Timur","Kalimantan Utara","Sulawesi Utara","Sulawesi Tengah","Sulawesi Selatan","Sulawesi Tenggara","Gorontalo","Sulawesi Barat","Maluku","Maluku Utara","Papua","Papua Barat","Papua Selatan","Papua Tengah","Papua Pegunungan"];
        const input = document.getElementById("searchProvinsi");
        const dropdown = document.getElementById("dropdownProvinsi");
        const hidden = document.getElementById("selectedProvinsi");

        input.oninput = function() {
            const val = this.value.toLowerCase();
            dropdown.innerHTML = "";
            const filtered = provinsi.filter(p => p.toLowerCase().includes(val));
            if (val && filtered.length) {
                dropdown.classList.remove("hidden");
                filtered.forEach(p => {
                    const div = document.createElement("div");
                    div.className = "p-3 hover:bg-green-soft cursor-pointer text-sm font-medium";
                    div.textContent = p;
                    div.onclick = () => { input.value = p; hidden.value = p; dropdown.classList.add("hidden"); };
                    dropdown.appendChild(div);
                });
            } else { dropdown.classList.add("hidden"); }
        };
    </script>
</body>
</html>