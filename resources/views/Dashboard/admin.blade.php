<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Dashboard Admin
    </h1>

    {{-- dashboard sisi admin --}}


    <!-- ALERT -->
    @if(session('success'))
        <div class="bg-green-200 p-3 mb-4 rounded text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-200 p-3 mb-4 rounded text-red-800">
            {{ session('error') }}
        </div>
    @endif

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($profiles as $profile)

        <div class="bg-white p-5 rounded-xl shadow">

            <!-- USER -->
            
            <h2 class="text-lg font-bold">
                {{ $profile->user->name }}
            </h2>

            <p class="text-sm text-gray-600">
                {{ $profile->user->email }}
            </p>

            <p class="text-sm text-gray-500">
                {{ $profile->user->phone ?? '-' }}
            </p>
<span>Umur lo: {{ $profile->umur }} Tahun</span>            <!-- IMAGE (FIXED) -->
          @if($profile->foto_profil && file_exists(public_path($profile->foto_profil)))
    <img src="{{ asset($profile->foto_profil) }}"
         class="w-full h-40 object-cover rounded mt-3">
@endif

            <!-- DATA -->
            <p class="mt-2"><b>Kota:</b> {{ $profile->kota_domisili }}</p>
            <p><b>Gender:</b> {{ $profile->jenis_kelamin }}</p>

            <p class="text-sm text-gray-700 mt-1 line-clamp-2">
                {{ $profile->deskripsi_diri }}
            </p>

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
            <div class="mt-4 flex flex-wrap gap-2">

                <!-- APPROVE / REJECT -->
                @if($profile->status == 'pending')

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

                @endif
                <td class="px-6 py-4">
    <div class="flex gap-2">
        <form action="{{ route('admin.deleteUser', $profile->user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
    @csrf
    @method('DELETE') <button type="submit" class="text-red-600 hover:underline">
        Hapus User
    </button>
</form>
    </div>
</td>

                <!-- VIEW -->
                <a href="{{ route('admin.view', $profile->id) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded">
                    View CV
                </a>

                <!-- MAKE MEDIATOR -->
                @if($profile->user->role !== 'mediator')
                  <form method="POST" action="{{ route('admin.makeMediator', $profile->user->id) }}">
    @csrf
    <button class="bg-purple-500 text-white px-2 py-1 rounded mt-2">
        Jadikan Mediator
    </button>
</form>
                @else
                    <span class="text-sm text-gray-500">
                        Sudah mediator
                    </span>
                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>

</body>
</html>