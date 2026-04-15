<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen py-10 px-4">

<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6 text-white flex flex-col md:flex-row items-center gap-6">
        
        <!-- FOTO -->
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow">
            <img 
                src="{{ asset($profile->foto_profil) }}" 
                alt="Foto Profil"
                class="w-full h-full object-cover"
            >
        </div>

        <!-- INFO UTAMA -->
        <div>
            <h1 class="text-2xl font-bold">
                {{ $profile->user->name }}
            </h1>
            <p class="text-sm opacity-90">
                {{ $profile->user->email }}
            </p>

            <p class="mt-2 text-sm">
                {{ $profile->jenis_kelamin }} • {{ $profile->kota_domisili }}
            </p>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- KOLOM KIRI -->
        <div class="space-y-4">

            <div>
                <h2 class="font-semibold text-gray-700">Domisili</h2>
                <p>{{ $profile->alamat_domisili }}, {{ $profile->kota_domisili }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Fisik</h2>
                <p>{{ $profile->tinggi_badan }} cm / {{ $profile->berat_badan }} kg</p>
                <p>{{ $profile->warna_kulit }} • {{ $profile->suku }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Status</h2>
                <p>{{ $profile->status_pernikahan }} | Anak: {{ $profile->jumlah_anak }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Riwayat Penyakit</h2>
                <p>{{ $profile->riwayat_penyakit }}</p>
            </div>

        </div>

        <!-- KOLOM KANAN -->
        <div class="space-y-4">

            <div>
                <h2 class="font-semibold text-gray-700">Deskripsi Diri</h2>
                <p>{{ $profile->deskripsi_diri }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Hobi</h2>
                <p>{{ $profile->hobi }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Organisasi</h2>
                <p>{{ $profile->organisasi }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Kelebihan & Kekurangan</h2>
                <p><b>Kelebihan:</b> {{ $profile->kelebihan }}</p>
                <p><b>Kekurangan:</b> {{ $profile->kekurangan }}</p>
            </div>

        </div>

        <!-- FULL WIDTH -->
        <div class="md:col-span-2 space-y-4">

            <div>
                <h2 class="font-semibold text-gray-700">Aktivitas Harian</h2>
                <p>{{ $profile->aktivitas_harian }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Visi Misi Pernikahan</h2>
                <p>{{ $profile->visi_misi_pernikahan }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-gray-700">Kriteria Pasangan</h2>
                <p>{{ $profile->kriteria_pasangan }}</p>
            </div>

        </div>

    </div>

    <!-- FOOTER BUTTON -->
    <div class="p-6 border-t flex justify-between items-center">

        <a href="/match" class="text-gray-600 hover:underline">
            ← Kembali
        </a>

        @if($profile->status !== 'approved')
        <a href="{{ route('profile.edit', $profile->id) }}" 
           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Edit CV
        </a>
        @endif

    </div>

</div>

</body>
</html>