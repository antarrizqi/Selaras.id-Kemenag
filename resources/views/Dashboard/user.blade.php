<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#FAFAF8] p-4 md:p-10 text-[#1E2A1E]">

<div class="max-w-4xl mx-auto">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-bold tracking-tight">Dashboard</h1>
            <p class="text-gray-500 text-sm mt-1">Pantau proses taaruf dan interaksi kamu.</p>
        </div>
        <a href="/match" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl text-sm font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all text-center">
            ✨ Cari Pasangan
        </a>
    </div>

    {{-- Alert Sessions --}}
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 mb-6 rounded-2xl flex items-center gap-3 animate-fade-in">
            <span>✅</span> <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 mb-6 rounded-2xl flex items-center gap-3">
            <span>⚠️</span> <span class="text-sm font-medium">{{ session('error') }}</span>
        </div>
    @endif

    {{-- 🔔 NOTIFIKASI INDIKATOR --}}
    @if($incoming->count() > 0)
    <div class="bg-amber-50 border border-amber-100 p-4 rounded-[24px] mb-8 flex items-center gap-4 shadow-sm">
        <div class="bg-amber-100 w-10 h-10 rounded-full flex items-center justify-center text-xl animate-bounce">🔔</div>
        <div>
            <p class="text-sm font-bold text-amber-900">Ada Kabar Baik!</p>
            <p class="text-[11px] text-amber-700">Ada {{ $incoming->count() }} orang yang ingin mengenalmu lebih jauh. Cek di bawah!</p>
        </div>
    </div>
    @endif

    {{-- =========================
         🔥 PERMINTAAN MASUK
    ========================= --}}
    <div class="mb-12">
        <h2 class="text-xl font-bold mb-5 flex items-center gap-2 text-indigo-900">
            📩 Permintaan Masuk 
            <span class="text-[10px] bg-indigo-100 text-indigo-600 px-2 py-0.5 rounded-full uppercase tracking-widest">Incoming</span>
        </h2>

        <div class="grid grid-cols-1 gap-4">
            @forelse($incoming as $req)
            <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm hover:shadow-md transition-all flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-xl">👤</div>
                    <div>
                        <p class="font-bold text-lg leading-tight">{{ $req->fromUser->name }}</p>
                        @if($req->fromUser->profile)
                            <a href="{{ route('profile.show', $req->fromUser->profile->id) }}" class="text-indigo-500 text-[11px] font-bold uppercase tracking-wider hover:underline mt-1 block">
                                Lihat Profil →
                            </a>
                        @else
                            <p class="text-gray-400 text-[11px]">Profil belum lengkap</p>
                        @endif
                    </div>
                </div>

                <div class="flex gap-2">
                    <form method="POST" action="{{ route('taaruf.accept', $req->id) }}" class="flex-1">
                        @csrf
                        <button class="w-full bg-emerald-500 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-emerald-600 shadow-sm transition-all">
                            Terima
                        </button>
                    </form>
                    <form method="POST" action="{{ route('taaruf.reject', $req->id) }}" class="flex-1">
                        @csrf
                        <button class="w-full bg-white border border-red-100 text-red-500 px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-red-50 transition-all">
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="text-center py-10 bg-gray-50 rounded-[32px] border-2 border-dashed border-gray-100">
                <p class="text-gray-400 text-sm">Belum ada permintaan taaruf masuk.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- =========================
         🔥 PENGAJUAN SAYA
    ========================= --}}
    <div>
        <h2 class="text-xl font-bold mb-5 flex items-center gap-2 text-rose-900">
            🚀 Pengajuan Saya
            <span class="text-[10px] bg-rose-100 text-rose-600 px-2 py-0.5 rounded-full uppercase tracking-widest">Sent</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($sent as $req)
            <div class="bg-white p-6 rounded-[32px] border border-gray-100 shadow-sm relative overflow-hidden group">
                @php
                    $colors = [
                        'pending' => 'bg-amber-400',
                        'accepted' => 'bg-emerald-500',
                        'rejected' => 'bg-red-500'
                    ];
                    $bgColor = $colors[$req->status] ?? 'bg-gray-300';
                @endphp
                <div class="absolute top-0 left-0 w-full h-1 {{ $bgColor }}"></div>

                <div class="flex items-center justify-between mb-4">
                    <p class="font-bold text-lg text-gray-800">{{ $req->toUser->name }}</p>
                    <span class="text-xs">
                        @if($req->status == 'pending') ⏳
                        @elseif($req->status == 'accepted') ✅
                        @else ❌ @endif
                    </span>
                </div>

                <div class="bg-gray-50 p-4 rounded-2xl">
                    <p class="text-[10px] uppercase text-gray-400 font-bold tracking-widest mb-1">Status Saat Ini</p>
                    <p class="text-xs font-bold leading-relaxed">
                        @if($req->status == 'pending')
                            <span class="text-amber-600 italic">Menunggu respon target...</span>
                        @elseif($req->status == 'accepted')
                            <span class="text-emerald-600 italic font-bold tracking-tight">Diterima! Mediator akan segera menghubungi kamu.</span>
                        @elseif($req->status == 'rejected')
                            <span class="text-red-600 italic">Pengajuan belum disetujui.</span>
                        @endif
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10 bg-gray-50 rounded-[32px] border-2 border-dashed border-gray-100">
                <p class="text-gray-400 text-sm">Kamu belum mengajukan taaruf ke siapapun.</p>
            </div>
            @endforelse
        </div>
    </div>

</div>

</body>
</html>