<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-4xl mx-auto">
<div class="display:flex items-center justify-between">
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

{{-- dashboard user --}}

       <a href="/match"
           class="bg-blue-600 text-white px-4 py-2 rounded text-sm">
           Cari Pasangan
        </a>
</div>

@foreach($sent as $req)
<div class="bg-white p-4 rounded shadow mb-3">

    <p class="font-bold">{{ $req->toUser->name }}</p>

    <p class="text-sm mt-2">
        @if($req->status == 'pending')
            ⏳ Menunggu respon target

        @elseif($req->status == 'mediator')
            ✅ Sudah disetujui — mediator akan menghubungi

        @elseif($req->status == 'rejected')
            ❌ Ditolak
        @endif
    </p>

</div>
@endforeach

@if(session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
    {{ session('success') }}
</div>
@endif


{{-- 🔔 NOTIF ADA YANG NGE-AJAK --}}
@if($incoming->count() > 0)
<div class="bg-yellow-100 text-yellow-700 p-3 rounded mb-4">
    🔔 Ada {{ $incoming->count() }} orang ingin taaruf dengan kamu
</div>
@endif

{{-- ALERT --}}
@if(session('success'))
<div class="bg-green-200 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-200 p-3 mb-4 rounded">
    {{ session('error') }}
</div>
@endif


{{-- =========================
     🔥 PERMINTAAN MASUK
========================= --}}
<h2 class="text-xl font-bold mb-3">Permintaan Masuk</h2>

@forelse($incoming as $req)

<div class="bg-white p-4 rounded shadow mb-3">

    <p class="font-bold text-lg">
        {{ $req->fromUser->name }}
    </p>

    {{-- LINK PROFIL --}}
    @if($req->fromUser->profile)
        <a href="{{ route('profile.show', $req->fromUser->profile->id) }}"
           class="text-blue-500 text-sm underline">
            Lihat Profil
        </a>
    @else
        <p class="text-gray-400 text-sm">Profil belum tersedia</p>
    @endif

    {{-- ACTION --}}
    <div class="flex gap-2 mt-3">

        <form method="POST" action="{{ route('taaruf.accept', $req->id) }}">
            @csrf
            <button class="bg-green-500 text-white px-3 py-1 rounded">
                Terima
            </button>
        </form>

        <form method="POST" action="{{ route('taaruf.reject', $req->id) }}">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Tolak
            </button>
        </form>

    </div>

</div>

@empty
<p class="text-gray-500">Belum ada permintaan</p>
@endforelse



{{-- =========================
     🔥 PENGAJUAN SAYA
========================= --}}
<h2 class="text-xl font-bold mt-6 mb-3">Pengajuan Saya</h2>

@forelse($sent as $req)

<div class="bg-white p-4 rounded shadow mb-3">

    <p class="font-bold text-lg">
        {{ $req->toUser->name }}
    </p>

    <p class="text-sm mt-2">
        Status:

        @if($req->status == 'pending')
            <span class="text-yellow-600">
                ⏳ Menunggu respon
            </span>

        @elseif($req->status == 'accepted')
            <span class="text-green-600">
                ✔ Diterima — Menunggu mediator
            </span>

        @elseif($req->status == 'rejected')
            <span class="text-red-600">
                ❌ Ditolak
            </span>
        @endif
    </p>

</div>

@empty
<p class="text-gray-500">Belum ada pengajuan</p>
@endforelse

</div>

</body>
</html>