<?php

require_once __DIR__ . "/../model/Tarif.php";

class TarifEditController
{
    private $model;

    public function __construct()
    {
        $this->model = new Tarif();
    }

    public function edit()
    {
        // Ambil ID dari GET atau POST
        if (isset($_GET["id"])) {
            $id = (int) $_GET["id"];
        } elseif (isset($_POST["id_tarif"])) {
            $id = (int) $_POST["id_tarif"];
        } else {
            $id = 0;
        }

        if ($id <= 0) {
            echo "ID tarif tidak valid.";
            exit;
        }

        // Ambil data tarif
        $tarif = $this->model->getById($id);

        if (!$tarif) {
            echo "Data tarif dengan ID " . $id . " tidak ditemukan.";
            exit;
        }

        // Jika tombol simpan ditekan
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $jenis_kendaraan = $_POST["jenis_kendaraan"] ?? "";
            $tarif_per_jam = $_POST["tarif_per_jam"] ?? 0;

            $this->model->edit(
                $id,
                $jenis_kendaraan,
                $tarif_per_jam
            );

            header("Location: TarifController.php");
            exit;
        }

        // Tampilkan form edit
        require __DIR__ . "/../view/tarif_edit.php";
    }
}

$controller = new TarifEditController();
$controller->edit();