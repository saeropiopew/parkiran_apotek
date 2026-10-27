<?php
class Home extends Controller {
    public function index() {
        // Jika user belum login, lemparkan paksa ke halaman Login
        if (!isset($_SESSION['id_user'])) {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }

        // Jika sudah login, tampilkan halaman dashboard
        $data['judul'] = 'Dashboard Utama';
        $this->view('home/index', $data);
    }
}