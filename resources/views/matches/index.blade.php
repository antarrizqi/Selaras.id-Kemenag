<!DOCTYPE html>
<html>
<head>
    <title>Match</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<h1 class="text-2xl font-bold mb-6 text-center">
    Temukan Calon Pasangan 💖
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@forelse($candidates as $item)

<a href="/profile/{{ $item->id }}">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition duration-300">

        <!-- FOTO -->
        @if($item->foto_profil)
            <img src="{{ asset('storage/'.$item->foto_profil) }}"
                 class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                <span>No Image</span>
            </div>
        @endif

        <!-- INFO -->
        <div class="p-4">

            <h2 class="text-lg font-bold">
                {{ $item->user->name }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ $item->kota_domisili }}
            </p>

            <p class="text-sm mt-2 line-clamp-2">
                {{ $item->deskripsi_diri }}
            </p>

        </div>

    </div>
</a>

@empty

<p class="col-span-full text-center text-gray-500">
    Belum ada kandidat 😢
</p>

@endforelse

</div>

</body>
</html>