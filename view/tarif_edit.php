<?php

$jenis_kendaraan = $tarif["jenis_kendaraan"] ?? "";
$tarif_per_jam = $tarif["tarif_per_jam"] ?? "";
$id_tarif = $tarif["id_tarif"] ?? 0;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Tarif Parkir</title>

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

        /* SIDEBAR */

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

        /* CONTENT */

        .content {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .topbar p {
            color: #6b7280;
            margin-top: 5px;
        }

        /* FORM */

        .form-card {
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .06);
        }

        .form-card h2 {
            margin-bottom: 8px;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #2563eb;
        }

        .input-info {
            display: block;
            margin-top: 6px;
            color: #6b7280;
            font-size: 12px;
        }

        /* BUTTON */

        .button-area {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-simpan {
            background: #2563eb;
            color: white;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
        }

        .btn-kembali {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-kembali:hover {
            background: #d1d5db;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .content {
                padding: 20px;
            }

            .form-card {
                max-width: 100%;
            }

        }

    </style>

</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">

            🚗 PARKIRAN

            <span>
                Apotek Parking System
            </span>

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

            <a
                href="../controller/TarifController.php"
                class="active"
            >
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


    <!-- CONTENT -->

    <main class="content">

        <div class="topbar">

            <h1>
                Edit Tarif Parkir
            </h1>

            <p>
                Perbarui data tarif parkir kendaraan.
            </p>

        </div>


        <div class="form-card">

            <h2>
                Form Edit Tarif
            </h2>

            <p class="description">
                Silakan ubah jenis kendaraan atau tarif per jam.
            </p>


            <!-- FORM EDIT -->

            <form
    action="TarifEditController.php?id=<?php echo $id_tarif; ?>"
    method="POST"
>

    <input
        type="hidden"
        name="id_tarif"
        value="<?php echo $id_tarif; ?>"
    >


                <!-- JENIS KENDARAAN -->

                <div class="form-group">

                    <label for="jenis_kendaraan">
                        Jenis Kendaraan
                    </label>

                    <select
                        name="jenis_kendaraan"
                        id="jenis_kendaraan"
                        required
                    >

                        <option value="">
                            -- Pilih Jenis Kendaraan --
                        </option>

                        <option
                            value="Motor"
                            <?php
                            echo ($jenis_kendaraan == "Motor")
                                ? "selected"
                                : "";
                            ?>
                        >
                            Motor
                        </option>

                        <option
                            value="Mobil"
                            <?php
                            echo ($jenis_kendaraan == "Mobil")
                                ? "selected"
                                : "";
                            ?>
                        >
                            Mobil
                        </option>

                    </select>

                </div>


                <!-- TARIF -->

                <div class="form-group">

                    <label for="tarif_per_jam">
                        Tarif Per Jam
                    </label>

                    <input
                        type="number"
                        name="tarif_per_jam"
                        id="tarif_per_jam"
                        value="<?php echo htmlspecialchars($tarif_per_jam); ?>"
                        placeholder="Contoh: 5000"
                        min="0"
                        required
                    >

                    <span class="input-info">
                        Masukkan tarif dalam rupiah.
                    </span>

                </div>


                <!-- BUTTON -->

                <div class="button-area">

                    <a
                        href="../controller/TarifController.php"
                        class="btn btn-kembali"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        name="simpan"
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