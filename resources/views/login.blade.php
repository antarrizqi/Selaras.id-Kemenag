<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Selaras</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Lora:ital,wght@0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Lora', 'serif'],
                    },
                    colors: {
                        green: {
                            DEFAULT: '#2D7D52',
                            mid: '#4A9B6F',
                            soft: '#E8F5EE',
                        },
                        brand: {
                            text: '#1E2A1E',
                            muted: '#6B7B6B',
                            border: '#E2EBE2',
                            bg: '#FAFAF8',
                        },
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-brand-bg text-brand-text font-sans flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-[440px]">
        
        <div class="text-center mb-8">
            <a href="/" class="font-serif text-3xl font-semibold text-green tracking-tight">
                Selar<span class="text-brand-text">as</span>
            </a>
        </div>

        <div class="bg-white p-8 md:p-10 rounded-[32px] border border-brand-border shadow-[0_20px_50px_rgba(45,125,82,0.05)]">
            
            <div class="mb-8">
                <h2 class="font-serif text-2xl font-semibold text-brand-text">Selamat Datang</h2>
                <p class="text-brand-muted text-sm mt-1">Lanjutkan ikhtiar mencari pasangan selaras.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 p-4 mb-6 rounded-2xl text-xs font-medium flex items-start gap-3">
                    <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0116 0z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login" class="space-y-5">
                @csrf

                <div class="space-y-1.5">
                    <label class="text-[0.8rem] font-bold text-brand-text ml-1 uppercase tracking-wider">Email</label>
                    <input type="email" name="email" required
                        class="w-full bg-brand-bg border border-brand-border p-3.5 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                        placeholder="Masukkan email terdaftar">
                </div>

                <div class="space-y-1.5">
                    <div class="flex items-center justify-between px-1">
                        <label class="text-[0.8rem] font-bold text-brand-text uppercase tracking-wider">Password</label>
                        <a href="#" class="text-[0.75rem] font-semibold text-green hover:text-green-mid">Lupa?</a>
                    </div>
                    <input type="password" name="password" required
                        class="w-full bg-brand-bg border border-brand-border p-3.5 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                        placeholder="••••••••">
                </div>

                <label class="flex items-center gap-2 cursor-pointer group w-fit">
                    <input type="checkbox" class="w-4 h-4 rounded border-brand-border text-green focus:ring-green/20">
                    <span class="text-xs text-brand-muted font-medium group-hover:text-brand-text transition-colors">Ingat saya di perangkat ini</span>
                </label>

                <button type="submit"
                    class="w-full bg-green hover:bg-green-mid text-white py-4 rounded-full font-bold text-sm shadow-lg shadow-green/20 transition-all active:scale-[0.98] mt-2">
                    Masuk Sekarang
                </button>
            </form>

            <div class="mt-10 pt-6 border-t border-brand-border text-center">
                <p class="text-[0.85rem] text-brand-muted">
                    Belum punya akun Selaras? <br>
                    <a href="/register" class="text-green font-bold hover:underline inline-block mt-1">Daftar Ta'aruf Gratis</a>
                </p>
            </div>
        </div>

        <p class="text-center mt-8 text-[0.75rem] text-brand-muted">
            Butuh bantuan? <a href="#" class="font-bold hover:text-brand-text">Hubungi Admin Ustadz</a>
        </p>
    </div>

</body>
</html>