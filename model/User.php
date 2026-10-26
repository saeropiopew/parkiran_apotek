<?php

require_once __DIR__ . "/m_koneksi.php";

class User
{
    private $db;

    public function __construct()
    {
        $koneksi = new m_koneksi();
        $this->db = $koneksi->getkoneksi();
    }

    // =========================
    // AMBIL SEMUA USER
    // =========================

    public function getAll($role = "")
    {
        $role = $this->db->real_escape_string($role);

        if ($role == "admin" || $role == "petugas") {

            $query = "SELECT *
                      FROM tb_user
                      WHERE role = '$role'
                      ORDER BY id_user DESC";

        } else {

            $query = "SELECT *
                      FROM tb_user
                      ORDER BY id_user DESC";
        }

        return $this->db->query($query);
    }


    // =========================
    // AMBIL USER BERDASARKAN ID
    // =========================

    public function getById($id)
    {
        $id = (int) $id;

        $query = "SELECT *
                  FROM tb_user
                  WHERE id_user = $id";

        $result = $this->db->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }


    // =========================
    // CEK USERNAME
    // =========================

    public function usernameExists($username, $id = 0)
    {
        $username = $this->db->real_escape_string($username);
        $id = (int) $id;

        $query = "SELECT id_user
                  FROM tb_user
                  WHERE username = '$username'
                  AND id_user != $id
                  LIMIT 1";

        $result = $this->db->query($query);

        return ($result && $result->num_rows > 0);
    }


    // =========================
    // TAMBAH USER
    // =========================

    public function tambah(
        $nama_lengkap,
        $username,
        $password,
        $role,
        $status_aktif
    ) {
        $nama_lengkap = $this->db->real_escape_string($nama_lengkap);
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);
        $role = $this->db->real_escape_string($role);
        $status_aktif = (int) $status_aktif;

        $query = "INSERT INTO tb_user
                  (
                      nama_lengkap,
                      username,
                      password,
                      role,
                      status_aktif
                  )
                  VALUES
                  (
                      '$nama_lengkap',
                      '$username',
                      '$password',
                      '$role',
                      $status_aktif
                  )";

        return $this->db->query($query);
    }


    // =========================
    // EDIT USER
    // =========================

    public function edit(
        $id,
        $nama_lengkap,
        $username,
        $role,
        $status_aktif
    ) {
        $id = (int) $id;

        $nama_lengkap = $this->db->real_escape_string($nama_lengkap);
        $username = $this->db->real_escape_string($username);
        $role = $this->db->real_escape_string($role);
        $status_aktif = (int) $status_aktif;

        $query = "UPDATE tb_user SET
                    nama_lengkap = '$nama_lengkap',
                    username = '$username',
                    role = '$role',
                    status_aktif = $status_aktif
                  WHERE id_user = $id";

        return $this->db->query($query);
    }


    // =========================
    // HAPUS USER
    // =========================

    public function hapus($id)
    {
        $id = (int) $id;

        $query = "DELETE FROM tb_user
                  WHERE id_user = $id";

        return $this->db->query($query);
    }
}