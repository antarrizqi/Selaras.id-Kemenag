<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Selaras.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;1,600&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FAFAFA; color: #1F2937; }
        .serif { font-family: 'Lora', serif; }
        .bg-selaras-green { background-color: #2D7D52; }
        .text-selaras-green { color: #2D7D52; }
        .text-selaras-gold { color: #C8933A; }
        .btn-primary { background-color: #2D7D52; transition: all 0.3s ease; }
        .btn-primary:hover { background-color: #246341; transform: translateY(-1px); }
        .glass-card { background: rgba(255, 255, 255, 0.9); border: 1px solid rgba(0, 0, 0, 0.05); }
    </style>
</head>

<body class="antialiased">
   

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-16">
    
    <nav class="flex justify-between items-center mb-12">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-selaras-green rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg">S</div>
            <span class="serif text-xl font-semibold tracking-tight text-selaras-green">Selaras<span class="text-selaras-gold">.id</span></span>
        </div>
        <a href="/match" class="text-[10px] font-bold uppercase tracking-[0.2em] text-selaras-green border-b-2 border-selaras-gold pb-1 transition-all">
            ✨ Cari Pasangan
        </a>
    </nav>

    <div class="mb-12">
        <h1 class="serif text-4xl md:text-5xl text-gray-900 leading-tight">Dashboard <span class="italic text-selaras-green">Anda</span></h1>
        <p class="text-gray-500 text-sm mt-3 leading-relaxed">Pantau perkembangan langkah ibadah Anda di sini.</p>
    </div>

    <div class="space-y-4 mb-12">
        @if(session('success'))
            <div class="bg-emerald-50 text-emerald-700 px-6 py-4 rounded-2xl text-xs font-semibold border-l-4 border-emerald-500 flex items-center gap-3">
                <span>✨</span> {{ session('success') }}
            </div>
        @endif

        @if($incoming->count() > 0)
            <div class="bg-selaras-green text-white p-6 rounded-[2.5rem] flex flex-col md:flex-row justify-between items-center gap-4 shadow-xl shadow-emerald-900/10 transition-all">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center text-xl">🔔</div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-emerald-100">Kabar Baik</p>
                        <p class="serif italic text-lg leading-tight">Ada {{ $incoming->count() }} orang ingin mengenalmu.</p>
                    </div>
                </div>
                <button onclick="document.getElementById('incoming-section').scrollIntoView({behavior: 'smooth'})" class="bg-white text-selaras-green px-6 py-2.5 rounded-full text-[10px] font-bold uppercase tracking-widest hover:bg-selaras-gold hover:text-white transition-all">
                    Lihat Permintaan
                </button>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <section id="incoming-section">
            <h2 class="serif text-2xl text-gray-900 mb-6 flex items-center gap-3">
                Permintaan Masuk 
                <span class="h-[1px] flex-grow bg-gray-100"></span>
            </h2>
            
            <div class="space-y-4">
                @forelse($incoming as $req)
                <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-4 text-center sm:text-left flex-col sm:flex-row">
                        <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center text-2xl grayscale group-hover:grayscale-0 transition">👤</div>
                        <div>
                            <p class="font-bold text-gray-900">{{ $req->fromUser->name }}</p>
                            @if($req->fromUser->profile)
                                <a href="{{ route('profile.show', $req->fromUser->profile->id) }}" class="text-[10px] font-bold uppercase tracking-widest text-selaras-gold hover:text-selaras-green">Lihat Profil →</a>
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-2 w-full sm:w-auto">
                        <form method="POST" action="{{ route('taaruf.accept', $req->id) }}" class="flex-1">
                            @csrf
                            <button class="w-full bg-selaras-green text-white px-5 py-3 rounded-xl text-[10px] font-bold uppercase tracking-widest transition hover:brightness-110">Terima</button>
                        </form>
                        <form method="POST" action="{{ route('taaruf.reject', $req->id) }}" class="flex-1">
                            @csrf
                            <button class="w-full bg-white border border-gray-100 text-red-400 px-5 py-3 rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-red-50 transition">Tolak</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="py-12 text-center border-2 border-dashed border-gray-50 rounded-[2rem]">
                    <p class="serif italic text-gray-300">Belum ada pesan masuk.</p>
                </div>
                @endforelse
            </div>
        </section>

        <section>
            <h2 class="serif text-2xl text-gray-900 mb-6 flex items-center gap-3">
                Pengajuan Saya
                <span class="h-[1px] flex-grow bg-gray-100"></span>
            </h2>

          <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm sticky top-8">
                <h3 class="text-[10px] font-bold uppercase tracking-[0.2em] text-selaras-gold mb-6">Status Pengajuan</h3>
                @if(isset($sent) && $sent->isNotEmpty())
                    <div class="space-y-6">
                        @foreach($sent as $req)
                        <div class="border-b border-gray-50 pb-4 last:border-0">
                            <p class="text-sm font-semibold text-gray-800">{{ $req->toUser->name }}</p>
                            <span class="inline-flex items-center gap-1.5 mt-1 px-2 py-0.5 rounded-full bg-gray-50 text-[9px] uppercase font-bold text-selaras-green tracking-wider">
                                {{ $req->status == 'pending' ? '⏳ Menunggu' : '✅ Diterima sedang diproses' }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-[10px] text-gray-400 italic uppercase tracking-widest">Kosong</p>
                @endif
            </div>
        </section>

    </div>

    <footer class="mt-24 pt-8 border-t border-gray-100 text-[10px] font-bold uppercase tracking-[0.3em] text-gray-300 text-center">
        &copy; 2026 Selaras Matchmaking | All rights reserved.
    </footer>
</div>

</body>
</html>