<?php
class AdminKendaraanController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Manajemen Data Kendaraan';
        // Asumsi fungsi getAllKendaraan sudah ada di KendaraanModel
        $data['kendaraan'] = $this->model('KendaraanModel')->getAllKendaraan(); 
        $this->view('admin/kendaraan/index', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('KendaraanModel')->tambahKendaraan($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Mendaftarkan Kendaraan Baru: " . $_POST['plat_nomor']);
                header('Location: /parkir_apotek/public/AdminKendaraanController');
                exit;
            }
        }
    }
}