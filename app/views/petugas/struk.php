<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Parkir - <?= $data['transaksi']['plat_nomor']; ?></title>
    <!-- Tailwind via CDN untuk styling struktur awal -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Styling khusus untuk Printer Thermal */
        @media print {
            @page { margin: 0; }
            body { margin: 1cm; }
            .no-print { display: none; }
        }
        .struk-container {
            width: 300px;
            font-family: 'Courier New', Courier, monospace;
            color: black;
        }
    </style>
</head>
<body class="bg-gray-200 flex justify-center py-10" onload="window.print()">

    <!-- Tombol Kembali (Tidak akan tercetak karena class no-print) -->
    <div class="fixed top-4 left-4 no-print">
        <a href="/parkir_apotek/public/PetugasTransaksiController" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
            &larr; Kembali ke Kasir
        </a>
    </div>

    <!-- Area Struk -->
    <div class="struk-container bg-white p-4 shadow-lg border border-gray-300">
        <div class="text-center mb-4">
            <h1 class="text-xl font-bold">PARKIR APOTEK</h1>
            <p class="text-xs">Jl. Sehat Selalu No. 123</p>
            <p class="text-xs border-b border-dashed border-gray-500 pb-2">Telp: 0812-3456-7890</p>
        </div>
        
        <div class="text-sm mb-2">
            <div class="flex justify-between">
                <span>No. Tiket:</span>
                <span>#PRK-<?= str_pad($data['transaksi']['id_parkir'], 5, '0', STR_PAD_LEFT); ?></span>
            </div>
            <div class="flex justify-between">
                <span>Plat Nomor:</span>
                <span class="font-bold uppercase"><?= $data['transaksi']['plat_nomor']; ?></span>
            </div>
            <div class="flex justify-between">
                <span>Jenis:</span>
                <span class="capitalize"><?= $data['transaksi']['jenis_kendaraan']; ?></span>
            </div>
            <!-- Tambahan Informasi Warna & Pemilik -->
            <div class="flex justify-between">
                <span>Warna:</span>
                <span><?= htmlspecialchars($data['transaksi']['warna'] ?? '-'); ?></span>
            </div>
            <div class="flex justify-between">
                <span>Pemilik:</span>
                <span><?= htmlspecialchars($data['transaksi']['pemilik'] ?? '-'); ?></span>
            </div>
        </div>

        <div class="border-t border-b border-dashed border-gray-500 py-2 my-2 text-sm">
            <div class="flex justify-between mb-1">
                <span>Masuk:</span>
                <span><?= date('d/m/Y H:i', strtotime($data['transaksi']['waktu_masuk'])); ?></span>
            </div>
            <div class="flex justify-between mb-1">
                <span>Keluar:</span>
                <span><?= date('d/m/Y H:i', strtotime($data['transaksi']['waktu_keluar'])); ?></span>
            </div>
            <div class="flex justify-between">
                <span>Durasi:</span>
                <span><?= $data['transaksi']['durasi_jam']; ?> Jam</span>
            </div>
        </div>

        <div class="text-base font-bold flex justify-between mb-4">
            <span>TOTAL:</span>
            <span>Rp <?= number_format($data['transaksi']['biaya_total'], 0, ',', '.'); ?></span>
        </div>

        <div class="text-center text-xs border-t border-dashed border-gray-500 pt-2">
            <p>Petugas: <?= $data['transaksi']['nama_petugas']; ?></p>
            <p class="mt-2">Terima Kasih</p>
            <p>Semoga Lekas Sembuh</p>
        </div>
    </div>

</body>
</html>