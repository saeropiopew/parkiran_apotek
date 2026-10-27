<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Parkir Apotek</title>
    <!-- Memanggil Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center font-sans">

    <!-- Card Login -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-blue-600 mb-1">Parkir Apotek</h1>
            <p class="text-gray-500 text-sm">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Tampilkan Pesan Error Jika Ada -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm">
                <span class="block sm:inline"><?= $_SESSION['error']; ?></span>
            </div>
            <!-- Hapus session error setelah ditampilkan -->
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <!-- Form Login diarahkan ke method login di AuthController -->
        <form action="/parkir_apotek/public/AuthController/login" method="POST">
            
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                <input type="text" id="username" name="username" required autocomplete="off"
                    class="shadow-sm appearance-none border rounded-lg w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" required 
                    class="shadow-sm appearance-none border rounded-lg w-full py-2.5 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                    Masuk
                </button>
            </div>
            
        </form>
        
        <div class="text-center mt-4">
            <p class="text-xs text-gray-400">&copy; <?= date('Y'); ?> Sistem Parkir Apotek</p>
        </div>
    </div>

</body>
</html>