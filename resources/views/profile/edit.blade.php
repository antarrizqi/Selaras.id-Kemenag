<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Profile</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow w-full max-w-3xl">

<h1 class="text-2xl font-bold mb-6 text-center">Edit CV</h1>

<form method="POST" action="/profile/update" class="space-y-4">

@csrf
@method('PUT')

<input name="alamat_domisili"
value="{{ $profile->alamat_domisili }}"
class="w-full border p-2 rounded">

<input name="kota_domisili"
value="{{ $profile->kota_domisili }}"
class="w-full border p-2 rounded">

<input name="tinggi_badan"
value="{{ $profile->tinggi_badan }}"
class="w-full border p-2 rounded">

<input name="berat_badan"
value="{{ $profile->berat_badan }}"
class="w-full border p-2 rounded">

<textarea name="deskripsi_diri"
class="w-full border p-2 rounded">{{ $profile->deskripsi_diri }}</textarea>

<button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
Update CV
</button>

</form>

</div>

</body>
</html>