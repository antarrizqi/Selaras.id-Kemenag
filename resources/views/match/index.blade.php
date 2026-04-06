<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Cari Pasangan</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 p-10">

<h1 class="text-3xl font-bold mb-8">
Cari Calon Pasangan
</h1>

<div class="grid grid-cols-3 gap-6">

@foreach($profiles as $profile)

<div class="bg-white p-4 rounded shadow">

<img
src="/storage/{{ $profile->foto_profil }}"
class="w-full h-48 object-cover rounded"
/>

<h2 class="text-xl font-bold mt-3">
{{ $profile->user->name }}
</h2>

<p>{{ $profile->kota_domisili }}</p>

<a
href="/match/{{ $profile->id }}"
class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded">

Lihat Profil

</a>

</div>

@endforeach

</div>

</body>
</html>