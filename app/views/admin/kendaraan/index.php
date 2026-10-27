<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800"><?= $data['judul']; ?></h1>
            <a href="/parkir_apotek/public/Home" class="text-blue-500 hover:underline">Kembali ke Dashboard</a>
        </div>

        <!-- Form Tambah Kendaraan -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Registrasi Kendaraan Baru</h2>
            <form action="/parkir_apotek/public/AdminKendaraanController/tambah" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Plat Nomor</label>
                    <input type="text" name="plat_nomor" required class="w-full border rounded p-2 focus:ring-blue-500 uppercase">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                    <select name="jenis_kendaraan" required class="w-full border rounded p-2 focus:ring-blue-500">
                        <option value="motor">Motor</option>
                        <option value="mobil">Mobil</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Warna</label>
                    <input type="text" name="warna" value="-" required class="w-full border rounded p-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik</label>
                    <input type="text" name="pemilik" value="Umum" required class="w-full border rounded p-2 focus:ring-blue-500">
                </div>
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
                
                <div class="md:col-span-4 flex justify-end mt-2">
                     <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Simpan Kendaraan</button>
                </div>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plat Nomor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Warna</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pemilik</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if(!empty($data['kendaraan'])): ?>
                        <?php foreach ($data['kendaraan'] as $kendaraan) : ?>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $kendaraan['id_kendaraan']; ?></td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-900 uppercase"><?= htmlspecialchars($kendaraan['plat_nomor'] ?? ''); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900 capitalize"><?= htmlspecialchars($kendaraan['jenis_kendaraan'] ?? ''); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= htmlspecialchars($kendaraan['warna'] ?? '-'); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= htmlspecialchars($kendaraan['pemilik'] ?? '-'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                     <?php else: ?>
                        <tr><td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Data belum tersedia.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>