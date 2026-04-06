<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Buat CV</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-xl shadow w-full max-w-3xl">

<h1 class="text-2xl font-bold mb-6 text-center">
Buat CV Profil
</h1>

<form
method="POST"
action="/profile/store"
enctype="multipart/form-data"
class="space-y-4">

@csrf

<label class="block">
Foto Profil
<input type="file" name="foto_profil"
class="w-full border p-2 rounded">
</label>

<input
name="alamat_domisili"
placeholder="Alamat Domisili"
class="w-full border p-2 rounded"
/>

<input
name="kota_domisili"
placeholder="Kota Domisili"
class="w-full border p-2 rounded"
/>

<div class="grid grid-cols-2 gap-4">

<input
name="tinggi_badan"
type="number"
placeholder="Tinggi Badan"
class="border p-2 rounded"
/>

<input
name="berat_badan"
type="number"
placeholder="Berat Badan"
class="border p-2 rounded"
/>

</div>

<input
name="suku"
placeholder="Suku"
class="w-full border p-2 rounded"
/>

<input
name="warna_kulit"
placeholder="Warna Kulit"
class="w-full border p-2 rounded"
/>

<textarea
name="deskripsi_diri"
placeholder="Deskripsi diri"
class="w-full border p-2 rounded"></textarea>

<textarea
name="hobi"
placeholder="Hobi"
class="w-full border p-2 rounded"></textarea>

<textarea
name="organisasi"
placeholder="Organisasi"
class="w-full border p-2 rounded"></textarea>

<textarea
name="kelebihan"
placeholder="Kelebihan"
class="w-full border p-2 rounded"></textarea>

<textarea
name="kekurangan"
placeholder="Kekurangan"
class="w-full border p-2 rounded"></textarea>

<textarea
name="aktivitas_harian"
placeholder="Aktivitas Harian"
class="w-full border p-2 rounded"></textarea>

<textarea
name="riwayat_penyakit"
placeholder="Riwayat Penyakit"
class="w-full border p-2 rounded"></textarea>

<select
name="status_pernikahan"
class="w-full border p-2 rounded">

<option value="">Status Pernikahan</option>
<option value="Belum Menikah">Belum Menikah</option>
<option value="Pernah Menikah">Pernah Menikah</option>

</select>

<input
name="jumlah_anak"
type="number"
placeholder="Jumlah Anak"
class="w-full border p-2 rounded"
/>

<textarea
name="kriteria_pasangan"
placeholder="Kriteria pasangan"
class="w-full border p-2 rounded"></textarea>

<button
class="w-full bg-green-600 text-white py-3 rounded">

Simpan CV

</button>

</form>

</div>

</body>
</html>