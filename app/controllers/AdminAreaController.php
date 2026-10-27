<?php
class AdminAreaController extends Controller {

    public function __construct() {
        // Proteksi: Hanya Admin yang bisa akses
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Manajemen Area Parkir';
        $data['area'] = $this->model('AreaModel')->getAllArea();
        $this->view('admin/area/index', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('AreaModel')->tambahArea($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menambah Area Parkir: " . $_POST['nama_area']);
                header('Location: /parkir_apotek/public/AdminAreaController');
                exit;
            }
        }
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('AreaModel')->ubahArea($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Mengubah Area Parkir ID: " . $_POST['id_area']);
                header('Location: /parkir_apotek/public/AdminAreaController');
                exit;
            }
        }
    }

    public function hapus($id) {
        if ($this->model('AreaModel')->hapusArea($id) > 0) {
            $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menghapus Area Parkir ID: " . $id);
            header('Location: /parkir_apotek/public/AdminAreaController');
            exit;
        }
    }
}