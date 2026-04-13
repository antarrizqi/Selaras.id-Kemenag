<!DOCTYPE html>
<html>
<head>
    <title>Rejected</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-red-100">

<div class="bg-white p-8 rounded-xl shadow text-center">
   <h1 class="text-center text-xl mt-10 text-red-500">
    ❌ Maaf, profil kamu ditolak
</h1>
    <p class="mt-2 text-gray-600">
        Silakan perbaiki data kamu.
    </p>

    <a href="/profile/{{ auth()->user()->profile->id }}/edit"
    class="inline-block mt-4 bg-blue-500 text-white px-4 py-2 rounded">
        Edit CV
    </a>
</div>

</body>
</html>