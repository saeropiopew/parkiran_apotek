<?php

require_once __DIR__ . "/../model/Dashboard.php";

class DashboardController
{
    private $model;

    public function __construct()
    {
        $this->model = new Dashboard();
    }

    public function index()
    {
        // Ambil data dari database
        $totalKendaraan = $this->model->getTotalKendaraan();
        $totalUser = $this->model->getTotalUser();
        $totalTarif = $this->model->getTotalTarif();
        $totalArea = $this->model->getTotalArea();

        // Tampilkan dashboard
        require __DIR__ . "/../view/dashboard.php";
    }
}


// Jalankan controller
$controller = new DashboardController();

$controller->index();