<?php
/*
|--------------------------------------------------------------------------
| Dashboard Parkiran Apotek
|--------------------------------------------------------------------------
| File : view/dashboard.php
| PHP MVC - Tanpa JavaScript
|--------------------------------------------------------------------------
*/
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Parkiran Apotek</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #172b4d;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #142b52,
                #0d2142
            );

            color: white;
            padding: 25px 15px;

            overflow-y: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 5px 10px 30px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #2875ed;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
            font-weight: bold;
        }

        .logo-text h2 {
            font-size: 17px;
            margin-bottom: 5px;
        }

        .logo-text p {
            font-size: 11px;
            color: #b9c8df;
        }

        .menu {
            margin-top: 10px;
        }

        .menu a {
            display: flex;
            align-items: center;

            gap: 15px;

            color: #dbe7f8;

            padding: 14px 15px;

            margin-bottom: 5px;

            border-radius: 10px;

            font-size: 14px;

            transition: 0.2s;
        }

        .menu a:hover {
            background: rgba(255,255,255,0.10);
            color: white;
        }

        .menu a.active {
            background: #2875ed;
            color: white;
            box-shadow: 0 8px 20px rgba(40,117,237,0.25);
        }

        .menu-icon {
            width: 25px;
            text-align: center;
            font-size: 19px;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            left: 15px;
            right: 15px;
        }

        .logout a {
            display: flex;
            align-items: center;
            gap: 15px;

            padding: 14px 15px;

            color: #dbe7f8;

            border-radius: 10px;
        }

        .logout a:hover {
            background: rgba(255,255,255,0.10);
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 72px;

            background: white;

            border-bottom: 1px solid #e6ebf2;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 35px;
        }

        .welcome {
            font-size: 14px;
            color: #60708b;
        }

        .welcome strong {
            color: #1769e0;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 25px;

            color: #5e6e88;
            font-size: 13px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #172b4d;
            font-weight: bold;
        }

        .admin-icon {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: #173967;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px 35px;
        }

        .page-title {
            margin-bottom: 25px;
        }

        .page-title h1 {
            font-size: 29px;
            margin-bottom: 7px;
        }

        .page-title p {
            color: #657691;
            font-size: 14px;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 20px;
        }

        .stat-card {
            background: white;

            border: 1px solid #e7ecf3;

            border-radius: 12px;

            padding: 22px;

            display: flex;
            align-items: center;

            gap: 15px;

            box-shadow:
                0 4px 15px rgba(30, 60, 90, 0.04);
        }

        .stat-icon {
            width: 58px;
            height: 58px;

            min-width: 58px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
        }

        .blue {
            background: #e8f1ff;
            color: #2875ed;
        }

        .green {
            background: #e4f8ef;
            color: #11a86b;
        }

        .orange {
            background: #fff1df;
            color: #f59b32;
        }

        .purple {
            background: #eee8ff;
            color: #7354d8;
        }

        .stat-info small {
            display: block;

            color: #687992;

            font-size: 13px;

            margin-bottom: 7px;
        }

        .stat-info h2 {
            font-size: 27px;
            color: #1d3865;
        }

        .stat-info span {
            display: block;

            margin-top: 6px;

            font-size: 11px;

            color: #11a86b;
        }

        /* =========================
           GRID CONTENT
        ========================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns: 2fr 1fr;

            gap: 20px;

            margin-bottom: 20px;
        }

        .card {
            background: white;

            border: 1px solid #e7ecf3;

            border-radius: 12px;

            padding: 22px;

            box-shadow:
                0 4px 15px rgba(30, 60, 90, 0.04);
        }

        .card-title {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 20px;
        }

        .card-title h3 {
            font-size: 17px;
        }

        .card-title p {
            font-size: 12px;
            color: #71809a;
            margin-top: 5px;
        }

        /* =========================
           GRAFIK SEDERHANA
        ========================= */

        .chart {
            height: 220px;

            display: flex;
            align-items: flex-end;

            gap: 20px;

            padding: 20px 10px 0;

            border-bottom: 1px solid #e4e9f0;
        }

        .bar-group {
            flex: 1;

            height: 100%;

            display: flex;

            align-items: flex-end;

            justify-content: center;

            gap: 5px;
        }

        .bar {
            width: 18px;

            border-radius: 5px 5px 0 0;
        }

        .bar-masuk {
            height: 65%;
            background: #2875ed;
        }

        .bar-keluar {
            height: 40%;
            background: #16b979;
        }

        .day {
            display: block;

            text-align: center;

            font-size: 11px;

            color: #7a879c;

            margin-top: 8px;
        }

        .legend {
            display: flex;

            gap: 20px;

            font-size: 12px;

            color: #62728c;
        }

        .legend span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .dot {
            width: 9px;
            height: 9px;

            border-radius: 50%;
        }

        .dot-blue {
            background: #2875ed;
        }

        .dot-green {
            background: #16b979;
        }

        /* =========================
           WELCOME CARD
        ========================= */

        .welcome-card {
            min-height: 300px;

            position: relative;

            overflow: hidden;
        }

        .welcome-card h2 {
            font-size: 22px;

            margin-top: 15px;
            margin-bottom: 12px;
        }

        .welcome-card h2 span {
            color: #1769e0;
        }

        .welcome-card p {
            color: #687992;

            line-height: 1.7;

            font-size: 13px;

            max-width: 270px;
        }

        .welcome-car {
            font-size: 70px;

            margin: 25px 0;

            text-align: right;
        }

        .setting-btn {
            display: inline-block;

            padding: 12px 18px;

            background: #2875ed;

            color: white;

            border-radius: 8px;

            font-size: 13px;

            margin-top: 10px;
        }

        .setting-btn:hover {
            background: #1769d8;
        }

        /* =========================
           BOTTOM GRID
        ========================= */

        .bottom-grid {
            display: grid;

            grid-template-columns: 1.5fr 1fr;

            gap: 20px;
        }

        /* =========================
           TABLE
        ========================= */

        .activity-table {
            width: 100%;

            border-collapse: collapse;

            margin-top: 10px;
        }

        .activity-table th {
            text-align: left;

            background: #f3f7fc;

            padding: 12px;

            font-size: 11px;

            color: #4d6282;
        }

        .activity-table td {
            padding: 13px 12px;

            border-bottom: 1px solid #edf0f5;

            font-size: 12px;

            color: #536580;
        }

        .status-dot {
            display: inline-block;

            width: 8px;
            height: 8px;

            border-radius: 50%;

            margin-right: 7px;
        }

        .status-blue {
            background: #2875ed;
        }

        .status-green {
            background: #16b979;
        }

        .status-purple {
            background: #7354d8;
        }

        .status-orange {
            background: #f59b32;
        }

        /* =========================
           QUICK MENU
        ========================= */

        .quick-menu {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 12px;
        }

        .quick-menu a {
            border: 1px solid #e4eaf2;

            border-radius: 10px;

            padding: 15px;

            display: flex;

            align-items: center;

            gap: 12px;

            color: #243d66;

            transition: 0.2s;
        }

        .quick-menu a:hover {
            transform: translateY(-2px);

            box-shadow:
                0 5px 15px rgba(30, 60, 90, 0.08);
        }

        .quick-icon {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
        }

        .quick-info strong {
            display: block;

            font-size: 12px;

            margin-bottom: 4px;
        }

        .quick-info small {
            display: block;

            font-size: 10px;

            color: #7a879c;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid,
            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .content {
                padding: 20px;
            }

            .top-right {
                display: none;
            }
        }

        @media (max-width: 600px) {

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .logout {
                position: relative;

                left: auto;
                right: auto;
                bottom: auto;

                margin-top: 20px;
            }

            .main {
                margin-left: 0;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 20px;
            }

            .quick-menu {
                grid-template-columns: 1fr;
            }
        }

    </style>
</head>

<body>

<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="logo">

        <div class="logo-icon">
            P
        </div>

        <div class="logo-text">
            <h2>Parkiran Apotek</h2>
            <p>Sistem Manajemen Parkir</p>
        </div>

    </div>


    <div class="menu">

        <a href="dashboard_controller.php" class="active">
            <span class="menu-icon">⌂</span>
            Dashboard
        </a>

        <a href="UserController.php">
            <span class="menu-icon">♟</span>
            Data User
        </a>

        <a href="TarifController.php">
            <span class="menu-icon">🏷</span>
            Tarif Parkir
        </a>

        <a href="AreaController.php">
            <span class="menu-icon">▣</span>
            Area Parkir
        </a>

        <a href="KendaraanController.php">
            <span class="menu-icon">🚗</span>
            Kendaraan
        </a>

        <a href="#">
            <span class="menu-icon">◷</span>
            Riwayat Kendaraan
        </a>

        <a href="#">
            <span class="menu-icon">♟</span>
            User Parkir
        </a>

        <a href="#">
            <span class="menu-icon">⚙</span>
            Pengaturan Parkir
        </a>

    </div>


    <div class="logout">

        <a href="#">
            <span class="menu-icon">⇥</span>
            Logout
        </a>

    </div>

</div>


<!-- =========================
     MAIN
========================= -->

<div class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <div class="welcome">
            Selamat datang, <strong>Admin</strong>
        </div>

        <div class="top-right">

            <span>📅 Senin, 22 September 2026</span>

            <span>◷ 08:45</span>

            <div class="admin">

                <div class="admin-icon">
                    ♟
                </div>

                Admin

            </div>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content">

        <!-- TITLE -->

        <div class="page-title">

            <h1>Dashboard</h1>

            <p>
                Selamat datang di Sistem Manajemen Parkir Apotek.
                Kelola data parkir dengan mudah dan efisien.
            </p>

        </div>


        <!-- =========================
             STATISTICS
        ========================= -->

        <div class="stats">

            <div class="stat-card">

                <div class="stat-icon blue">
                    🚗
                </div>

                <div class="stat-info">

                    <small>Total Kendaraan</small>

                    <h2><?= $totalKendaraan; ?></h2>
                
                    <span>↑ 12% dari bulan lalu</span>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon green">
                    ♟
                </div>

                <div class="stat-info">

                    <small>Total User</small>

                   <h2><?= $totalUser; ?></h2>

                    <span>↑ 8% dari bulan lalu</span>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon orange">
                    🏷
                </div>

                <div class="stat-info">

                    <small>Total Tarif</small>

                    <h2><?= $totalTarif; ?></h2>

                    <span>↑ 0% dari bulan lalu</span>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon purple">
                    P
                </div>

                <div class="stat-info">

                    <small>Total Area Parkir</small>

                    <h2><?= $totalArea; ?></h2>
                    
                    <span>↑ 0% dari bulan lalu</span>

                </div>

            </div>

        </div>


        <!-- =========================
             CHART + WELCOME
        ========================= -->

        <div class="dashboard-grid">


            <!-- CHART -->

            <div class="card">

                <div class="card-title">

                    <div>
                        <h3>Grafik Kendaraan Masuk & Keluar</h3>
                        <p>Data aktivitas kendaraan 7 hari terakhir</p>
                    </div>

                    <div class="legend">

                        <span>
                            <i class="dot dot-blue"></i>
                            Masuk
                        </span>

                        <span>
                            <i class="dot dot-green"></i>
                            Keluar
                        </span>

                    </div>

                </div>


                <div class="chart">

                    <div class="bar-group">
                        <div class="bar bar-masuk"></div>
                        <div class="bar bar-keluar"></div>
                    </div>

                    <div class="bar-group">
                        <div class="bar bar-masuk" style="height:75%;"></div>
                        <div class="bar bar-keluar" style="height:50%;"></div>
                    </div>

                    <div class="bar-group">
                        <div class="bar bar-masuk" style="height:90%;"></div>
                        <div class="bar bar-keluar" style="height:65%;"></div>
                    </div>

                    <div class="bar-group">
                        <div class="bar bar-masuk" style="height:60%;"></div>
                        <div class="bar bar-keluar" style="height:40%;"></div>
                    </div>

                    <div class="bar-group">
                        <div class="bar bar-masuk" style="height:55%;"></div>
                        <div class="bar bar-keluar" style="height:35%;"></div>
                    </div>

                    <div class="bar-group">
                        <div class="bar bar-masuk" style="height:85%;"></div>
                        <div class="bar bar-keluar" style="height:60%;"></div>
                    </div>

                    <div class="bar-group">
                        <div class="bar bar-masuk" style="height:70%;"></div>
                        <div class="bar bar-keluar" style="height:45%;"></div>
                    </div>

                </div>


                <div style="
                    display:flex;
                    justify-content:space-around;
                ">

                    <span class="day">16 Sep</span>
                    <span class="day">17 Sep</span>
                    <span class="day">18 Sep</span>
                    <span class="day">19 Sep</span>
                    <span class="day">20 Sep</span>
                    <span class="day">21 Sep</span>
                    <span class="day">22 Sep</span>

                </div>

            </div>


            <!-- WELCOME -->

            <div class="card welcome-card">

                <h2>
                    Selamat Datang,
                    <span>Admin!</span>
                </h2>

                <p>
                    Kelola data parkir, kendaraan, tarif,
                    pengguna dan pengaturan lainnya dengan
                    mudah melalui sistem ini.
                </p>

                <div class="welcome-car">
                    🚗
                </div>

                <a href="#" class="setting-btn">
                    ⚙ Pengaturan Sistem
                </a>

            </div>

        </div>


        <!-- =========================
             BOTTOM
        ========================= -->

        <div class="bottom-grid">


            <!-- AKTIVITAS -->

            <div class="card">

                <div class="card-title">

                    <div>
                        <h3>Aktivitas Terbaru</h3>
                        <p>Aktivitas sistem terbaru</p>
                    </div>

                </div>


                <table class="activity-table">

                    <thead>

                        <tr>
                            <th>Waktu</th>
                            <th>Aktivitas</th>
                            <th>Keterangan</th>
                            <th>User</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                <span class="status-dot status-blue"></span>
                                08:32
                            </td>

                            <td>Kendaraan Masuk</td>

                            <td>B 1234 ABC</td>

                            <td>User 1</td>

                        </tr>


                        <tr>

                            <td>
                                <span class="status-dot status-green"></span>
                                08:15
                            </td>

                            <td>Kendaraan Keluar</td>

                            <td>D 5678 XYZ</td>

                            <td>User 2</td>

                        </tr>


                        <tr>

                            <td>
                                <span class="status-dot status-purple"></span>
                                07:50
                            </td>

                            <td>Tambah User</td>

                            <td>User Baru</td>

                            <td>Admin</td>

                        </tr>


                        <tr>

                            <td>
                                <span class="status-dot status-orange"></span>
                                07:28
                            </td>

                            <td>Edit Tarif</td>

                            <td>Tarif Mobil</td>

                            <td>Admin</td>

                        </tr>


                        <tr>

                            <td>
                                <span class="status-dot status-green"></span>
                                07:10
                            </td>

                            <td>Tambah Area</td>

                            <td>Area Baru</td>

                            <td>Admin</td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- QUICK MENU -->

            <div class="card">

                <div class="card-title">

                    <div>
                        <h3>Quick Menu</h3>
                        <p>Akses menu dengan cepat</p>
                    </div>

                </div>


                <div class="quick-menu">


                    <a href="UserController.php">

                        <div class="quick-icon blue">
                            ♟
                        </div>

                        <div class="quick-info">

                            <strong>Data User</strong>

                            <small>
                                Kelola pengguna sistem
                            </small>

                        </div>

                    </a>


                    <a href="TarifController.php">

                        <div class="quick-icon green">
                            🏷
                        </div>

                        <div class="quick-info">

                            <strong>Tarif Parkir</strong>

                            <small>
                                Atur tarif kendaraan
                            </small>

                        </div>

                    </a>


                    <a href="AreaController.php">

                        <div class="quick-icon orange">
                            ▣
                        </div>

                        <div class="quick-info">

                            <strong>Area Parkir</strong>

                            <small>
                                Kelola area parkir
                            </small>

                        </div>

                    </a>


                    <a href="KendaraanController.php">

                        <div class="quick-icon purple">
                            🚗
                        </div>

                        <div class="quick-info">

                            <strong>Kendaraan</strong>

                            <small>
                                Kelola data kendaraan
                            </small>

                        </div>

                    </a>


                    <a href="#">

                        <div class="quick-icon green">
                            ◷
                        </div>

                        <div class="quick-info">

                            <strong>Riwayat</strong>

                            <small>
                                Riwayat kendaraan
                            </small>

                        </div>

                    </a>


                    <a href="#">

                        <div class="quick-icon orange">
                            ⚙
                        </div>

                        <div class="quick-info">

                            <strong>Pengaturan</strong>

                            <small>
                                Pengaturan parkir
                            </small>

                        </div>

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>