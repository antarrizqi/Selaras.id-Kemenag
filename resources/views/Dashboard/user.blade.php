<h2 class="text-xl font-bold mb-3">Permintaan Masuk</h2>

@if($requests->isEmpty())
    <p class="text-gray-500">Belum ada permintaan</p>
@endif

@foreach($requests as $req)
<div class="bg-white p-4 rounded shadow mb-3">

    <p class="font-bold">{{ $req->fromUser->name }}</p>

    <a href="{{ route('profile.show', $req->fromUser->profile->id) }}" 
       class="text-blue-500 underline">
        Lihat Profil
    </a>

    <div class="flex gap-2 mt-2">
        <form method="POST" action="{{ route('taaruf.accept', $req->id) }}">
            @csrf
            <button class="bg-green-500 text-white px-3 py-1 rounded">
                Terima
            </button>
        </form>

        <form method="POST" action="{{ route('taaruf.reject', $req->id) }}">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Tolak
            </button>
        </form>
    </div>

</div>
@endforeach