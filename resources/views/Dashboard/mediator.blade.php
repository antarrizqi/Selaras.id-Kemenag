<!DOCTYPE html>
<html>
<head>
    <title>Mediator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-4xl mx-auto">

<h1 class="text-2xl font-bold mb-4">Dashboard Mediator</h1>
  

<h2 class="text-xl font-bold mb-3">Permintaan Masuk</h2>

@forelse($data as $t)

<div class="bg-white p-4 rounded shadow mb-4">

    <p class="font-bold">
        {{ $t->fromUser->name }} → {{ $t->toUser->name }}
    </p>

    <form method="POST" action="{{ route('taaruf.delete', $t->id) }}">
    @csrf
    @method('DELETE')
    <button class="bg-red-500 text-white px-2 py-1 rounded">
        Hapus
    </button>
</form>

    {{-- LINK PROFIL --}}
    <div class="mt-2 space-x-3">

        @if($t->fromUser->profile)
            <a href="{{ route('profile.show', $t->fromUser->profile->id) }}"
               class="text-blue-500 underline text-sm">
               Lihat Profil Pengaju
            </a>
        @endif

        @if($t->toUser->profile)
            <a href="{{ route('profile.show', $t->toUser->profile->id) }}"
               class="text-green-500 underline text-sm">
               Lihat Profil Target
            </a>
        @endif

    </div>

    {{--  NOMOR HP --}}
    <div class="mt-3 text-sm">
        <a href="https://wa.me/{{ $t->fromUser->phone }}" target="_blank"
   class="bg-green-500 text-white px-3 py-1 rounded">
   <p>No HP Pengaju</p>
</a>

<a href="https://wa.me/{{ $t->toUser->phone }}" target="_blank"
   class="bg-green-500 text-white px-3 py-1 rounded">
   No HP Target
</a>
      
    </div>

</div>

@empty
<p class="text-gray-500">Belum ada pasangan taaruf</p>
@endforelse

</body>
</html>