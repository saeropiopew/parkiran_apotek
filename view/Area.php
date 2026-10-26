<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Area Parkir</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>

<body>

    <h2>Data Area Parkir</h2>

    <a href="../controller/AreaController.php?aksi=tambah">
        + Tambah Area
    </a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Nama Area</th>
            <th>Kapasitas</th>
            <th>Terisi</th>
            <th>Sisa</th>
            <th>Aksi</th>
        </tr>

        <?php

        $no = 1;

        if ($data && $data->num_rows > 0) {

            while ($row = $data->fetch_assoc()) {

                $sisa = $row["kapasitas"] - $row["terisi"];

        ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row["nama_area"]); ?>
                    </td>

                    <td>
                        <?= $row["kapasitas"]; ?>
                    </td>

                    <td>
                        <?= $row["terisi"]; ?>
                    </td>

                    <td>
                        <?= $sisa; ?>
                    </td>

                    <td>

                        <a href="../controller/AreaController.php?aksi=edit&id=<?= $row["id_area"]; ?>">
                            Edit
                        </a>

                        |

                        <a href="../controller/AreaController.php?aksi=hapus&id=<?= $row["id_area"]; ?>">
                            Hapus
                        </a>

                    </td>

                </tr>

        <?php

            }

        } else {

        ?>

            <tr>

                <td colspan="6">
                    Belum ada data area parkir.
                </td>

            </tr>

        <?php

        }

        ?>

    </table>

    <br>

    <a href="../controller/dashboard_controller.php">
        Kembali ke Dashboard
    </a>

</body>

</html>