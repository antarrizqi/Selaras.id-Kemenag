<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — Selaras</title>
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

<body class="bg-brand-bg text-brand-text font-sans flex items-center justify-center min-h-screen p-6 py-12">

    <div class="w-full max-w-[480px]">
        
        <div class="text-center mb-8">
            <a href="/" class="font-serif text-3xl font-semibold text-green tracking-tight">
                Selar<span class="text-brand-text">as</span>
            </a>
        </div>

        <div class="bg-white p-8 md:p-10 rounded-[32px] border border-brand-border shadow-[0_20px_50px_rgba(45,125,82,0.05)]">
            
            <div class="mb-8">
                <h2 class="font-serif text-2xl font-semibold text-brand-text">Buat Akun Baru</h2>
                <p class="text-brand-muted text-sm mt-1">Mulai langkah awal menjemput sakinah bersama Selaras.</p>
            </div>

            {{-- Error Handling --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 p-4 mb-6 rounded-2xl text-xs font-medium flex items-start gap-3">
                    <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0116 0z"></path></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/register" class="space-y-5">
                @csrf

                {{-- Nama --}}
                <div class="space-y-1.5">
                    <label class="text-[0.75rem] font-bold text-brand-text ml-1 uppercase tracking-wider">Nama Lengkap</label>
                    <input type="text" name="name" required
                        class="w-full bg-brand-bg border border-brand-border p-3.5 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                        placeholder="Nama sesuai KTP">
                </div>

                {{-- Email --}}
                <div class="space-y-1.5">
                    <label class="text-[0.75rem] font-bold text-brand-text ml-1 uppercase tracking-wider">Email</label>
                    <input type="email" name="email" required
                        class="w-full bg-brand-bg border border-brand-border p-3.5 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                        placeholder="Alamat email aktif">
                </div>

                {{-- Nomor HP --}}
                <div class="space-y-1.5">
                    <label class="text-[0.75rem] font-bold text-brand-text ml-1 uppercase tracking-wider">Nomor WhatsApp</label>
                    <input type="tel" name="phone" required
                        class="w-full bg-brand-bg border border-brand-border p-3.5 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                        placeholder="0812xxxxxxx">
                </div>

                {{-- Password --}}
                <div class="space-y-1.5">
                    <label class="text-[0.75rem] font-bold text-brand-text ml-1 uppercase tracking-wider">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                            class="w-full bg-brand-bg border border-brand-border p-3.5 pr-12 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                            placeholder="Min. 8 karakter">
                        
                        <button type="button" onclick="togglePassword('password', 'eye-icon-1')" class="absolute right-4 top-1/2 -translate-y-1/2 text-brand-muted hover:text-green transition-colors focus:outline-none">
                            <svg id="eye-icon-1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="space-y-1.5">
                    <label class="text-[0.75rem] font-bold text-brand-text ml-1 uppercase tracking-wider">Konfirmasi Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full bg-brand-bg border border-brand-border p-3.5 pr-12 rounded-2xl outline-none focus:ring-2 focus:ring-green/10 focus:border-green transition-all placeholder:text-brand-muted/50 text-sm"
                            placeholder="Ulangi password">
                        
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-2')" class="absolute right-4 top-1/2 -translate-y-1/2 text-brand-muted hover:text-green transition-colors focus:outline-none">
                            <svg id="eye-icon-2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-green hover:bg-green-mid text-white py-4 rounded-full font-bold text-sm shadow-lg shadow-green/20 transition-all active:scale-[0.98] mt-4 uppercase tracking-widest">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-brand-border text-center">
                <p class="text-[0.85rem] text-brand-muted">
                    Sudah punya akun? 
                    <a href="/login" class="text-green font-bold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>

        <p class="text-center mt-8 text-[0.7rem] text-brand-muted leading-relaxed">
            Dengan mendaftar, Anda menyetujui <a href="#" class="underline">Syarat & Ketentuan</a> <br> dan <a href="#" class="underline">Kebijakan Privasi</a> Selaras.
        </p>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>`;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
    </script>

</body>
</html>