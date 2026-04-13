<!DOCTYPE html>
<html>
<head>
    <title>Detail User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-3">
        {{ $profile->user->name }}
    </h1>

    <p>Email: {{ $profile->user->email }}</p>

    @if($profile->foto_profil)
        <img src="{{ asset('storage/'.$profile->foto_profil) }}"
             class="w-full h-60 object-cover rounded mt-3">
    @endif

    <p class="mt-3"><b>Kota:</b> {{ $profile->kota_domisili }}</p>
    <p><b>Gender:</b> {{ $profile->jenis_kelamin }}</p>
    <p><b>Deskripsi:</b> {{ $profile->deskripsi_diri }}</p>

    <p class="mt-3">
        <b>Status:</b> {{ $profile->status }}
    </p>

    <!-- APPROVE / REJECT -->
    @if($profile->status == 'pending')
    <div class="mt-4 flex gap-2">

        <form method="POST" action="{{ route('admin.approve', $profile->id) }}">
            @csrf
            <button class="bg-green-500 text-white px-3 py-1 rounded">
                Approve
            </button>
        </form>

        <form method="POST" action="{{ route('admin.reject', $profile->id) }}">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Reject
            </button>
        </form>

    </div>
    @endif

</div>

</body>
</html>