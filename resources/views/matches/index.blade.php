<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Match - Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Cari Pasangan</h1>

        <div class="flex gap-2">
            <a href="/user" class="bg-gray-200 px-3 py-2 rounded text-sm">
                Dashboard
            </a>

            <a href="{{ route('profile.edit', auth()->user()->profile->id) }}"
               class="bg-blue-600 text-white px-3 py-2 rounded text-sm">
               Edit Profil
            </a>
        </div>
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

    <!-- NOTIF -->
    @if(isset($incoming) && $incoming->count() > 0)
        <div class="bg-yellow-100 p-4 rounded mb-6">
            🔔 {{ $incoming->count() }} orang ingin taaruf dengan kamu
            <a href="/user" class="underline ml-2 text-blue-600">
                Lihat
            </a>
        </div>
    @endif

    <!-- STATUS -->
    @if(isset($sent) && $sent->isNotEmpty())
        <div class="mb-8">
            <h2 class="font-bold mb-2">Status Pengajuan</h2>

            @foreach($sent as $req)
                <div class="bg-white p-3 rounded shadow mb-2 flex justify-between">

                    <span>{{ $req->toUser->name }}</span>

                    <span class="text-sm">
                        @if($req->status == 'pending')
                            ⏳ Menunggu
                        @elseif($req->status == 'mediator')
                            📞 Diproses mediator
                        @elseif($req->status == 'rejected')
                            ❌ Ditolak
                        @endif
                    </span>

                </div>
            @endforeach
        </div>
    @endif

    <!-- LIST -->
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
                    {{ $item->kota_domisili }} • {{ $item->umur ?? '-' }} th
                </p>

                <p class="text-sm text-gray-600 mt-1">
                    {{ \Illuminate\Support\Str::limit($item->deskripsi_diri, 60) }}
                </p>

                <!-- ACTION -->
                <div class="flex gap-2 mt-4">

                    <a href="{{ route('profile.show', $item->id) }}"
                       class="w-1/2 text-center bg-gray-200 py-2 rounded">
                       Detail
                    </a>

                    @if($sent->where('to_user_id', $item->user->id)->count())
                        <button disabled class="w-1/2 bg-gray-400 text-white py-2 rounded">
                            Sudah
                        </button>
                    @else
                        <form method="POST" action="{{ route('taaruf.request') }}" class="w-1/2">
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
        @empty
            <p class="col-span-full text-center text-gray-400">
                Belum ada kandidat
            </p>
        @endforelse

    </div>

</div>

</body>
</html>1