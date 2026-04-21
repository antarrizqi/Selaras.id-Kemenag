<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match - Selaras.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

{{-- matches utama --}}

<body class="bg-gray-100 min-h-screen p-6">
    <div class="flex justify-between items-center mb-6">

    <div class="flex gap-3">
        <a href="/user"
           class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded text-sm">
           Dashboard
        </a>
        @if(isset($incoming) && $incoming->count() > 0)
<div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-6 rounded">
    🔔 Ada {{ $incoming->count() }} orang ingin taaruf dengan kamu
    <a href="/user" class="underline text-blue-600 ml-2">
        Lihat sekarang
    </a>
</div>
@endif

     
    </div>
    

</div>

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Cari Pasangan</h1>

        @if(auth()->check() && auth()->user()->profile)
            <a href="{{ route('profile.edit', auth()->user()->profile->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
               Edit Profil
            </a>
        @endif
    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- 🔔 NOTIF INCOMING -->
    @if(isset($incoming) && $incoming->count() > 0)
        <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-6 rounded">
            🔔 <b>{{ $incoming->count() }}</b> orang ingin taaruf dengan kamu
        </div>
    @endif

    <!-- ⏳ NOTIF SENT -->
    @if(isset($sent) && $sent->where('status','pending')->count() > 0)
        <div class="bg-yellow-100 text-yellow-700 p-3 rounded mb-6">
            ⏳ Kamu punya {{ $sent->where('status','pending')->count() }} pengajuan menunggu lihat respon di dashboard
        </div>
    @endif

    <!-- ================= MATCH LIST ================= -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($candidates as $item)
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <!-- IMAGE -->
            <div class="h-48 bg-gray-200">
                @if($item->foto_profil && file_exists(public_path($item->foto_profil)))
                    <img src="{{ asset($item->foto_profil) }}" class="w-full h-full object-cover">
                @else
                    <img src="https://via.placeholder.com/400x300" class="w-full h-full object-cover">
                @endif
            </div>

            <!-- CONTENT -->
            <div class="p-4">
                <h2 class="font-bold text-lg">
                    {{ $item->user->name }}
                </h2>

                <p class="text-sm text-gray-500">
                    {{ $item->kota_domisili ?? '-' }}
                </p>

                <p class="text-sm text-gray-600 mt-1">
                    {{ \Illuminate\Support\Str::limit($item->deskripsi_diri, 60) }}
                </p>

                <div class="flex gap-2 mt-4">

                    <!-- DETAIL -->
                    <a href="{{ route('profile.show', $item->id) }}"
                       class="w-1/2 text-center bg-gray-200 py-2 rounded">
                       Detail
                    </a>

                    <!-- TAARUF BUTTON -->
                    <div class="w-1/2">
                        @if(isset($sent) && $sent->where('to_user_id', $item->user->id)->count())
                            <button disabled class="bg-gray-400 text-white py-2 rounded w-full">
                                Sudah diajukan
                            </button>
                        @else
                            <form method="POST" action="{{ route('taaruf.request') }}">
                                @csrf
                                <input type="hidden" name="to_user_id" value="{{ $item->user->id }}">
                                <button class="w-full bg-green-600 text-white py-2 rounded">
                                    Taaruf
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>

        </div>
        @empty
        <div class="col-span-full text-center py-20">
            <p class="text-gray-400">Belum ada kandidat 😢</p>
        </div>
        @endforelse

    </div>

    

</div>

</body>
</html>