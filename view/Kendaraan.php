<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kendaraan</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>

<body>

<div class="container">

    <h1>Data Kendaraan</h1>

    <a href="../controller/dashboard_controller.php">
        ← Kembali ke Dashboard
    </a>

    <br><br>

    <a href="../controller/KendaraanController.php?aksi=tambah">
        + Tambah Kendaraan
    </a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Plat Nomor</th>
            <th>Jenis Kendaraan</th>
            <th>Warna</th>
            <th>Pemilik</th>
            <th>ID User</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        if ($data && $data->num_rows > 0) {

            while ($row = $data->fetch_assoc()) {
        ?>

        <tr>
            <td><?= $no++; ?></td>

            <td>
                <?= htmlspecialchars($row["plat_nomor"]); ?>
            </td>

            <td>
                <?= htmlspecialchars($row["jenis_kendaraan"]); ?>
            </td>

            <td>
                <?= htmlspecialchars($row["warna"]); ?>
            </td>

            <td>
                <?= htmlspecialchars($row["pemilik"]); ?>
            </td>

            <td>
                <?= $row["id_user"] !== null
                    ? htmlspecialchars($row["id_user"])
                    : "-"; ?>
            </td>

            <td>

                <a href="../controller/KendaraanController.php?aksi=edit&id=<?= $row["id_kendaraan"]; ?>">
                    Edit
                </a>

                |

                <a href="../controller/KendaraanController.php?aksi=hapus&id=<?= $row["id_kendaraan"]; ?>">
                    Hapus
                </a>

            </td>
        </tr>

        <?php
            }

        } else {
        ?>

        <tr>
            <td colspan="7" style="text-align:center;">
                Belum ada data kendaraan.
            </td>
        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>
</html>