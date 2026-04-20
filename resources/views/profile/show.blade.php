<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">

    <!-- 🔙 BACK BUTTON -->
   <a href="{{ url()->previous() }}" 
   class="bg-gray-500 text-white px-3 py-1 rounded">
   Kembali
</a>

    <!-- FOTO -->
  @if($profile->foto_profil)
    <img src="{{ asset($profile->foto_profil) }}"
         class="w-full h-40 object-cover rounded mt-3">
@endif

    <!-- DATA USER -->
    <h1 class="text-2xl font-bold mb-2">
        {{ $profile->user->name }}
    </h1>

    <p class="text-gray-600 mb-4">
        {{ $profile->kota_domisili }}
    </p>

    <!-- DESKRIPSI -->
    <div class="mb-4">
        <h2 class="font-semibold">Deskripsi</h2>
        <p>{{ $profile->deskripsi_diri }}</p>
    </div>

    <!-- INFO TAMBAHAN -->
    <div class="grid grid-cols-2 gap-4 text-sm">

        <p><strong>Jenis Kelamin:</strong> {{ $profile->jenis_kelamin }}</p>
        <p><strong>Tinggi:</strong> {{ $profile->tinggi_badan }} cm</p>
        <p><strong>Berat:</strong> {{ $profile->berat_badan }} kg</p>
        <p><strong>Suku:</strong> {{ $profile->suku }}</p>

    </div>

    <!-- 🔥 ACTION BUTTON -->
    <div class="mt-6 flex gap-3">




        <!-- ✅ BUTTON TAARUF (HANYA USER LAIN) -->
        @auth
            @if(auth()->id() !== $profile->user_id && auth()->user()->role === 'user')

                <form method="POST" action="{{ route('taaruf.request') }}">
                    @csrf

                    <input type="hidden" name="to_user_id" value="{{ $profile->user_id }}">

                    <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded">
                        Ajukan Taaruf
                    </button>
                </form>

            @endif
        @endauth

    </div>

</div>

</body>
</html>