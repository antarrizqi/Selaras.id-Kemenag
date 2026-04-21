<!DOCTYPE html>
<html>
<head>
    <title>Detail Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    {{-- detail profile sisi mediator --}}

<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">

    <!-- FOTO -->
    @if($profile->foto_profil)
        <img src="{{ asset($profile->foto_profil) }}"
             class="w-full h-64 object-cover">
    @else
        <div class="w-full h-64 bg-gray-300 flex items-center justify-center">
            No Image
        </div>
    @endif

    <!-- INFO -->
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-2">
            {{ $profile->user->name ?? 'No Name' }}
        </h1>

        <p class="text-gray-500 mb-4">
            {{ $profile->user->email ?? '-' }}
        </p>

        <div class="grid grid-cols-2 gap-4 text-sm">

            <p><b>Kota:</b> {{ $profile->kota_domisili ?? '-' }}</p>
            <p><b>Gender:</b> {{ $profile->jenis_kelamin ?? '-' }}</p>
            <p><b>Tinggi:</b> {{ $profile->tinggi_badan ?? '-' }} cm</p>
            <p><b>Berat:</b> {{ $profile->berat_badan ?? '-' }} kg</p>

        </div>

        <div class="mt-4">
            <p class="font-semibold">Deskripsi</p>
            <p class="text-gray-700">
                {{ $profile->deskripsi_diri ?? '-' }}
            </p>
        </div>

        <div class="mt-4">
            <p class="font-semibold">Hobi</p>
            <p>{{ $profile->hobi ?? '-' }}</p>
        </div>

        <div class="mt-4">
            <p class="font-semibold">Kelebihan</p>
            <p>{{ $profile->kelebihan ?? '-' }}</p>
        </div>

        <div class="mt-4">
            <p class="font-semibold">Kekurangan</p>
            <p>{{ $profile->kekurangan ?? '-' }}</p>
        </div>

    </div>

</div>

</body>
</html>