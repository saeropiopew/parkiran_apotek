<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM tb_user WHERE username = :username AND status_aktif = 1";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getUserById($id) {
        $this->db->query("SELECT * FROM tb_user WHERE id_user = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAllUser() {
        $this->db->query("SELECT * FROM tb_user ORDER BY id_user DESC");
        return $this->db->resultSet();
    }

    public function tambahUser($data) {
        $query = "INSERT INTO tb_user (nama_lengkap, username, password, role, status_aktif) 
                  VALUES (:nama_lengkap, :username, :password, :role, 1)";
        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahUser($data) {
        // Jika password diisi, update beserta passwordnya. Jika kosong, biarkan password lama.
        if (!empty($data['password'])) {
            $query = "UPDATE tb_user SET nama_lengkap = :nama_lengkap, username = :username, password = :password, role = :role, status_aktif = :status_aktif WHERE id_user = :id_user";
            $this->db->query($query);
            $this->db->bind('password', $data['password']);
        } else {
            $query = "UPDATE tb_user SET nama_lengkap = :nama_lengkap, username = :username, role = :role, status_aktif = :status_aktif WHERE id_user = :id_user";
            $this->db->query($query);
        }

        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('status_aktif', $data['status_aktif']);
        $this->db->bind('id_user', $data['id_user']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusUser($id) {
        $this->db->query("DELETE FROM tb_user WHERE id_user = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}