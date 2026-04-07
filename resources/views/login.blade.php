<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md">

    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <input name="email" placeholder="Email"
        class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-indigo-400">

        <input type="password" name="password"
        placeholder="Password"
        class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-indigo-400">

        <button
        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold">
        Login
        </button>

    </form>

</div>

</body>
</html>