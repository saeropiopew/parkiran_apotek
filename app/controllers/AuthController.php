<?php
class AuthController extends Controller {

    // Menampilkan halaman login
    public function index() {
        // Jika user sudah login, langsung arahkan ke halaman utama/dashboard
        if (isset($_SESSION['id_user'])) {
            header('Location: /parkir_apotek/public/Home'); 
            exit;
        }
        
        // Panggil view login
        $this->view('auth/login');
    }

    // Memproses data dari form login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Panggil UserModel untuk mencari user
            $user = $this->model('UserModel')->getUserByUsername($username);

            // --- SOLUSI SEMENTARA: BYPASS PASSWORD ---
            // Jika user ditemukan dan password benar ATAU diinput '12345'
            if ($user && ($password === '12345' || password_verify($password, $user['password']))) {
                
                // 1. Daftarkan Session
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
                $_SESSION['role'] = $user['role'];

                // 2. Catat Log Aktivitas
                $this->model('LogModel')->catatLog($user['id_user'], 'Berhasil Login');

                // 3. Arahkan ke Halaman Utama
                header('Location: /parkir_apotek/public/Home');
                exit;
            } else {
                $_SESSION['error'] = 'Username atau Password salah, atau akun tidak aktif!';
                header('Location: /parkir_apotek/public/AuthController');
                exit;
            }
        }
    }

    // Memproses proses logout
    public function logout() {
        // Catat log aktivitas logout jika session id_user ada
        if (isset($_SESSION['id_user'])) {
            $this->model('LogModel')->catatLog($_SESSION['id_user'], 'Logout dari sistem');
        }

        // Hapus semua session
        session_unset();
        session_destroy();

        // Kembalikan ke halaman login
        header('Location: /parkir_apotek/public/AuthController');
        exit;
    }
}