<?php

require_once __DIR__ . "/../model/Kendaraan.php";

class KendaraanController
{
    private $model;

    public function __construct()
    {
        $this->model = new Kendaraan();
    }

    public function index()
    {
        $data = $this->model->getAll();

        require __DIR__ . "/../view/kendaraan.php";
    }

    public function tambah()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $plat_nomor = $_POST["plat_nomor"];
            $jenis_kendaraan = $_POST["jenis_kendaraan"];
            $warna = $_POST["warna"];
            $pemilik = $_POST["pemilik"];
            $id_user = $_POST["id_user"];

            $this->model->tambah(
                $plat_nomor,
                $jenis_kendaraan,
                $warna,
                $pemilik,
                $id_user
            );

            header("Location: KendaraanController.php");
            exit;
        }

        require __DIR__ . "/../view/kendaraan_tambah.php";
    }

    public function edit()
    {
        $id = $_GET["id"] ?? 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $plat_nomor = $_POST["plat_nomor"];
            $jenis_kendaraan = $_POST["jenis_kendaraan"];
            $warna = $_POST["warna"];
            $pemilik = $_POST["pemilik"];
            $id_user = $_POST["id_user"];

            $this->model->edit(
                $id,
                $plat_nomor,
                $jenis_kendaraan,
                $warna,
                $pemilik,
                $id_user
            );

            header("Location: KendaraanController.php");
            exit;
        }

        $kendaraan = $this->model->getById($id);

        require __DIR__ . "/../view/kendaraan_edit.php";
    }

    public function hapus()
    {
        $id = $_GET["id"] ?? 0;

        $this->model->hapus($id);

        header("Location: KendaraanController.php");
        exit;
    }
}


// Menjalankan controller
$controller = new KendaraanController();

$aksi = $_GET["aksi"] ?? "index";

if ($aksi == "tambah") {

    $controller->tambah();

} elseif ($aksi == "edit") {

    $controller->edit();

} elseif ($aksi == "hapus") {

    $controller->hapus();

} else {

    $controller->index();
}