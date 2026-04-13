<!DOCTYPE html>
<html>
<head>
    <title>Match</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<h1 class="text-2xl font-bold mb-6 text-center">
    Cari Pasangan
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

@foreach($candidates as $item)

<div class="bg-white p-4 rounded-xl shadow">
{{-- foto --}}
   <img src="{{ asset('storage/'.$item->foto_profil) }}">

    <h2 class="text-lg font-bold">
        {{ $item->user->name }}
    </h2>
{{-- info --}}
    <p class="text-sm text-gray-600">
        {{ $item->kota_domisili }}
    </p>

    <p class="text-sm mt-2">
        {{ $item->deskripsi_diri }}
    </p>

</div>

@endforeach

</div>

</body>
</html>