<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2"><?= $data['judul']; ?></h1>
        
        <form action="/parkir_apotek/public/AdminTarifController/ubah" method="POST">
            <input type="hidden" name="id_tarif" value="<?= $data['tarif']['id_tarif']; ?>">
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kendaraan</label>
                <select name="jenis_kendaraan" required class="w-full border rounded p-2 focus:ring-blue-500">
                    <option value="motor" <?= ($data['tarif']['jenis_kendaraan'] == 'motor') ? 'selected' : ''; ?>>Motor</option>
                    <option value="mobil" <?= ($data['tarif']['jenis_kendaraan'] == 'mobil') ? 'selected' : ''; ?>>Mobil</option>
                    <option value="lainnya" <?= ($data['tarif']['jenis_kendaraan'] == 'lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tarif per Jam (Rp)</label>
                <input type="number" name="tarif_per_jam" value="<?= $data['tarif']['tarif_per_jam']; ?>" required class="w-full border rounded p-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2">
                <a href="/parkir_apotek/public/AdminTarifController" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>