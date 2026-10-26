<?php

require_once __DIR__ . "/../model/Area.php";

class AreaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Area();
    }

    public function index()
    {
        $data = $this->model->getAll();

        require __DIR__ . "/../view/area.php";
    }

    public function tambah()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_area = $_POST["nama_area"];
            $kapasitas = $_POST["kapasitas"];

            $this->model->tambah(
                $nama_area,
                $kapasitas
            );

            header("Location: AreaController.php");
            exit;
        }

        require __DIR__ . "/../view/area_tambah.php";
    }

    public function edit()
    {
        $id = $_GET["id"] ?? 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_area = $_POST["nama_area"];
            $kapasitas = $_POST["kapasitas"];

            $this->model->edit(
                $id,
                $nama_area,
                $kapasitas
            );

            header("Location: AreaController.php");
            exit;
        }

        $area = $this->model->getById($id);

        require __DIR__ . "/../view/area_edit.php";
    }

    public function hapus()
    {
        $id = $_GET["id"] ?? 0;

        $this->model->hapus($id);

        header("Location: AreaController.php");
        exit;
    }
}

$controller = new AreaController();

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