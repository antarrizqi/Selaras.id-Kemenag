<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Profil - Selaras.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-4xl mx-auto">

    <a href="{{ url()->previous() }}"
       class="inline-block mb-4 text-sm text-gray-600 hover:underline">
        ← Kembali
    </a>

    {{-- CEK APAKAH PROFIL ADA --}}
    @if(!$profile)
        <div class="bg-white rounded-2xl shadow p-12 text-center">
            <div class="text-5xl mb-4">👤</div>
            <h2 class="text-xl font-bold text-gray-800">Profil Belum Lengkap</h2>
            <p class="text-gray-500 mt-2 mb-6">Lo belum ngisi data diri, jadi halamannya nggak bisa nampilin apa-apa.</p>
            <a href="{{ route('profile.create') }}" 
               class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Buat Profil Sekarang
            </a>
        </div>
    @else
        {{-- JIKA ADA, BARU TAMPILIN SEMUA INI --}}
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="h-56 bg-gray-200">
                @if($profile->foto_profil && file_exists(public_path($profile->foto_profil)))
                    <img src="{{ asset($profile->foto_profil) }}"
                         class="w-full h-full object-cover">
                @else
                    <img src="https://via.placeholder.com/600x300"
                         class="w-full h-full object-cover">
                @endif
            </div>

            <div class="p-6">

                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ $profile->user->name }}
                    </h1>

                    <p class="text-gray-500 text-sm">
                        {{ $profile->kota_domisili ?? '-' }} • {{ $profile->umur ?? '-' }} tahun
                    </p>
                </div>

                <div class="mb-6">
                    <h2 class="font-semibold text-gray-700 mb-1">Tentang</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $profile->deskripsi_diri ?? '-' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-gray-500">Tinggi</p>
                        <p class="font-semibold">{{ $profile->tinggi_badan ?? '-' }} cm</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-gray-500">Berat</p>
                        <p class="font-semibold">{{ $profile->berat_badan ?? '-' }} kg</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-gray-500">Suku</p>
                        <p class="font-semibold">{{ $profile->suku ?? '-' }}</p>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-gray-500">Status</p>
                        <p class="font-semibold">{{ $profile->status_pernikahan ?? '-' }}</p>
                    </div>
                </div>

                <div class="space-y-3 text-sm mb-6">
                    <p><b>Hobi:</b> {{ $profile->hobi ?? '-' }}</p>
                    <p><b>Kelebihan:</b> {{ $profile->kelebihan ?? '-' }}</p>
                    <p><b>Kekurangan:</b> {{ $profile->kekurangan ?? '-' }}</p>
                </div>

                <div>
                    <h2 class="font-semibold text-gray-700 mb-1">Kriteria Pasangan</h2>
                    <p class="text-gray-600 text-sm">
                        {{ $profile->kriteria_pasangan ?? '-' }}
                    </p>
                </div>

            </div>
        </div>
    @endif

</div>

</body>
</html>