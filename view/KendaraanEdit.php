<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kendaraan</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>

<body>

<div class="container">

    <h1>Edit Kendaraan</h1>

    <?php if ($kendaraan) { ?>

    <form method="POST"
          action="../controller/KendaraanController.php?aksi=edit&id=<?= $kendaraan["id_kendaraan"]; ?>">

        <label>Plat Nomor</label>
        <input
            type="text"
            name="plat_nomor"
            value="<?= htmlspecialchars($kendaraan["plat_nomor"]); ?>"
            required
        >

        <br><br>

        <label>Jenis Kendaraan</label>

        <select name="jenis_kendaraan" required>

            <option value="motor"
                <?= $kendaraan["jenis_kendaraan"] == "motor" ? "selected" : ""; ?>>
                Motor
            </option>

            <option value="mobil"
                <?= $kendaraan["jenis_kendaraan"] == "mobil" ? "selected" : ""; ?>>
                Mobil
            </option>

            <option value="lainnya"
                <?= $kendaraan["jenis_kendaraan"] == "lainnya" ? "selected" : ""; ?>>
                Lainnya
            </option>

        </select>

        <br><br>

        <label>Warna</label>
        <input
            type="text"
            name="warna"
            value="<?= htmlspecialchars($kendaraan["warna"]); ?>"
            required
        >

        <br><br>

        <label>Pemilik</label>
        <input
            type="text"
            name="pemilik"
            value="<?= htmlspecialchars($kendaraan["pemilik"]); ?>"
            required
        >

        <br><br>

        <label>ID User</label>
        <input
            type="number"
            name="id_user"
            value="<?= $kendaraan["id_user"] !== null ? htmlspecialchars($kendaraan["id_user"]) : ""; ?>"
            placeholder="Boleh dikosongkan"
        >

        <br><br>

        <button type="submit">
            Simpan Perubahan
        </button>

        <a href="../controller/KendaraanController.php">
            Batal
        </a>

    </form>

    <?php } else { ?>

        <p>Data kendaraan tidak ditemukan.</p>

        <a href="../controller/KendaraanController.php">
            Kembali
        </a>

    <?php } ?>

</div>

</body>
</html>