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

        <!-- 🔥 ERROR MESSAGE -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Foto Profil -->
            <input type="file" name="foto_profil" required class="w-full border p-2 rounded">

            <!-- Jenis Kelamin -->
            <select name="jenis_kelamin" required>
    <option value="">Pilih</option>
    <option value="laki-laki">Laki-laki</option>
    <option value="perempuan">Perempuan</option>
</select>

            <!-- Provinsi -->
           <div class="relative w-full">
  <input 
    type="text" 
    id="searchProvinsi"
    placeholder="Cari provinsi..."
    class="w-full border p-2 rounded"
  />

  <div id="dropdownProvinsi" class="absolute w-full bg-white border rounded mt-1 max-h-48 overflow-y-auto hidden">
  </div>

  <input type="hidden" name="alamat_domisili" id="selectedProvinsi">
</div>

<script>
const provinsi = [
  "Aceh","Sumatera Utara","Sumatera Barat","Riau","Kepulauan Riau",
  "Jambi","Sumatera Selatan","Bangka Belitung","Bengkulu","Lampung",
  "DKI Jakarta","Jawa Barat","Jawa Tengah","DI Yogyakarta","Jawa Timur",
  "Banten","Bali","NTB","NTT","Kalimantan Barat","Kalimantan Tengah",
  "Kalimantan Selatan","Kalimantan Timur","Kalimantan Utara",
  "Sulawesi Utara","Sulawesi Tengah","Sulawesi Selatan","Sulawesi Tenggara",
  "Gorontalo","Sulawesi Barat","Maluku","Maluku Utara",
  "Papua","Papua Barat","Papua Selatan","Papua Tengah","Papua Pegunungan"
];

const input = document.getElementById("searchProvinsi");
const dropdown = document.getElementById("dropdownProvinsi");
const hidden = document.getElementById("selectedProvinsi");

input.addEventListener("input", function() {
  const value = this.value.toLowerCase();
  dropdown.innerHTML = "";

  const filtered = provinsi.filter(p => p.toLowerCase().includes(value));

  if (filtered.length > 0) {
    dropdown.classList.remove("hidden");
  } else {
    dropdown.classList.add("hidden");
  }

  filtered.forEach(p => {
    const div = document.createElement("div");
    div.textContent = p;
    div.className = "p-2 hover:bg-blue-100 cursor-pointer";

    div.onclick = () => {
      input.value = p;
      hidden.value = p;
      dropdown.classList.add("hidden");
    };

    dropdown.appendChild(div);
  });
});

// close dropdown
document.addEventListener("click", (e) => {
  if (!e.target.closest(".relative")) {
    dropdown.classList.add("hidden");
  }
});
</script>
            <!-- Kota -->
            <input name="kota_domisili" required placeholder="Kota Domisili" class="w-full border p-2 rounded">

            <!-- Tinggi & Berat -->
            <div class="grid grid-cols-2 gap-4">
                <input name="tinggi_badan" type="number" required placeholder="Tinggi (cm)" class="border p-2 rounded">
                <input name="berat_badan" type="number" required placeholder="Berat (kg)" class="border p-2 rounded">
            </div>

            <!-- Suku & Warna Kulit -->
            <div class="grid grid-cols-2 gap-4">
                <input name="suku" required placeholder="Suku" class="border p-2 rounded">
                <input name="warna_kulit" required placeholder="Warna Kulit" class="border p-2 rounded">
            </div>

            <!-- Textarea -->
            <textarea name="deskripsi_diri" required placeholder="Deskripsi diri" class="w-full border p-2 rounded"></textarea>
            <textarea name="hobi" required placeholder="Hobi" class="w-full border p-2 rounded"></textarea>

            <!-- 🔥 FIX DISINI -->
            <textarea name="organisasi" required placeholder="Organisasi" class="w-full border p-2 rounded"></textarea>

            <textarea name="kelebihan" required placeholder="Kelebihan" class="w-full border p-2 rounded"></textarea>
            <textarea name="kekurangan" required placeholder="Kekurangan" class="w-full border p-2 rounded"></textarea>
            <textarea name="aktivitas_harian" required placeholder="Aktivitas Harian" class="w-full border p-2 rounded"></textarea>
            <textarea name="riwayat_penyakit" required placeholder="Riwayat Penyakit" class="w-full border p-2 rounded"></textarea>

            <!-- Status -->
            <select name="status_pernikahan" required class="w-full border p-2 rounded">
                <option value="">Status Pernikahan</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Pernah Menikah">Pernah Menikah</option>
            </select>

            <input name="jumlah_anak" type="number" required placeholder="Jumlah Anak" class="w-full border p-2 rounded">

            <textarea name="kriteria_pasangan" required placeholder="Kriteria pasangan" class="w-full border p-2 rounded"></textarea>
            <textarea name="visi_misi_pernikahan" required placeholder="Visi Misi Pernikahan" class="w-full border p-2 rounded"></textarea>

            <!-- Submit -->
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded hover:bg-green-700">
                Simpan CV
            </button>
        </form>
    </div>
</body>
</html>