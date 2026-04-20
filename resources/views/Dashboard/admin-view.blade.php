<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>

<body class="bg-slate-50 p-4 md:p-10 text-slate-800">

<div class="max-w-4xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold tracking-tight">{{ $profile->user->name }}</h1>
            <p class="text-slate-500">{{ $profile->user->email }}</p>
        </div>

        @if($profile->status == 'pending')
        <div class="flex items-center gap-3">
            <form method="POST" action="{{ route('admin.reject', $profile->id) }}">
                @csrf
                <button class="px-5 py-2.5 rounded-lg border border-red-200 text-red-600 font-semibold hover:bg-red-50 transition-colors">
                    Reject
                </button>
            </form>
            <form method="POST" action="{{ route('admin.approve', $profile->id) }}">
                @csrf
                <button class="px-5 py-2.5 rounded-lg bg-emerald-600 text-white font-semibold hover:bg-emerald-700 shadow-md shadow-emerald-100 transition-all">
                    Approve Profile
                </button>
            </form>
        </div>
        @else
        <span class="px-4 py-1.5 rounded-full text-sm font-bold uppercase tracking-wide {{ $profile->status == 'approved' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
            Status: {{ $profile->status }}
        </span>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-3 rounded-2xl shadow-sm border border-slate-200">
                @if($profile->foto_profil)
                    <img src="{{ asset($profile->foto_profil) }}" 
                         class="w-full aspect-square object-cover rounded-xl shadow-inner">
                @else
                    <div class="w-full aspect-square bg-slate-200 rounded-xl flex items-center justify-center text-slate-400 text-xs">No Photo</div>
                @endif
                
                <div class="mt-4 p-2 space-y-3">
                    <div class="flex justify-between border-b border-slate-50 pb-2">
                        <span class="text-slate-400 text-sm">Gender</span>
                        <span class="font-semibold">{{ $profile->jenis_kelamin }}</span>
                    </div>
                    <div class="flex justify-between border-b border-slate-50 pb-2">
                        <span class="text-slate-400 text-sm">Suku</span>
                        <span class="font-semibold">{{ $profile->suku }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-400 text-sm">Usia/Anak</span>
                        <span class="font-semibold">{{ $profile->status_pernikahan }} ({{ $profile->jumlah_anak }})</span>
                    </div>
                </div>
            </div>

            <div class="bg-slate-900 text-white p-5 rounded-2xl shadow-xl">
                <h4 class="text-xs uppercase tracking-widest text-slate-400 mb-3 font-bold">Physical Traits</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase">Tinggi</p>
                        <p class="text-lg font-semibold">{{ $profile->tinggi_badan }}<span class="text-xs ml-1 text-slate-400">cm</span></p>
                    </div>
                    <div>
                        <p class="text-slate-500 text-[10px] uppercase">Berat</p>
                        <p class="text-lg font-semibold">{{ $profile->berat_badan }}<span class="text-xs ml-1 text-slate-400">kg</span></p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-slate-500 text-[10px] uppercase">Warna Kulit</p>
                        <p class="text-md font-medium">{{ $profile->warna_kulit }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="text-lg font-bold mb-4 text-slate-800 border-l-4 border-emerald-500 pl-4">Deskripsi & Aktivitas</h3>
                <div class="space-y-6">
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Tentang Saya</label>
                        <p class="mt-1 text-slate-700 italic leading-relaxed">"{{ $profile->deskripsi_diri }}"</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Aktivitas Harian</label>
                        <p class="mt-1 text-slate-700 leading-relaxed">{{ $profile->aktivitas_harian }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
                <h3 class="text-lg font-bold mb-4 text-slate-800 border-l-4 border-emerald-500 pl-4">Visi & Kriteria</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Visi Misi Pernikahan</label>
                        <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $profile->visi_misi_pernikahan }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Kriteria Pasangan</label>
                        <p class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $profile->kriteria_pasangan }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-red-50 p-6 rounded-2xl border border-red-100">
                    <label class="text-xs font-bold text-red-400 uppercase tracking-tighter">Riwayat Penyakit</label>
                    <p class="mt-1 text-red-900 font-medium">{{ $profile->riwayat_penyakit ?? 'Tidak ada' }}</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100">
                    <label class="text-xs font-bold text-blue-400 uppercase tracking-tighter">Organisasi/Hobi</label>
                    <p class="mt-1 text-blue-900 font-medium">{{ $profile->organisasi }} / {{ $profile->hobi }}</p>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>