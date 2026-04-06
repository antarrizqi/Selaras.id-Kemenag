<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Login</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-xl shadow w-full max-w-md">

<h1 class="text-2xl font-bold text-center mb-6">
Login
</h1>

<form method="POST" action="/login" class="space-y-4">

@csrf

<input
name="email"
type="email"
placeholder="Email"
class="w-full border p-2 rounded"
/>

<input
name="password"
type="password"
placeholder="Password"
class="w-full border p-2 rounded"
/>

<button
class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">

Login

</button>

</form>

<a href="/register" class="text-sm text-center block mt-4 text-blue-600">
Belum punya akun? Daftar
</a>

</div>

</body>
</html>