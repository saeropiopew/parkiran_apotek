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
        
        <form action="/parkir_apotek/public/AdminUserController/ubah" method="POST">
            <input type="hidden" name="id_user" value="<?= $data['user']['id_user']; ?>">
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?= $data['user']['nama_lengkap']; ?>" required class="w-full border rounded p-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" value="<?= $data['user']['username']; ?>" required class="w-full border rounded p-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru <span class="text-xs text-gray-400">(Kosongkan jika tidak ingin mengubah password)</span></label>
                <input type="password" name="password" class="w-full border rounded p-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" required class="w-full border rounded p-2 focus:ring-blue-500">
                    <option value="admin" <?= ($data['user']['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="petugas" <?= ($data['user']['role'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                    <option value="owner" <?= ($data['user']['role'] == 'owner') ? 'selected' : ''; ?>>Owner</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Aktif</label>
                <select name="status_aktif" required class="w-full border rounded p-2 focus:ring-blue-500">
                    <option value="1" <?= ($data['user']['status_aktif'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?= ($data['user']['status_aktif'] == 0) ? 'selected' : ''; ?>>Non-Aktif</option>
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <a href="/parkir_apotek/public/AdminUserController" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>