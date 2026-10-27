<?php
class AdminUserController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Manajemen Pengguna';
        $data['users'] = $this->model('UserModel')->getAllUser(); 
        $this->view('admin/user/index', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if ($this->model('UserModel')->tambahUser($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menambah User Baru: " . $_POST['username']);
                header('Location: /parkir_apotek/public/AdminUserController');
                exit;
            }
        }
    }

    public function edit($id) {
        $data['judul'] = 'Ubah Data Pengguna';
        $data['user'] = $this->model('UserModel')->getUserById($id);
        $this->view('admin/user/edit', $data);
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['password'])) {
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }
            if ($this->model('UserModel')->ubahUser($_POST) > 0) {
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Mengubah Data User ID: " . $_POST['id_user']);
                header('Location: /parkir_apotek/public/AdminUserController');
                exit;
            } else {
                header('Location: /parkir_apotek/public/AdminUserController');
                exit;
            }
        }
    }

    public function hapus($id) {
        if ($this->model('UserModel')->hapusUser($id) > 0) {
            $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menghapus User ID: " . $id);
            header('Location: /parkir_apotek/public/AdminUserController');
            exit;
        }
    }
}