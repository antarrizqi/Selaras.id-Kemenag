<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eksplorasi Kandidat — Selaras.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,600;1,600&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FAFAFA;
            color: #1F2937;
        }

        .serif {
            font-family: 'Lora', serif;
        }

        .bg-selaras-green {
            background-color: #2D7D52;
        }

        .text-selaras-green {
            color: #2D7D52;
        }

        .text-selaras-gold {
            color: #C8933A;
        }

        .btn-primary {
            background-color: #2D7D52;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #246341;
            transform: translateY(-1px);
        }
    </style>
</head>

<body class="antialiased">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-12">

        @if ($incoming->count() > 0)
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-6">
                    <div class="relative">
                        <span class="absolute -top-1 -right-1 flex h-3 w-3">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-selaras-gold opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-selaras-gold"></span>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="text-[11px] font-bold uppercase tracking-[0.3em] text-gray-500 italic">🔔 Ada
                        {{ $incoming->count() }} orang ingin taaruf</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($incoming as $req)
                        <div
                            class="group bg-white rounded-3xl p-5 border border-selaras-green/10 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gray-50 overflow-hidden border border-gray-100">
                                    @if ($req->fromUser->profile->foto_profil)
                                        <img src="{{ asset($req->fromUser->profile->foto_profil) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-[10px] serif italic text-gray-300">
                                            S</div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="serif text-lg text-gray-900 group-hover:text-selaras-green transition">
                                        {{ $req->fromUser->name }}</h4>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">
                                        {{ $req->fromUser->profile->kota_domisili ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <a href="{{ route('profile.show', $req->fromUser->profile->id) }}"
                                    class="bg-gray-200 px-3 py-1 rounded text-xs font-bold uppercase">Lihat Profil</a>

                                <form method="POST" action="{{ route('taaruf.accept', $req->id) }}">
                                    @csrf
                                    <button
                                        class="bg-green-600 text-white px-3 py-1 rounded text-xs font-bold uppercase">Terima</button>
                                </form>

                                <form method="POST" action="{{ route('taaruf.reject', $req->id) }}">
                                    @csrf
                                    <button
                                        class="bg-red-600 text-white px-3 py-1 rounded text-xs font-bold uppercase">Tolak</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <nav class="flex flex-wrap justify-between items-center mb-10 md:mb-16">
            <div class="flex items-center gap-2">
                <div
                    class="w-8 h-8 bg-selaras-green rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg">
                    S</div>
                <span class="serif text-xl md:text-2xl font-semibold tracking-tight text-selaras-green">Selaras<span
                        class="text-selaras-gold">.id</span></span>
            </div>
            <div
                class="hidden md:flex items-center gap-8 text-[11px] font-bold uppercase tracking-[0.2em] text-gray-500">
                <a href="/user" class="hover:text-selaras-green transition">Dashboard</a>
                @if (auth()->check() && auth()->user()->profile)
                    <a href="{{ route('profile.edit', auth()->user()->profile->id) }}"
                        class="bg-white border border-gray-200 px-6 py-2.5 rounded-full hover:border-selaras-gold transition shadow-sm">Profil
                        Saya</a>
                @endif
            </div>
        </nav>

        <div class="mb-10 md:mb-16 text-center md:text-left">
            <h1 class="serif text-3xl sm:text-4xl md:text-5xl text-gray-900 mb-4 leading-tight">
                Temukan <span class="italic text-selaras-green underline decoration-selaras-gold/30">Keselarasan</span>
                Jiwa
            </h1>
            <p class="text-gray-500 max-w-xl mx-auto md:mx-0 leading-relaxed text-sm md:text-base">
                Eksplorasi profil kandidat terverifikasi dengan rasa aman dan terhormat, jangan lupa rutin check
                dashboard untuk memantau update.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12">
            <aside class="hidden lg:block lg:col-span-3">
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm sticky top-8">
                    <h3 class="text-[10px] font-bold uppercase tracking-[0.2em] text-selaras-gold mb-6">Status Pengajuan
                    </h3>
                    @if (isset($sent) && $sent->isNotEmpty())
                        <div class="space-y-6">
                            @foreach ($sent as $req)
                                <div class="border-b border-gray-50 pb-4 last:border-0">
                                    <p class="text-sm font-semibold text-gray-800">{{ $req->toUser->name }}</p>
                                    <span
                                        class="inline-flex items-center gap-1.5 mt-1 px-2 py-0.5 rounded-full bg-gray-50 text-[9px] uppercase font-bold text-selaras-green tracking-wider">
                                        {{ $req->status == 'pending' ? '⏳ Menunggu' : '✅ Diterima sedang diproses' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-[10px] text-gray-400 italic uppercase tracking-widest">Kosong</p>
                    @endif
                </div>
            </aside>

            <main class="lg:col-span-9">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-8">
                    @forelse($candidates as $item)
                        <div
                            class="bg-white rounded-[2rem] p-3 md:p-4 border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 group flex flex-col h-full">
                            <div
                                class="relative aspect-square sm:aspect-[4/5] rounded-[1.5rem] overflow-hidden mb-4 md:mb-6 bg-gray-100">
                                @if ($item->foto_profil)
                                    <img src="{{ asset($item->foto_profil) }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center serif italic text-gray-200">
                                        Selaras Profile</div>
                                @endif
                                <div class="absolute bottom-3 left-3 right-3">
                                    <div
                                        class="bg-white/90 backdrop-blur px-3 py-1.5 rounded-xl text-[8px] font-bold uppercase tracking-widest text-selaras-green shadow-sm w-fit">
                                        Verified Candidate</div>
                                </div>
                            </div>

                            <div class="px-2 pb-2 flex-grow">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h2
                                            class="serif text-xl md:text-2xl text-gray-900 group-hover:text-selaras-green transition-colors truncate max-w-[150px]">
                                            {{ $item->user->name }}</h2>
                                        <p class="text-[9px] font-bold uppercase tracking-widest text-selaras-gold">
                                            {{ $item->kota_domisili }}</p>
                                    </div>
                                    <span class="serif italic text-lg text-gray-300">{{ $item->umur ?? '-' }}th</span>
                                </div>
                                <p class="text-[12px] text-gray-500 leading-relaxed line-clamp-2 italic mb-6">
                                    "{{ $item->deskripsi_diri ?? 'Bismillah.' }}"</p>
                            </div>

                            <div class="flex gap-2 px-2 pb-2">
                                <a href="{{ route('profile.show', $item->id) }}"
                                    class="flex-1 text-center py-3 rounded-xl border border-gray-100 text-[9px] font-bold uppercase tracking-widest hover:bg-gray-50 transition">Detail</a>
                                @if ($sent->where('to_user_id', $item->user->id)->count())
                                    <div
                                        class="flex-[1.5] text-center py-3 rounded-xl bg-gray-50 text-gray-400 text-[9px] font-bold uppercase tracking-widest">
                                        Terkirim</div>
                                @else
                                    <form method="POST" action="{{ route('taaruf.request') }}" class="flex-[1.5]">
                                        @csrf
                                        <input type="hidden" name="to_user_id" value="{{ $item->user->id }}">
                                        <button
                                            class="w-full py-3 rounded-xl btn-primary text-white text-[9px] font-bold uppercase tracking-widest">Taaruf</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center opacity-30 serif italic text-xl">Kandidat belum
                            tersedia...</div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>

</body>

</html>
