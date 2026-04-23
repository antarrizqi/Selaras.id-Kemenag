<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-[#FAFAF8] p-4 md:p-10 text-[#1E2A1E]">

<div class="max-w-7xl mx-auto">
    
    <h1 class="text-2xl md:text-3xl font-bold mb-8 text-center md:text-left tracking-tight">
        Dashboard Admin
    </h1>

    {{-- dashboard sisi admin --}}

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 mb-6 rounded-2xl flex items-center gap-3 text-sm md:text-base">
            <span>✅</span> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 mb-6 rounded-2xl flex items-center gap-3 text-sm md:text-base">
            <span>⚠️</span> {{ session('error') }}
        </div>
    @endif

    {{-- Grid otomatis 1 kolom di HP, 2 di Tablet, 3 di Desktop --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

        @foreach($profiles as $profile)

        <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm p-5 md:p-6 relative flex flex-col justify-between hover:shadow-md transition-all">

            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gray-100 overflow-hidden border border-gray-50 flex-shrink-0">
                    @if($profile->foto_profil && file_exists(public_path($profile->foto_profil)))
                        <img src="{{ asset($profile->foto_profil) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">👤</div>
                    @endif
                </div>
                <div class="overflow-hidden">
                    <h2 class="text-base md:text-lg font-bold truncate">
                        {{ $profile->user->name }}
                    </h2>
                    <p class="text-xs text-gray-500 truncate">
                        {{ $profile->user->email }}
                    </p>
                    <p class="text-[10px] text-gray-400">
                        {{ $profile->user->phone ?? '-' }}
                    </p>
                </div>
            </div>

            <div class="flex gap-2 mb-4">
                <span class="bg-gray-50 text-[11px] font-bold px-3 py-1.5 rounded-lg border border-gray-100">
                    🎂 {{ $profile->umur }} Tahun
                </span>
                <span class="bg-gray-50 text-[11px] font-bold px-3 py-1.5 rounded-lg border border-gray-100 truncate">
                    📍 {{ $profile->kota_domisili }}
                </span>
            </div>

            <div class="mb-4">
                <p class="text-[11px] text-gray-400 uppercase font-bold tracking-widest mb-1">Gender</p>
                <p class="text-sm font-medium">{{ ucfirst($profile->jenis_kelamin) }}</p>
            </div>

            <p class="text-xs text-gray-600 line-clamp-2 italic mb-4">
                "{{ $profile->deskripsi_diri }}"
            </p>

            <div class="mb-6">
                <span class="text-[10px] font-bold uppercase tracking-tighter px-3 py-1 rounded-full
                    {{ $profile->status == 'approved' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $profile->status == 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                    {{ $profile->status == 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                ">
                    ● {{ $profile->status }}
                </span>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-50 space-y-3">

                @if($profile->status == 'pending')
                    <div class="grid grid-cols-2 gap-2">
                        <form action="{{ route('admin.approve', $profile->id) }}" method="POST">
                            @csrf
                            <button class="w-full bg-emerald-500 text-white py-2 rounded-xl text-xs font-bold hover:bg-emerald-600 transition-all">
                                Approve
                            </button>
                        </form>

                        <form action="{{ route('admin.reject', $profile->id) }}" method="POST">
                            @csrf
                            <button class="w-full border border-red-200 text-red-500 py-2 rounded-xl text-xs font-bold hover:bg-red-50 transition-all">
                                Reject
                            </button>
                        </form>
                    </div>
                @endif

                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.view', $profile->id) }}"
                       class="flex-1 text-center bg-gray-900 text-white py-2 rounded-xl text-xs font-bold hover:bg-black transition-all">
                        View CV
                    </a>

                    <form action="{{ route('admin.deleteUser', $profile->user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition-all">
                            🗑️
                        </button>
                    </form>
                </div>

                @if($profile->user->role !== 'mediator')
                    <form method="POST" action="{{ route('admin.makeMediator', $profile->user->id) }}">
                        @csrf
                        <button class="w-full bg-purple-50 text-purple-600 border border-purple-100 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-purple-100 transition-all">
                            Promote to Mediator
                        </button>
                    </form>
                @else
                    <div class="w-full bg-blue-50 text-blue-600 py-2 rounded-xl text-[10px] font-bold uppercase tracking-widest text-center">
                        🛡️ Role: Mediator
                    </div>
                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>