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
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Halo, <?= $_SESSION['nama_lengkap']; ?> (Owner)</span>
                <a href="/parkir_apotek/public/AuthController/logout" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-sm">Logout</a>
            </div>
        </div>

        <!-- Form Filter Laporan -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <form action="/parkir_apotek/public/OwnerLaporanController" method="GET" class="flex items-end gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dari Tanggal</label>
                    <input type="date" name="tgl_awal" value="<?= $data['tgl_awal']; ?>" class="border rounded p-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sampai Tanggal</label>
                    <input type="date" name="tgl_akhir" value="<?= $data['tgl_akhir']; ?>" class="border rounded p-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Tampilkan Rekap
                </button>
            </form>
        </div>

        <!-- Tabel Rekap Transaksi -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Waktu Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Plat Nomor</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Jenis</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase">Durasi</th>
                        <th class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase">Biaya Tagihan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if(!empty($data['transaksi'])): ?>
                        <?php foreach ($data['transaksi'] as $row) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <?= date('d/m/Y H:i', strtotime($row['waktu_keluar'])); ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-bold uppercase text-gray-900">
                                    <?= htmlspecialchars($row['plat_nomor']); ?>
                                </td>
                                <td class="px-6 py-4 text-sm capitalize text-gray-700">
                                    <?= $row['jenis_kendaraan']; ?>
                                </td>
                                <td class="px-6 py-4 text-sm text-center text-gray-700">
                                    <?= $row['durasi_jam']; ?> Jam
                                </td>
                                <td class="px-6 py-4 text-sm text-right text-gray-900 font-medium">
                                    Rp <?= number_format($row['biaya_total'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                        <!-- Baris Total Pendapatan (SUM) -->
                        <tr class="bg-green-100 border-t-2 border-green-500">
                            <td colspan="4" class="px-6 py-4 text-right text-sm font-bold text-green-800">
                                TOTAL PENDAPATAN (<?= date('d M', strtotime($data['tgl_awal'])) ?> - <?= date('d M Y', strtotime($data['tgl_akhir'])) ?>):
                            </td>
                            <td class="px-6 py-4 text-right text-base font-bold text-green-800">
                                Rp <?= number_format($data['total_pendapatan'], 0, ',', '.'); ?>
                            </td>
                        </tr>

                    <?php else: ?>
                        <tr><td colspan="5" class="px-6 py-10 text-center text-gray-500 font-medium">Tidak ada transaksi pada rentang tanggal tersebut.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>