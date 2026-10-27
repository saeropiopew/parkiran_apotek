<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">
    
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800"><?= $data['judul']; ?></h1>
            <a href="/parkir_apotek/public/Home" class="text-blue-500 hover:underline">Kembali ke Dashboard</a>
        </div>

        <!-- Form Tambah -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Tambah Tarif Baru</h2>
            <form action="/parkir_apotek/public/AdminTarifController/tambah" method="POST" class="flex gap-4 items-end">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" required class="w-full border rounded p-2 focus:ring-blue-500">
                        <option value="motor">Motor</option>
                        <option value="mobil">Mobil</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tarif per Jam (Rp)</label>
                    <input type="number" name="tarif_per_jam" required class="w-full border rounded p-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Kendaraan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarif / Jam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($data['tarif'] as $tarif) : ?>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900"><?= $tarif['id_tarif']; ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900 capitalize"><?= $tarif['jenis_kendaraan']; ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">Rp <?= number_format($tarif['tarif_per_jam'], 0, ',', '.'); ?></td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="/parkir_apotek/public/AdminTarifController/edit/<?= $tarif['id_tarif']; ?>" class="text-indigo-600 hover:text-indigo-900">Ubah</a>
                                <a href="/parkir_apotek/public/AdminTarifController/hapus/<?= $tarif['id_tarif']; ?>" onclick="return confirm('Yakin hapus?');" class="text-red-600 hover:text-red-900">Hapus</>
                                <!-- Catatan: Untuk Ubah Data disarankan menggunakan Modal/Halaman terpisah, dilewati di contoh dasar ini -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>