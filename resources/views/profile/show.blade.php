<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil — {{ $profile->user->name ?? 'User' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;1,600&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F8F9FA; color: #1F2937; }
        .serif { font-family: 'Lora', serif; }
        .bg-selaras-green { background-color: #2D7D52; }
        .text-selaras-green { color: #2D7D52; }
        .text-selaras-gold { color: #C8933A; }
        .section-card { background: white; border-radius: 2.5rem; padding: 2rem; border: 1px solid #F1F1F1; margin-bottom: 2rem; }
        @media (max-width: 640px) {
            .section-card { border-radius: 1.5rem; padding: 1.5rem; }
        }
    </style>
</head>

<body class="antialiased py-6 md:py-12">

<div class="max-w-4xl mx-auto px-4">

    <div class="flex justify-between items-center mb-8">
        <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-selaras-green transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            Kembali
        </a>
        @if($profile && auth()->check() && (auth()->id() === $profile->user_id || auth()->user()->is_admin))
            <a href="{{ route('profile.edit', $profile->id) }}" class="text-[10px] font-bold uppercase tracking-widest text-selaras-gold border-b-2 border-selaras-gold/30 hover:border-selaras-gold transition-all">Edit Profil</a>
        @endif
    </div>

    @if(!$profile)
        <div class="section-card text-center py-20 shadow-sm">
            <div class="text-6xl mb-6 text-gray-200">👤</div>
            <h2 class="serif text-2xl mb-2 text-gray-800">Profil Belum Lengkap</h2>
            <p class="text-gray-400 text-sm mb-8">Data Anda diperlukan untuk mempermudah proses taaruf.</p>
            <a href="{{ route('profile.create') }}" class="inline-block bg-selaras-green text-white px-10 py-4 rounded-2xl text-[11px] font-bold uppercase tracking-widest hover:brightness-110 transition">Buat Profil Sekarang</a>
        </div>
    @else

        <div class="bg-white rounded-[3rem] overflow-hidden shadow-sm border border-gray-100 mb-8 transition-all hover:shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-12">
                <div class="md:col-span-5 h-72 md:h-auto bg-gray-50 border-r border-gray-50">
                    @if($profile->foto_profil)
                        <img src="{{ asset($profile->foto_profil) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center serif italic text-gray-200 bg-gray-50">No Image</div>
                    @endif
                </div>
                <div class="md:col-span-7 p-8 md:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="bg-selaras-green/10 text-selaras-green px-3 py-1 rounded-full text-[9px] font-bold uppercase tracking-widest">{{ $profile->status }}</span>
                        <span class="text-gray-300">|</span>
                        <span class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">ID #{{ str_pad($profile->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <h1 class="serif text-4xl md:text-5xl text-gray-900 mb-4">{{ $profile->user->name }}</h1>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 px-4 py-1.5 rounded-xl text-[11px] font-semibold text-gray-600">{{ $profile->jenis_kelamin }}</span>
                        <span class="bg-gray-100 px-4 py-1.5 rounded-xl text-[11px] font-semibold text-gray-600">{{ $profile->umur ?? '-' }} th</span>
                        <span class="bg-gray-100 px-4 py-1.5 rounded-xl text-[11px] font-semibold text-gray-600">{{ $profile->kota_domisili }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                <div class="section-card !p-8">
                    <h3 class="text-[11px] font-extrabold uppercase tracking-widest text-selaras-green mb-8 border-l-4 border-selaras-gold pl-3">Atribut Fisik</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between items-center">
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Tinggi / Berat</p>
                            <p class="text-sm font-bold text-gray-800">{{ $profile->tinggi_badan }}cm / {{ $profile->berat_badan }}kg</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Warna Kulit</p>
                            <p class="text-sm font-bold text-gray-800">{{ $profile->warna_kulit ?? '-' }}</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Suku</p>
                            <p class="text-sm font-bold text-gray-800">{{ $profile->suku ?? '-' }}</p>
                        </div>
                    </div>

                    <h3 class="text-[11px] font-extrabold uppercase tracking-widest text-selaras-green mt-12 mb-8 border-l-4 border-selaras-gold pl-3">Domisili & Status</h3>
                    <div class="space-y-6">
                        <div>
                            <p class="text-[9px] text-gray-400 uppercase font-bold mb-1">Status Pernikahan</p>
                            <p class="text-sm font-bold text-gray-800">{{ $profile->status_pernikahan }} ({{ $profile->jumlah_anak }} Anak)</p>
                        </div>
                        <div>
                            <p class="text-[9px] text-gray-400 uppercase font-bold mb-1">Alamat Domisili</p>
                            <p class="text-xs font-semibold text-gray-600 leading-relaxed">{{ $profile->alamat_domisili ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="section-card !p-8 !bg-red-50/20 border-red-100">
                    <h3 class="text-[10px] font-bold uppercase tracking-widest text-red-500 mb-4 flex items-center gap-2">
                        <span>⚠️</span> Riwayat Medis
                    </h3>
                    <p class="text-xs leading-relaxed text-gray-600 italic">"{{ $profile->riwayat_penyakit ?? 'Tidak ada riwayat penyakit serius.' }}"</p>
                </div>
            </div>

            <div class="lg:col-span-2">
                
                <div class="section-card">
                    <h3 class="text-[11px] font-extrabold uppercase tracking-widest text-selaras-green mb-6">Deskripsi Diri</h3>
                    <p class="serif italic text-xl md:text-2xl text-gray-800 leading-relaxed italic">
                        "{{ $profile->deskripsi_diri }}"
                    </p>
                </div>

                <div class="section-card">
                    <h3 class="text-[11px] font-extrabold uppercase tracking-widest text-selaras-green mb-8">Karakter & Keseharian</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-2">Hobi</p>
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $profile->hobi ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-2">Organisasi</p>
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $profile->organisasi ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2 bg-gray-50 p-6 rounded-[1.5rem]">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-2">Aktivitas Harian</p>
                            <p class="text-sm text-gray-700 leading-relaxed italic">{{ $profile->aktivitas_harian ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-emerald-600 uppercase mb-2">Kelebihan</p>
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $profile->kelebihan ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-red-400 uppercase mb-2">Kekurangan</p>
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $profile->kekurangan ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="section-card !bg-[#F1F7F4] border-2 border-selaras-green/10">
                    <div class="mb-10">
                        <h3 class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-selaras-green mb-5 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-selaras-gold rounded-full"></span>
                            Visi & Misi Pernikahan
                        </h3>
                        <p class="serif text-xl md:text-2xl leading-relaxed text-gray-900 font-medium">
                            {{ $profile->visi_misi_pernikahan ?? '-' }}
                        </p>
                    </div>
                    
                    <div class="pt-8 border-t border-selaras-green/10">
                        <h3 class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-selaras-green mb-5 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 bg-selaras-gold rounded-full"></span>
                            Kriteria Pasangan
                        </h3>
                        <p class="text-base md:text-lg leading-relaxed text-gray-700 font-medium italic">
                            {{ $profile->kriteria_pasangan ?? '-' }}
                        </p>
                    </div>
                </div>

                @if(auth()->check() && auth()->user()->is_admin && $profile->status == 'pending')
                    <div class="flex flex-col sm:flex-row gap-4 mt-8 p-4 bg-white rounded-3xl border-2 border-dashed border-gray-100">
                        <form method="POST" action="{{ route('admin.approve', $profile->id) }}" class="flex-1">
                            @csrf
                            <button class="w-full bg-selaras-green text-white py-4 rounded-2xl text-[10px] font-bold uppercase tracking-widest shadow-xl shadow-emerald-900/10 hover:brightness-110 transition">Approve Profil</button>
                        </form>
                        <form method="POST" action="{{ route('admin.reject', $profile->id) }}" class="flex-1">
                            @csrf
                            <button class="w-full bg-white border border-red-100 text-red-500 py-4 rounded-2xl text-[10px] font-bold uppercase tracking-widest hover:bg-red-50 transition">Reject</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <footer class="mt-20 py-8 text-center">
        <p class="text-[9px] font-bold uppercase tracking-[0.5em] text-gray-300">Selaras.id &bull; membangun keluarga yang indah</p>
    </footer>

</div>

</body>
</html>