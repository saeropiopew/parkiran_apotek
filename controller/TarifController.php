<?php

require_once __DIR__ . "/../model/Tarif.php";

class TarifController
{
    private $model;

    public function __construct()
    {
        $this->model = new Tarif();
    }

    // =========================
    // DATA TARIF
    // =========================

    public function index()
    {
        $data = $this->model->getAll();

        require __DIR__ . "/../view/tarif.php";
    }


    // =========================
    // TAMBAH TARIF
    // =========================

    public function tambah()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $jenis_kendaraan = $_POST["jenis_kendaraan"] ?? "";
            $tarif_per_jam = $_POST["tarif_per_jam"] ?? 0;

            $this->model->tambah(
                $jenis_kendaraan,
                $tarif_per_jam
            );

            header("Location: TarifController.php");
            exit;
        }

        require __DIR__ . "/../view/tarif_tambah.php";
    }


    // =========================
    // HAPUS TARIF
    // =========================

    public function hapus()
    {
        $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

        if ($id <= 0) {
            echo "ID tarif tidak valid.";
            exit;
        }

        $this->model->hapus($id);

        header("Location: TarifController.php");
        exit;
    }
}


// =========================
// JALANKAN CONTROLLER
// =========================

$controller = new TarifController();

$aksi = $_GET["aksi"] ?? "index";


if ($aksi == "tambah") {

    $controller->tambah();

} elseif ($aksi == "hapus") {

    $controller->hapus();

} else {

    $controller->index();
}