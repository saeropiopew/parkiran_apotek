<?php
class PetugasTransaksiController extends Controller {

    public function __construct() {
        // Proteksi: Hanya bisa diakses Petugas (atau admin yang ingin memantau)
        if (!isset($_SESSION['id_user']) || ($_SESSION['role'] !== 'petugas' && $_SESSION['role'] !== 'admin')) {
            header('Location: /parkir_apotek/public/AuthController');
            exit;
        }
    }

    public function index() {
        $data['judul'] = 'Manajemen Parkir Kendaraan';
        // Asumsi AreaModel sudah dibuat di sesi sebelumnya
        $data['area'] = $this->model('AreaModel')->getAllArea();
        $data['parkir_aktif'] = $this->model('TransaksiModel')->getParkirAktif();
        
        $this->view('petugas/index', $data);
    }

    public function prosesMasuk() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('TransaksiModel')->parkirMasuk($_POST, $_SESSION['id_user']) > 0) {
                // Catat log
                $this->model('LogModel')->catatLog($_SESSION['id_user'], "Mencatat Parkir Masuk: " . strtoupper($_POST['plat_nomor']));
                header('Location: /parkir_apotek/public/PetugasTransaksiController');
                exit;
            }
        }
    }

public function prosesKeluar($id_parkir) {
        $plat_nomor = $this->model('TransaksiModel')->parkirKeluar($id_parkir);
        if ($plat_nomor) {
            // Catat log
            $this->model('LogModel')->catatLog($_SESSION['id_user'], "Menyelesaikan Parkir Keluar: " . $plat_nomor);
            
            // Redirect ke halaman cetak struk dengan membawa id_parkir
            header('Location: /parkir_apotek/public/PetugasTransaksiController/cetakStruk/' . $id_parkir);
            exit;
        }
    }

    // Method baru untuk menampilkan struk
    public function cetakStruk($id_parkir) {
        $data['judul'] = 'Cetak Struk Parkir';
        
        // Asumsi kita buat method getTransaksiById di TransaksiModel
        $data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id_parkir);
        
        $this->view('petugas/struk', $data);
    }
}