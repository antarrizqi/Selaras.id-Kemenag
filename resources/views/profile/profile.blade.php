<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div class="profile-container">
    <h1>Profil Pengguna</h1>
    <ul>
        <li><strong>Nama:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Username:</strong> {{ $user->username ?? '-' }}</li>
        <li><strong>Tanggal Bergabung:</strong> {{ $user->created_at->format('d M Y') }}</li>
        <!-- Tambahkan field lain sesuai model User -->
    </ul>
</div>