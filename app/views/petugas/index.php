<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-8 font-sans">
    
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Area Petugas (Gerbang Parkir)</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Halo, <?= $_SESSION['nama_lengkap']; ?></span>
                <a href="/parkir_apotek/public/AuthController/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-sm">Logout</a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- FORM KENDARAAN MASUK -->
            <div class="bg-white p-6 rounded-lg shadow-md lg:col-span-1 h-fit">
                <h2 class="text-lg font-bold mb-4 border-b pb-2 text-blue-600">Catat Kendaraan Masuk</h2>
                <form action="/parkir_apotek/public/PetugasTransaksiController/prosesMasuk" method="POST">
                    
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Plat Nomor</label>
                        <input type="text" name="plat_nomor" placeholder="Contoh: D 1234 ABC" required 
                            class="w-full border border-gray-300 rounded-lg p-2.5 uppercase focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500">
                            <option value="motor">Motor</option>
                            <option value="mobil">Mobil</option>
                        </select>
                    </div>

                    <!-- INPUT TAMBAHAN: Warna & Pemilik -->
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Warna Kendaraan</label>
                        <input type="text" name="warna" placeholder="Contoh: Hitam" required 
                            class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik</label>
                        <input type="text" name="pemilik" placeholder="Contoh: Budi" required 
                            class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Area Parkir</label>
                        <select name="id_area" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Area --</option>
                            <?php foreach ($data['area'] as $a) : ?>
                                <option value="<?= $a['id_area']; ?>" <?= ($a['terisi'] >= $a['kapasitas']) ? 'disabled' : ''; ?>>
                                    <?= $a['nama_area']; ?> (Terisi: <?= $a['terisi']; ?>/<?= $a['kapasitas']; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-200">
                        Input Kendaraan Masuk
                    </button>
                </form>
            </div>

            <!-- TABEL KENDARAAN KELUAR -->
            <div class="bg-white p-6 rounded-lg shadow-md lg:col-span-2">
                <h2 class="text-lg font-bold mb-4 border-b pb-2 text-green-600">Daftar Kendaraan Parkir</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu Masuk</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Plat Nomor</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Area</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php if(!empty($data['parkir_aktif'])): ?>
                                <?php foreach ($data['parkir_aktif'] as $parkir) : ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <?= date('H:i - d M Y', strtotime($parkir['waktu_masuk'])); ?>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-bold text-gray-900 uppercase">
                                            <?= htmlspecialchars($parkir['plat_nomor']); ?>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-700 capitalize">
                                            <?= $parkir['jenis_kendaraan']; ?>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-700">
                                            <?= $parkir['nama_area']; ?>
                                        </td>
                                        <td class="px-4 py-4 text-right text-sm font-medium">
                                            <a href="/parkir_apotek/public/PetugasTransaksiController/prosesKeluar/<?= $parkir['id_parkir']; ?>" 
                                               onclick="return confirm('Selesaikan parkir dan hitung biaya untuk <?= $parkir['plat_nomor']; ?>?');" 
                                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded text-xs inline-block">
                                                Selesaikan Parkir
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="px-4 py-8 text-center text-sm text-gray-500">Tidak ada kendaraan yang sedang parkir.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>