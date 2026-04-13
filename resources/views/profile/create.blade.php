<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buat CV</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow w-full max-w-3xl">
        <h1 class="text-2xl font-bold mb-6 text-center">Buat CV Profil</h1>

        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Foto Profil -->
            <label class="block">
                <span class="text-sm font-semibold mb-2 block">Foto Profil</span>
                <input type="file" name="foto_profil" class="w-full border p-2 rounded">
            </label>

            <!-- Jenis Kelamin -->
            <select name="jenis_kelamin" class="w-full border p-2 rounded">
                <option value="">Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <!-- Provinsi -->
            <select name="alamat_domisili" class="w-full border p-2 rounded" id="provinsi">
                <option value="">Pilih Provinsi</option>
                <option value="Aceh">Aceh</option>
                <option value="Sumatera Utara">Sumatera Utara</option>
                <option value="Sumatera Barat">Sumatera Barat</option>
                <option value="Riau">Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Lampung">Lampung</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="DI Yogyakarta">DI Yogyakarta</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Banten">Banten</option>
                <option value="Bali">Bali</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>
                <option value="Maluku">Maluku</option>
                <option value="Maluku Utara">Maluku Utara</option>
                <option value="Papua">Papua</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Papua Selatan">Papua Selatan</option>
            </select>

            <!-- Kota Domisili -->
            <input name="kota_domisili" placeholder="Kota Domisili" class="w-full border p-2 rounded">

            <!-- Tinggi & Berat Badan -->
            <div class="grid grid-cols-2 gap-4">
                <input name="tinggi_badan" type="number" placeholder="Tinggi Badan (cm)" class="w-full border p-2 rounded">
                <input name="berat_badan" type="number" placeholder="Berat Badan (kg)" class="w-full border p-2 rounded">
            </div>

            <!-- Suku & Warna Kulit -->
            <div class="grid grid-cols-2 gap-4">
                <input name="suku" placeholder="Suku" class="w-full border p-2 rounded">
                <input name="warna_kulit" placeholder="Warna Kulit" class="w-full border p-2 rounded">
            </div>

            <!-- Deskripsi -->
            <textarea name="deskripsi_diri" placeholder="Deskripsi diri" class="w-full border p-2 rounded"></textarea>
            <textarea name="hobi" placeholder="Hobi" class="w-full border p-2 rounded"></textarea>
            <textarea name="organisasi_sosial" placeholder="Organisasi sosial atau keagamaan" class="w-full border p-2 rounded"></textarea>
            <textarea name="kelebihan" placeholder="Kelebihan diri" class="w-full border p-2 rounded"></textarea>
            <textarea name="kekurangan" placeholder="Kekurangan diri" class="w-full border p-2 rounded"></textarea>
            <textarea name="aktivitas_harian" placeholder="Aktivitas Harian" class="w-full border p-2 rounded"></textarea>
            <textarea name="riwayat_penyakit" placeholder="Riwayat Penyakit" class="w-full border p-2 rounded"></textarea>

            <!-- Status Pernikahan -->
            <select name="status_pernikahan" class="w-full border p-2 rounded">
                <option value="">Status Pernikahan</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Pernah Menikah">Pernah Menikah</option>
            </select>

            <input name="jumlah_anak" type="number" placeholder="Jumlah Anak" class="w-full border p-2 rounded">

            <!-- Kriteria Pasangan -->
            <textarea name="kriteria_pasangan" placeholder="Kriteria pasangan" class="w-full border p-2 rounded"></textarea>
            <textarea name="visi_misi_pernikahan" placeholder="Visi Misi Pernikahan" class="w-full border p-2 rounded"></textarea>

            <!-- Button -->
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded hover:bg-green-700">
                Simpan CV
            </button>
        </form>
    </div>

    <script>
        document.getElementById('provinsi').addEventListener('input', function(e) {
            const options = this.querySelectorAll('option');
            const searchValue = e.target.value.toLowerCase();
            options.forEach(option => {
                if (option.value === '') return;
                option.hidden = !option.text.toLowerCase().includes(searchValue);
            });
        });
    </script>
</body>
</html>
