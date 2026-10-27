<?php
class AdminLogController extends Controller {

    public function __construct() {
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Riwayat Aktivitas Sistem';
        // Asumsi model LogModel sudah di-update untuk memiliki method getAllLog() 
        // yang melakukan: SELECT l.*, u.nama_lengkap FROM tb_log_aktivitas l JOIN tb_user u ON l.id_user = u.id_user ORDER BY l.waktu_aktivitas DESC
        $data['logs'] = $this->model('LogModel')->getAllLog(); 
        $this->view('admin/log/index', $data);
    }
}