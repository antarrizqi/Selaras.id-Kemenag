<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Profile</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex justify-center items-center">

<div class="bg-white p-8 rounded-xl shadow w-full max-w-3xl">

<h1 class="text-2xl font-bold mb-6 text-center">CV Saya</h1>

<div class="space-y-3">

<p><b>Alamat:</b> {{ $profile->alamat_domisili }}</p>
<p><b>Kota:</b> {{ $profile->kota_domisili }}</p>
<p><b>Tinggi:</b> {{ $profile->tinggi_badan }}</p>
<p><b>Berat:</b> {{ $profile->berat_badan }}</p>
<p><b>Suku:</b> {{ $profile->suku }}</p>
<p><b>Warna Kulit:</b> {{ $profile->warna_kulit }}</p>
<p><b>Deskripsi:</b> {{ $profile->deskripsi_diri }}</p>
<p><b>Hobi:</b> {{ $profile->hobi }}</p>
<p><b>Organisasi:</b> {{ $profile->organisasi }}</p>
<p><b>Kelebihan:</b> {{ $profile->kelebihan }}</p>
<p><b>Kekurangan:</b> {{ $profile->kekurangan }}</p>
<p><b>Aktivitas Harian:</b> {{ $profile->aktivitas_harian }}</p>
<p><b>Riwayat Penyakit:</b> {{ $profile->riwayat_penyakit }}</p>
<p><b>Status Pernikahan:</b> {{ $profile->status_pernikahan }}</p>
<p><b>Jumlah Anak:</b> {{ $profile->jumlah_anak }}</p>
<p><b>Kriteria Pasangan:</b> {{ $profile->kriteria_pasangan }}</p>

</div>

<div class="mt-6 flex gap-4">

<a href="/profile/edit"
class="bg-yellow-500 text-white px-4 py-2 rounded">
Edit
</a>

<form method="POST" action="/profile/delete">
@csrf
@method('DELETE')

<button class="bg-red-500 text-white px-4 py-2 rounded">
Delete
</button>

</form>

</div>

</div>

</body>
</html>