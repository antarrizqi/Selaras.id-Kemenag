<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<h1 class="text-2xl font-bold mb-6 text-center">
    Temukan Calon Pasangan 💖
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

@forelse($candidates as $item)
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition duration-300 flex flex-col">

        <a href="{{ url('/profile/'.$item->id) }}" class="flex-grow">
            @if($item->foto_profil)
                <img src="{{ asset('storage/'.$item->foto_profil) }}"
                     class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                    <span class="text-gray-500 font-medium">No Image</span>
                </div>
            @endif

            <div class="p-4">
                <h2 class="text-lg font-bold text-gray-800">
                    {{ $item->user->name }}
                </h2>

                <p class="text-sm text-gray-500 italic">
                    {{ $item->kota_domisili }}
                </p>

                <p class="text-sm mt-2 line-clamp-2 text-gray-600">
                    {{ $item->deskripsi_diri }}
                </p>
            </div>
        </a>
        
<a href="{{ route('profile.show', $item->id) }}">
    <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
        Lihat Profil
    </button>
</a>
<form method="POST" action="{{ route('taaruf.request') }}">
    @csrf
    <input type="hidden" name="to_user_id" value="{{ $item->user->id }}">
    <button class="bg-green-500 text-white px-3 py-1 rounded">
        Ajukan Taaruf
    </button>
</form>

    </div>
@empty
    <div class="col-span-full text-center py-20">
        <p class="text-gray-500 text-lg">Belum ada kandidat 😢</p>
    </div>
@endforelse

</div>

</body>
</html>