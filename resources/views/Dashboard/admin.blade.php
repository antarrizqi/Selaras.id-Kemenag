<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

@if(session('success'))
    <div class="bg-green-200 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-200 p-3 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

@foreach($profiles as $profile)

<div class="bg-white p-5 rounded-xl shadow">

    <!-- USER INFO -->
    <h2 class="text-lg font-bold">
        {{ $profile->user->name }}
    </h2>

    <p class="text-sm text-gray-600">
        {{ $profile->user->email }}
    </p>

    <!-- FOTO -->
    @if($profile->foto_profil)
        <img src="{{ asset($item->foto_profil) }}"
        class="w-full h-40 object-cover rounded mt-3">
    @endif

    <!-- DATA CV -->
    <p class="mt-2"><b>Kota:</b> {{ $profile->kota_domisili }}</p>
    <p><b>Gender:</b> {{ $profile->jenis_kelamin }}</p>
    <p><b>Deskripsi:</b> {{ $profile->deskripsi_diri }}</p>

    <!-- STATUS -->
    <p class="mt-2">
        <b>Status:</b>
        <span class="
            {{ $profile->status == 'approved' ? 'text-green-600' : '' }}
            {{ $profile->status == 'rejected' ? 'text-red-600' : '' }}
            {{ $profile->status == 'pending' ? 'text-yellow-600' : '' }}
        ">
            {{ $profile->status }}
        </span>
    </p>



    <!-- ACTION -->
    @if($profile->status == 'pending')

    <div class="mt-4 flex gap-2">

        <form action="{{ route('admin.approve', $profile->id) }}" method="POST">
            @csrf
            <button class="bg-green-500 text-white px-3 py-1 rounded">
                Approve
            </button>
        </form>

        <form action="{{ route('admin.reject', $profile->id) }}" method="POST">
            @csrf
            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Reject
            </button>
        </form>

    </div>

    <span>
        <form action="{{ Route('admin.view',$profile->id) }}" method="GET">
            @csrf
            <button class="bg-blue-500 text-white px-3 py-1 rounded mt-2">
                View CV
            </button>
        </form>
    </span>

    @endif

</div>

@endforeach

</div>

</body>
</html>