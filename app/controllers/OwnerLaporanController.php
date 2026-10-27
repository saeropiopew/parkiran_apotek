<?php
class OwnerLaporanController extends Controller {

    public function __construct() {
        // Proteksi: Hanya bisa diakses Owner (atau admin)
        if (!isset($_SESSION['id_user']) || ($_SESSION['role'] !== 'owner' && $_SESSION['role'] !== 'admin')) {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Laporan Pendapatan Parkir';
        
        // Cek apakah ada filter tanggal dari form (metode GET)
        $tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-01'); // Default awal bulan
        $tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d'); // Default hari ini

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;

        // Ambil data laporan dari Model
        $laporanData = $this->model('TransaksiModel')->getLaporanRekap($tgl_awal, $tgl_akhir);
        
        $data['transaksi'] = $laporanData['detail'];
        $data['total_pendapatan'] = $laporanData['total'];
        
        $this->view('owner/laporan', $data);
    }
}