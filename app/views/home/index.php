<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans h-screen flex flex-col items-center justify-center">

    <div class="bg-white p-10 rounded-xl shadow-lg max-w-3xl w-full text-center border-t-4 border-blue-600">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Sistem Parkir Apotek</h1>
        <p class="text-gray-500 mb-8">
            Selamat datang, <span class="font-bold text-blue-600"><?= $_SESSION['nama_lengkap']; ?></span>! 
            Anda masuk sebagai <span class="uppercase font-bold"><?= $_SESSION['role']; ?></span>.
        </p>

        <!-- Menu Berdasarkan Level User / Role -->
        <div class="flex flex-wrap justify-center gap-4 mb-10">
            
            <!-- Menu Khusus ADMIN -->
            <?php if ($_SESSION['role'] === 'admin') : ?>
                <a href="/parkir_apotek/public/AdminAreaController" class="bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-3 px-6 rounded-lg transition">Master Area</a>
                <a href="/parkir_apotek/public/AdminTarifController" class="bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-3 px-6 rounded-lg transition">Master Tarif</a>
                <a href="/parkir_apotek/public/AdminUserController" class="bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-3 px-6 rounded-lg transition">Kelola User</a>
                <a href="/parkir_apotek/public/AdminKendaraanController" class="bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-3 px-6 rounded-lg transition">Kendaraan</a>
                <a href="/parkir_apotek/public/AdminLogController" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition">Log Aktivitas</a>
            <?php endif; ?>

            <!-- Menu Khusus PETUGAS -->
            <?php if ($_SESSION['role'] === 'petugas') : ?>
                <a href="/parkir_apotek/public/PetugasTransaksiController" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition">Buka Gerbang Kasir</a>
            <?php endif; ?>

            <!-- Menu Khusus OWNER -->
            <?php if ($_SESSION['role'] === 'owner') : ?>
                <a href="/parkir_apotek/public/OwnerLaporanController" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-3 px-6 rounded-lg shadow-md transition">Lihat Laporan Pendapatan</a>
            <?php endif; ?>

        </div>

        <div class="border-t pt-6">
            <a href="/parkir_apotek/public/AuthController/logout" onclick="return confirm('Yakin ingin keluar dari sistem?');" class="text-red-500 hover:text-red-700 font-medium inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar (Logout)
            </a>
        </div>
    </div>

</body>
</html>