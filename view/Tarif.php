<?php

$totalTarif = $data->num_rows;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tarif Parkir</title>

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
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            text-decoration: none;
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
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .topbar p {
            color: #6b7280;
            margin-top: 5px;
        }

        .profile {
            background: white;
            padding: 10px 16px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            font-size: 14px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .card-header h2 {
            font-size: 20px;
        }

        .card-header p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-tambah {
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-tambah:hover {
            background: #1d4ed8;
        }

        .summary {
            margin-bottom: 25px;
        }

        .summary-box {
            background: #eff6ff;
            border-left: 5px solid #2563eb;
            padding: 18px;
            border-radius: 10px;
        }

        .summary-box span {
            color: #6b7280;
            font-size: 13px;
        }

        .summary-box strong {
            display: block;
            font-size: 26px;
            margin-top: 5px;
            color: #2563eb;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            text-align: left;
            padding: 14px;
            font-size: 13px;
            color: #6b7280;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .jenis {
            font-weight: bold;
            color: #111827;
        }

        .harga {
            font-weight: bold;
            color: #16a34a;
        }

        .aksi {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-edit,
        .btn-hapus {
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-edit {
            background: #fef3c7;
            color: #92400e;
        }

        .btn-hapus {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-edit:hover {
            background: #fde68a;
        }

        .btn-hapus:hover {
            background: #fecaca;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 190px;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

        }

        @media (max-width: 600px) {

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .menu {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .menu a {
                margin: 0;
            }

            .content {
                padding: 15px;
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

            <a href="../controller/dashboard_controller.php">
                🏠 Dashboard
            </a>

            <a href="../controller/UserController.php">
                👤 Data User
            </a>

            <a href="../controller/TarifController.php" class="active">
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

                <h1>Tarif Parkir</h1>

                <p>
                    Kelola tarif parkir kendaraan.
                </p>

            </div>

            <div class="profile">
                👤 Admin
            </div>

        </div>


        <div class="card">

            <div class="card-header">

                <div>

                    <h2>
                        Data Tarif Parkir
                    </h2>

                    <p>
                        Daftar tarif parkir berdasarkan jenis kendaraan.
                    </p>

                </div>


                <a
                    href="/parkiran_apotek/controller/TarifController.php?aksi=tambah"
                    class="btn-tambah"
                >
                    + Tambah Tarif
                </a>

            </div>


            <div class="summary">

                <div class="summary-box">

                    <span>
                        Total Jenis Tarif
                    </span>

                    <strong>
                        <?= $totalTarif; ?>
                    </strong>

                </div>

            </div>


            <div class="table-wrapper">

                <?php if ($data && $data->num_rows > 0): ?>

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Jenis Kendaraan
                                </th>

                                <th>
                                    Tarif Per Jam
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                        <?php

                        $no = 1;

                        while ($row = $data->fetch_assoc()):

                        ?>

                            <tr>

                                <td>
                                    <?= $no++; ?>
                                </td>


                                <td class="jenis">

                                    <?= htmlspecialchars(
                                        $row["jenis_kendaraan"]
                                    ); ?>

                                </td>


                                <td class="harga">

                                    Rp
                                    <?= number_format(
                                        $row["tarif_per_jam"],
                                        0,
                                        ",",
                                        "."
                                    ); ?>

                                </td>


                                <td>

                                    <div class="aksi">

                                        <form
    action="../controller/TarifEditController.php"
    method="POST"
    style="display:inline;"
>
    <input
        type="hidden"
        name="id_tarif"
        value="<?= $row["id_tarif"]; ?>"
    <form
    action="../controller/TarifEditController.php"
    method="POST"
    style="display:inline;"
>
    <input
        type="hidden"
        name="id_tarif"
        value="<?= $row["id_tarif"]; ?>"
    >

    <button
        type="submit"
        class="btn-edit"
    >
        Edit
    </button>
</form>

                                        <a
                                            href="/parkiran_apotek/controller/TarifController.php?aksi=hapus&id=<?= $row["id_tarif"]; ?>"
                                            class="btn-hapus"
                                        >
                                            Hapus
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endwhile; ?>

                        </tbody>

                    </table>


                <?php else: ?>

                    <div class="empty">

                        <div class="empty-icon">
                            💰
                        </div>

                        <h3>
                            Belum Ada Data Tarif
                        </h3>

                        <p>
                            Silakan tambahkan tarif parkir terlebih dahulu.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </main>

</div>

</body>

</html>