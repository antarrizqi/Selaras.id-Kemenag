<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail user {{ $profile->user->name }} — Selaras.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;1,600&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F4F7F5; color: #1F2937; }
        .serif { font-family: 'Lora', serif; }
        .bg-mediator { background-color: #fcfdfc; }
        .text-selaras-green { color: #2D7D52; }
        .border-selaras-gold { border-color: #C8933A; }
    </style>
</head>

<body class="antialiased p-4 md:p-8">

<div class="max-w-5xl mx-auto">
    
    <div class="flex justify-between items-center mb-6">
        <a href="{{ url()->previous() }}" class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-selaras-green transition flex items-center gap-2">
            ← Kembali ke Antrean
        </a>
        <div class="bg-selaras-green/10 px-4 py-2 rounded-full border border-selaras-green/20">
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-selaras-green italic">detail user</span>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-emerald-900/5 overflow-hidden border border-gray-100">
        
        <div class="grid grid-cols-1 lg:grid-cols-12">
            
            <div class="lg:col-span-4 bg-gray-50/50 p-8 border-r border-gray-100">
                <div class="sticky top-8">
                    <div class="w-full aspect-[3/4] rounded-[2rem] overflow-hidden shadow-md mb-6 bg-white border-4 border-white">
                        @if($profile->foto_profil)
                            <img src="{{ asset($profile->foto_profil) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 italic serif">Tanpa Foto</div>
                        @endif
                    </div>

                    <div class="space-y-4">
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400 mb-1">Status Profil</p>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-amber-100 text-amber-700 border border-amber-200">{{ $profile->status }}</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400 mb-1">Kontak Email</p>
                            <p class="text-sm font-semibold text-gray-700 break-all">{{ $profile->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400 mb-1">Alamat Domisili</p>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $profile->alamat_domisili ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 p-8 md:p-12">
                <div class="mb-10">
                    <h1 class="serif text-5xl text-gray-900 mb-2">{{ $profile->user->name }}</h1>
                    <p class="text-selaras-green font-bold text-xs uppercase tracking-[0.3em]">{{ $profile->jenis_kelamin }} • {{ $profile->umur }} Tahun</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                    <div class="border-l-2 border-selaras-gold pl-4">
                        <p class="text-[9px] font-bold text-gray-400 uppercase">Tinggi / Berat</p>
                        <p class="text-sm font-bold">{{ $profile->tinggi_badan }} / {{ $profile->berat_badan }}</p>
                    </div>
                    <div class="border-l-2 border-selaras-gold pl-4">
                        <p class="text-[9px] font-bold text-gray-400 uppercase">Suku</p>
                        <p class="text-sm font-bold">{{ $profile->suku ?? '-' }}</p>
                    </div>
                    <div class="border-l-2 border-selaras-gold pl-4">
                        <p class="text-[9px] font-bold text-gray-400 uppercase">Kulit</p>
                        <p class="text-sm font-bold">{{ $profile->warna_kulit ?? '-' }}</p>
                    </div>
                    <div class="border-l-2 border-selaras-gold pl-4">
                        <p class="text-[9px] font-bold text-gray-400 uppercase">Anak</p>
                        <p class="text-sm font-bold">{{ $profile->jumlah_anak ?? '0' }}</p>
                    </div>
                </div>

                <div class="mb-10 p-6 bg-gray-50 rounded-3xl border border-gray-100">
                    <h3 class="text-[10px] font-bold uppercase text-selaras-green mb-3">Deskripsi Diri</h3>
                    <p class="serif text-lg text-gray-800 leading-relaxed italic">"{{ $profile->deskripsi_diri }}"</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    <div>
                        <h4 class="text-[10px] font-bold uppercase text-gray-400 mb-3 tracking-widest">Keseharian</h4>
                        <ul class="text-sm space-y-2 text-gray-700">
                            <li><b>Hobi:</b> {{ $profile->hobi ?? '-' }}</li>
                            <li><b>Aktivitas:</b> {{ $profile->aktivitas_harian ?? '-' }}</li>
                            <li><b>Organisasi:</b> {{ $profile->organisasi ?? '-' }}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-[10px] font-bold uppercase text-gray-400 mb-3 tracking-widest">Karakter</h4>
                        <ul class="text-sm space-y-2 text-gray-700">
                            <li class="text-emerald-700 font-medium"><b>(+) Kelebihan:</b> {{ $profile->kelebihan ?? '-' }}</li>
                            <li class="text-red-700 font-medium"><b>(-) Kekurangan:</b> {{ $profile->kekurangan ?? '-' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="space-y-6 mb-12">
                    <div class="p-8 bg-[#F0F5F2] rounded-[2rem] border-l-8 border-selaras-green">
                        <h3 class="text-[10px] font-bold uppercase text-selaras-green mb-4 tracking-[0.2em]">Visi & Misi Pernikahan</h3>
                        <p class="serif text-xl text-gray-900 leading-relaxed">{{ $profile->visi_misi_pernikahan ?? '-' }}</p>
                    </div>
                    
                    <div class="p-8 bg-gray-50 rounded-[2rem] border-l-8 border-gray-200">
                        <h3 class="text-[10px] font-bold uppercase text-gray-400 mb-4 tracking-[0.2em]">Kriteria Pasangan</h3>
                        <p class="text-base text-gray-700 leading-relaxed font-medium italic">{{ $profile->kriteria_pasangan ?? '-' }}</p>
                    </div>
                </div>

                <div class="mb-12 p-6 bg-red-50 rounded-2xl border border-red-100">
                    <h3 class="text-[10px] font-bold uppercase text-red-500 mb-2 tracking-widest">Catatan Medis</h3>
                    <p class="text-sm text-gray-600 italic">"{{ $profile->riwayat_penyakit ?? 'Tidak ada riwayat penyakit serius.' }}"</p>
                </div>

                @if($profile->status == 'pending')
                <div class="pt-8 border-t border-gray-100 flex gap-4">
                    <form method="POST" action="{{ route('admin.approve', $profile->id) }}" class="flex-1">
                        @csrf
                        <button class="w-full bg-selaras-green text-white py-4 rounded-2xl text-[11px] font-bold uppercase tracking-widest shadow-lg shadow-emerald-900/20 hover:brightness-110 transition-all">
                            Approve User
                        </button>
                    </form>

                    <form method="POST" action="{{ route('admin.reject', $profile->id) }}" class="flex-1">
                        @csrf
                        <button class="w-full bg-white border border-red-100 text-red-500 py-4 rounded-2xl text-[11px] font-bold uppercase tracking-widest hover:bg-red-50 transition-all">
                            Reject User
                        </button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>

    <footer class="mt-8 text-center text-[9px] font-bold uppercase tracking-[0.4em] text-gray-300">
        ID Profil: #{{ str_pad($profile->id, 5, '0', STR_PAD_LEFT) }} • Database Selaras.id
    </footer>

</div>

</body>
</html>