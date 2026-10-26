<?php

$error = $error ?? "";

$nama_lengkap = $user["nama_lengkap"] ?? "";
$username = $user["username"] ?? "";
$role = $user["role"] ?? "";
$status_aktif = $user["status_aktif"] ?? 1;
$id_user = $user["id_user"] ?? 0;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit User</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #111827;
            color: white;
            padding: 25px 15px;
        }

        .logo {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .logo span {
            display: block;
            font-size: 12px;
            color: #9ca3af;
            margin-top: 5px;
        }

        .menu-title {
            font-size: 11px;
            color: #9ca3af;
            margin: 20px 12px 10px;
        }

        .menu a {
            display: block;
            color: #d1d5db;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 5px;
            text-decoration: none;
        }

        .menu a:hover,
        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 26px;
        }

        .topbar p {
            color: #6b7280;
            margin-top: 5px;
        }

        .form-card {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        .form-card h2 {
            margin-bottom: 8px;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
        }

        .button-area {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-simpan {
            background: #2563eb;
            color: white;
        }

        .btn-kembali {
            background: #e5e7eb;
            color: #374151;
        }

    </style>

</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="logo">
            🚗 PARKIRAN
            <span>Apotek Parking System</span>
        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <div class="menu">

            <a href="../controller/DashboardController.php">
                🏠 Dashboard
            </a>

            <a href="../controller/UserController.php"
               class="active">
                👤 Data User
            </a>

            <a href="../controller/TarifController.php">
                💰 Tarif Parkir
            </a>

            <a href="../controller/AreaController.php">
                🅿️ Area Parkir
            </a>

            <a href="../controller/KendaraanController.php">
                🚙 Kendaraan
            </a>

        </div>

    </aside>


    <main class="content">

        <div class="topbar">

            <h1>Edit User</h1>

            <p>
                Perbarui data Admin atau Petugas.
            </p>

        </div>


        <div class="form-card">

            <h2>Form Edit User</h2>

            <p class="description">
                Ubah data user sesuai kebutuhan.
            </p>


            <?php if ($error != ""): ?>

                <div class="error">
                    <?= htmlspecialchars($error); ?>
                </div>

            <?php endif; ?>


            <form
                action="../controller/UserController.php?aksi=edit&id=<?= (int)$id_user; ?>"
                method="POST"
            >

                <!-- ID USER -->
                <input
                    type="hidden"
                    name="id_user"
                    value="<?= (int)$id_user; ?>"
                >


                <div class="form-group">

                    <label>
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama_lengkap"
                        value="<?= htmlspecialchars($nama_lengkap); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="<?= htmlspecialchars($username); ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Role
                    </label>

                    <select name="role" required>

                        <option value="admin"
                            <?= $role == "admin" ? "selected" : ""; ?>>
                            Admin
                        </option>

                        <option value="petugas"
                            <?= $role == "petugas" ? "selected" : ""; ?>>
                            Petugas
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Status
                    </label>

                    <select name="status_aktif">

                        <option value="1"
                            <?= (int)$status_aktif == 1 ? "selected" : ""; ?>>
                            Aktif
                        </option>

                        <option value="0"
                            <?= (int)$status_aktif == 0 ? "selected" : ""; ?>>
                            Nonaktif
                        </option>

                    </select>

                </div>


                <div class="button-area">

                    <a
                        href="../controller/UserController.php"
                        class="btn btn-kembali"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-simpan"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>

</html>