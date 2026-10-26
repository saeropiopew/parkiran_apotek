<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kendaraan</title>

    <link rel="stylesheet" href="../asset/style.css">
</head>

<body>

<div class="container">

    <h1>Tambah Kendaraan</h1>

    <form method="POST"
          action="../controller/KendaraanController.php?aksi=tambah">

        <label>Plat Nomor</label>
        <input
            type="text"
            name="plat_nomor"
            placeholder="Contoh: B 1234 ABC"
            required
        >

        <br><br>

        <label>Jenis Kendaraan</label>
        <select name="jenis_kendaraan" required>

            <option value="">-- Pilih Jenis --</option>
            <option value="motor">Motor</option>
            <option value="mobil">Mobil</option>
            <option value="lainnya">Lainnya</option>

        </select>

        <br><br>

        <label>Warna</label>
        <input
            type="text"
            name="warna"
            placeholder="Contoh: Hitam"
            required
        >

        <br><br>

        <label>Pemilik</label>
        <input
            type="text"
            name="pemilik"
            placeholder="Nama pemilik"
            required
        >

        <br><br>

        <label>ID User</label>
        <input
            type="number"
            name="id_user"
            placeholder="Boleh dikosongkan"
        >

        <br><br>

        <button type="submit">
            Simpan
        </button>

        <a href="../controller/KendaraanController.php">
            Batal
        </a>

    </form>

</div>

</body>
</html>