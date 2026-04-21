<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Profile</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

{{-- user edit profile --}}
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow w-full max-w-3xl">

<h1 class="text-2xl font-bold mb-6 text-center">Edit CV</h1>

<form method="POST" action="/profile/update" class="space-y-4">

    <a href="{{ url()->previous() }}">
        <span class="text-gray-500 hover:text-gray-700">&larr; Kembali</span>
    </a>

@csrf
@method('PUT')

<input name="alamat_domisili"
placeholder="Alamat domisili"
value="{{ $profile->alamat_domisili }}"
class="w-full border p-2 rounded">

<input name="kota_domisili"
placeholder="Kota domisili"
value="{{ $profile->kota_domisili }}"
class="w-full border p-2 rounded">

<input name="tinggi_badan"
placeholder="Tinggi badan"
value="{{ $profile->tinggi_badan }}"
class="w-full border p-2 rounded">

<input name="berat_badan"
placeholder="Berat badan"
value="{{ $profile->berat_badan }}"
class="w-full border p-2 rounded">

<input type="kelebihan"
placeholder="Kelebihan"
value="{{ $profile->kelebihan }}"
class="w-full border p-2 rounded">


<input type="kekurangan"
placeholder="Kekurangan"
value="{{ $profile->kekurangan }}"
class="w-full border p-2 rounded" >
 

<input type="status_pernikahan"
placeholder="Status pernikahan"
value="{{ $profile->status_pernikahan }}"
class="w-full border p-2 rounded">


<input type="kriteria_pasangan"
placeholder="Kriteria pasangan"
value="{{ $profile->kriteria_pasangan }}"
class="w-full border p-2 rounded">


<input type="visi_misi_pernikahan"
placeholder="Visi misi pernikahan"
value="{{ $profile->visi_misi_pernikahan }}"
class="w-full border p-2 rounded">




<textarea name="deskripsi_diri"
placeholder="Deskripsi diri"
class="w-full border p-2 rounded">{{ $profile->deskripsi_diri }}</textarea>

<form action="{{ Route('profile.update') }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
        Simpan Perubahan
</form>

</form>

</div>

</body>
</html>