<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selaras — Platform Ta'aruf Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Lora', 'serif'],
                    },
                    colors: {
                        green: {
                            DEFAULT: '#2D7D52',
                            mid: '#4A9B6F',
                            dark: '#1A4A2E',
                            soft: '#E8F5EE',
                            pale: '#F2FAF5',
                        },
                        gold: {
                            DEFAULT: '#C8933A',
                            soft: '#FBF3E6',
                            border: '#EDD9B8',
                        },
                        brand: {
                            text: '#1E2A1E',
                            muted: '#6B7B6B',
                            border: '#E2EBE2',
                            bg: '#FAFAF8',
                        },
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Montserrat', sans-serif; scroll-behavior: smooth; }
        .font-serif { font-family: 'Lora', serif; }
        .hero-gradient { background: linear-gradient(160deg, #1A4A2E 0%, #2D7D52 60%, #3D9462 100%); }
        
        @media (min-width: 1024px) {
            .step-line::before {
                content: '';
                position: absolute;
                top: 28px;
                left: 10%;
                right: 10%;
                height: 1.5px;
                background: #E2EBE2;
                z-index: 0;
            }
        }
    </style>
</head>
<body class="bg-brand-bg text-brand-text antialiased overflow-x-hidden">

{{-- ===== NAVBAR ===== --}}
<nav class="sticky top-0 z-[100] bg-white/90 backdrop-blur-md border-b border-brand-border h-16 md:h-20">
    <div class="max-w-7xl mx-auto h-full flex items-center justify-between px-[5%]">
        <a href="/" class="font-serif text-xl md:text-2xl font-bold text-green tracking-tight">
            Selar<span class="text-brand-text">as</span>
        </a>

        <div class="hidden lg:flex items-center gap-8">
            <a href="/" class="text-[11px] text-brand-muted font-bold uppercase tracking-widest hover:text-green transition-all">Beranda</a>
            <a href="#cara-kerja" class="text-[11px] text-brand-muted font-bold uppercase tracking-widest hover:text-green transition-all">Cara Kerja</a>
            <a href="#fitur" class="text-[11px] text-brand-muted font-bold uppercase tracking-widest hover:text-green transition-all">Fitur</a>
            <a href="#kelas" class="text-[11px] text-brand-muted font-bold uppercase tracking-widest hover:text-green transition-all">Kelas Pra Nikah</a>
            <a href="#" class="text-[11px] text-brand-muted font-bold uppercase tracking-widest hover:text-green transition-all">Informasi</a>
        </div>

        <div class="flex items-center gap-3">
            <a href="/login" class="text-[10px] md:text-xs font-bold text-green border-2 border-green rounded-full px-5 py-2 hover:bg-green hover:text-white transition-all uppercase tracking-wider">Login</a>
            <a href="/register" class="text-[10px] md:text-xs font-bold text-white bg-green rounded-full px-5 py-2.5 hover:bg-green-mid transition-all uppercase tracking-wider shadow-md">Daftar</a>
        </div>
    </div>
</nav>

{{-- ===== HERO ===== --}}
<section class="hero-gradient relative min-h-[85vh] lg:min-h-[600px] flex items-center pt-16 pb-0 lg:py-20 overflow-hidden">
    <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-white/5 rounded-full blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-[5%] grid lg:grid-cols-2 gap-12 items-end relative z-10 w-full">
        <div class="text-center lg:text-left pb-16 lg:pb-12">
            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-white text-[10px] font-bold px-4 py-2 rounded-full mb-6 uppercase tracking-[3px]">
                <span class="w-2 h-2 rounded-full bg-[#7DEBA0]"></span>
                Platform Ta'aruf Terbaik
            </div>
            
            <h1 class="font-serif text-4xl md:text-6xl text-white font-semibold leading-[1.2] mb-6">
                Match Online,<br>
                Meet Offline,<br>
                <em class="text-[#A8DFC0] not-italic">With Ustadz</em>
            </h1>

            <p class="text-white/70 text-base md:text-lg font-light mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                Aplikasi mencari pasangan sesuai syariat — terencana, aman, dan penuh keberkahan.
            </p>

            <p class="text-[#7DEBA0] text-xs md:text-sm font-bold mb-10 tracking-[2px] uppercase">
                ✦ Match Online · Meet Offline · With Ustadz
            </p>

            <a href="/register" class="inline-block bg-white text-green font-bold text-xs px-10 py-4 rounded-full hover:shadow-2xl hover:-translate-y-1 transition-all uppercase tracking-widest shadow-xl">
                Daftar Sekarang
            </a>
        </div>

        <div class="flex justify-center lg:justify-end p-4">
    <div class="bg-white rounded-[40px] p-8 w-full max-w-[320px] shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
        
        <div class="flex items-center gap-4 mb-6">
            <div class="relative flex-shrink-0">
                <div class="w-14 h-14 rounded-full bg-gradient-to-br from-green-soft to-[#A8DFC0] flex items-center justify-center font-serif text-xl text-green font-bold border-2 border-white shadow-sm">
                    N
                </div>
                <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></div>
            </div>
            <div>
                <p class="font-bold text-base text-brand-text">Nadia</p>
                <p class="text-[11px] text-brand-muted font-medium">24 thn <span class="text-green mx-0.5">•</span> Jakarta</p>
            </div>
        </div>

        <div class="space-y-4 text-left">
            <div>
                <p class="text-[9px] text-brand-muted font-bold uppercase tracking-widest mb-1 opacity-70">Tentang</p>
                <p class="text-[11px] text-brand-text leading-relaxed">Pribadi yang tenang, senang belajar, dan menghargai kejujuran dalam berinteraksi.</p>
            </div>

            <div class="bg-green-pale/40 rounded-2xl p-3 border border-green/5">
                <p class="text-[9px] text-green font-bold uppercase tracking-widest mb-1">Visi Misi</p>
                <p class="text-[11px] text-brand-text leading-relaxed">Membangun keluarga yang harmonis dan saling mendukung dalam ketaatan.</p>
            </div>

            <div>
                <p class="text-[9px] text-brand-muted font-bold uppercase tracking-widest mb-1 opacity-70">Harapan</p>
                <p class="text-[11px] text-brand-text leading-relaxed">Bertemu pasangan yang bertanggung jawab dan mampu membimbing dalam kebaikan.</p>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

{{-- ===== STATS ===== --}}
{{-- <div class="bg-white py-12 border-b border-brand-border overflow-x-auto">
    <div class="max-w-7xl mx-auto px-[5%] flex justify-between gap-8 min-w-[700px]">
        @php
            $stats = [
                ['n' => '9', 'l' => 'Ikhwan Terdaftar'],
                ['n' => '4', 'l' => 'Akhwat Terdaftar'],
                ['n' => '2',  'l' => 'Telah Berta\'aruf'],
                ['n' => '0',   'l' => 'Pasangan Menikah'],
                ['n' => '1',     'l' => 'Ustadz Perantara'],
                ['n' => '0',     'l' => 'Kota Layanan'],
            ];
        @endphp
        @foreach($stats as $s)
        <div class="text-center">
            <p class="font-serif text-2xl text-green font-bold">{{ $s['n'] }}</p>
            <p class="text-[10px] font-extrabold text-brand-muted uppercase tracking-widest mt-1">{{ $s['l'] }}</p>
        </div>
        @endforeach
    </div>
</div> --}}

{{-- ===== ALUR TA'ARUF ===== --}}
<section class="py-24 bg-green-pale" id="cara-kerja">
    <div class="max-w-7xl mx-auto px-[5%]">
        <div class="mb-16">
            <p class="text-[11px] font-extrabold text-green uppercase tracking-[4px] mb-3">Alur Ta'aruf</p>
            <h2 class="font-serif text-3xl md:text-4xl text-brand-text font-semibold">Dari daftar hingga <em class="text-green-mid">pelaminan</em></h2>
        </div>

        <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-12 step-line">
            @php
                $steps = [
                    ['i' => '📝', 't' => 'Buat CV', 'd' => 'Isi profil ta\'aruf lalu menunggu ferifikasi dari admin'],
                    ['i' => '🔍', 't' => 'Ajukan Ta\'aruf', 'd' => 'Ajukan kepada calon yang sesuai kriteria kamu'],
                    ['i' => '📨', 't' => 'Terima Ta\'aruf', 'd' => 'Terima perkenalan dari calon yang dirasa cocok'],
                    ['i' => '💬', 't' => 'Tanya Jawab', 'd' => 'Lakukan tanya jawab melalui mediator/ustadz bisa diskusi dulu dengan calon pasangan dengan tinjauan mediator'],
                    ['i' => '🤝', 't' => 'Nadzor', 'd' => 'Bertemu langsung untuk mendapat kemantaban hati'],
                ];
            @endphp
            @foreach($steps as $step)
            <div class="relative z-10 text-center flex flex-col items-center group">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm border-2 border-brand-border flex items-center justify-center text-2xl mb-6 group-hover:border-green group-hover:-translate-y-2 transition-all">
                    {{ $step['i'] }}
                </div>
                <h4 class="text-sm font-bold text-brand-text uppercase mb-2 tracking-wide">{{ $step['t'] }}</h4>
                <p class="text-xs text-brand-muted leading-relaxed font-medium px-2">{{ $step['d'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== FITUR ===== --}}
<section class="py-24" id="fitur">
    <div class="max-w-7xl mx-auto px-[5%]">
        <div class="mb-16">
            <p class="text-[11px] font-extrabold text-green uppercase tracking-[4px] mb-3">Kenapa Selaras?</p>
            <h2 class="font-serif text-3xl md:text-4xl text-brand-text font-semibold">Ta'aruf yang aman, <em class="text-green-mid">tertata, dan terjaga</em></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
               $feats = [
    [
        'i' => '🔒', 
        't' => 'Privasi Terjaga', 
        'd' => 'Data pribadi dan identitas Anda aman bersama kami dengan sistem enkripsi berlapis.'
    ],
    [
        'i' => '🕌', 
        't' => 'Didampingi Ustadz', 
        'd' => 'Proses ta\'aruf dibimbing langsung oleh ustadz perantara agar tetap sesuai syariat.'
    ],
    [
        'i' => '✅', 
        't' => 'Verifikasi Ketat', 
        'd' => 'Tim kami melakukan verifikasi manual yang ketat untuk memastikan keseriusan setiap anggota.'
    ],
    [
        'i' => '📚', 
        't' => 'Kelas Pra Nikah', 
        'd' => 'Segera hadir! Berbagai materi persiapan pernikahan dari pakar dan mitra terpercaya.'
    ],
];
            @endphp
            @foreach($feats as $f)
            <div class="bg-white border border-brand-border p-8 rounded-[32px] hover:shadow-2xl hover:border-green/10 transition-all group">
                <div class="w-14 h-14 bg-green-soft rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                    {{ $f['i'] }}
                </div>
                <h4 class="font-bold text-sm text-brand-text uppercase tracking-wide mb-3">{{ $f['t'] }}</h4>
                <p class="text-xs text-brand-muted leading-relaxed font-medium">{{ $f['d'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== KELAS ===== --}}
<section class="py-24 bg-gold-soft/30 border-t border-brand-border relative overflow-hidden" id="kelas">
    <div class="absolute inset-0 z-10 backdrop-blur-[2px] bg-white/40 flex flex-col items-center justify-center">
        <div class="bg-white px-8 py-4 rounded-3xl shadow-2xl border border-gold/20 text-center transform -rotate-2">
            <p class="text-gold font-extrabold tracking-[5px] uppercase text-xs mb-1">Coming Soon</p>
            <h3 class="text-brand-text font-serif text-2xl font-bold">Fitur Segera Hadir</h3>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-[5%] opacity-50 grayscale-[0.5] select-none pointer-events-none">
        <div class="mb-12">
            <p class="text-[11px] font-extrabold text-gold uppercase tracking-[4px] mb-3">Kelas Pra Nikah</p>
            <h2 class="font-serif text-3xl md:text-4xl text-brand-text font-semibold">Persiapkan diri sebelum <em class="text-gold">melangkah lebih jauh</em></h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $kelas = [
                    ['t' => 'Sekolah Pernikahan Nubbuwah', 'tag' => 'Dasar Pernikahan'],
                    ['t' => 'Lovengers — Menikah dengan Cinta', 'tag' => 'Pra Nikah'],
                    ['t' => 'Productive Marriage — Keluarga Produktif', 'tag' => 'Manajemen RT'],
                    ['t' => 'Rumah Konseling — Psikologi Pernikahan', 'tag' => 'Psikologi'],
                ];
            @endphp
            @foreach($kelas as $k)
            <div class="bg-white p-7 rounded-[28px] border border-gold-border shadow-sm flex flex-col justify-between">
                <div>
                    <span class="inline-block bg-gold-soft text-gold text-[9px] font-extrabold px-2.5 py-1 rounded-full mb-4 border border-gold-border uppercase tracking-widest">Online</span>
                    <h4 class="font-serif text-[15px] font-semibold text-brand-text mb-4 leading-snug">{{ $k['t'] }}</h4>
                    <p class="text-[11px] text-brand-muted mb-6">Mitra Selaras · Bersertifikat</p>
                </div>
                <div class="flex items-center justify-between border-t border-gray-50 pt-4">
                    <span class="text-[10px] font-bold text-brand-muted bg-gray-100 px-2 py-1 rounded uppercase tracking-wider">{{ $k['tag'] }}</span>
                    <span class="text-gold font-bold">→</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <span class="inline-block border-2 border-gray-300 text-gray-400 text-xs font-bold px-10 py-3.5 rounded-full uppercase tracking-widest cursor-not-allowed">Lihat Semua Kelas</span>
        </div>
    </div>
</section>

{{-- ===== TESTIMONI ===== --}}
<section class="py-24 bg-white">
    <div class="max-w-2xl mx-auto px-[5%] text-center">
        <span class="text-5xl text-gold/30 font-serif">“</span>
        <p class="font-serif text-lg md:text-xl text-brand-text leading-relaxed italic mb-8 -mt-4">
            Alhamdulillah, gak nyangka ketemu suami lewat Selaras. Prosesnya beneran bikin tenang — ada ustadz yang mendampingi, ada batasan yang jelas, tapi tetap terasa natural.
        </p>
        <p class="text-[11px] font-extrabold text-brand-muted uppercase tracking-[2px]">
            — Rahma & Fariz · <span class="text-gold">Menikah Maret 2024, Bandung</span>
        </p>
    </div>
</section>

<section class="py-20 bg-white border-t border-brand-border">
    <div class="max-w-4xl mx-auto px-[5%] text-center">
        <div class="inline-flex items-center gap-2 bg-green-soft/50 text-green text-[10px] font-extrabold px-4 py-1.5 rounded-full mb-6 uppercase tracking-[2px] border border-green/10">
            Siap Melangkah?
        </div>
        
        <h2 class="font-serif text-3xl md:text-4xl text-brand-text font-bold mb-4 leading-tight">
            Temukan pasangan <em class="text-green not-italic">terbaikmu</em> hari ini
        </h2>
        <p class="text-brand-muted text-sm md:text-base max-w-xl mx-auto mb-10">
            Bergabunglah dengan  anggota lainnya yang sedang berikhtiar membangun keluarga sakinah melalui proses yang terjaga.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="/register" class="w-full sm:w-auto px-10 py-4 bg-green text-white font-bold rounded-2xl shadow-lg shadow-green/20 hover:bg-green-dark hover:-translate-y-1 transition-all active:scale-95 text-sm">
                Daftar Sekarang
            </a>
            <a href="/login" class="w-full sm:w-auto px-10 py-4 bg-white text-brand-text font-bold rounded-2xl border-2 border-gray-100 hover:border-green hover:text-green transition-all text-sm">
                Masuk ke Akun
            </a>
        </div>
        
        <p class="mt-6 text-[11px] text-brand-muted italic">
            *Proses pendaftaran gratis dan data Anda dijamin kerahasiaannya.
        </p>
    </div>
</section>

{{-- ===== FOOTER ===== --}}
<footer class="bg-brand-text pt-20 pb-10">
    <div class="max-w-7xl mx-auto px-[5%]">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 border-b border-white/5 pb-16">
            <div class="md:col-span-2">
                <p class="font-serif text-3xl font-bold text-white mb-6">Selar<span class="text-green">as</span></p>
                <p class="text-sm text-white/40 leading-relaxed max-w-sm">Platform ta'aruf modern untuk yang serius mencari pasangan sesuai syariat Islam. Menjaga privasi dan kemuliaan setiap prosesnya.</p>
            </div>
            <div>
                <h4 class="text-[11px] font-bold text-white uppercase tracking-[3px] mb-6 text-green">Navigasi</h4>
                <ul class="space-y-4 text-xs text-white/40 font-bold uppercase tracking-widest">
                    <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#cara-kerja" class="hover:text-white transition-colors">Cara Kerja</a></li>
                    <li><a href="#fitur" class="hover:text-white transition-colors">Fitur</a></li>
                    <li><a href="#kelas" class="hover:text-white transition-colors">Kelas</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-[11px] font-bold text-white uppercase tracking-[3px] mb-6 text-green">Akun</h4>
                <ul class="space-y-4 text-xs text-white/40 font-bold uppercase tracking-widest">
                    <li><a href="/login" class="hover:text-white transition-colors">Login</a></li>
                    <li><a href="/register" class="hover:text-white transition-colors">Daftar</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] font-extrabold text-white/20 uppercase tracking-[3px]">
            <span>© 2026 Selaras Indonesia</span>
            <span>Handcrafted with ❤️ Love</span>
        </div>
    </div>
</footer>

</body>
</html>