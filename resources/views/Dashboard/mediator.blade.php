<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediator Dashboard — Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#FAFAF8] p-4 md:p-10 text-[#1E2A1E]">

<div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Dashboard Mediator</h1>
            <p class="text-gray-500 text-sm mt-1">Pantau dan jembatani proses taaruf antar pengguna.</p>
        </div>
        <div class="bg-indigo-50 border border-indigo-100 px-4 py-2 rounded-2xl flex items-center gap-2">
            <span class="text-indigo-600 text-xs font-bold uppercase tracking-widest">Role: Mediator Official</span>
        </div>
    </div>

    <h2 class="text-lg font-bold mb-5 flex items-center gap-2">
        📬 Permintaan Masuk 
        <span class="bg-gray-200 text-[10px] px-2 py-0.5 rounded-full">{{ $data->count() }}</span>
    </h2>

    <div class="grid grid-cols-1 gap-4 md:gap-6">
        @forelse($data as $t)
        <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-5 md:p-8 hover:shadow-md transition-all relative overflow-hidden group">
            
            <div class="absolute top-0 left-0 w-1.5 h-full bg-indigo-500"></div>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                
                <div class="flex-1">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <div class="bg-indigo-50 text-indigo-700 font-bold px-4 py-2 rounded-xl text-sm">
                            {{ $t->fromUser->name }}
                        </div>
                        <span class="text-gray-300 font-bold">→</span>
                        <div class="bg-rose-50 text-rose-700 font-bold px-4 py-2 rounded-xl text-sm">
                            {{ $t->toUser->name }}
                        </div>
                    </div>

                    {{-- LINK PROFIL --}}
                    <div class="flex flex-wrap gap-4 mt-2">
                        @if($t->fromUser->profile)
                            <a href="{{ route('profile.show', $t->fromUser->profile->id) }}"
                               class="text-indigo-500 hover:text-indigo-700 font-semibold text-xs flex items-center gap-1">
                                🔍 Profil Pengaju
                            </a>
                        @endif

                        @if($t->toUser->profile)
                            <a href="{{ route('profile.show', $t->toUser->profile->id) }}"
                               class="text-rose-500 hover:text-rose-700 font-semibold text-xs flex items-center gap-1">
                                🔍 Profil Target
                            </a>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    {{-- NOMOR HP PENGIRIM --}}
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $t->fromUser->phone) }}" target="_blank"
                       class="flex items-center justify-center gap-2 bg-[#25D366] text-white px-4 py-3 rounded-2xl text-[11px] font-bold shadow-sm hover:scale-105 transition-transform">
                        <span>WA Pengaju</span>
                    </a>

                    {{-- NOMOR HP TARGET --}}
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $t->toUser->phone) }}" target="_blank"
                       class="flex items-center justify-center gap-2 bg-[#128C7E] text-white px-4 py-3 rounded-2xl text-[11px] font-bold shadow-sm hover:scale-105 transition-transform">
                        <span>WA Target</span>
                    </a>
                </div>

                <div class="flex items-center md:border-l md:pl-6 border-gray-100">
                    <form method="POST" action="{{ route('taaruf.delete', $t->id) }}" onsubmit="return confirm('Hapus data taaruf ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="p-3 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-2xl transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        @empty
        <div class="bg-white p-12 rounded-[40px] text-center border-2 border-dashed border-gray-100">
            <span class="text-4xl block mb-4">🍃</span>
            <p class="text-gray-400 font-medium">Belum ada pasangan taaruf yang perlu dimediasi.</p>
        </div>
        @endforelse
    </div>

</div>

</body>
</html>