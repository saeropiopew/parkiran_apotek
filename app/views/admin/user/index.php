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

        <!-- Form Tambah User -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Tambah Pengguna Baru</h2>
            <form action="/parkir_apotek/public/AdminUserController/tambah" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" required class="w-full border rounded p-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" required class="w-full border rounded p-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required class="w-full border rounded p-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role" required class="w-full border rounded p-2 focus:ring-blue-500">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">Simpan User</button>
                </div>
            </form>
        </div>

        <!-- Tabel Data User -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($data['users'])): ?>
                        <?php foreach ($data['users'] as $user) : ?>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $user['id_user']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= htmlspecialchars($user['nama_lengkap']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= htmlspecialchars($user['username']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900 capitalize"><?= $user['role']; ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $user['status_aktif'] ? 'Aktif' : 'Non-aktif'; ?></td>
                                <td class="px-6 py-4 text-sm font-medium flex gap-3">
                                    <a href="/parkir_apotek/public/AdminUserController/edit/<?= $user['id_user']; ?>" class="text-indigo-600 hover:text-indigo-900">Ubah</a>
                                    <?php if ($user['id_user'] != $_SESSION['id_user']): // Mencegah admin menghapus akun sendiri 
                                    ?>
                                        <a href="/parkir_apotek/public/AdminUserController/hapus/<?= $user['id_user']; ?>" onclick="return confirm('Yakin hapus user ini?');" class="text-red-600 hover:text-red-900">Hapus</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Data belum tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>