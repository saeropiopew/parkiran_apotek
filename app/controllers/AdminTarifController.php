<?php
class AdminTarifController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Manajemen Tarif Parkir';
        $data['tarif'] = $this->model('TarifModel')->getAllTarif();
        $this->view('admin/tarif/index', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('TarifModel')->tambahTarif($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menambah Tarif Baru: " . $_POST['jenis_kendaraan']);
                header('Location: /parkir_apotek/public/AdminTarifController');
                exit;
            }
        }
    }

    // Menampilkan halaman/form edit tarif
    public function edit($id) {
        $data['judul'] = 'Ubah Tarif Parkir';
        $data['tarif'] = $this->model('TarifModel')->getTarifById($id);
        $this->view('admin/tarif/edit', $data);
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('TarifModel')->ubahTarif($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Mengubah Tarif ID: " . $_POST['id_tarif']);
                header('Location: /parkir_apotek/public/AdminTarifController');
                exit;
            } else {
                header('Location: /parkir_apotek/public/AdminTarifController');
                exit;
            }
        }
    }

    public function hapus($id) {
        if ($this->model('TarifModel')->hapusTarif($id) > 0) {
            $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menghapus Tarif ID: " . $id);
            header('Location: /parkir_apotek/public/AdminTarifController');
            exit;
        }
    }
}