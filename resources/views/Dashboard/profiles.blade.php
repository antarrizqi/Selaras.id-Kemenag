<!DOCTYPE html>
<html>
<head>
    <title>Admin - Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

<h1 class="text-3xl font-bold mb-6">Admin Panel - Profiles</h1>

<!-- ALERT -->
@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
    {{ session('error') }}
</div>
@endif

<!-- TABLE -->
<div class="bg-white shadow rounded overflow-hidden">

<table class="w-full text-center">

    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">User</th>
            <th class="p-3">Kota</th>
            <th class="p-3">Status</th>
            <th class="p-3">Action</th>
        </tr>
    </thead>

    <tbody>

    @forelse($profiles as $profile)
        <tr class="border-b hover:bg-gray-50">

            <!-- USER -->
            <td class="p-3 font-semibold">
                {{ $profile->user->name ?? 'User tidak ditemukan' }}
            </td>

            <!-- KOTA -->
            <td class="p-3">
                {{ $profile->kota_domisili ?? '-' }}
            </td>

            <!-- STATUS -->
            <td class="p-3">
                <span class="
                    @if($profile->status == 'pending') text-yellow-500 font-bold
                    @elseif($profile->status == 'approved') text-green-600 font-bold
                    @else text-red-500 font-bold
                    @endif
                ">
                    {{ $profile->status }}
                </span>
            </td>

            <!-- ACTION -->
            <td class="p-3">

                @if($profile->status == 'pending')

                    <!-- APPROVE -->
                    <form action="/admin/profile/{{ $profile->id }}/approve" method="POST" class="inline">
                        @csrf
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                            Approve
                        </button>
                    </form>

                    <!-- REJECT -->
                    <form action="/admin/profile/{{ $profile->id }}/reject" method="POST" class="inline">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            Reject
                        </button>
                    </form>

                @else
                    <span class="text-gray-400">Done</span>
                @endif

            </td>

        </tr>
    @empty
        <tr>
            <td colspan="4" class="p-5 text-gray-500">
                Belum ada data
            </td>
        </tr>
    @endforelse

    </tbody>

</table>

</div>

</body>
</html>