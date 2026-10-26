<?php

$error = $error ?? "";

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah User</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 600px;
            max-width: 90%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 10px;
        }

        .deskripsi {
            color: #6b7280;
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
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        .button-area {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        .kembali {
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .kembali {
            background: #e5e7eb;
            color: #374151;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Tambah User</h1>

    <p class="deskripsi">
        Tambahkan data Admin atau Petugas.
    </p>


    <?php if ($error != ""): ?>

        <div class="error">
            <?= htmlspecialchars($error); ?>
        </div>

    <?php endif; ?>


    <form
        action="../controller/UserController.php?aksi=tambah"
        method="POST"
    >

        <div class="form-group">

            <label>
                Nama Lengkap
            </label>

            <input
                type="text"
                name="nama_lengkap"
                placeholder="Masukkan nama lengkap"
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
                placeholder="Masukkan username"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Role
            </label>

            <select name="role" required>

                <option value="">
                    -- Pilih Role --
                </option>

                <option value="admin">
                    Admin
                </option>

                <option value="petugas">
                    Petugas
                </option>

            </select>

        </div>


        <div class="form-group">

            <label>
                Status
            </label>

            <select name="status_aktif">

                <option value="1">
                    Aktif
                </option>

                <option value="0">
                    Nonaktif
                </option>

            </select>

        </div>


        <div class="button-area">

            <a
                href="../controller/UserController.php"
                class="kembali"
            >
                Kembali
            </a>

            <button type="submit">
                Simpan User
            </button>

        </div>

    </form>

</div>

</body>

</html>