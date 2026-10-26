<?php

require_once __DIR__ . "/../model/User.php";

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }


    // =========================
    // DATA USER
    // =========================

    public function index()
    {
        $role = $_GET["role"] ?? "";

        $data = $this->model->getAll($role);

        require __DIR__ . "/../view/User.php";
    }


    // =========================
    // TAMBAH USER
    // =========================

    public function tambah()
    {
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_lengkap = trim($_POST["nama_lengkap"] ?? "");
            $username = trim($_POST["username"] ?? "");
            $password = trim($_POST["password"] ?? "");
            $role = $_POST["role"] ?? "";
            $status_aktif = $_POST["status_aktif"] ?? 1;

            // Validasi
            if (
                $nama_lengkap == "" ||
                $username == "" ||
                $password == ""
            ) {

                $error = "Semua data wajib diisi.";

            } elseif (
                $role != "admin" &&
                $role != "petugas"
            ) {

                $error = "Role tidak valid.";

            } elseif ($this->model->usernameExists($username)) {

                $error = "Username sudah digunakan.";

            } else {

                $this->model->tambah(
                    $nama_lengkap,
                    $username,
                    $password,
                    $role,
                    $status_aktif
                );

                header("Location: UserController.php");
                exit;
            }
        }

        require __DIR__ . "/../view/UserTambah.php";
    }


    // =========================
    // EDIT USER
    // =========================

    public function edit()
    {
        // Ambil ID dari GET atau POST
        if (isset($_GET["id"])) {

            $id = (int) $_GET["id"];

        } elseif (isset($_POST["id_user"])) {

            $id = (int) $_POST["id_user"];

        } else {

            $id = 0;
        }


        if ($id <= 0) {

            echo "ID user tidak valid.";
            exit;
        }


        // Ambil data user
        $user = $this->model->getById($id);


        if (!$user) {

            echo "Data user tidak ditemukan.";
            exit;
        }


        $error = "";


        // =========================
        // SIMPAN PERUBAHAN
        // =========================

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_lengkap = trim($_POST["nama_lengkap"] ?? "");
            $username = trim($_POST["username"] ?? "");
            $role = $_POST["role"] ?? "";
            $status_aktif = $_POST["status_aktif"] ?? 1;


            if (
                $nama_lengkap == "" ||
                $username == ""
            ) {

                $error = "Nama lengkap dan username wajib diisi.";

            } elseif (
                $role != "admin" &&
                $role != "petugas"
            ) {

                $error = "Role tidak valid.";

            } elseif (
                $this->model->usernameExists($username, $id)
            ) {

                $error = "Username sudah digunakan user lain.";

            } else {

                $this->model->edit(
                    $id,
                    $nama_lengkap,
                    $username,
                    $role,
                    $status_aktif
                );

                header("Location: UserController.php");
                exit;
            }
        }


        require __DIR__ . "/../view/UserEdit.php";
    }


    // =========================
    // HAPUS USER
    // =========================

    public function hapus()
    {
        $id = isset($_GET["id"])
            ? (int) $_GET["id"]
            : 0;


        if ($id <= 0) {

            echo "ID user tidak valid.";
            exit;
        }


        $user = $this->model->getById($id);


        if (!$user) {

            echo "Data user tidak ditemukan.";
            exit;
        }


        $this->model->hapus($id);


        header("Location: UserController.php");
        exit;
    }
}


// =========================
// JALANKAN CONTROLLER
// =========================

$controller = new UserController();

$aksi = $_GET["aksi"] ?? "index";


if ($aksi == "tambah") {

    $controller->tambah();

} elseif ($aksi == "edit") {

    $controller->edit();

} elseif ($aksi == "hapus") {

    $controller->hapus();

} else {

    $controller->index();
}