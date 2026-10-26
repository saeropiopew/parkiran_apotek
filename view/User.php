<?php

$totalUser = $data ? $data->num_rows : 0;

$roleAktif = $_GET["role"] ?? "";

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Data User - Parkiran Apotek</title>

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

        a {
            text-decoration: none;
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
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            color: #d1d5db;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .menu a:hover {
            background: #1f2937;
            color: white;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 26px;
        }

        .topbar p {
            color: #6b7280;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-tambah {
            background: #2563eb;
            color: white;
        }

        .btn-tambah:hover {
            background: #1d4ed8;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 20px;
        }

        .total {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .total small {
            display: block;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .total strong {
            font-size: 25px;
            color: #2563eb;
        }

        .filter {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter a {
            padding: 9px 14px;
            border-radius: 7px;
            background: #e5e7eb;
            color: #374151;
            font-size: 13px;
            font-weight: bold;
        }

        .filter a:hover,
        .filter a.active {
            background: #2563eb;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            text-align: left;
            padding: 14px 10px;
        }

        td {
            padding: 14px 10px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .role {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .role-admin {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .role-petugas {
            background: #dcfce7;
            color: #15803d;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .aktif {
            background: #dcfce7;
            color: #15803d;
        }

        .nonaktif {
            background: #fee2e2;
            color: #b91c1c;
        }

        .aksi {
            display: flex;
            gap: 6px;
        }

        .btn-edit {
            background: #fef3c7;
            color: #92400e;
            padding: 7px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-hapus {
            background: #fee2e2;
            color: #b91c1c;
            padding: 7px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .kosong {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        @media (max-width: 800px) {

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .content {
                padding: 20px;
            }

            table {
                min-width: 750px;
            }

            .card {
                overflow-x: auto;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }
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

            <div>
                <h1>Data User</h1>
                <p>Kelola data Admin dan Petugas parkir.</p>
            </div>

            <a href="../controller/UserController.php?aksi=tambah"
               class="btn btn-tambah">
                + Tambah User
            </a>

        </div>


        <div class="card">

            <div class="card-header">

                <h2>Data User</h2>

            </div>


            <div class="total">

                <small>Total Data</small>

                <strong>
                    <?= $totalUser; ?>
                </strong>

            </div>


            <!-- FILTER -->

            <div class="filter">

                <a href="../controller/UserController.php"
                   class="<?= $roleAktif == "" ? "active" : ""; ?>">
                    Semua
                </a>

                <a href="../controller/UserController.php?role=admin"
                   class="<?= $roleAktif == "admin" ? "active" : ""; ?>">
                    Admin
                </a>

                <a href="../controller/UserController.php?role=petugas"
                   class="<?= $roleAktif == "petugas" ? "active" : ""; ?>">
                    Petugas
                </a>

            </div>


            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody>

                <?php if ($data && $data->num_rows > 0): ?>

                    <?php $no = 1; ?>

                    <?php while ($row = $data->fetch_assoc()): ?>

                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["nama_lengkap"]); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row["username"]); ?>
                            </td>

                            <td>

                                <span class="role role-<?= htmlspecialchars($row["role"]); ?>">

                                    <?= htmlspecialchars($row["role"]); ?>

                                </span>

                            </td>

                            <td>

                                <?php if ((int)$row["status_aktif"] == 1): ?>

                                    <span class="status aktif">
                                        Aktif
                                    </span>

                                <?php else: ?>

                                    <span class="status nonaktif">
                                        Nonaktif
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <div class="aksi">

                                    <a
                                        href="../controller/UserController.php?aksi=edit&id=<?= (int)$row["id_user"]; ?>"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="../controller/UserController.php?aksi=hapus&id=<?= (int)$row["id_user"]; ?>"
                                        class="btn-hapus"
                                    >
                                        Hapus
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="6"
                            class="kosong">

                            Belum ada data user.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>

</html>