<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Ditolak — Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-[#FFF8F8] p-6 text-[#1E2A1E]">

    <div class="max-w-md w-full bg-white p-10 rounded-[40px] shadow-sm border border-red-50 text-center relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-2 bg-red-500"></div>
        
        <div class="mb-8 relative inline-block">
            <div class="bg-red-50 w-20 h-20 rounded-full flex items-center justify-center text-4xl shadow-inner border border-red-100">
                ⚠️
            </div>
        </div>

        <h1 class="text-2xl font-bold mb-4 tracking-tight text-red-600">
            Profil Kamu Belum Disetujui
        </h1>

        <p class="text-gray-500 text-sm leading-relaxed mb-8">
            Mohon maaf, Kak. Setelah kami tinjau, profil kamu belum memenuhi kriteria komunitas kami saat ini. 
            <br><br>
            Biasanya hal ini terjadi karena **foto yang kurang jelas, deskripsi yang terlalu singkat,** atau **data yang tidak valid.**
        </p>

        <div class="bg-red-50 rounded-3xl p-5 mb-8 border border-red-100">
            <p class="text-xs font-bold text-red-700 uppercase tracking-widest mb-2">Jangan Menyerah!</p>
            <p class="text-[11px] text-red-600 leading-relaxed">
                Kamu bisa memperbaiki CV kamu dan mengajukan verifikasi ulang di bagian registrasi.
            </p>
        </div>

        <div class="flex flex-col gap-3">
            
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs text-gray-400 hover:text-red-500 transition-all mt-2">
                    Keluar dari Akun
                </button>
            </form>
        </div>

        <p class="mt-8 text-[10px] text-gray-400">
            Butuh bantuan? Hubungi <a href="#" class="underline">Pusat Bantuan Selaras</a>
        </p>

    </div>

</body>
</html>