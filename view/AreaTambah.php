<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Area Parkir</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>

<body>

    <h2>Tambah Area Parkir</h2>

    <form action="../controller/AreaController.php?aksi=tambah" method="POST">

        <p>
            <label>Nama Area</label>
            <br>

            <input
                type="text"
                name="nama_area"
                placeholder="Contoh: Lantai 1 - Zona A"
                required>
        </p>

        <p>
            <label>Kapasitas</label>
            <br>

            <input
                type="number"
                name="kapasitas"
                min="1"
                placeholder="Contoh: 50"
                required>
        </p>

        <button type="submit">
            Simpan
        </button>

        <a href="../controller/AreaController.php">
            Batal
        </a>

    </form>

</body>

</html>